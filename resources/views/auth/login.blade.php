@extends('layouts.app')
<?php
use App\Helpers\CommonHelper;
?>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="row mb-3">
                            <label for="yourUsername" class="col-md-4 form-label">Branch</label>
                            <div class="col-md-6">
                            <select class="form-control"  name="branch_id" id="branch_id" required>
                               
                            </select>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label for="yourUsername" class="col-md-4 form-label">Company</label>
                            <div class="col-md-6">
                            <select class="form-control"  name="company_id" id="company_id" required>
                                <option value="">Select Company</option>
                                @foreach(CommonHelper::getCompany() as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById('company_id').addEventListener('change', function () {
        // Fetch branches based on the selected company using AJAX
        var companyId = this.value;
        fetchBranches(companyId);
    });

    function fetchBranches(companyId) {
        // Make an AJAX request to get branches for the selected company
        fetch(`/api/branches?company_id=${companyId}`)
            .then(response => response.json())
            .then(data => {
                // Update the branches dropdown with the fetched data
                var branchDropdown = document.getElementById('branch_id');
                branchDropdown.innerHTML = ''; // Clear existing options

                data.forEach(branch => {
                    var option = document.createElement('option');
                    option.value = branch.id;
                    option.textContent = branch.name;
                    branchDropdown.appendChild(option);
                });
            });
    }
</script>
@endsection
