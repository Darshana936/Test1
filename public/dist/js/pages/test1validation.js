$(document).ready(function () {

  $("[name='gender']").change(function () {
    radio_check();
  });
 
  if( $("input[type='radio'][value='Male']:checked").length>0){
    radio_check();

  } 

  function radio_check() {

    var y = $("input[type='radio'][value='Male']:checked");
    if (y.length > 0) {
      $("#ageForMale").css("display","");
      
    }
    else {
      $("#ageForMale").css("display","none");

    }
  }

 


  $('#checkFname').hide();
  $('#checkLname').hide();
  $('#checkMail').hide();
  $('#checkNumb').hide();
  $('#checkCity').hide();
  $('#checkGen').hide();
  $('#checkAge').hide();
  $('#checkprofilePhoto').hide();
  $('#checkStatus').hide();

  $('#firstname').on("keyup change blur", function () {
    firstname_check();
  });

  function firstname_check() {
    var fname_val = $('#firstname').val();


    if (fname_val.length == '') {
      $('#checkFname').show();
      $('#checkFname').html("Please fill the first Name field");
      $('#firstname').css({ border: "1px solid red" });

      return false;
    }

    else {
      $('#firstname').css({ border: '1px solid green' });
      $('#checkFname').hide();
      return true;
    }

  }
  $('#lastname').on("keyup change blur", function () {
    lastname_check();
  });
  function lastname_check() {
    var lname_val = $('#lastname').val();

    if (lname_val.length == '') {
      $('#checkLname').show();
      $('#checkLname').html("Please fill the last name field");

      $('#lastname').css({ border: "1px solid red" });
      return false;
    }
    else {
      $('#checkLname').hide();
      $('#lastname').css({ border: '1px solid green' });
      return true;
    }
  }

  $('#email').on("keyup change blur", function () {
    email_check();
  });

  function email_check() {
    var email_val = $('#email').val();
    let regexpress = new RegExp("^([0-9a-zA-Z]([-.\w]*[0-9a-zA-Z])*@([0-9a-zA-Z][-\w]*[0-9a-zA-Z]\.)+[a-zA-Z]{2,9})$");
    var _token = $('input[name="_token"]').val();
    if (email_val.length == '') {
      $('#checkMail').show();
      $('#checkMail').html("Please fill the email field");
      $('#email').css({ border: "1px solid red" });
      return false;
    }
    else if (!regexpress.test(email_val)) {
      $('#checkMail').show();
      $('#checkMail').html("Invalid email address");
      $('#email').css({ border: "1px solid red" });
      return false
     }
    else {
      $('#checkMail').hide();
      $('#email').css({ border: '1px solid green' });
      return true;      
    }
  }


$('#contactNumber').on("keyup change blur", function () {
  contactNumber_check();
});

function contactNumber_check() {
  var contact_val = $('#contactNumber').val();

  let regexpress = new RegExp("^[0-9-+]+$");
  if (contact_val.length == '') {
    $('#checkNumb').show();
    $('#checkNumb').html("Please fill the contact number field.");

    $('#contactNumber').css({ border: "1px solid red" });
    return false;
  }
  else if (!regexpress.test(contact_val)) {
    $('#checkNumb').show();
    $('#checkNumb').html("Contact number must be numeric! You can use + or -");
    $('#contactNumber').css({ border: "1px solid red" });

    return false;

  }
  else if (contact_val.length > 14) {
    $('#checkNumb').show();
    $('#checkNumb').html("Length must be less than or equal to 14.");

    $('#contactNumber').css({ border: "1px solid red" });
    return false;
  }
  else {
    $('#checkNumb').hide();
    $('#contactNumber').css({ border: '1px solid green' });
    return true;
  }
}

$('#city').on("keyup change blur", function () {
  city_check();
});

function city_check() {
  var city_val = $('#city').val();
  if (city_val.length == '') {
    $('#checkCity').show();
    $('#checkCity').html("Please fill the city field");
    $('#city').css({ border: "1px solid red" });

    return false;
  }
  else {
    $('#city').css({ border: '1px solid green' });
    $('#checkCity').hide();
    return true;
  }
}

$("[name='gender']").change(function () {
  
  gender_check();

});

function gender_check() {

  var x = $("input[type = 'radio'][name='gender']:checked");
  if (!x.length > 0) {
    $('#checkGen').show();
    $('#checkGen').html('Gender field is required');
    return false;
  }
  else {
    $('#checkGen').hide();
    return true;
  }
}



$("#age").on('blur change keyup',function () {
  age_check();

});

 function age_check(){

  var age_val = $('#age').val();
  if (age_val == "") {
    $('#checkAge').show();
    $('#checkAge').html("Please fill the age field.");
    $('#age').css({ border: "1px solid red" });
    return false;
  }

  else if (age_val <= 0) {
    $('#checkAge').show();
    $('#checkAge').html("Age must be greater than 0.");
    $('#age').css({ border: "1px solid red" });
    return false;
  }

  else {
    $('#checkAge').hide();
    $('#age').css({ border: "1px solid green" });
    return true;
  }
  
  
  
 }
 

 $('#profilePhoto').on('change click', function () {
  profilePhoto_check();
});

function profilePhoto_check() {  
  var ext = $('#profilePhoto').val().split('.').pop().toLowerCase();
  
    if ($("#profilePhoto")[0].files.length == 0) {
      $('#checkprofilePhoto').show();
      $('#checkprofilePhoto').html("Please upload image");
      $('#profilePhoto').css({ border: "1px solid red" });
      return false;
    }
  
  else if($.inArray(ext, ['png', 'jpg']) == -1) {
    $('#checkprofilePhoto').show();
    $('#checkprofilePhoto').html("Invalid image format! Image format must be jpg or png.");
    $('#profilePhoto').css({ border: "1px solid red" });
    return false;
  }
    
  else if(($('#profilePhoto')[0].files[0].size/1024) > 1024) {
    $('#checkprofilePhoto').show();
    $('#checkprofilePhoto').html("Try to upload file less than 1MB(1024 KB).");
    $('#profilePhoto').css({ border: "1px solid red" });
    return false;
}  
  else {
    $('#checkprofilePhoto').hide();
    $('#profilePhoto').css({ border: "1px solid green" });
    return true;
  }
}

$("[name='status']").change(function () {
  status_check();
});
function status_check() {

  var x = $("input[type = 'radio'][name = 'status']:checked");
  if (!x.length > 0) {
    $('#checkStatus').show();
    $('#checkStatus').html('Status field is required');
    return false;
  }
  else {
    $('#checkStatus').hide();
    return true;
  }
}

$('#UserSubmitBtn').click(function () {
  var v1 = firstname_check();
  var v2 = lastname_check();
  var v3 = email_check();
  var v6 = status_check();
  var v7= gender_check();
  var v8= city_check();
  var v9 = contactNumber_check();
  if( $("input[type='radio'][value='Male']:checked").length>0){
       var v4= age_check();
   }
   else{
     v4=true;
   }
   var v5 = profilePhoto_check(); 
  return (v1 && v2 && v3 && v4 && v5  && v6 && v7 && v8 && v9);

});

$('#EditProfilePhoto').on('change ', function () {
  
  EditProfilePhoto_check();
  
});
function EditProfilePhoto_check() {
  var ext = $('#EditProfilePhoto').val().split('.').pop().toLowerCase();
  if ($.inArray(ext, ['png', 'jpg']) == -1) {
    $('#checkEditImg').show();
    $('#checkEditImg').html("Invalid image format! Image format must be jpg or png.");
    $('#EditProfilePhoto').css({ border: "1px solid red" });
    return false;
  }
  else if(($('#EditProfilePhoto')[0].files[0].size/1024) > 1024) {
    $('#checkEditImg').show();
    $('#checkEditImg').html("Try to upload file less than 1MB(1024 KB).");
    $('#EditProfilePhoto').css({ border: "1px solid red" });
    return false;
}
  else {
    $('#checkEditImg').hide();
    $('#EditProfilePhoto').css({ border: "1px solid green" });
    return true;
  }
}

$('#UserEditSubmit').click(function () {


  let s1 = firstname_check();
  let s2 = lastname_check();
  let s3 = email_check();
 
  let s8= city_check();
  if( $("input[type='radio'][value='Male']:checked").length>0){
    var s4= age_check();
    }
    else{
      s4=true;
    }
    if($("#EditProfilePhoto")[0].files.length!=0){
   var s5 = EditProfilePhoto_check();
       }
       else{
         s5=true;
       }

  let s9 = contactNumber_check();
  return (s1 && s2 && s3 && s4 && s5  && s8 && s9);

});

});