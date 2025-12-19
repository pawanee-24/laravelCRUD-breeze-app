<x-app-layout>
    {{-- Page title (browser tab) --}}
    <x-slot name="title">Permissions Details</x-slot>
    {{-- Page heading --}}
    <x-slot name="pageTitle">Permissions Details</x-slot>

    {{-- Breadcrumb --}}
    <x-slot name="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('dashboard') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('permissions.index') }}">Permissions</a>
        </li>
        <li class="breadcrumb-item active">Details</li>
    </x-slot>


    {{-- Page content --}}
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- Role Details --}}
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Permissions Information</h6>
                    <a href="{{ route('permissions.edit', $permissions->id) }}" class="btn btn-sm btn-warning p-2 text-dark">Edit Permission -<i class="fa fa-angle-right"></i></a>
                </div>

                <div class="card-body">

                    <div class="row mb-3">
                        <div class="col-md-3 font-weight-bold">ID:</div>
                        <div class="col-md-9">{{ $permissions->id }}</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-3 font-weight-bold">Name:</div>
                        <div class="col-md-9"><span class="badge badge-dark p-2">{{ $permissions->name }}</span></div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-3 font-weight-bold">Description:</div>
                        <div class="col-md-9">{{ $permissions->description ?? 'N/A' }}</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-3 font-weight-bold">Created At:</div>
                        <div class="col-md-9">{{ $permissions->created_at->format('Y-m-d H:i') }}</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-3 font-weight-bold">Updated At:</div>
                        <div class="col-md-9">{{ $permissions->updated_at->format('Y-m-d H:i') }}</div>
                    </div>
                </div>

            </div>

            {{-- Roles --}}
            <div class="card shadow mb-2">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Assigned Role</h6>
                </div>

                <div class="card-body">

                    @if($permissions->roles->count())
                        @foreach($permissions->roles as $role)
                            <div class="mb-3">
                                <div class="font-weight-bold">{{ $role->name }}</div>
                                <div>[ {{ $role->description }} ]</div>
                                <hr/>
                            </div>
                        @endforeach
                    @else
                        <span class="text-danger">No role assigned</span>
                    @endif
                </div>

            </div>

            {{-- Back to list button --}}
            <div class="mt-3 d-flex justify-content-end">
                <a href="{{ route('permissions.index') }}" class="btn btn-sm btn-secondary p-2">
                    <i class="fa fa-angle-left"></i>- Back to List
                </a>
            </div>

        </div>

    </div>


</x-app-layout>
