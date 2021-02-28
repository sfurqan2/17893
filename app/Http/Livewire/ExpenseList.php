<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ExpenseList extends Component
{
    public $total_expenses;
    public $expense_count;
    public $categories;

    public function mount(){
        $this->total_expenses = [[]];
        $this->expense_count = 1;
    }

    public function addExpense(){
        $this->total_expenses[] = [];
        $this->expense_count++;
    }

    public function removeExpense($index){
        if($this->expense_count > 1){
            unset($this->total_expenses[$index]);
            $this->expense_count--;
        }
    }

    public function render()
    {
        return view('livewire.expense-list');
    }
}
