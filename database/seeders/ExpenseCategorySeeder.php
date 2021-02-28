<?php

namespace Database\Seeders;

use App\Models\ExpenseCategory;
use Illuminate\Database\Seeder;

class ExpenseCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Hotel stay, transport, meal, and airfare
        ExpenseCategory::insert([
            'expense_category_name' => 'Hotel stay',
        ]);

        ExpenseCategory::insert([
            'expense_category_name' => 'Transport',
        ]);

        ExpenseCategory::insert([
            'expense_category_name' => 'Meal',
        ]);

        ExpenseCategory::insert([
            'expense_category_name' => 'Airfare',
        ]);
    }
}
