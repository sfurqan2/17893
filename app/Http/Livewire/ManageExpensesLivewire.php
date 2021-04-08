<?php

namespace App\Http\Livewire;

use App\Models\Budget;
use App\Models\Expense;
use Livewire\Component;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class ManageExpensesLivewire extends Component
{
    public $expenses;

    public function mount()
    {
        $department = Auth::user()->department;
        $this->expenses = $department->users->reject(function ($user) {
            return $user->expenses->isEmpty();
        })->map(function ($user) {
            return $user->expenses()->where('status', 'pending')->get();
        })->flatten()->keyBy('id');
        $this->expenses = $this->expenses->toArray();
    }

    public function approve(Expense $expense)
    {   
        $user = $expense->user;
        $date = Carbon::parse($expense->date);
        $budget = Budget::where('year', $date->year)->where('designation_id', $user->designation_id)->value('budget_per_month');
        $total_expenses = Expense::where('user_id', $user->id)->whereRaw('monthname(`created_at`) = ?', [$date->monthName])->where('status', 'APPROVED')->sum('total_amount');
        if (!isset($budget)){
            session()->flash('bad', 'Budget has not been set!');
            return;
        } 
        if ($total_expenses + $expense->total_amount <= $budget) {
            $expense->status = "APPROVED";
            $expense->save();
            unset($this->expenses[$expense->id]);
            session()->flash('good', 'Expense has been approved!');
        } else {
            $expense->status = "DECLINED";
            $expense->save();
            unset($this->expenses[$expense->id]);
        }
    }


    public function decline(Expense $expense)
    {
        $expense->status = "DECLINED";
        $expense->save();
        unset($this->expenses[$expense->id]);
        session()->flash('bad', 'Expense has been declined!');
    }

    public function render()
    {
        return view('livewire.manage-expenses-livewire');
    }
}
