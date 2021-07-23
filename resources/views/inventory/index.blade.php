<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Inventory') }}
        </h2>
    </x-slot>

    <div class="py-12 px-6 max-w-7xl m-auto">
        <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-3">
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                    </svg>
                </div>
                <div class="w-full">
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                        Total Quantity
                    </p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                        {{ $totalCount }}
                        <a class="text-purple-600 text-xs float-right" href="{{ route('inventory', ['low-stock' => 1]) }}">Low Stock Only</a>
                    </p>

                </div>
            </div>
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-Linecap="round" stroke-Linejoin="round" stroke-Width={2} d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                    </svg>
                </div>
                <div class="relative w-full focus-within:text-purple-500">
                    <div class="relative">
                        <div class="absolute inset-y-0 flex items-center pl-2">
                            <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <form action="{{ route('inventory') }}" method="get">
                            <input class="w-full pl-8 pr-2 text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-white focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input" type="text" placeholder="Filter by Sku or Product Name" aria-label="Search" name="query">

                        </form>
                    </div>

                    @if($hasFilters)
                        <p class="float-right pt-2 text-xs"><a href="{{ route('inventory') }}">X Clear</a></p>
                    @endif
                </div>
            </div>
        </div>

        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                    <tr
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                    >
                        <th class="px-4 py-3">Product Name</th>
                        <th class="px-4 py-3">Sku</th>
                        <th class="px-4 py-3">Quantity</th>
                        <th class="px-4 py-3">Color</th>
                        <th class="px-4 py-3">Size</th>
                        <th class="px-4 py-3">Price</th>
                        <th class="px-4 py-3">Cost</th>
                    </tr>
                    </thead>
                    <tbody
                        class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
                    >
                    @foreach($inventory as $sku)
                        <tr class="text-gray-700 dark:text-gray-400 hover:bg-purple-100">
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <a class="font-semibold" href="{{ route('inventory.show', ['sku' => $sku->id]) }}">{{ $sku->product->product_name }}</a>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $sku->sku }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $sku->quantity }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $sku->color }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $sku->size }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                ${{ $sku->price_dollars }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                ${{ $sku->cost_dollars }}
                            </td>
                        </tr>

                    @endforeach

                    </tbody>
                </table>
                <div class="py-6">
                    {{ $inventory->links('vendor.pagination.tailwind') }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
