<x-app-layout>
    {{-- Page title (browser tab) --}}
    <x-slot name="title">Categories Details</x-slot>
    {{-- Page heading --}}
    <x-slot name="pageTitle">Categories Details</x-slot>

    {{-- Breadcrumb --}}
    <x-slot name="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('dashboard') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('categories.index') }}">Categories</a>
        </li>
        <li class="breadcrumb-item active">Details</li>
    </x-slot>


    {{-- Page content --}}
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- Role Details --}}
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Category Information</h6>
                    <a href="{{ route('categories.edit', $categories->id) }}" class="btn btn-sm btn-warning p-2 text-dark">Edit Category -<i class="fa fa-angle-right"></i></a>
                </div>

                <div class="card-body">

                    <div class="row mb-3">
                        <div class="col-md-3 font-weight-bold">ID:</div>
                        <div class="col-md-9">{{ $categories->id }}</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-3 font-weight-bold">Name:</div>
                        <div class="col-md-9"><span class="badge badge-dark p-2">{{ $categories->name }}</span></div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-3 font-weight-bold">Created At:</div>
                        <div class="col-md-9">{{ $categories->formatDate('created_at') }}</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-3 font-weight-bold">Updated At:</div>
                        <div class="col-md-9">{{ $categories->humanDate('updated_at') }}</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-3 font-weight-bold">Description:</div>
                        <div class="col-md-9">{{ $categories->description }}</div>
                    </div>

                </div>

            </div>


            {{-- Back to list button --}}
            <div class="mt-3 d-flex justify-content-end">
                <a href="{{ route('categories.index') }}" class="btn btn-sm btn-secondary p-2">
                    <i class="fa fa-angle-left"></i>- Back to List
                </a>
            </div>

        </div>

    </div>


</x-app-layout>
