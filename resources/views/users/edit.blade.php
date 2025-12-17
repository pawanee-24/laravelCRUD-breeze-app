<x-app-layout>
    {{-- Page title (browser tab) --}}
    <x-slot name="title">Edit Users</x-slot>
    {{-- Page heading --}}
    <x-slot name="pageTitle">Edit Users</x-slot>

    {{-- Breadcrumb --}}
    <x-slot name="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('dashboard') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('users.index') }}">Users</a>
        </li>
        <li class="breadcrumb-item active">Edit</li>
    </x-slot>


    {{-- Page content --}}
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">User Information</h6>
                    <a href="{{ route('users.index') }}" class="btn btn-sm btn-danger p-2"><i class="fa fa-angle-left"></i>- Back</a>
                </div>

                <div class="card-body">

                    <form method="POST" action="{{ route('users.update', $users->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">Full Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" value="{{ old('name', $users->name) }}" class="form-control" id="name" placeholder="Enter Your Name">

                            @error('name')
                                <div class="d-flex align-items-center mt-2 text-danger">
                                    <i class="fas fa-exclamation-triangle me-2"></i>
                                    <span>{{ $message }}</span>
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="emailaddress" class="form-label">Email address <span class="text-danger">*</span></label>
                            <input type="email" name="email" value="{{ old('email', $users->email) }}" class="form-control" id="emailaddress" placeholder="Enter Your Email">

                            @error('email')
                                <div class="d-flex align-items-center mt-2 text-danger">
                                    <i class="fas fa-exclamation-triangle me-2"></i>
                                    <span>{{ $message }}</span>
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password <span class="text-danger">(leave blank to keep current)</span></label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Password">

                            @error('password')
                                <div class="d-flex align-items-center mt-2 text-danger">
                                    <i class="fas fa-exclamation-triangle me-2"></i>
                                    <span>{{ $message }}</span>
                                </div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="confirmpassword" class="form-label">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control" id="confirmpassword" placeholder="Confirm Password">


                            @error('confirmpassword')
                                <div class="d-flex align-items-center mt-2 text-danger">
                                    <i class="fas fa-exclamation-triangle me-2"></i>
                                    <span>{{ $message }}</span>
                                </div>
                            @enderror
                        </div>

                        <div class="mb-5">
                            <label for="roles[]" class="form-label text-dark mb-3">Assign User Role <span class="text-danger">*</span></label>
                            <div class="row">
                                @foreach($roles as $role)
                                    <div class="col-md-3">
                                        <label>
                                            <input type="checkbox" name="roles[]" value="{{ $role->name }}" {{ $users->hasRole($role->name) ? 'checked' : '' }}> {{ $role->name }}
                                        </label>
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
</x-app-layout>
