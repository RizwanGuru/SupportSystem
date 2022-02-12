@extends('layouts.app')

@section('content')
        <div class="min-h-100 p-0 p-sm-6 d-flex align-items-stretch">
            <div class="card w-25x flex-grow-1 flex-sm-grow-0 m-sm-auto">
                <div class="card-body p-sm-5 m-sm-3 flex-grow-0">
                    <h1 class="mb-0 fs-3">{{ __('Sign Up')}}</h1>
                    <div class="fs-exact-14 text-muted mt-2 pt-1 mb-5 pb-2">Fill out the form to create a new account.</div>
                    @if($errors->any())
                    @foreach($errors->all() as $error)
                    <div style="color:red" role="alert">
                      {{$error}}
                    </div>
                    @endforeach
                    @endif
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                    <div class="mb-4">
                        <label class="form-label" for="name">{{ __('Full name')}}</label>
                        <input id="name" type="text" class="form-control-lg form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus />
                         
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="email">{{ __('E-Mail Address') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror form-control-lg" name="email" value="{{ old('email') }}" required autocomplete="email" />
                    </div>
                    <div class="mb-4" style="position: relative;">
                        <label class="form-label" for="password">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control-lg form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"/>
                        <i class="far fa-eye" onclick="visiblePassword()" style=" cursor: pointer;position: absolute;top: 42px;right: 8px;"></i>
                         
                    </div>
                    <div class="mb-4" style="position: relative;">
                        <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                        <input id="password-confirm" type="password" class="form-control-lg form-control" name="password_confirmation" required autocomplete="new-password" />
                        <i class="far fa-eye" onclick="visibleConfirmPassword()" style=" cursor: pointer;position: absolute;top: 42px;right: 8px;"></i>
                    </div>
                    <div class="mb-4" style="display: flex;justify-content: space-between;">  
                        
                        <label class="form-label">{{ __('Register as') }}</label>
                        <label class="form-check form-switch">
                            <input type="hidden" name="checkregister" value="Client" />
                        <input type="checkbox" class="form-check-input" id="cb" name="checkregister" checked value="User" />
                        <span class="form-check-label checktype">User</span>
                    </label>
                    </div>
                     
                    <div><button type="submit" class="btn btn-primary btn-lg w-100"> {{ __('Sign Up')}}</button></div>
                    </form>
                </div>
               <div class="card-body p-sm-5 m-sm-3 flex-grow-0">
                    <div class="form-group mb-0 mt-4 pt-2 text-center text-muted">
                        Already have an account?
                        <a href="{{ route('login') }}">Sign in</a>
                    </div>
                </div>
            </div>
        </div>

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
                
        <script>
           $('#cb').click(function() { 
                if ($(this).is(':checked')) {
                   
                    $('.checktype').html('User');
                    console.log("checked");
                } else {
                   
                    $('.checktype').html('Client');

                   console.log("not checked");
                }
            });
            function visiblePassword() {
                var x = document.getElementById("password");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
                }
                function visibleConfirmPassword() {
                var y = document.getElementById("password-confirm");
                if (y.type === "password") {
                    y.type = "text";
                } else {
                    y.type = "password";
                }
                
                }
        </script> 
@endsection
