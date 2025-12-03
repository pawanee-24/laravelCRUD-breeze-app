<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <a href="{{ route('users.create') }}" class="bg-green-400 p-3 rounded-md hover:bg-green-500 hover:text-white">+ Add New User</a>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
