<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Expense Form') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5 w-96 sm:w-2/3 m-auto">
                @livewire("expense-list", [ 'categories' => $categories ])
            </div>
        </div>
    </div>
</x-app-layout>