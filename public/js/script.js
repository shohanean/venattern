$(document).ready(function(){
  var lock = new PatternLock('#patternPassword',{
    mapper: {1:'j',2:'P',3:61,4:'z',5:9,6:'Q',7:8,8:'S',9:6}
  });
  $('#loginSubmitButton').click(function(){
    var patternPassword = lock.getPattern();
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
