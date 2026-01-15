<?php

namespace App\Repositories\Contracts;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

interface CarRepositoryInterface
{
    public function findAvailable(User $user, array $filters): Collection;
}
