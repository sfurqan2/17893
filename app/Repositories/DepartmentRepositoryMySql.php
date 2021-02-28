<?php

namespace app\Repositories;

use App\Models\User;
use App\Models\Department;
use app\Intefaces\DepartmentRepositoryInterface;

class DeparmentRepositoryMySql implements DepartmentRepositoryInterface {

    public function all(): array
    {
        return Department::all()->toArray();
    }

    public function getUserDepartment(int $user_id): array
    {
        return User::find($user_id)->Department->toArray();
    }
    
}