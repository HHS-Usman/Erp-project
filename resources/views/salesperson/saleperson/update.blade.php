@extends('layout.master')
@section('page-tab')
    update Sale Person Type
@endsection
@section('content')

    <section id="main" class="main" style="padding-top: 0vh;">

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="pagetitle" style="margin-left: 20px;">
            <h1>update Sales Person Type</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active"><a> update </a></li>
                </ol>
            </nav>
        </div>
        <br><br><br>
        <form action="{{ route('salepersontype.update', $persontype) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row justify-content-center">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Person Type Code</strong>
                        <input type="text" name="persontype_code" id="persontype_code" class="form-control"
                            value="{{ $persontype->persontype_code }}" placeholder="Sale Person Type Code">
                    </div>
                    <div class="form-group">
                        <strong>Person Type<span style="color:#DC3545">*</span></strong>
                        <input type="text" name="persontype" value="{{ $persontype->persontype }}" id="persontype"
                            class="form-control" placeholder="Person Type" required>
                    </div>
                    <div class="form-group">
                        <strong>Details</strong>
                        <input type="type" name="detail" value="{{ $persontype->detail }}" id="detail"
                            class="form-control" placeholder="Detail">
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active"
                            {{ $persontype->is_active ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_active">
                            Active
                        </label>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
        </div>
        <br><br><br>
        <br>
        <br>
        <div><br> </div>

    </section>

@endsection
