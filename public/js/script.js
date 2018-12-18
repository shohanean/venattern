$(document).ready(function(){
  var loginLock = new PatternLock('#loginPatternPassword',{
    mapper: {1:'Zj',2:'lP',3:61,4:'Nz',5:19,6:'qQ',7:98,8:'gS',9:36}
  });
  $('#loginSubmitButton').click(function(){
    var patternPassword = loginLock.getPattern();
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
        if(jQuery.isEmptyObject(patternPassword)){
          swal(
            'Ooopss!',
            'You should provide pattern!',
            'question'
          );
        }
        else{
          $("#password").val(patternPassword);
          $("#loginForm").submit();
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
