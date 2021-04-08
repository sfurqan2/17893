<div>
    <div class="mb-4 rounded-md overflow-hidden">
        @if (session()->has('good'))
            <div class="px-2 py-4 bg-green-600 text-white font-semibold">
                {{ session('good') }}
            </div>
        @elseif(session()->has('bad'))
            <div class="px-2 py-4 bg-red-400 text-white font-semibold">
                {{ session('bad') }}
            </div>
        @endif
    </div>
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full px-2 sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr class="">
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Employee Name</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Designation</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Expense Category</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Amount</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Updated at</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($expenses as $expense)
                                @foreach($expense['expense_items'] as $item)
                                    @if($loop->first)
                                        <tr>
                                            <td rowspan="{{ $loop->count }}" class="px-6 py-4 whitespace-nowrap text-xs sm:text-sm">{{ $expense['date'] }}</td>
                                            <td rowspan="{{ $loop->count }}" class="px-6 py-4 whitespace-nowrap text-xs sm:text-sm">{{ $expense['user']['name'] }}</td>
                                            <td rowspan="{{ $loop->count }}" class="px-6 py-4 whitespace-nowrap text-xs sm:text-sm">{{ $expense['user']['designation']['designation_name'] }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-xs sm:text-sm">{{ $item['expense_category']['expense_category_name'] }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-xs sm:text-sm">{{ $item['amount'] }}</td>
                                            <td rowspan="{{ $loop->count }}" class="px-6 py-4 whitespace-nowrap text-xs sm:text-sm">{{ $expense['updated_at'] }}</td>
                                            <td rowspan="{{ $loop->count }}" class="px-6 py-4 whitespace-nowrap text-xs">
                                                <x-jet-button wire:click="decline({{$expense['id']}})" class="bg-red-500 hover:bg-red-700">Decline</x-jet-button>
                                                <x-jet-button wire:click="approve({{$expense['id']}})" class="ml-5 bg-green-500 hover:bg-green-700">Approve</x-jet-button>
                                            </td>
                                        </tr>
                                        @continue
                                    @endif
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-xs sm:text-sm">{{ $item['expense_category']['expense_category_name'] }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-xs sm:text-sm">{{ $item['amount'] }}</td>
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>