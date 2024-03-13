function submitNewBoladas()
{
  var submitBtn = document.getElementById('submit_btn1');
  var modal = document.getElementById('modal_new_post');
  var loader = document.getElementById('loader_overlay');
  var success = document.getElementById('success_overlay');
  var loader_bg = document.getElementById('loader_bg');
  var item = document.getElementById('prod_name1').value;
  var description = document.getElementById('description1').value;
  var img_array = document.getElementById('prod_imgs1');
  var price = document.getElementById('price1').value;
  var location = document.getElementById('location1').value;
  var delivery = document.getElementById('deliver1').checked;
  var status = document.getElementById('status1').value;
  var username = document.getElementById('userloggedin').value;
  var err_msg = document.getElementById('error_msg1');
  var err_msg2 = document.getElementById('error_msg3');
  var prod_label = document.getElementById('img_prod_label1').value;

  i = "";

  if(item == '' || price == '' || location == '' || status == '' || prod_label == '' || description == '')
  {
    err_msg2.innerHTML = 'Por favor preencha todos os campos!';
    submitBtn.disabled = true;

    setTimeout(function() {
      submitBtn.disabled = false;
      err_msg2.innerHTML = '';
    }, 5000); // 
    
    
  }
  else
  {
    var instance = M.Modal.getInstance(modal);

    submitBtn.disabled = false;
    var formData = new FormData();

    if(delivery == true)
      delivery = 'yes';
    else
      delivery = 'no';

    loader.style.visibility = 'visible';

    //img_array = img_array.files;

    if(img_array.files.length > 3)
    {
        const files = Array.from(img_array.files).slice(0,3,);

        for (var i = 0; i < files.length; i++) {
          var img_file = files[i];
          formData.append('images[]', img_file);
        }
    }
    else
    {
      const files = Array.from(img_array.files);

      for (var i = 0; i < files.length; i++) {
        var img_file = files[i];
        formData.append('images[]', img_file);
      }
    }

    formData.append('uname', username);
    formData.append('item', item);
    formData.append('price', price);
    formData.append('location', location);
    formData.append('delivery', delivery);
    formData.append('status', status);
    formData.append('description', description);

    var xhr = new XMLHttpRequest();

   
   
    xhr.open('POST', 'includes/ajax_handlers/boladas_handler.php', true);

    xhr.onreadystatechange = function () {
      if (xhr.readyState == 4 && xhr.status == 200) {
          
        if(xhr.responseText == 'success')
        {
          loader.style.visibility = 'hidden';
          err_msg.innerHTML = '';

          instance.close();
          //modal_close.click();
          success.style.visibility = 'visible';

          setTimeout(function() {
            success.style.visibility = 'hidden';
          }, 2000); // 3000 milliseconds = 3 seconds
          
          loader.style.visibility = 'visible';
        
          setTimeout(function() {
            reloadPage(); // Reload the page to update the posts
          }, 3000); // 
        } 

      }
    };

    xhr.send(formData);
  }
  
}

 //handling posts loading
 var sort_values = "";

 function loadBoladas(sort)
 {
   var loader = document.getElementById('loader_overlay');
   var noposts = document.getElementById('container_no_item_b');
   var filter_price = document.getElementsByName('radio_price_b');
   var filter_status = document.getElementsByName('radio_status_b');
   var filter_delivery = document.getElementsByName('radio_delivery_b');
   //var val = document.getElementById("num_results").value = Number(num_results);
   var userlogged1 = document.getElementById("logged_user").value;
   var price_statement = "";
   var status_statement = "";
   var delivery_statement = "";


   sort_values = sort;

   if(sort_values == 'atoz')
   sort_statement = "order by name asc";
   else if(sort_values == 'ztoa')
   sort_statement = "order by name desc";
   else if(sort_values == 'lowtohigh')
   sort_statement = "order by price asc";
   else if(sort_values == 'hightolow')
   sort_statement = "order by price desc";
   else if(sort_values == 'newest')
   sort_statement = "order by date_added desc";
   else if(sort_values == 'oldest')
   sort_statement = "order by date_added asc";
   else if(sort_values == 'mostpopular')
   sort_statement = "order by clicks_num desc";
   else if(sort_values == 'leastpopular')
   sort_statement = "order by clicks_num asc";
   else
   sort_statement = "";

   loader.style.visibility = 'visible';
   document.getElementById('nomoreposts_b').innerHTML = '';

   //noposts.style.display = 'none';
   //$('#container_no_item').style('display' = 'none');

  
   for (var i = 0; i < filter_price.length; i++) {
     if (filter_price[i].checked) {
         // Output the selected value
          var price = filter_price[i].value;
     }
   }
   
   for (var j = 0; j < filter_status.length; j++) {
     if (filter_status[j].checked) {
         // Output the selected value
         var status = filter_status[j].value;
     }
   }

   for (var k = 0; k < filter_delivery.length; k++) {
     if (filter_delivery[k].checked) {
         // Output the selected value
         var delivery =  filter_delivery[k].value;
     }
   }

   if(price == 0)
   price_statement = "";
   else if(price == 1)
   price_statement = " (`price` > 100 and `price` < '999') and ";
   else if(price == 2)
   price_statement = " (`price` > 1000 and `price` < '9999') and ";
   else if(price == 3) 
   price_statement = " (`price` >= 10000 and `price` <= '99999') and ";
   else if(price == 4) 
   price_statement = " (`price` >= 100000) and ";

   //alert(price_statement);
     
     
   if(status == 0)
   status_statement = ""
   else if(status == 1)
   status_statement = " (`status` = 1) and ";
   else if(status == 2)
   status_statement = " (`status` = 2) and ";
   else if(status == 3) 
   status_statement = " (`status` = 3) and "; 
   else
   status_statement = "";

   if(delivery == 0)
   delivery_statement = ""
   else if(delivery == 1)
   delivery_statement = " (`deliver` = 'yes') and ";
   else if(delivery == 2)
   delivery_statement = " (`deliver` = 'no') and ";
   else
   delivery_statement = "";

   sort ='';

   $.ajax({
     type: 'POST',
     url: 'includes/ajax_handlers/loadBoladas_handler.php',
     data: {
         price : price_statement,
         status : status_statement,
         deliver : delivery_statement,
         sort : sort_statement,
         userloggedin : userlogged1
     },
     success: function(response) {  

       if(response != 'noposts')
       {
         loader.style.visibility = 'hidden';
         document.getElementById('container_results_b').innerHTML = response;
         document.getElementById('loadmore_b').style.visibility = 'visible';
         document.getElementById('loadmore_b').disabled = false;
         //var num_results = document.getElementById("num_id").value;
         //document.getElementById("num_results").value = Number(num_results);
       }
       else
       {
         document.getElementById('container_results_b').innerHTML = '<div class="container_default_view" id="container_no_item_b"><img rel="preload" src="resources/img/info/search.svg" alt="no item found"><h4>Nenhum item encontrado</h4></div>';
         loader.style.visibility = 'hidden';  
         document.getElementById('loadmore_b').style.visibility = 'hidden';
        

       }

     }

     

   });

 }

 function loadBoladasMobile(sort)
 {
   var loader = document.getElementById('loader_overlay');
   var noposts = document.getElementById('container_no_item');
   var filter_price = document.getElementsByName('radio_price1_b');
   var filter_status = document.getElementsByName('radio_status1_b');
   var filter_delivery = document.getElementsByName('radio_delivery1_b');
   //var val = document.getElementById("num_results").value = Number(num_results);
   var userlogged1 = document.getElementById("logged_user").value;
   var price_statement = "";
   var status_statement = "";
   var delivery_statement = "";


   sort_values = sort;

   if(sort_values == 'atoz')
   sort_statement = "order by name asc";
   else if(sort_values == 'ztoa')
   sort_statement = "order by name desc";
   else if(sort_values == 'lowtohigh')
   sort_statement = "order by price asc";
   else if(sort_values == 'hightolow')
   sort_statement = "order by price desc";
   else if(sort_values == 'newest')
   sort_statement = "order by date_added desc";
   else if(sort_values == 'oldest')
   sort_statement = "order by date_added asc";
   else if(sort_values == 'mostpopular')
   sort_statement = "order by clicks_num desc";
   else if(sort_values == 'leastpopular')
   sort_statement = "order by clicks_num asc";
   else
   sort_statement = "";

   loader.style.visibility = 'visible';
   document.getElementById('nomoreposts_b').innerHTML = '';

   //noposts.style.display = 'none';
   //$('#container_no_item').style('display' = 'none');

  
   for (var i = 0; i < filter_price.length; i++) {
     if (filter_price[i].checked) {
         // Output the selected value
          var price = filter_price[i].value;
     }
   }
   
   for (var j = 0; j < filter_status.length; j++) {
     if (filter_status[j].checked) {
         // Output the selected value
          var status = filter_status[j].value;
     }
   }

   for (var k = 0; k < filter_delivery.length; k++) {
     if (filter_delivery[k].checked) {
         // Output the selected value
         var delivery =  filter_delivery[k].value;
     }
   }

   if(price == 0)
   price_statement = "";
   else if(price == 1)
   price_statement = " (`price` > 100 and `price` < '999') and ";
   else if(price == 2)
   price_statement = " (`price` > 1000 and `price` < '9999') and ";
   else if(price == 3) 
   price_statement = " (`price` >= 10000 and `price` <= '99999') and ";
   else if(price == 4) 
   price_statement = " (`price` >= 100000) and ";

   //alert(price_statement);
     
     
   if(status == 0)
   status_statement = ""
   else if(status == 1)
   status_statement = " (`status` = 1) and ";
   else if(status == 2)
   status_statement = " (`status` = 2) and ";
   else if(status == 3) 
   status_statement = " (`status` = 3) and "; 
   else
   status_statement = "";

   if(delivery == 0)
   delivery_statement = ""
   else if(delivery == 1)
   delivery_statement = " (`deliver` = 'yes') and ";
   else if(delivery == 2)
   delivery_statement = " (`deliver` = 'no') and ";
   else
   delivery_statement = "";

   sort ='';

   $.ajax({
     type: 'POST',
     url: 'includes/ajax_handlers/loadBoladas_handler.php',
     data: {
         price : price_statement,
         status : status_statement,
         deliver : delivery_statement,
         sort : sort_statement,
         userloggedin : userlogged1
     },
     success: function(response) {  

       if(response != 'noposts')
       {
         loader.style.visibility = 'hidden';
         document.getElementById('container_results_b').innerHTML = response;
         document.getElementById('loadmoreMobile_b').style.visibility = 'visible';
         document.getElementById('loadmoreMobile_b').disabled = false;
         //var num_results = document.getElementById("num_id").value;
         //document.getElementById("num_results").value = Number(num_results);
       }
       else
       {
         document.getElementById('container_results_b').innerHTML = '<div class="container_default_view" id="container_no_item"><img rel="preload" src="resources/img/info/search.svg" alt="no item found"><h4>Nenhum item encontrado</h4></div>';
         loader.style.visibility = 'hidden';  
         document.getElementById('loadmoreMobile_b').style.visibility = 'hidden';
        

       }

     }

     

   });


 }

 function loadBoladasMore(sort)
  {
    var loader = document.getElementById('loader_overlay');
    var noposts = document.getElementById('container_no_item');
    var filter_price = document.getElementsByName('radio_price_b');
    var filter_status = document.getElementsByName('radio_status_b');
    var filter_delivery = document.getElementsByName('radio_delivery_b');
    var num_results = document.getElementById("num_id_b").value;
    var userlogged1 = document.getElementById("logged_user").value;
    var price_statement = "";
    var status_statement = "";
    var delivery_statement = "";
    var sort_statement = "";

    num_results = Number(num_results);
    //alert(num_results);

    document.getElementById('loadmore_b').disabled = false;
    document.getElementById('nomoreposts_b').innerHTML = '';
    
    loader.style.visibility = 'visible';

    if(sort_values == 'atoz')
    sort_statement = "order by name asc";
    else if(sort_values == 'ztoa')
    sort_statement = "order by name desc";
    else if(sort_values == 'lowtohigh')
    sort_statement = "order by price asc";
    else if(sort_values == 'hightolow')
    sort_statement = "order by price desc";
    else if(sort_values == 'newest')
    sort_statement = "order by date_added desc";
    else if(sort_values == 'oldest')
    sort_statement = "order by date_added asc";
    else if(sort_values == 'mostpopular')
    sort_statement = "order by clicks_num desc";
    else if(sort_values == 'leastpopular')
    sort_statement = "order by clicks_num asc";
    else
    sort_statement = "";

    
    for (var i = 0; i < filter_price.length; i++) {
      if (filter_price[i].checked) {
          // Output the selected value
          var price = filter_price[i].value;
      }
    }

    for (var j = 0; j < filter_status.length; j++) {
      if (filter_status[j].checked) {
          // Output the selected value
          var status = filter_status[j].value;
      }
    }

    for (var k = 0; k < filter_delivery.length; k++) {
      if (filter_delivery[k].checked) {
          // Output the selected value
          var delivery =  filter_delivery[k].value;
      }
    }

    if(price == 0)
    price_statement = "";
    else if(price == 1)
    price_statement = " (`price` > 100 and `price` < '999') and ";
    else if(price == 2)
    price_statement = " (`price` > 1000 and `price` < '9999') and ";
    else if(price == 3) 
    price_statement = " (`price` >= 10000 and `price` <= '99999') and ";
    else if(price == 4) 
    price_statement = " (`price` >= 100000) and ";
    else
    price_statement = "";    
    
      
    if(status == 0)
    status_statement = ""
    else if(status == 1)
    status_statement = " (`status` = 1) and ";
    else if(status == 2)
    status_statement = " (`status` = 2) and ";
    else if(status == 3) 
    status_statement = " (`status` = 3) and "; 
    else
    status_statement = "";

    if(delivery == 0)
    delivery_statement = ""
    else if(delivery == 1)
    delivery_statement = " (`deliver` = 'yes') and ";
    else if(delivery == 2)
    delivery_statement = " (`deliver` = 'no') and ";
    else
    delivery_statement = "";


    $.ajax({
      type: 'POST',
      url: 'includes/ajax_handlers/loadBoladasMore.php',
      data: {
          price : price_statement,
          status : status_statement,
          deliver : delivery_statement,
          position : num_results,
          sort : sort_statement,
          userloggedin : userlogged1
      },
      success: function(response) {  

        if(response != 'noposts')
        {
          loader.style.visibility = 'hidden';          
          $('#container_results_b').append(response);

          document.getElementById('loadmore_b').style.visibility = 'visible';
          //var num_results = document.getElementById("results_number").value;         
        }
        else
        {
          document.getElementById('nomoreposts_b').innerHTML = 'sem mais resultados!'
          // document.getElementById('container_results').innerHTML = '<div class="container_default_view" id="container_no_item"><img rel="preload" src="resources/img/info/search.svg" alt="no item found"><h4>Nenhum item encontrado</h4></div>';
          loader.style.visibility = 'hidden';  
          document.getElementById('loadmore_b').disabled = true;
          

        }

      }

    });

 }

 function loadBoladasMoreMobile(sort)
  {
    var loader = document.getElementById('loader_overlay');
    var noposts = document.getElementById('container_no_item');
    var filter_price = document.getElementsByName('radio_price1_b');
    var filter_status = document.getElementsByName('radio_status1_b');
    var filter_delivery = document.getElementsByName('radio_delivery1_b');
    var num_results = document.getElementById("num_id_b").value;
    var userlogged1 = document.getElementById("logged_user").value;
    var price_statement = "";
    var status_statement = "";
    var delivery_statement = "";
    var sort_statement = "";

    num_results = Number(num_results);
    //alert(num_results);

    document.getElementById('loadmoreMobile_b').disabled = false;
    document.getElementById('nomoreposts_b').innerHTML = '';
   
    loader.style.visibility = 'visible';

    if(sort_values == 'atoz')
    sort_statement = "order by name asc";
    else if(sort_values == 'ztoa')
    sort_statement = "order by name desc";
    else if(sort_values == 'lowtohigh')
    sort_statement = "order by price asc";
    else if(sort_values == 'hightolow')
    sort_statement = "order by price desc";
    else if(sort_values == 'newest')
    sort_statement = "order by date_added desc";
    else if(sort_values == 'oldest')
    sort_statement = "order by date_added asc";
    else if(sort_values == 'mostpopular')
    sort_statement = "order by clicks_num desc";
    else if(sort_values == 'leastpopular')
    sort_statement = "order by clicks_num asc";
    else
    sort_statement = "";

   
    for (var i = 0; i < filter_price.length; i++) {
      if (filter_price[i].checked) {
          // Output the selected value
          var price = filter_price[i].value;
      }
    }

    for (var j = 0; j < filter_status.length; j++) {
      if (filter_status[j].checked) {
          // Output the selected value
          var status = filter_status[j].value;
      }
    }

    for (var k = 0; k < filter_delivery.length; k++) {
      if (filter_delivery[k].checked) {
          // Output the selected value
         var delivery =  filter_delivery[k].value;
      }
    }

    if(price == 0)
    price_statement = "";
    else if(price == 1)
    price_statement = " (`price` > 100 and `price` < '999') and ";
    else if(price == 2)
    price_statement = " (`price` > 1000 and `price` < '9999') and ";
    else if(price == 3) 
    price_statement = " (`price` >= 10000 and `price` <= '99999') and ";
    else if(price == 4) 
    price_statement = " (`price` >= 100000) and ";
    else
    price_statement = "";    
    
      
    if(status == 0)
    status_statement = ""
    else if(status == 1)
    status_statement = " (`status` = 1) and ";
    else if(status == 2)
    status_statement = " (`status` = 2) and ";
    else if(status == 3) 
    status_statement = " (`status` = 3) and "; 
    else
    status_statement = "";

    if(delivery == 0)
    delivery_statement = ""
    else if(delivery == 1)
    delivery_statement = " (`deliver` = 'yes') and ";
    else if(delivery == 2)
    delivery_statement = " (`deliver` = 'no') and ";
    else
    delivery_statement = "";


    $.ajax({
      type: 'POST',
      url: 'includes/ajax_handlers/loadBoladasMore.php',
      data: {
          price : price_statement,
          status : status_statement,
          deliver : delivery_statement,
          position : num_results,
          sort : sort_statement,
          userloggedin : userlogged1
      },
      success: function(response) {  

        if(response != 'noposts')
        {
          loader.style.visibility = 'hidden';          
          $('#container_results_b').append(response);

          document.getElementById('loadmoreMobile_b').style.visibility = 'visible';
          //var num_results = document.getElementById("results_number").value;         
        }
        else
        {
          document.getElementById('nomoreposts_b').innerHTML = 'sem mais resultados!'
         // document.getElementById('container_results').innerHTML = '<div class="container_default_view" id="container_no_item"><img rel="preload" src="resources/img/info/search.svg" alt="no item found"><h4>Nenhum item encontrado</h4></div>';
          loader.style.visibility = 'hidden';  
          document.getElementById('loadmoreMobile_b').disabled = true;
         

        }

      }

    });
 
 }

 function savePost_b(post_id,saved_num) 
 {
   var userlogged1 = document.getElementById("logged_user").value;
   var save_btn = document.getElementById('btn_save_post_b'+post_id);

   save_btn.innerHTML = '<img rel="preload" class="spinner" src="resources/img/icons/spinner.svg" alt="spinner">';

   $.ajax({
     type: 'POST',
     url: 'includes/ajax_handlers/savePostBoladas.php',
     data: {
        
         userloggedin : userlogged1,
         post_id : post_id,
         saved_num : saved_num
     },
     success: function(response) { 

       if(response == 'saved')
       {
         save_btn.innerHTML = 'Salvo';
         save_btn.disabled = true;
       }
       else
       {
         save_btn.innerHTML = 'Erro!';
         setTimeout(function() {
           save_btn.innerHTML = 'Guardar!';
           save_btn.disabled = false;

         }, 2000);
       }

     }
   });



 }

 function loadBoladasDescription(post_id){

  var descriptionOverlay = document.getElementById('description_overlay');
  var userlogged1 = document.getElementById("logged_user").value;
  descriptionOverlay.style.display = "flex";
  descriptionOverlay.style.visibility = 'visible';

  $.ajax({
    type: 'POST',
    url: 'includes/ajax_handlers/boladasDescription.php',
    data: {
       
        userloggedin : userlogged1,
        post_id : post_id
    },
    success: function(response) { 

      if(response == 'Erro')
      {
        
      }
      else
      {
        document.getElementById('description_content').style.display = "block";
        document.getElementById('description_content').innerHTML = response;
        imgPopup1();
      }

    }
  });

 }
 
 function imgPopup1()
 {
   var imgPopup = document.getElementById('img1');
   var imgPopup2 = document.getElementById('img2');
   var imgPopup3 = document.getElementById('img3');

   imgPopup.classList.toggle("img_popup");

    if(imgPopup2.className.match("img_popup"))
    imgPopup2.classList.remove("img_popup");

    if(imgPopup3.className.match("img_popup"))
    imgPopup3.classList.remove("img_popup");

   
 }

 function imgPopup2()
 {
   var imgPopup = document.getElementById('img2');
   var imgPopup2 = document.getElementById('img3');
   var imgPopup3 = document.getElementById('img1');

   imgPopup.classList.toggle("img_popup");


    if(imgPopup2.className.match("img_popup"))
    imgPopup2.classList.remove("img_popup");

    if(imgPopup3.className.match("img_popup"))
    imgPopup3.classList.remove("img_popup");

   
 } 
 
 function imgPopup3()
 {
   var imgPopup = document.getElementById('img3');
   var imgPopup2 = document.getElementById('img2');
   var imgPopup3 = document.getElementById('img1');

   imgPopup.classList.toggle("img_popup");


   if(imgPopup2.className.match("img_popup"))
    imgPopup2.classList.remove("img_popup");

    if(imgPopup3.className.match("img_popup"))
    imgPopup3.classList.remove("img_popup");
   
 }