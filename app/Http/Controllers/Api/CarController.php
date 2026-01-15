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
            'start_time' => 'required|date_format:Y-m-d\TH:i:s',
            'end_time' => 'required|date_format:Y-m-d\TH:i:s|after:start_time',
            'model' => 'nullable|string|max:255',
            'category_id' => 'nullable|integer|exists:comfort_categories,id',
        ]);

        $user = Auth::user();
        $allowedCategoryIds = $user->position->comfortCategories->pluck('id');

        $cars = Car::query()
            ->with(['driver', 'comfortCategory'])
            ->whereIn('comfort_category_id', $allowedCategoryIds)
            ->whereDoesntHave('trips', function (Builder $query) use ($validated) {
                $query->where('start_time', '<', $validated['end_time'])
                    ->where('end_time', '>', $validated['start_time']);
            })
            ->when($request->filled('model'), function (Builder $query) use ($request) {
                $query->where('model', 'like', '%' . $request->input('model') . '%');
            })
            ->when($request->filled('category_id'), function (Builder $query) use ($validated, $allowedCategoryIds) {
                if ($allowedCategoryIds->contains($validated['category_id'])) {
                    $query->where('comfort_category_id', $validated['category_id']);
                } else {
                    $query->whereRaw('1 = 0');
                }
            })
            ->get();

        return response()->json($cars);
    }
}
