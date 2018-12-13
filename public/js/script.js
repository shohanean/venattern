$(document).ready(function(){
  var lock = new PatternLock('#patternPassword',{
    mapper: {1:'j',2:'P',3:61,4:'z',5:9,6:'Q',7:8,8:'S',9:6}
  });
  $('#loginSubmitButton').click(function(){
    var patternPassword = lock.getPattern();
    var emailAddress = $('#emailAddress').val();
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
          //Starting of AJAX request
          $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });
          $.ajax({
            type:'POST',
            url:'/login',
            data: {patternPassword:patternPassword, emailAddress:emailAddress},
            success: function (data) {
              alert(data);
              // if(data == 'done'){
              //   $("#product_name").val("");
              //   $("#product_price").val("");
              //   $("#success").addClass("alert alert-success");
              //   $("#success_message").html("Successfully Inserted!");
              //   $('#content_part').load(location.href+' #content_part');
              // }
              // else{
              //   alert("bad");
              // }
            }
          });
          //Ending of AJAX request
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
