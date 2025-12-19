<x-app-layout>
    {{-- Page title (browser tab) --}}
    <x-slot name="title">Role Management</x-slot>
    {{-- Page heading --}}
    <x-slot name="pageTitle">Role Management</x-slot>

    {{-- Breadcrumb --}}
    <x-slot name="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('dashboard') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Roles</li>
    </x-slot>


    {{-- Page content --}}
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Role List</h6>
                    <a href="{{ route('roles.create') }}" class="btn btn-sm btn-primary p-2">+ Add New Role</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Users Count</th>
                                    <th>Permissions Count</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>

                                @forelse ($roles as $role)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>{{ $role->description }}</td>
                                        <td><span class="badge badge-dark">{{ $role->users_count }}</span></td>
                                        <td><span class="badge badge-success">{{ $role->permissions_count }}</span></td>
                                        <td>{{ $role->created_at }}</td>

                                        <td>
                                            <a href="{{ url('/roles/details/' . $role->id ) }}" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                                            <a href="{{ url('/roles/edit/' . $role->id ) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="commonDeleteFunction('{{ url('/roles/delete/' . $role->id) }}', '{{ $role->name }}', this)">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-danger">No Roles</td>
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
