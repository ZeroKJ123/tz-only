<?php

namespace App\Repositories\Eloquent;

use App\Models\Car;
use App\Models\User;
use App\Repositories\Contracts\CarRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class EloquentCarRepository implements CarRepositoryInterface
{
    public function findAvailable(User $user, array $filters): Collection
    {
        $allowedCategoryIds = $user->position->comfortCategories->pluck('id');

        return Car::query()
            ->with(['driver', 'comfortCategory'])
            ->whereIn('comfort_category_id', $allowedCategoryIds)
            ->whereDoesntHave('trips', function (Builder $query) use ($filters) {
                $query->where('start_time', '<', $filters['end_time'])
                    ->where('end_time', '>', $filters['start_time']);
            })
            ->when(isset($filters['model']), function (Builder $query) use ($filters) {
                $query->where('model', 'like', '%' . $filters['model'] . '%');
            })
            ->when(isset($filters['category_id']), function (Builder $query) use ($filters, $allowedCategoryIds) {
                if ($allowedCategoryIds->contains($filters['category_id'])) {
                    $query->where('comfort_category_id', $filters['category_id']);
                } else {
                    $query->whereRaw('1 = 0');
                }
            })
            ->get();
    }
}
