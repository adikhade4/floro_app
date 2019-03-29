@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('UserName') }}<span class="text-danger">*</span></label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>

                                @if ($errors->has('username'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}<span class="text-danger">*</span></label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}<span class="text-danger">*</span></label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}<span class="text-danger">*</span></label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row justify-content-md-center">
                                <label for="firstname" class="col-md-2 col-form-label ">First Name <span class="text-danger">*</span></label>

                                <div class="col-md-4">
                                    <input id="firstname" type="text" class="form-control" name="firstname" value="firstname" required autofocus>

                                                                    </div>
                            </div>

                            <div class="form-group row justify-content-md-center">
                                <label for="lastname" class="col-md-2 col-form-label ">Last Name <span class="text-danger">*</span></label>

                                <div class="col-md-4">
                                    <input id="lastname" type="text" class="form-control" name="lastname" value="lastname" required autofocus>

                                                                    </div>
                            </div>

                            <div class="form-group row justify-content-md-center">
                                <label for="address" class="col-md-2 col-form-label ">Address <span class="text-danger">*</span></label>

                                <div class="col-md-4">
                                    <textarea rows="2" cols="50" class="form-control" name="address" value="address" required autofocus> </textarea>

                                                                    </div>
                            </div>

                            <div class="form-group row justify-content-md-center">
                                <label for="houseno" class="col-md-2 col-form-label ">House Number <span class="text-danger">*</span></label>

                                <div class="col-md-4">
                                    <input id="houseno" type="text" class="form-control" name="houseno" value="houseno" required autofocus>

                                                                    </div>
                            </div>

                            <div class="form-group row justify-content-md-center">
                                <label for="postalcode" class="col-md-2 col-form-label ">Postal Code <span class="text-danger">*</span></label>

                                <div class="col-md-4">
                                    <input id="postalcode" type="text" class="form-control" name="postalcode" value="postalcode" required autofocus>

                                                                    </div>
                            </div>

                            <div class="form-group row justify-content-md-center">
                                <label for="city" class="col-md-2 col-form-label ">City <span class="text-danger">*</span></label>

                                <div class="col-md-4">
                                    <input id="city" type="text" class="form-control" name="city" value="city" required autofocus>

                                                                    </div>
                            </div>

                            <div class="form-group row justify-content-md-center">
                                <label for="telephoneno" class="col-md-2 col-form-label ">Telephone number <span class="text-danger">*</span></label>

                                <div class="col-md-4">
                                    <input id="telephoneno" type="text" class="form-control" name="telephoneno" value="telephoneno" required autofocus>

                                                                    </div>
                            </div>

                            <div class="form-group row justify-content-md-center">
                                <label for="is_active" class="col-md-2 col-form-label ">Activate User <span class="text-danger">*</span></label>

                                <div class="col-md-4 checkbox-field">

                                    <input id="is_active" type="checkbox" class="form-control" name="is_active" value="1"  checked>

                                                                    </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-4 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Save
                                    </button>

                                   
                                </div>

                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
