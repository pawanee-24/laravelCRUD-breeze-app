<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>
    {{-- Page title (browser tab) --}}
    <x-slot name="title">Categories</x-slot>
    {{-- Page heading --}}
    <x-slot name="pageTitle">Categories</x-slot>

    {{-- Breadcrumb --}}
    <x-slot name="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('dashboard') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Categories</li>
    </x-slot>


    {{-- Page content --}}
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- @if (session('msg'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('msg')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif --}}


            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Category Information</h6>
                    <a href="{{ route('categories.create') }}" class="btn btn-sm btn-primary p-2">+ Add New</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>

                                @forelse ($categories as $category)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->description }}</td>
                                        <td>
                                            <a href="{{ url('/categories/details/' . $category->id ) }}" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                                            <a href="{{ url('/categories/edit/' . $category->id) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>

                                            <button type="submit" class="btn btn-sm btn-danger" onclick="commonDeleteFunction('{{ url('/categories/delete/' . $category->id) }}', '{{ $category->name }}', this)">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-danger">NO Categories</td>
                                    </tr>
                                @endforelse


                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

        </div>
    </div>

@push('scripts')
<script>
    $(document).ready(function() {
        @if(session('msg'))
            commonAlert('success', "{{ session('msg') }}");
        @endif
    });
</script>
@endpush

</x-app-layout>
