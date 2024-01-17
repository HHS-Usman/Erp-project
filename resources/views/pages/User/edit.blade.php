@php
    use App\Helpers\MasterFormsHelper;
    $master = new MasterFormsHelper();
    $distributors = $master->get_users_distributors($user->id)->toArray();

@endphp
@extends('layout.master')
@section('title', 'Edit User')
@section('content')
    <section id="multiple-column-form">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Users </h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('users.update', $user->id) }}" id="subm" class="form">
                            @method('PUT')
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name" class="form-control"
                                            value="{{ $user->name }}" placeholder="Enter Full Name" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Select Type</label>
                                        <select name="user_type" id="user_type" class="form-control">
                                            @foreach (MasterFormsHelper::userType() as $key => $userType)
                                                <option value="{{ $userType->id }}"
                                                    {{ $userType->id == $user->user_type ? 'selected' : '' }}>
                                                    {{ $userType->type }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control"
                                            value="{{ $user->email }}" placeholder="Enter Email" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password" class="form-control"
                                            placeholder="*********" />
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Role</label>
                                       <select class="form-control" name="role" id="role">
                                        <option value="">select</option>
                                        @foreach ( $master->get_all_role() as $key =>$row )
                                        <option @if($role == $row->id) selected @endif  value="{{ $row->id }}">{{ $row->name }}</option>
                                        @endforeach
                                       </select>
                                    </div>
                                </div>


                                <div style="display: none" class="col-md-12 form-check sperater2">
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
                                                            value="{{ $id }}" type="checkbox" {{($user->hasPermissionTo($id))? 'checked' : ''}}
                                                            id="permissions{{ $id }}" name="permissions[]">
                                                        <label class="form-check-label"
                                                            for="permissions{{ $id }}">{{ $permission }}</label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endforeach
                                    </div>
                                </div>
                                <hr>

                                <div class="col-md-12 sperater">
                                    <strong>Distributor</strong>
                                    <div class="row">
                                        @foreach ($master->get_all_distributors() as $key => $row)
                                            <div class="col-md-3 form-check padtbh">
                                                <input @if (in_array($row->id, $distributors)) checked @endif
                                                    class="form-check-input" value="{{ $row->id }}" type="checkbox"
                                                    id="distributor{{ $row->id }}" name="distributor[]">
                                                <label class="form-check-label"
                                                    for="distributor{{ $row->id }}">{{ $row->distributor_name }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>


                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary mr-1">Update User</button>
                                    <button type="reset" class="btn btn-outline-secondary">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
