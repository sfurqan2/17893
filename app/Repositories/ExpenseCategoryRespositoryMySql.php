<?php

namespace app\Repositories;

use App\Models\Expense;
use App\Models\ExpenseCategory;
use app\Intefaces\ExpenseCategoryRepositoryInterface;

class ExpenseCategoryRepositoryMySql implements ExpenseCategoryRepositoryInterface {

    public function all(): array
    {
        return ExpenseCategory::all()->toArray();
    }

    public function getExpenseCategory(int $expense_id): array
    {
        return Expense::find($expense_id)->ExpenseCategory->toArray();
    }
    
}