<?php

namespace app\Repositories;

use App\Models\User;
use App\Models\Department;
use app\Intefaces\UserRepositoryInterface;

class UserRepositoryMySql implements UserRepositoryInterface {

    public function all(): array
    {
        return User::all()->toArray();
    }

    public function getAllUsersInDepartment(string $department): array
    {
        $department_id = Department::where('name', $department)->value('id');
        return User::where('department_id', $department_id)->toArray();
    }
}