<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Product Category') }}
        </h2>
    </x-slot>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Create Category</h6>
                    <a href="{{ route('categories.index') }}" class="btn btn-sm btn-danger p-2"><i class="fa fa-angle-left"></i>- Back</a>
                </div>

                <div class="card-body">

                    <form method="POST" action="{{ route('categories.save')}}">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Category Name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Enter Category Name">

                            @error('name')
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
