<x-app-layout>
    {{-- Page title (browser tab) --}}
    <x-slot name="title">Brands Details</x-slot>
    {{-- Page heading --}}
    <x-slot name="pageTitle">Brands Details</x-slot>

    {{-- Breadcrumb --}}
    <x-slot name="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('dashboard') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('brands.index') }}">Brands</a>
        </li>
        <li class="breadcrumb-item active">Details</li>
    </x-slot>


    {{-- Page content --}}
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- Brands Details --}}
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Brands Information</h6>
                    <a href="{{ route('brands.edit', $brands->id) }}" class="btn btn-sm btn-warning p-2 text-dark">Edit Brand -<i class="fa fa-angle-right"></i></a>
                </div>

                <div class="card-body">

                    <div class="row mb-3">
                        <div class="col-md-3 font-weight-bold">ID:</div>
                        <div class="col-md-9">{{ $brands->id }}</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-3 font-weight-bold">Name:</div>
                        <div class="col-md-9"><span class="badge badge-dark p-2">{{ $brands->name }}</span></div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-3 font-weight-bold">Description:</div>
                        <div class="col-md-9">{{ $brands->description ?? 'N/A' }}</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-3 font-weight-bold">Created At:</div>
                        <div class="col-md-9">{{ $brands->formatDate('created_at') }}</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-3 font-weight-bold">Updated At:</div>
                        <div class="col-md-9">{{ $brands->humanDate('updated_at') }}</div>
                    </div>
                    
                </div>

            </div>

            {{-- Categories --}}
            <div class="card shadow mb-2">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Assigned Categories</h6>
                </div>

                <div class="card-body">
                    @if ($brands->category)
                        <div class="mb-3">
                            <div class="font-weight-bold mb-1">{{ $brands->category->name }}</div>
                            <div>[ {{ $brands->category->description }} ]</div>
                            <hr/>
                        </div>
                    @endif
                </div>

            </div>

            {{-- Back to list button --}}
            <div class="mt-3 d-flex justify-content-end">
                <a href="{{ route('brands.index') }}" class="btn btn-sm btn-secondary p-2">
                    <i class="fa fa-angle-left"></i>- Back to List
                </a>
            </div>

        </div>

    </div>


</x-app-layout>
