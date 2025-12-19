<x-app-layout>
    {{-- Page title (browser tab) --}}
    <x-slot name="title">Edit Permissions</x-slot>
    {{-- Page heading --}}
    <x-slot name="pageTitle">Edit Permissions</x-slot>

    {{-- Breadcrumb --}}
    <x-slot name="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('dashboard') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('permissions.index') }}">Permissions</a>
        </li>
        <li class="breadcrumb-item active">Edit</li>
    </x-slot>


    {{-- Page content --}}
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="row g-4">
                {{-- LEFT SIDE: GUIDELINES --}}
                <div class="col-md-4">
                    <div class="card shadow h-100 border-left-info">
                        <div class="card-header py-4">
                            <h6 class="m-0 font-weight-bold text-info">
                                Permission Naming Guidelines
                            </h6>
                        </div>

                        <div class="card-body small">

                            <p><strong>Format:</strong></p>
                            <code class="d-block mb-3">action.module</code>

                            <ul class="list-unstyled mb-3">
                                <li><strong>view</strong> - View data</li>
                                <li><strong>create</strong> - Create records</li>
                                <li><strong>update</strong> - Update records</li>
                                <li><strong>delete</strong> - Delete records</li>
                                <li><strong>manage</strong> - Special actions</li>
                                <li><strong>export</strong> - Export data</li>
                            </ul>

                            <hr>

                            <p><strong>Examples:</strong></p>
                            <ul class="list-unstyled">
                                <li><code>view.dashboard</code></li>
                                <li><code>view.users</code></li>
                                <li><code>create.products</code></li>
                                <li><code>update.products</code></li>
                                <li><code>delete.categories</code></li>
                                <li><code>manage.user.status</code></li>
                                <li><code>export.reports</code></li>
                            </ul>

                            <hr>

                            <p class="text-muted">
                                ⚠ Use <strong>lowercase</strong>, no spaces, and separate words using dots (<strong>.</strong>)
                            </p>

                        </div>
                    </div>
                </div>

                {{-- RIGHT SIDE: FORM --}}
                <div class="col-md-8">
                    <div class="card shadow h-100">
                        <div class="card-header py-3 d-flex justify-content-between align-items-center">
                            <h6 class="m-0 font-weight-bold text-primary">Permissions Information</h6>
                            <a href="{{ route('permissions.index') }}" class="btn btn-sm btn-danger p-2"><i class="fa fa-angle-left"></i>- Back</a>
                        </div>

                        <div class="card-body">

                            <form method="POST" action="{{ url('/permissions/update', $permissions->id) }}">
                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <label for="name" class="form-label">Permission Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" value="{{ old('name', $permissions->name) }}" class="form-control" id="name" placeholder="Enter Permission Name">

                                    <div class="alert alert-info py-3 mt-3 mb-2">
                                        <i class="fas fa-exclamation-triangle me-1"></i>
                                        Use <strong>lowercase</strong>, no spaces, and separate words using dots (<strong>.</strong>)
                                    </div>

                                    @error('name')
                                        <div class="d-flex align-items-center mt-2 text-danger">
                                            <i class="fas fa-exclamation-triangle me-2"></i>
                                            <span>{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="description" class="form-label">Description <span class="text-danger">*</span></label>
                                    <textarea name="description" class="form-control" id="description" placeholder="Enter Description">{{ old('description', $permissions->description) }}</textarea>

                                    @error('description')
                                        <div class="d-flex align-items-center mt-2 text-danger">
                                            <i class="fas fa-exclamation-triangle me-2"></i>
                                            <span>{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-5">
                                    <label for="roles[]" class="form-label mb-3">Roles<span class="text-danger">*</span></label>
                                    <div class="row">
                                        @foreach($roles as $role)
                                            <div class="col-md-3 mb-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="roles[]" value="{{ $role->name }}" id="role_{{ $role->id }}" {{ $permissions->hasRole($role->name) ? 'checked' : '' }}>

                                                    <label class="form-check-label" for="role_{{ $role->id }}">
                                                        <strong>{{ $role->name }}</strong>
                                                        <div class="text-muted small">
                                                            {{ $role->description }}
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                    @error('roles')
                                        <div class="d-flex align-items-center mt-2 text-danger">
                                            <i class="fas fa-exclamation-triangle me-2"></i>
                                            <span>{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary mb-2">Update</button>
                                <button type="reset" class="btn btn-secondary mb-2">Cancel</button>

                            </form>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>

