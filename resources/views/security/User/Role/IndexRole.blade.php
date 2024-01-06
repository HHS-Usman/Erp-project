@extends('layout.master')
@section('title', 'Roles')
@section('content')


<form id="list_data" method="get" action="{{ route('role.index') }}"></form>
<div class="row" id="table-bordered">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Role List</h4>
                {{-- @can('Role_create') --}}
                <a href="{{ route('role.create') }}" class="btn btn-success mr-1">Create</a>
                {{-- @endcan --}}
            </div>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Sr No</th>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="data">
                        @foreach ($roles as $key => $row)
                        <tr class="text-center">
                            <td>{{ ++$key }}</td>
                            <td>{{ $row->name }}</td>
                            <td>
                                <div>
                                    {{-- @can('Role_Edit') --}}
                                    <a href="{{ route('role.edit', $row->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    {{-- @endcan --}}
                                    {{-- s<button type="button" id="delete-user"
                                        data-url="{{ route('designation.destroy', $row->id) }}"
                                        class="btn btn-danger btn-sm">Delete</button> --}}
                                </div>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Basic Floating Label Form section end -->



@endsection
@section('script')
<script>
    $(document).ready(function() {
            get_ajax_data();
        });
</script>
@endsection
