@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}" id="resetForm">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus>

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
                                <div id="resetPatternPassword" class="m-auto"></div>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="button" class="btn btn-primary" id="resetSubmitButton">
                                    {{ __('Reset Password') }}
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
      var resetLock = new PatternLock('#resetPatternPassword',{
          mapper: {1:'Zj',2:'lP',3:61,4:'Nz',5:19,6:'qQ',7:98,8:'gS',9:36}
      });
      $('#resetSubmitButton').click(function(){
        var resetPatternPassword = resetLock.getPattern();
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
            if(jQuery.isEmptyObject(resetPatternPassword)){
              swal(
                'Ooopss!',
                'You should provide pattern!',
                'question'
              );
            }
            else{
              $('#password').val(resetPatternPassword);
              $('#password-confirm').val(resetPatternPassword);
              $("#resetForm").submit();
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
      });
    });
    </script>
@endsection
