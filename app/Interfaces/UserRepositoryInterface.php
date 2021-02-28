<?php

namespace app\Intefaces;

interface UserRepositoryInterface {
    public function all(): array;
    public function getAllUsersInDepartment(String $department): array;
}