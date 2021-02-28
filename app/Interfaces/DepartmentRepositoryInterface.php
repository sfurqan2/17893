<?php

namespace app\Intefaces;

interface DepartmentRepositoryInterface {
    public function all(): array;
    public function getUserDepartment(int $user_id): array;
}