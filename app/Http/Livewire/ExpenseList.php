<?php

namespace App\Http\Livewire;

use App\Models\ExpenseCategory;
use Livewire\Component;

class ExpenseList extends Component
{
    public $total_expenses;
    public $expense_count;
    public $categories;
    public $total;

    public function mount()
    {
        $this->total_expenses = [['category' => 1, 'amount' => 0]];
        $this->expense_count = 1;
        $this->total = 0;
        $this->categories = ExpenseCategory::all();
    }

    public function updatedTotalExpenses()
    {
        $this->total = 0;
        foreach ($this->total_expenses as $expense) {
            $this->total += $expense['amount'];
        }
    }

    public function addExpense()
    {
        $this->total_expenses[] = ['category' => 1, 'amount' => 0];
        $this->expense_count++;
    }

    public function removeExpense($index)
    {
        if ($this->expense_count > 1) {
            unset($this->total_expenses[$index]);
            $this->expense_count--;
        }
    }

    public function render()
    {
        return view('livewire.expense-list');
    }
}
