<?php

namespace app\Intefaces;

interface ExpenseRepositoryInterface {
    public function all(): array;
    public function getUserExpense(int $user_id): array;
}