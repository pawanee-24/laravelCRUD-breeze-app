<x-app-layout>
    {{-- Page title (browser tab) --}}
    <x-slot name="title">Brands</x-slot>
    {{-- Page heading --}}
    <x-slot name="pageTitle">Brands</x-slot>

    {{-- Breadcrumb --}}
    <x-slot name="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('dashboard') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Brands</li>
    </x-slot>


    {{-- Page content --}}
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Brands Information</h6>
                    <a href="{{ route('brands.create') }}" class="btn btn-sm btn-primary p-2">+ Add New</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Country</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>

                                @forelse ($brands as $brand)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $brand->name ?? 'N/A' }}</td>
                                        <td>{{ $brand->category->name ?? 'N/A' }}</td>
                                        <td>{{ $brand->country ?? 'N/A' }}</td>
                                        <td>{{ $brand->description ?? 'N/A' }}</td>
                                        <td>
                                            <a href="{{ url('/brands/details/' . $brand->id ) }}" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                                            <a href="{{ url('/brands/edit/' . $brand->id) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>

                                            <button type="submit" class="btn btn-sm btn-danger" onclick="commonDeleteFunction('{{ url('/brands/delete/' . $brand->id) }}', '{{ $brand->name }}', this)">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-danger">NO brands</td>
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
