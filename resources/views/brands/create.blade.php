<x-app-layout>
    {{-- Page title (browser tab) --}}
    <x-slot name="title">Create Brands</x-slot>
    {{-- Page heading --}}
    <x-slot name="pageTitle">Create Brands</x-slot>

    {{-- Breadcrumb --}}
    <x-slot name="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('dashboard') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('brands.index') }}">Brands</a>
        </li>
        <li class="breadcrumb-item active">Create</li>
    </x-slot>


    {{-- Page content --}}
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Brands Information</h6>
                    <a href="{{ route('brands.index') }}" class="btn btn-sm btn-danger p-2"><i class="fa fa-angle-left"></i>- Back</a>
                </div>

                <div class="card-body">

                    <form method="POST" action="{{ route('brands.save')}}">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Brands Name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Enter Brands Name">

                            @error('name')
                                <div class="d-flex align-items-center mt-2 text-danger">
                                    <i class="fas fa-exclamation-triangle me-2"></i>
                                    <span>{{ $message }}</span>
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="category">Category Name</label>
                            <select id="category" name="category_id" class="form-control">
                                <option selected disabled>Select Category</option>

                                @foreach ($categories as $category )
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach

                            </select>

                            @error('category_id')
                                <div class="d-flex align-items-center mt-2 text-danger">
                                    <i class="fas fa-exclamation-triangle me-2"></i>
                                    <span>{{ $message }}</span>
                                </div>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label for="country" class="form-label">Country</label>
                            <input type="text" name="country" class="form-control" id="country" placeholder="Enter Country Name">

                            @error('country')
                                <div class="d-flex align-items-center mt-2 text-danger">
                                    <i class="fas fa-exclamation-triangle me-2"></i>
                                    <span>{{ $message }}</span>
                                </div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" name="description" id="description" placeholder="Enter Description"></textarea>

                            @error('description')
                                <div class="d-flex align-items-center mt-2 text-danger">
                                    <i class="fas fa-exclamation-triangle me-2"></i>
                                    <span>{{ $message }}</span>
                                </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary mb-2">Submit</button>

                    </form>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>
