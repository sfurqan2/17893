<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\ExpenseItem;
use Illuminate\Http\Request;
use App\Models\ExpenseCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ExpenseController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $expenses = Auth::user()->expenses;
        return view('expenses.expenses', compact(['expenses']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = ExpenseCategory::all();
        return view('expenses.new_expense_form', compact(['categories']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        Validator::make($request->all(), [
            'date' => ['required', 'date'],
            'expenses' => ['required', 'array', 'min:1'],
            'expenses.*.*' => ['required', 'numeric'],
        ])->validate();

        DB::transaction(function () use ($request) {
            $totalAmount = 0;
            foreach ($request->expenses as $expense) {
                $totalAmount += $expense['amount'];
            }

            $expense_id = Expense::create([
                'user_id' => auth()->user()->id,
                'total_amount' => $totalAmount,
                'date' => $request->date,
            ])->id;

            foreach ($request->expenses as $expense) {
                ExpenseItem::create([
                    'expense_id' => $expense_id,
                    'expense_category_id' => $expense['category'],
                    'amount' => $expense['amount'],
                ]);
            }
        });

        return redirect()->route('expenses.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function show(Expense $expense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function edit(Expense $expense)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expense $expense)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expense $expense)
    {
        //
    }
}
