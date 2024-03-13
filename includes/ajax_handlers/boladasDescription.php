<?php  
    require '../config/config.php'; 
    include '../classes/Main.php';

    $post_id = "";
    $results = "";
    $num_results = "";
    $name = "";
    $img_array = "";
    $price1 = "";
    $status1 = "";
    $location = "";
    $deliver1 = "";
    $expire_date = "";
    $saved_num = "";
    $clicks = "";
    $id = "";
    $post_img = "";
    $slider = "";
    $slide1 = "";
    $slide2 = "";
    $slide3 = "";
    $address = "";

    $user_functions = new User($con);
    $main_functions = new Main($con);
    $today = date("Y-m-d");

   

    $post_id = $_POST['post_id'];
    $userlogged = $_POST['userloggedin'];

    $query = mysqli_query($con, "SELECT * FROM `boladas` WHERE `id`='$post_id' and `deleted` = 'no' ");
    $row = mysqli_fetch_array($query);

    $name = isset($row['name']) ? $row['name'] : '';
    $uname = isset($row['uname']) ? $row['uname'] : '';
    $img_array = isset($row['img_array']) ? $row['img_array'] : '';
    $price1 = isset($row['price']) ? $row['price'] : '';
    $status1 = isset($row['status']) ? $row['status'] : '';
    $location = isset($row['location']) ? $row['location'] : '';
    $deliver1 = isset($row['deliver']) ? $row['deliver'] : '';
    $expire_date = isset($row['expire_date']) ? $row['expire_date'] : '';
    $date_added = isset($row['date_added']) ? $row['date_added'] : '';
    $clicks = isset($row['clicks_num']) ? $row['clicks_num'] : '';
    $saved_num = isset($row['saved_num']) ? $row['saved_num'] : '';
    $id = isset($row['id']) ? $row['id'] : '';

    $address =  $user_functions->getProvice($uname);
    $verified =  $user_functions->getVerified($uname);

    $img_array = explode(",", $img_array);

    if(array_key_exists(0, $img_array))
    {
        $img1 = str_replace("../../", "", $img_array[0]);
        $slide1 = '<div class="" id="img1" onclick="imgPopup1()" ><img rel="preload" src="'.$img1.'"  alt="prod img"> <button class="close_pop_img"><i class="material-icons">close</i> </button> </div>';
    }
    else
        $slide1 = "";
        
    if(array_key_exists(1, $img_array))
    {
        $img2 = str_replace("../../", "", $img_array[1]);
        $slide2 = '<div class="" id="img2" onclick="imgPopup2()"><img rel="preload" src="'.$img2.'"  alt="prod img" ><button class="close_pop_img"><i class="material-icons">close</i> </button> </div>';
    }
    else
        $slide2 = "";
        
    if(array_key_exists(2, $img_array))
    {
        $img3 = str_replace("../../", "", $img_array[2]);
        $slide3 = '<div class="" id="img3" onclick="imgPopup3()"><img rel="preload" src="'.$img3.'"  alt="prod img" > <button class="close_pop_img"><i class="material-icons">close</i> </button> </div>';
    }
    else
        $slide3 = "";


    if($address == 1)
    $address = "Maputo";
    elseif($address == 2)
    $address = "Gaza";
    elseif($address == 3)
    $address = "Inhambane";
    elseif($address == 4)
    $address = "Manica";
    elseif($address == 5)
    $address = "Sofala";
    elseif($address == 6)
    $address = "Tete";
    elseif($address == 7)
    $address = "Zambézia";
    elseif($address == 8)
    $address = "Nampula";
    elseif($address == 9)
    $address = "Cabo Delgado";
    elseif($address == 10)
    $address = "Niassa";

    if($location == 1)
    $location = "Maputo";
    elseif($location == 2)
    $location = "Gaza";
    elseif($location == 3)
    $location = "Inhambane";
    elseif($location == 4)
    $location = "Manica";
    elseif($location == 5)
    $location = "Sofala";
    elseif($location == 6)
    $location = "Tete";
    elseif($location == 7)
    $location = "Zambézia";
    elseif($location == 8)
    $location = "Nampula";
    elseif($location == 9)
    $location = "Cabo Delgado";
    elseif($location == 10)
    $location = "Niassa";

    if($verified == 'yes')
    $verified = '<i class="material-icons verified_icon right">verified</i>';
    elseif($verified == 'no')
    $verified = "";

    $saved_num = (int)$saved_num;
    $saved_btn = $main_functions->checkSavedBoladas($userlogged,$id);
    if($saved_btn == 0 && ($userlogged != ''))
    {
        $saved_btn ='
        <button class="btn btn_save_post" id="btn_save_post_b'.$id.'" onclick="savePost_b('.$id.','.$saved_num.')" >
            Guardar
        </button>
        ';
    }
    elseif($saved_btn == 1 && ($userlogged != ''))
    {
        $saved_btn ='
        <button class="btn btn_save_post disabled">
            Salvo
        </button>
        ';
    }
    elseif(($userlogged == ''))
    {
        $saved_btn ='
        <button class="btn btn_save_post disabled">
            Guardar
        </button>
        
        ';
    }

    if($status1 == 1)
    $status1 = '<a class="tooltipped" id="btn_blue" data-position="bottom" data-tooltip="Item não foi previamente usado"> <i class="material-icons ">thumb_up</i> Novo</a>';
    elseif($status1 == 2)
    $status1 = '<a class="tooltipped" id="btn_green" data-position="bottom" data-tooltip="Item foi previamente usado, mas esta em boas condições"><i class="material-icons">thumb_up</i> Usado</a>';
    elseif($status1 == 3)
    $status1 = '<a class="tooltipped" id="btn_orange" data-position="bottom" data-tooltip="Item foi previamente usado e tem alguns defeitos"><i class="material-icons ">thumb_up</i> Usado</a>'; 

    if($deliver1 == 'yes')
    $deliver1 = '<a class="tooltipped" id="btn_blue" data-position="bottom" data-tooltip="Vendedor faz entrega ou se encarrega do precesso de entrega"><i class="material-icons ">local_shipping</i>Faz entregas</a>';
    elseif($deliver1 == 'no')
    $deliver1 = '<a class="tooltipped" id="btn_orange" data-position="bottom" data-tooltip="Vendedor não faz entrega nem se encarrega do precesso de entrega"><i class="material-icons ">local_shipping</i>Não faz entregas</a>'; 


    $timer = ' 
        <div class="container_timer">
            <p><span style="font-size:80% !important;font-weight:500" id="'.$id.'">'.$date_added.'</span> 
            </p>
        </div>
    ';

    $post_extra =  '
    <div class="container_post_extra">
        '.$status1.'
        '.$deliver1.'
    </div>

    ';

    
    $post = '

        <div class="post_description_b">
            <div class="post_images_b">
                <div class="top_slider">
                    '.$slide1.$slide2. $slide3 . '
                </div>
            </div>

            <div class="post_details_b">

            </div>
        </div>
    
    ';

    echo $post;

?>