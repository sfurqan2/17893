<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Budget Form') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5 w-96 sm:w-2/3 m-auto">
            <x-jet-validation-errors />
    
            <form action="{{ route('budgets.store') }}" method="post">
                @csrf
                <div>
                    <x-jet-label for="year" value="{{ __('Date') }}" />
                    <x-jet-input id="year" class="block mt-1 w-full" type="text" name="year" :value="old('year')" value="{{ now()->year }}" required autofocus />
                </div>
                <div class="mt-4">
                    <x-jet-label for="budget" value="{{ __('Budget') }}" />
                    <x-jet-input id="budget" class="block mt-1 w-full" type="number" name="budget" :value="old('budget')" required />
                </div>
                <div class="mt-4">
                    <x-jet-label for="designation" value="{{ __('Designation') }}" />
                    <x-select id="designation" class="block mt-1 w-full" type="text" name="designation" :value="old('designation')" required>
                        @foreach($designations as $designation)
                        <option value="{{ $designation->id }}">{{ $designation->designation_name }}</option>
                        @endforeach
                    </x-select>
                </div>
                <div class="mt-4 flex justify-end">
                    <x-jet-button>Submit Form</x-jet-button>
                </div>
            </form>
    </div>
</x-app-layout>