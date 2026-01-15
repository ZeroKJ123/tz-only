<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\AvailableCarsRequest;
use App\Repositories\Contracts\CarRepositoryInterface;
use Illuminate\Http\JsonResponse;

class CarController extends Controller
{
    public function __construct(private readonly CarRepositoryInterface $carRepository){}

    public function available(AvailableCarsRequest $request): JsonResponse
    {
        $cars = $this->carRepository->findAvailable(
            $request->user(),
            $request->validated()
        );

        return response()->json($cars);
    }
}
