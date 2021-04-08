<div>
    <x-jet-validation-errors />
    
    <form action="{{ route('expenses.store') }}" method="post">
        @csrf
        <div>
            <x-jet-label for="date" value="{{ __('Date') }}" />
            <x-jet-input id="date" class="block mt-1 w-full" type="date" name="date" :value="old('date')" value="{{now()->format('Y-m-d')}}" required autofocus />
        </div>
        <div class="mt-4">
            <div class="flex justify-between">
                <h1>Expenses</h1>
                <x-jet-button type="button" class="bg-blue-600 hover:bg-blue-900" wire:click="addExpense">Add Expense</x-jet-button>
            </div>
            @foreach($total_expenses as $index => $expense)
            <div class="flex mt-4 mx-2 justify-center items-end">
                <div class="w-2/5 mr-2">
                    <x-jet-label for="category{{$index}}" value="{{ __('Category') }}" />
                    <x-select id="category{{$index}}" wire:model="total_expenses.{{$index}}.category" class="block mt-1 w-full" type="text" name="expenses[{{$index}}][category]" :value="old('category')" required autofocus>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->expense_category_name }}</option>
                        @endforeach
                    </x-select>
                </div>
                <div class="w-2/5 ml-2">
                    <x-jet-label for="amount{{$index}}" value="{{ __('Amount') }}" />
                    <x-jet-input id="amount{{$index}}" wire:model.debounce.lazy="total_expenses.{{$index}}.amount" class="block mt-1 w-full" type="number" name="expenses[{{$index}}][amount]" :value="old('amount')" required />
                </div>
                <x-jet-button type="button" wire:click="removeExpense({{$index}})" class="cursor-pointer m-2 w-8 h-8 rounded-full bg-red-600 flex justify-center items-center text-white font-semibold text-xl duration-75 transform hover:scale-105 hover:bg-red-700"> &times; </x-jet-button>
            </div>
            @endforeach
        </div>
        <div class="mt-4 flex justify-between items-center">
            <p class="font-semibold">Total: {{ $total }}</p>
            <x-jet-button>Submit Form</x-jet-button>
        </div>
    </form>
</div>