<?php

namespace app\Intefaces;

interface ExpenseCategoryRepositoryInterface {
    public function all(): array;
    public function getExpenseCategory(int $expense_id): array;
}