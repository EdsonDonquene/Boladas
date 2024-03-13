  //rapidas functions

  //handling posts
  function submitNewRapidas()
  {
    var submitBtn = document.getElementById('submit_btn');
    var modal = document.getElementById('modal_new_post');
    var loader = document.getElementById('loader_overlay');
    var success = document.getElementById('success_overlay');
    var loader_bg = document.getElementById('loader_bg');
    var item = document.getElementById('prod_name').value;
    var img_array = document.getElementById('prod_imgs');
    var price = document.getElementById('price').value;
    var location = document.getElementById('location').value;
    var delivery = document.getElementById('deliver').checked;
    var status = document.getElementById('status').value;
    var username = document.getElementById('userloggedin').value;
    var err_msg = document.getElementById('error_msg');
    var err_msg2 = document.getElementById('error_msg2');
    var prod_label = document.getElementById('img_prod_label').value;

    i = "";

    if(item == '' || price == '' || location == '' || status == '' || prod_label == '')
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

      var xhr = new XMLHttpRequest();
   
      xhr.open('POST', 'includes/ajax_handlers/rapidas_handler.php', true);

      xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            
          if(xhr.responseText == 'success')
          {
            loader.style.visibility = 'hidden';

            var item = document.getElementById('prod_name').value = "" ;
            var price = document.getElementById('price').value = "" ;
            var locations = document.getElementById('location').value = "" ;
            var delivery = document.getElementById('deliver').checked = false ;
            var status = document.getElementById('status').value = "" ;
            document.getElementById('img_prod_label').value = "";
            err_msg.innerHTML = '';

            instance.close();
            //modal_close.click();
            success.style.visibility = 'visible';

            setTimeout(function() {
              success.style.visibility = 'hidden';
            }, 2000); // 3000 milliseconds = 3 seconds

          // $('#modal_content').load(location.href + ' #modal_content>*');
            
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


  function submitNewAlugar()
  {
    var submitBtn = document.getElementById('submit_btn2');
    var modal = document.getElementById('modal_new_post');
    var loader = document.getElementById('loader_overlay');
    var success = document.getElementById('success_overlay');
    var loader_bg = document.getElementById('loader_bg');
    var item = document.getElementById('prod_name2').value;
    var description = document.getElementById('description2').value;
    var img_array = document.getElementById('prod_imgs2');
    var price = document.getElementById('price2').value;
    var location = document.getElementById('location2').value;
    var username = document.getElementById('userloggedin').value;
    var err_msg = document.getElementById('error_msg4');
    var err_msg2 = document.getElementById('error_msg5');
    var prod_label = document.getElementById('img_prod_label2').value;

    i = "";

    if(item == '' || price == '' || location == '' || prod_label == '' || description =='')
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
      formData.append('description', description);

      var xhr = new XMLHttpRequest();

     
     
      xhr.open('POST', 'includes/ajax_handlers/alugar_handler.php', true);

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
          else
          alert(xhr.responseText);

        }
      };

      xhr.send(formData);
    }
    
  }

  function submitNewDesapego()
  {
    var submitBtn = document.getElementById('submit_btn3');
    var modal = document.getElementById('modal_new_post');
    var loader = document.getElementById('loader_overlay');
    var success = document.getElementById('success_overlay');
    var loader_bg = document.getElementById('loader_bg');
    var item = document.getElementById('prod_name3').value;
    var description = document.getElementById('description3').value;
    var img_array = document.getElementById('prod_imgs3');
    var price = document.getElementById('price3').value;
    var use_time = document.getElementById('use_time3').value;
    var location = document.getElementById('location3').value;
    var delivery = document.getElementById('deliver3').checked;
    var negotiable = document.getElementById('negotiable3').checked;
    var status = document.getElementById('status3').value;
    var username = document.getElementById('userloggedin').value;
    var err_msg = document.getElementById('error_msg6');
    var err_msg2 = document.getElementById('error_msg7');
    var prod_label = document.getElementById('img_prod_label3').value;

    i = "";

    if(item == '' || price == '' || location == '' || status == '' || prod_label == '' || use_time == '' || description == '')
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
        
      if(negotiable == true)
      negotiable = 'yes';
      else
      negotiable = 'no';

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
      formData.append('use_time', use_time);
      formData.append('location', location);
      formData.append('delivery', delivery);
      formData.append('negotiable', negotiable);
      formData.append('status', status);
      formData.append('description', description);

      var xhr = new XMLHttpRequest();

     
     
      xhr.open('POST', 'includes/ajax_handlers/desapego_handler.php', true);

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

  function loadPosts(sort)
  {
    var loader = document.getElementById('loader_overlay');
    var noposts = document.getElementById('container_no_item');
    var filter_price = document.getElementsByName('radio_price');
    var filter_status = document.getElementsByName('radio_status');
    var filter_delivery = document.getElementsByName('radio_delivery');
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
    document.getElementById('nomoreposts').innerHTML = '';

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
      url: 'includes/ajax_handlers/loadRapidas_handler.php',
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
          document.getElementById('container_results').innerHTML = response;
          document.getElementById('loadmore').style.visibility = 'visible';
          document.getElementById('loadmore').disabled = false;
          //var num_results = document.getElementById("num_id").value;
          //document.getElementById("num_results").value = Number(num_results);
        }
        else
        {
          document.getElementById('container_results').innerHTML = '<div class="container_default_view" id="container_no_item"><img rel="preload" src="resources/img/info/search.svg" alt="no item found"><h4>Nenhum item encontrado</h4></div>';
          loader.style.visibility = 'hidden';  
          document.getElementById('loadmore').style.visibility = 'hidden';
         

        }

      }

      

    });
  

    

 
  }

  function loadPostsMobile(sort)
  {
    var loader = document.getElementById('loader_overlay');
    var noposts = document.getElementById('container_no_item');
    var filter_price = document.getElementsByName('radio_price1');
    var filter_status = document.getElementsByName('radio_status1');
    var filter_delivery = document.getElementsByName('radio_delivery1');
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
    document.getElementById('nomoreposts').innerHTML = '';

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
      url: 'includes/ajax_handlers/loadRapidas_handler.php',
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
          document.getElementById('container_results').innerHTML = response;
          document.getElementById('loadmoreMobile').style.visibility = 'visible';
          document.getElementById('loadmoreMobile').disabled = false;
          //var num_results = document.getElementById("num_id").value;
          //document.getElementById("num_results").value = Number(num_results);
        }
        else
        {
          document.getElementById('container_results').innerHTML = '<div class="container_default_view" id="container_no_item"><img rel="preload" src="resources/img/info/search.svg" alt="no item found"><h4>Nenhum item encontrado</h4></div>';
          loader.style.visibility = 'hidden';  
          document.getElementById('loadmoreMobile').style.visibility = 'hidden';
         

        }

      }

      

    });

 
  }

  function loadPostsMore(sort)
  {
    var loader = document.getElementById('loader_overlay');
    var noposts = document.getElementById('container_no_item');
    var filter_price = document.getElementsByName('radio_price');
    var filter_status = document.getElementsByName('radio_status');
    var filter_delivery = document.getElementsByName('radio_delivery');
    var num_results = document.getElementById("num_id").value;
    var userlogged1 = document.getElementById("logged_user").value;
    var price_statement = "";
    var status_statement = "";
    var delivery_statement = "";
    var sort_statement = "";

    num_results = Number(num_results);
    //alert(num_results);

    document.getElementById('loadmore').disabled = false;
    document.getElementById('nomoreposts').innerHTML = '';
   
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
      url: 'includes/ajax_handlers/loadRapidasMore.php',
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
          $('#container_results').append(response);

          document.getElementById('loadmore').style.visibility = 'visible';
          var num_results = document.getElementById("results_number").value;         
        }
        else
        {
          document.getElementById('nomoreposts').innerHTML = 'sem mais resultados!'
         // document.getElementById('container_results').innerHTML = '<div class="container_default_view" id="container_no_item"><img rel="preload" src="resources/img/info/search.svg" alt="no item found"><h4>Nenhum item encontrado</h4></div>';
          loader.style.visibility = 'hidden';  
          document.getElementById('loadmore').disabled = true;
         

        }

      }

    });
 
  }

  function loadPostsMoreMobile(sort)
  {
    var loader = document.getElementById('loader_overlay');
    var noposts = document.getElementById('container_no_item');
    var filter_price = document.getElementsByName('radio_price1');
    var filter_status = document.getElementsByName('radio_status1');
    var filter_delivery = document.getElementsByName('radio_delivery1');
    var num_results = document.getElementById("num_id").value;
    var userlogged1 = document.getElementById("logged_user").value;
    var price_statement = "";
    var status_statement = "";
    var delivery_statement = "";
    var sort_statement = "";

    num_results = Number(num_results);
    //alert(num_results);

    document.getElementById('loadmoreMobile').disabled = false;
    document.getElementById('nomoreposts').innerHTML = '';
   
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
      url: 'includes/ajax_handlers/loadRapidasMore.php',
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
          $('#container_results').append(response);

          document.getElementById('loadmoreMobile').style.visibility = 'visible';
          var num_results = document.getElementById("results_number").value;         
        }
        else
        {
          document.getElementById('nomoreposts').innerHTML = 'sem mais resultados!'
         // document.getElementById('container_results').innerHTML = '<div class="container_default_view" id="container_no_item"><img rel="preload" src="resources/img/info/search.svg" alt="no item found"><h4>Nenhum item encontrado</h4></div>';
          loader.style.visibility = 'hidden';  
          document.getElementById('loadmoreMobile').disabled = true;
         

        }

      }

    });
 
  }

  function savePost(post_id,saved_num) 
  {
    var userlogged1 = document.getElementById("logged_user").value;
    var save_btn = document.getElementById('btn_save_post'+post_id);

    save_btn.innerHTML = '<img rel="preload" class="spinner" src="resources/img/icons/spinner.svg" alt="spinner">';

    $.ajax({
      type: 'POST',
      url: 'includes/ajax_handlers/savePostRapidas.php',
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