@extends('layouts.app')
@section('content')
<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-8">
         <div class="card">
            <div class="card-header">{{ __('Register') }}</div>
            <div class="card-body">
               @if($errors->any())
               <div class="notification is-danger">
                  <ul>
                     @foreach($errors->all() as $error)
                     <li>{{$error}}</li>
                     @endforeach
                  </ul>
               </div>
               @endif
               <form id="myForm" method="POST" action="/home">
                  @csrf
                  <div class="form-group row {{ $errors->has('username') ? 'has-error' : '' }}">
                     <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('UserName') }}<span class="text-danger">*</span></label>
                     <div class="col-md-6">
                        <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" autofocus>
                        @if ($errors->has('username'))
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('username') }}</strong>
                        </span>
                        @endif
                     </div>
                  </div>
                  <div class="form-group row {{ $errors->has('firstname') ? 'has-error' : '' }}">
                     <label for="firstname" class="col-md-4 col-form-label text-md-right">{{ __('FirstName') }}<span class="text-danger">*</span></label>
                     <div class="col-md-6">
                        <input id="firstname" type="text" class="form-control" name="firstname" value="{{ old('firstname') }}">
                        @if ($errors->has('firstname'))
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('firstname') }}</strong>
                        </span>
                        @endif
                     </div>
                  </div>
                  <div class="form-group row {{ $errors->has('lastname') ? 'has-error' : '' }}">
                     <label for="lastname" class="col-md-4 col-form-label text-md-right">{{ __('LastName') }}<span class="text-danger">*</span></label>
                     <div class="col-md-6">
                        <input id="lastname" type="text" class="form-control" name="lastname" value="{{ old('lastname') }}" >
                        @if ($errors->has('lastname'))
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('lastname') }}</strong>
                        </span>
                        @endif
                     </div>
                  </div>
                  <div class="form-group row {{ $errors->has('address') ? 'has-error' : '' }}">
                     <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}<span class="text-danger">*</span></label>
                     <div class="col-md-6">
                        <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}">
                        @if ($errors->has('address'))
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('address') }}</strong>
                        </span>
                        @endif
                     </div>
                  </div>
                  <div class="form-group row {{ $errors->has('city') ? 'has-error' : '' }}">
                     <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('City') }}<span class="text-danger">*</span></label>
                     <div class="col-md-6">
                        <input id="city" type="text" class="form-control" name="city" value="{{ old('city') }}">
                        @if ($errors->has('city'))
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('city') }}</strong>
                        </span>
                        @endif
                     </div>
                  </div>
                  <div class="form-group row {{ $errors->has('houseno') ? 'has-error' : '' }}">
                     <label for="houseno" class="col-md-4 col-form-label text-md-right">{{ __('HouseNumber') }}<span class="text-danger">*</span></label>
                     <div class="col-md-6">
                        <input id="houseno" type="text" class="form-control" name="houseno" value="{{ old('houseno') }}">
                        @if ($errors->has('houseno'))
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('houseno') }}</strong>
                        </span>
                        @endif
                     </div>
                  </div>
                  <div class="form-group row {{ $errors->has('postalcode') ? 'has-error' : '' }}">
                     <label for="postalcode" class="col-md-4 col-form-label text-md-right">{{ __('PostalCode') }}<span class="text-danger">*</span></label>
                     <div class="col-md-6">
                        <input id="postalcode" type="text" class="form-control" name="postalcode" value="{{ old('postalcode') }}">
                        @if ($errors->has('postalcode'))
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('postalcode') }}</strong>
                        </span>
                        @endif
                     </div>
                  </div>
                  <div class="form-group row {{ $errors->has('telephoneno') ? 'has-error' : '' }}">
                     <label for="telephoneno" class="col-md-4 col-form-label text-md-right">{{ __('Telephone number') }}<span class="text-danger">*</span></label>
                     <div class="col-md-6">
                        <input id="telephoneno" type="text" class="form-control" name="telephoneno" value="{{ old('telephoneno') }}">
                        @if ($errors->has('telephoneno'))
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('telephoneno') }}</strong>
                        </span>
                        @endif
                     </div>
                  </div>
                  <div class="form-group row {{ $errors->has('email') ? 'has-error' : '' }}">
                     <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}<span class="text-danger">*</span></label>
                     <div class="col-md-6">
                        <input id="email" type="email" class="form-control" value="{{ old('email') }}" name="email">
                        @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                     </div>
                  </div>
                  <div class="form-group row {{ $errors->has('password') ? 'has-error' : '' }}">
                     <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}<span class="text-danger">*</span></label>
                     <div class="col-md-6">
                        <input id="password" type="password" class="form-control" name="password">
                        @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                     </div>
                  </div>
                  <div class="form-group row {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                     <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}<span class="text-danger">*</span></label>
                     <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                        @if ($errors->has('password_confirmation'))
                        <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                        @endif
                     </div>
                  </div>
                  <div class="form-group row ">
                     <label for="status" class="col-md-4 col-form-label text-md-right">Activate User <span class="text-danger">*</span></label>
                     <div class="col-md-6 checkbox-field">
                        <input id="status" type="checkbox" class="form-control" name="status" value="1">
                     </div>
                  </div>
                  <div class="form-group row mb-0">
                     <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                        {{ __('CreateAccount') }}
                        </button>
                        <button type="button" class="btn btn-primary" onClick="resetFormFields();">
                        Reset
                        </button>
                     </div>
                  </div>
               </form>
               <script>
                  function resetFormFields() {
                  /*Put all the data posting code here*/
                  document.getElementById("myForm").reset();
                  }
               </script>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection