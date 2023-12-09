@php
    use App\Helpers\MasterFormsHelper;
    $master = new MasterFormsHelper();
@endphp
@extends('layout.master')
@section('title', 'Manage Permissions')
@section('content')
    <section id="multiple-column-form">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">ADD PERMISSION</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('permission.store') }}" id="subm" class="form">
                            @csrf
                            <div class="form-group">
                                <label for="name">Main Module</label>
                                <select name="main_module[]" id="main_module" class="form-control">
                                    <option value="">Select</option>
                                    @foreach ($master->sidebarModules() as $module)
                                        <option value="{{ $module }}">{{ $module }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name[]">
                            </div>
                            <div id="addMoreFields">

                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="button" class="btn btn-secondary" id="addMore">Add More</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">PERMISSION LIST</h4>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Main Module</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permissions as $permission)
                                <tr>
                                    <td>{{ $permission->name }}</td>
                                    <td>{{ $permission->main_module }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!-- Basic Floating Label Form section end -->

@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#addMore').click(function() {
                $('#addMoreFields').append(`
                    <div class="form-group">
                        <label for="name">Main Module</label>
                        <select name="main_module[]" id="main_module" class="form-control">
                            <option value="">Select</option>
                            @foreach ($master->sidebarModules() as $module)
                                <option value="{{ $module }}">{{ $module }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="" name="name[]">
                    </div>
                `);
            });
        });
    </script>
@endsection
