@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" id="registerForm">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

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
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="hidden" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                <input id="password-confirm" type="hidden" class="form-control" name="password_confirmation" required>
                                <div id="registerPatternPassword" class="m-auto"></div>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="button" class="btn btn-primary" id="registerSubmitButton">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer_scripts')
    <script>
    $(document).ready(function(){
      var registerLock = new PatternLock('#registerPatternPassword',{
          mapper: {1:'Zj',2:'lP',3:61,4:'Nz',5:19,6:'qQ',7:98,8:'gS',9:36}
      });
      $('#registerSubmitButton').click(function(){
        var registerPatternPassword = registerLock.getPattern();
        var name = $('#name').val();
        var emailAddress = $('#email').val();
        if(jQuery.isEmptyObject(emailAddress)){
          swal(
            'Ooopss!',
            'You should provide an email address!',
            'warning'
          );
        }
        else{
          var filterRegex = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
          if (filterRegex.test(emailAddress)) {
            if(jQuery.isEmptyObject(registerPatternPassword)){
              swal(
                'Ooopss!',
                'You should provide pattern!',
                'question'
              );
            }
            else{
              $('#password').val(registerPatternPassword);
              $('#password-confirm').val(registerPatternPassword);
              $("#registerForm").submit();
            }
          }
          else {
            swal(
              'Ooopss!',
              'Email address is not valid!',
              'error'
            );
          }
        }
        if(jQuery.isEmptyObject(name)){
          swal(
            'Ooopss!',
            'You should provide a name!',
            'warning'
          );
        }
      });
    });
    </script>
@endsection
