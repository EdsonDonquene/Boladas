//elements and other initializations

$(document).ready(function(){

    $('.sidenav').sidenav();
    $('.sidenav_filters').sidenav({
      edge: 'right'
    });
    $('.tabs').tabs();
    $('.fixed-action-btn').floatingActionButton({hoverEnabled: false});
    $('input#input_text, textarea#textarea2').characterCounter();
    $('select').formSelect();
    $('.modal').modal();
    $('.carousel').carousel();
    $('.tooltipped').tooltip();
    $('.materialboxed').materialbox();
    $('.slider').slider({
      indicators : false,
      duration : 100, 
      interval : 500
    });

    //check if there's internet
    checkInternetConnection();

    //check screen size and load posts on document ready
    checkScreenSize();

    $(document).mouseup(function (e)
    {
      var dropdown = document.getElementById('user_dropdown');
      var logoutbtn = document.getElementById('logout_btn');
      var dropdown_not = document.getElementById('notification_dropdown');
      var notificationbtn = document.getElementById('notification_btn');


      
        
        if(!logoutbtn.contains(e.target) && !dropdown.contains(e.target))
        {
          dropdown.classList.remove("user_active");
          logoutbtn.classList.remove("user_active_btn");
        }

        if(!dropdown_not.contains(e.target) && !notificationbtn.contains(e.target))
        {
          dropdown_not.classList.remove("notification_active");
          notificationbtn.classList.remove("notification_active_btn");
        }
    
    });
    

    var full_name = document.getElementById('full_name').value;
    var phone_number = document.getElementById('phone').value;
    var province = document.getElementById('province').value;
    var psw = document.getElementById('password').value; 
    var check_tou = document.getElementById('check_tou').checked;    

    if(full_name =='' || phone_number == '' || province == '' || psw == '')
    {
      document.getElementById('btn_reg').disabled = true;
    }

    $('#phone').on('keydown keyup change', function(e){
      if ($(this).val().length > 8 
          && e.keyCode !== 46 // keycode for delete
          && e.keyCode !== 8 // keycode for backspace
          && e.keyCode !== 37 // keycode for backspace
          && e.keyCode !== 38 // keycode for backspace
          && e.keyCode !== 39 // keycode for backspace
          && e.keyCode !== 40 // keycode for backspace
         ) {
         e.preventDefault();
         $(this).val().length = 8;
      }
    });

    $('#phone2').on('keydown keyup change', function(e){
      if ($(this).val().length > 8 
          && e.keyCode !== 46 // keycode for delete
          && e.keyCode !== 8 // keycode for backspace
          && e.keyCode !== 37 // keycode for backspace
          && e.keyCode !== 38 // keycode for backspace
          && e.keyCode !== 39 // keycode for backspace
          && e.keyCode !== 40 // keycode for backspace
         ) {
         e.preventDefault();
         $(this).val().length = 8;
      }
    });

    $('#fullname').on('keydown keyup change', function(e){
      if ($(this).val().length > 24 
          && e.keyCode !== 46 // keycode for delete
          && e.keyCode !== 8 // keycode for backspace
          && e.keyCode !== 37 // keycode for backspace
          && e.keyCode !== 38 // keycode for backspace
          && e.keyCode !== 39 // keycode for backspace
          && e.keyCode !== 40 // keycode for backspace
         ) {
         e.preventDefault();
         $(this).val().length = 24;
      }
    });

    $('#password').on('keydown keyup change', function(e){
      if ($(this).val().length > 14 
          && e.keyCode !== 46 // keycode for delete
          && e.keyCode !== 8 // keycode for backspace
          && e.keyCode !== 37 // keycode for backspace
          && e.keyCode !== 38 // keycode for backspace
          && e.keyCode !== 39 // keycode for backspace
          && e.keyCode !== 40 // keycode for backspace
         ) {
         e.preventDefault();
         $(this).val().length = 14;
      }
    });
    $('#password2').on('keydown keyup change', function(e){
      if ($(this).val().length > 14 
          && e.keyCode !== 46 // keycode for delete
          && e.keyCode !== 8 // keycode for backspace
          && e.keyCode !== 37 // keycode for backspace
          && e.keyCode !== 38 // keycode for backspace
          && e.keyCode !== 39 // keycode for backspace
          && e.keyCode !== 40 // keycode for backspace
         ) {
         e.preventDefault();
         $(this).val().length = 14;
      }
    });

    document.getElementById('full_name').focus();

  });

  function checkScreenSize() {
    // Get the width and height of the viewport
    var viewportWidth = window.innerWidth;
    var viewportHeight = window.innerHeight;

    // Log or use the values as needed
    console.log("Viewport Width:", viewportWidth);
    console.log("Viewport Height:", viewportHeight);

    // Example: Check if the viewport width is less than 600 pixels
    if (viewportWidth < 912) {
      loadPostsMobile();
      loadBoladasMobile();
    } else {
      loadPosts();
      loadBoladas();
      //console.log("Large screen size!");
    }
  }

  function checkInternetConnection() {
    if (navigator.onLine) {
      console.log("You are online!");
      document.getElementById('offline_container').hidden = true;
    } else {
      console.log("You are offline!");
      document.getElementById('offline_container').hidden = false;

    }
    
    // Listen for online/offline events
    window.addEventListener('online', function() {
      console.log("You are now online!");
      document.getElementById('offline_container').hidden = true;

    });
    
    window.addEventListener('offline', function() {
      console.log("You are now offline!");
      document.getElementById('offline_container').hidden = false;

    });
  }

  function closeDescription()
  {
    var descriptionOverlay = document.getElementById('description_overlay');
    descriptionOverlay.style.display = "none";
    descriptionOverlay.style.visibility = 'hidden';
  }

  function reloadPage() {
    // Reload the current page
    location.reload();
  }

  //validade Fullname
  function validateFullname()
  {
    var full_name = document.getElementById('full_name').value;
    var err_msg = document.getElementById('error_msg');

    if(full_name.length < 3)
    {
      err_msg.innerHTML = 'Nome tem de ter 3 ou mais caracteres!';
      activeSubmit();
    }
    else
    {
      err_msg.innerHTML = '';
    } 
  
  }

  //check phone exists
  function checkPhone()
  {
    var phone_number = document.getElementById('phone').value;
    var err_msg = document.getElementById('error_msg3');

    $.ajax({
        type: 'POST',
        url: 'includes/ajax_handlers/check_phone.php',
        data: {
            number: phone_number,
        },
        success: function(response) {  
          if(response == 'Número de telefone já foi usado!')
          {
            err_msg.innerHTML = response;
            activeSubmit();
            deactivateCheck();
          }
          else
          {
            err_msg.innerHTML = '';
          }

        }

    });

  }

  function checkPhoneLogin()
  {
    var phone_number = document.getElementById('phone2').value;
    var err_msg = document.getElementById('error_msg3');

    $.ajax({
        type: 'POST',
        url: 'includes/ajax_handlers/check_phone.php',
        data: {
            number: phone_number,
        },
        success: function(response) {  
          if(response == 'Número de telefone já foi usado!')
          {
            err_msg.innerHTML = '';
            document.getElementById('password').disabled = false;
            document.getElementById('password').focus();
            document.getElementById('pass_label').innerHTML = 'Palavra passe';
            
          }
          else
          {
            err_msg.innerHTML = 'Número de telefone não encontrado! Verifique o número e tente novamente.';
            document.getElementById('password').disabled = true;
            document.getElementById('pass_label').innerHTML = 'Verifique o número de telefone!';

          }

        }

    });

  }

  //limit input
  function limitInput()
  {
    $('#phone').on('keydown keyup change', function(e){
      if ($(this).val() > 9 
          && e.keyCode !== 46 // keycode for delete
          && e.keyCode !== 8 // keycode for backspace
         ) {
         e.preventDefault();
         $(this).val(9);
      }
    });
  }

  //validate phone number
  function validatePhone()
  {
    var phone_number = document.getElementById('phone').value;
    var err_msg = document.getElementById('error_msg2');

    if(phone_number.length != 9)
    {
      err_msg.innerHTML = 'Numero de telefone tem de ter 9 digitos!';
      activeSubmit();
      deactivateCheck()
    }
    else
    {
      err_msg.innerHTML = '';
    }

  }
  //check psw length
  function checkLength()
  {
    var psw = document.getElementById('password').value;
    var re_psw = document.getElementById('password2').value;
    var err_msg = document.getElementById('error_msg1');

    if(psw.length < 8)
    {
      err_msg.innerHTML = 'Palavra passe tem de ter minimo 8 caracteres!';
      document.getElementById('password2').disabled = true;
    }
    else
    {
      document.getElementById('password2').disabled = false;
      err_msg.innerHTML = '';

    }

  }

  //check if psw match
  function checkPass()
  {
      var psw = document.getElementById('password').value;
      var re_psw = document.getElementById('password2').value;
      var err_msg = document.getElementById('error_msg');

     
      if(psw != re_psw)
      {
          err_msg.innerHTML = 'Palavra passe diferentes!';
          document.getElementById('btn_reg').disabled = true;
      }
      else
      {
          err_msg.innerHTML = '';
      }
  }

  //deactivate check on change
  function deactivateCheck()
  {
    document.getElementById('check_tou').checked = false;

    activeSubmit();
    checkPass();
  }

  //activate submit btn
  function activeSubmit()
  {

    var full_name = document.getElementById('full_name').value;
    var phone_number = document.getElementById('phone').value;
    var province = document.getElementById('province').value;
    var psw = document.getElementById('password').value;
    var psw = document.getElementById('password').value;
    var check_tou = document.getElementById('check_tou').checked;    
    var check_tou = document.getElementById('check_tou').checked;
    var btn_reg = document.getElementById('btn_reg').disabled;


      if(check_tou == true )
      {
        document.getElementById('btn_reg').disabled = false;
        if(full_name =='' || phone_number == '' || province == '' || psw == '')
        {
          document.getElementById('btn_reg').disabled = true;
        }
        else
          document.getElementById('btn_reg').disabled = false;
      }
      else if(check_tou == false)
        document.getElementById('btn_reg').disabled = true;

    checkPhone();
        
  
  }


  //activate login btn
  function activelogin()
  {
    var user_pass = document.getElementById('password').value;
    
    if(user_pass == '')
      document.getElementById('btn_login').disabled = true;
    else
      document.getElementById('btn_login').disabled = false;
  
  }

  //handle login with ajax
  function userLogin()
  {
    var user_phone = document.getElementById('phone2').value;
    var user_pass = document.getElementById('password').value;
    var loader = document.getElementById('loader_overlay');
    var err_msg = document.getElementById('error_msg5');

    loader.style.visibility = 'visible';

    $.ajax({
      type: 'POST',
      url: 'includes/ajax_handlers/login_handler.php',
      data: {
          user_phone : user_phone,
          user_psw : user_pass
      },
      success: function(response) {  
        
        loader.style.visibility = 'hidden';

        if(response == 'success')
        {
          window.location.href = "index.php?auth=AUTHENTICATED";
        }
        else
        {
          err_msg.innerHTML = response;
        }

      }

  });

  }

  //handle user dropdown
  function userDrop()
  {
    var dropdown = document.getElementById('user_dropdown');
    var logoutbtn = document.getElementById('logout_btn');
    
    dropdown.classList.toggle("user_active");
    logoutbtn.classList.toggle("user_active_btn");

  }

  //handle notification dropdown
  function notificationDrop()
  {
    var dropdown = document.getElementById('notification_dropdown');
    var notification_btn = document.getElementById('notification_btn');

    notification_btn.classList.toggle("notification_active_btn");

    if(dropdown.className.match("notification_active"))
    dropdown.classList.remove("notification_active");
    else
    dropdown.classList.add("notification_active");
    //logoutbtn.classList.toggle("user_active_btn");

  }

  //handle imgs upload
  var fileInput = document.getElementById('prod_imgs');
  var fileInput1 = document.getElementById('prod_imgs1');
  var fileInput2 = document.getElementById('prod_imgs2');
  var fileInput3 = document.getElementById('prod_imgs3');

  fileInput.addEventListener('change', event => {
    const maxAllowedFiles = 3;
    var err_msg = document.getElementById('error_msg');
  
    if(fileInput.files.length > 3)
    {
      err_msg.innerHTML = 'Maximo 3 imagens!';
      const files = Array.from(fileInput.files).slice(0,maxAllowedFiles,);
      //console.log(files);
    }
    else
      err_msg.innerHTML = '';
    
  });

  fileInput1.addEventListener('change', event => {
    const maxAllowedFiles = 3;
    var err_msg = document.getElementById('error_msg1');
  
    if(fileInput1.files.length > 3)
    {
      err_msg.innerHTML = 'Maximo 3 imagens!';
      const files = Array.from(fileInput.files).slice(0,maxAllowedFiles,);
      //console.log(files);
    }
    else
      err_msg.innerHTML = '';
    
  });

  fileInput2.addEventListener('change', event => {
    const maxAllowedFiles = 3;
    var err_msg = document.getElementById('error_msg4');
  
    if(fileInput2.files.length > 3)
    {
      err_msg.innerHTML = 'Maximo 3 imagens!';
      const files = Array.from(fileInput.files).slice(0,maxAllowedFiles,);
      //console.log(files);
    }
    else
      err_msg.innerHTML = '';
    
  });

  fileInput3.addEventListener('change', event => {
    const maxAllowedFiles = 3;
    var err_msg = document.getElementById('error_msg6');
  
    if(fileInput3.files.length > 3)
    {
      err_msg.innerHTML = 'Maximo 3 imagens!';
      const files = Array.from(fileInput.files).slice(0,maxAllowedFiles,);
      //console.log(files);
    }
    else
      err_msg.innerHTML = '';
    
  });

  function checkLabel()
  {
    var prod_label = document.getElementById('img_prod_label').value;
    var prod_label1 = document.getElementById('img_prod_label1').value;
    var prod_label2 = document.getElementById('img_prod_label2').value;
    var prod_label3 = document.getElementById('img_prod_label3').value;

    var label_array = prod_label.split(',');
    var label_array1 = prod_label1.split(',');
    var label_array2 = prod_label2.split(',');
    var label_array3 = prod_label3.split(',');

    label_array = label_array.slice(0,3);
    label_array1 = label_array1.slice(0,3);
    label_array2 = label_array2.slice(0,3);
    label_array3 = label_array3.slice(0,3);

    document.getElementById('img_prod_label').value = label_array;
    document.getElementById('img_prod_label1').value = label_array1;
    document.getElementById('img_prod_label2').value = label_array2;
    document.getElementById('img_prod_label3').value = label_array3;
  }

  //handle registration with ajax
  function submit_register() 
  {
      var loader = document.getElementById('loader_overlay');
      var reg_success = document.getElementById('reg_success');
      var full_name = document.getElementById('full_name').value;
      var phone_number = document.getElementById('phone').value;
      var province = document.getElementById('province').value;
      var psw = document.getElementById('password').value;
      var spin = document.getElementById('loader');
      var err_msg = document.getElementById('error_msg5');

      checkPhone();


      loader.style.visibility = 'visible';

      $.ajax({
          type: 'POST',
          url: 'includes/ajax_handlers/register_handler.php',
          data: {
              full_name1: full_name,
              phone_number1: phone_number,
              province1: province,
              psw1: psw,
          },
          success: function(response) {  

            if(response == 'success')
            {
              loader.style.visibility = 'hidden';              
              spin.style.display = 'none';
              window.location.href = 'wellcome.php?phone='+phone_number+'&wlc=no';
            }
            else
            {
              loader.style.visibility = 'hidden';              
              err_msg.innerHTML = 'Erro: 00x0000NOTREGISTERED'+response+'. Por favor contactar o nosso <a href="helpcenter.php">centro de ajuda</a> ';
            }

          }

      });
  }
  