@extends('layout.master')
@section('page-tab')
    Update Mode Of Payment
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
                <h1>Update Mode Of Payment</h1>
                <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active"><a> Update Mode Of Payment</a></li>
                </ol>
                </nav>
            </div>
            <br><br><br>
            <form action="{{ route('modeofpayment.update',$modeofpayment) }}" method="POST">        
                @csrf
                @method('PUT')
                    <div class="row justify-content-center">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <strong>Mode Of Payment Code</strong>
                                <input type="text" name="modeofpayment_code" id="modeofpayment_code" value="{{$modeofpayment->modeofpayment_code}}" class="form-control" placeholder="Mode Of Payment Code">
                            </div>
                            <div class="form-group">
                                <strong>Mode Of Payment<span style="color:#DC3545">*</span></strong>
                                <input type="text" name="modeofpayment" id="modeofpayment" class="form-control" value="{{$modeofpayment->modeofpayment}}" placeholder="Mode Of Payment" required>
                            </div>
                            <div class="form-group">
                                <strong>Details</strong>
                                <input type="text" name="detail" id="detail" value="{{$modeofpayment->detail}}" class="form-control" placeholder="Detail">
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" {{$modeofpayment->is_active ? 'checked' : '' }}>
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