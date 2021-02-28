<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ExpenseStatus extends Component
{
    public $color;
    public $status;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($status)
    {
        //
        $this->status = $status;
        switch($this->status){
            case 'APPROVED':
                $this->color = 'bg-green-100 text-green-800';
                break;
            case 'PENDING':
                $this->color = 'bg-yellow-100 text-yellow-800';
                break;
            case 'DECLINED':
                $this->color = 'bg-red-100 text-red-800';
                break;
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.expense-status');
    }
}
