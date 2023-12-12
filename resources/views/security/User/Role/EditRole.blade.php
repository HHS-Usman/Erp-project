
<?php
use App\Helpers\MasterFormsHelper;
$master = new MasterFormsHelper();
?>
@extends('layouts.master')
@section('title', "SND || Update Designation")
@section('content')


<section id="multiple-column-form">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Update Role</h4>
                </div>
                <div class="card-body">
                    <form id="subm" method="POST" action="{{ route('role.update', $role->id) }}" class="form">
                        @csrf
                        @method('patch')
                        <div class="row">
                            <div class="col-md-3 col-12">
                                <div class="form-group">
                                    <label>Role Name <strong>*</strong></label>
                                    <input name="role_name" value="{{ $role->name }}" type="text" class="form-control" placeholder="Role Name"/>
                                </div>
                            </div>



                            <div class="col-md-12 form-check sperater2">
                                <strong>Permissions</strong>
                                <div class="row padl">
                                    @foreach ($master->getAllPermissionList() as $mainModule)
                                        {{-- @dd($mainModule); --}}
                                        <div class="col-md-12">
                                            <input class="form-check-input" type="checkbox"
                                                id="{{ $mainModule['main_module'] }}" onclick="checkboxChecked(this)">
                                            <strong>{{ $mainModule['main_module'] }}</strong>


                                        </div>
                                        @foreach ($mainModule['permissions'] as $id => $permission)
                                            {{-- @dd($id); --}}
                                            <div class="col-md-3">
                                                <div class="form-check padtbh">
                                                    <input class="form-check-input {{ $mainModule['main_module'] }}"
                                                        value="{{ $id }}" type="checkbox" {{($role->hasPermissionTo($id))? 'checked' : ''}}
                                                        id="permissions{{ $id }}" name="permissions[]">
                                                    <label class="form-check-label"
                                                        for="permissions{{ $id }}">{{ $permission }}</label>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endforeach
                                </div>
                            </div>

                            <div class="col-md-12 seprator">
                                <hr>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary mr-1">Update Item</button>
                                <button type="reset" class="btn btn-outline-secondary">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
                <!-- Basic Floating Label Form section end -->

@endsection

@section('script')

    <script>
        function checkboxChecked(id) {
            // alert(id.id);
            // $('#select-all').click(function(event) {
                if (id.checked) {
                    // Iterate each checkbox
                    $('.'+id.id).each(function() {
                        this.checked = true;
                    });
                } else {
                    $('.'+id.id).each(function() {
                        this.checked = false;
                    });
                }
            // });
        }


    </script>
@endsection
