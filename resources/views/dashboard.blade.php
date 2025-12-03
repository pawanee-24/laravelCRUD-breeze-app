<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex gap-3">
            <div class="bg-green-200 overflow-hidden shadow-sm sm:rounded-lg w-full">
                <div class="p-6 text-gray-900">
                    {{ __("Admin Seller Buyer") }}
                </div>
            </div>

            <div class="bg-blue-200 overflow-hidden shadow-sm sm:rounded-lg w-full">
                <div class="p-6 text-gray-900">
                    {{ __("Admin Seller") }}
                </div>
            </div>

            <div class="bg-red-200 overflow-hidden shadow-sm sm:rounded-lg w-full">
                <div class="p-6 text-gray-900">
                    {{ __("Admin") }}
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
