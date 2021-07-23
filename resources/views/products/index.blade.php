<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12 px-6 max-w-7xl m-auto">

        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                    <tr
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                    >
                        <th class="px-4 py-3">Name</th>
                        <th class="px-4 py-3">Style</th>
                        <th class="px-4 py-3">Brand</th>
                        <th class="px-4 py-3">Available Sku's</th>
                    </tr>
                    </thead>
                    <tbody
                        class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
                    >
                    @foreach($products as $product)

                        <tr class="text-gray-700 dark:text-gray-400 hover:bg-gray-200">
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <a class="font-semibold" href="{{ route('products.show', ['product' => $product->id]) }}">{{ $product->product_name }}</a>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $product->style }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $product->brand }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $product->availableSkus->implode('sku', ', ') }}
                            </td>
                        </tr>

                    @endforeach

                    </tbody>
                </table>
                <div class="py-6">
                    {{ $products->links('vendor.pagination.tailwind') }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
