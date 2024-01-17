@php
use App\Helpers\MasterFormsHelper;
$master = new MasterFormsHelper();
@endphp
@extends('layout.master')
@section('page-tab')
Create Permission
@endsection
@section('content')

<section id="multiple-column-form">
    @if(session('success'))
    <script>
        window.onload = function() {
                    alert("{{ session('success') }}");
                }
    </script>
    @endif
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="pagetitle" style="margin-left: 20px;">
                    <h1>Create Permission</h1>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active"><a> Create Permission</a></li>
                        </ol>
                    </nav>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('permission.store') }}" id="subm" class="form">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name[]">
                        </div>
                        <div class="form-group">
                            <label for="module_id">Main Module</label>
                            <select name="module_id[]" id="module_id" class="form-control">
                                <option value="">Select</option>
                                @foreach ($modules as $module)
                                <option value="{{ $module->id }}">{{ $module->module_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="page_id">Page</label>
                            <select name="page_id[]" id="page_id" class="form-control">
                                <option value="">Select</option>
                                @foreach ($pages as $page)
                                <option value="{{ $page->id }}">{{ $page->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="page_action_id">Page Action</label>
                            <select name="page_action_id[]" id="page_action_id" class="form-control">
                                <option value="">Select</option>
                                @foreach ($pageactions as $pageaction)
                                <option value="{{ $pageaction->id }}">{{ $pageaction->Name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div id="addMoreFields"></div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="button" class="btn btn-secondary" id="addMore">Add More</button>
                    </form>

                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title">Permission List</h1>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Main Module</th>
                            <th>Page Name</th>
                            <th>Page Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permissions as $permission)
                        <tr>
                            <td>{{ $permission->name }}</td>
                            <td>{{ $permission->module->module_name }}</td>

                            <td>

                                {{ $permission->page->name }}

                            </td>

                            <td>

                                {{ $permission->pageaction->Name }}

                            </td>
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
                        <select name="main_module" id="main_module" class="form-control">
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