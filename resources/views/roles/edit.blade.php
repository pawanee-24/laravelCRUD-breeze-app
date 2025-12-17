<x-app-layout>
    {{-- Page title (browser tab) --}}
    <x-slot name="title">Edit Roles</x-slot>
    {{-- Page heading --}}
    <x-slot name="pageTitle">Edit Roles</x-slot>

    {{-- Breadcrumb --}}
    <x-slot name="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('dashboard') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('roles.index') }}">Roles</a>
        </li>
        <li class="breadcrumb-item active">Edit</li>
    </x-slot>


    {{-- Page content --}}
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Role Information</h6>
                    <a href="{{ route('roles.index') }}" class="btn btn-sm btn-danger p-2"><i class="fa fa-angle-left"></i>- Back</a>
                </div>

                <div class="card-body">

                    <form method="POST" action="{{ url('/roles/update', $roles->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">Role Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" value="{{ old('name', $roles->name) }}" class="form-control" id="name" placeholder="Enter Role Name">

                            @error('name')
                                <div class="d-flex align-items-center mt-2 text-danger">
                                    <i class="fas fa-exclamation-triangle me-2"></i>
                                    <span>{{ $message }}</span>
                                </div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="description" class="form-label">Description <span class="text-danger">*</span></label>
                            <textarea name="description" class="form-control" id="description" placeholder="Enter Description">{{ old('description', $roles->description) }}</textarea>

                            @error('description')
                                <div class="d-flex align-items-center mt-2 text-danger">
                                    <i class="fas fa-exclamation-triangle me-2"></i>
                                    <span>{{ $message }}</span>
                                </div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="permissions[]" class="form-label mb-3">Permissions <span class="text-danger">*</span></label>
                            <div class="row">
                                @foreach($permissions as $permission)
                                    <div class="col-md-3">
                                        <label>
                                            <input type="checkbox" name="permissions[]" value="{{ $permission->name }}" {{ $roles->hasPermissionTo($permission->name) ? 'checked' : '' }}> {{ $permission->name }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary mb-2">Update</button>
                        <button type="reset" class="btn btn-secondary mb-2">Cancel</button>

                    </form>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>

