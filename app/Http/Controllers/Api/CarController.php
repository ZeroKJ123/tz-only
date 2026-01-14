<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarController extends Controller
{
    public function available(Request $request)
    {
        $validated = $request->validate([
            'start_time' => 'required|date|after:now',
            'end_time' => 'required|date|after:start_time',
            'model' => 'sometimes|string|max:255',
            'category_id' => 'sometimes|integer|exists:comfort_categories,id',
        ]);

        $startTime = $validated['start_time'];
        $endTime = $validated['end_time'];

        $user = Auth::user()->load('position.comfortCategories');
        if (!$user->position) {
            return response()->json(['message' => 'User position not set.'], 403);
        }

        $allowedCategoryIds = $user->position->comfortCategories->pluck('id');

        $cars = Car::query()
            ->with(['driver', 'comfortCategory'])
            ->whereIn('comfort_category_id', $allowedCategoryIds)
            ->whereDoesntHave('trips', function (Builder $query) use ($startTime, $endTime) {
                $query->where(function (Builder $q) use ($startTime, $endTime) {
                    $q->where('start_time', '<', $endTime)
                        ->where('end_time', '>', $startTime);
                });
            })
            ->when($request->filled('model'), function (Builder $query) use ($validated) {
                $query->where('model', 'like', '%'.$validated['model'].'%');
            })
            ->when($request->filled('category_id'), function (Builder $query) use ($validated) {
                $query->where('comfort_category_id', $validated['category_id']);
            })
            ->get();

        return response()->json($cars);
    }
}
