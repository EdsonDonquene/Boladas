<?php
require_once "User.php";



class Main
{

    private $con;

    public function __construct($con)
    {
        $this->con = $con;
        

    }

    public function checkSavedRapidas($userlogged,$id)
    {
        $query = mysqli_query($this->con, "SELECT * FROM `colecao_rapidas` WHERE `prod_id`='$id' AND `user_acc`='$userlogged' AND `deleted`='no' ");
        $num_results = mysqli_num_rows($query);
            
        return $num_results;
    }
    public function checkSavedBoladas($userlogged,$id)
    {
        $query = mysqli_query($this->con, "SELECT * FROM `colecao_boladas` WHERE `prod_id`='$id' AND `user_acc`='$userlogged' AND `deleted`='no' ");
        $num_results = mysqli_num_rows($query);
            
        return $num_results;
    }

    public function dateToPortugueseText($dateString) {
        // Set the default timezone
        date_default_timezone_set('Africa/Maputo');
    
        // Map of month names in Portuguese
        $monthNames = [
            '01' => 'janeiro',
            '02' => 'fevereiro',
            '03' => 'março',
            '04' => 'abril',
            '05' => 'maio',
            '06' => 'junho',
            '07' => 'julho',
            '08' => 'agosto',
            '09' => 'setembro',
            '10' => 'outubro',
            '11' => 'novembro',
            '12' => 'dezembro'
        ];
    
        // Map of day names in Portuguese
        $dayNames = [
            'Sunday' => 'domingo',
            'Monday' => 'segunda-feira',
            'Tuesday' => 'terça-feira',
            'Wednesday' => 'quarta-feira',
            'Thursday' => 'quinta-feira',
            'Friday' => 'sexta-feira',
            'Saturday' => 'sábado'
        ];
    
        // Get components of the date
        $year = date('Y', strtotime($dateString));
        $month = date('m', strtotime($dateString));
        $day = date('d', strtotime($dateString));
        $dayOfWeek = date('l', strtotime($dateString));
    
        // Convert the date to Portuguese text
        $portugueseDate = $day . ' de ' . $monthNames[$month] . ' de ' . $year;
    
        return $portugueseDate;
    }

    public function checkSavedAlugar($userlogged,$id)
    {
        $query = mysqli_query($this->con, "SELECT * FROM `colecao_alugar` WHERE `prod_id`='$id' AND `user_acc`='$userlogged' AND `deleted`='no' ");
        $num_results = mysqli_num_rows($query);
            
        return $num_results;
    }
    public function checkSaveddesapego($userlogged,$id)
    {
        $query = mysqli_query($this->con, "SELECT * FROM `colecao_desapego` WHERE `prod_id`='$id' AND `user_acc`='$userlogged' AND `deleted`='no' ");
        $num_results = mysqli_num_rows($query);
            
        return $num_results;
    }

    public function LoadRapidas($userlogged,$price,$status,$deliver,$position,$num_posts, $sort)
    {
        
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

        $fullname = "";
        $icon = "";
        $address = "";
        $verified = "";
        $isSeller = "";
        $num_posts_rapidas = "";
        $num_clicks = "";
        $phone1 = "";
        $phone2 = "";
        $email = "";
        $whatsapp = "";
        $instagram = "";
        $facebook = ""; 
        $linkedin = ""; 
        $website = "";
        $delete_btn = "";
        $saved_btn = "";
        $main_content = "";
        $timer = "";
        $time_message = "";
        $results_number = "";
        $call_phone = "";

        $user_functions = new User($this->con);
        $today = date("Y-m-d");

        $rapidas_query = mysqli_query($this->con, "SELECT * FROM `rapidas` WHERE $price $status $deliver `deleted`='no' AND (`expire_date`>='$today') $sort LIMIT $position,$num_posts");

        $results_number = mysqli_num_rows($rapidas_query);

        $results_number =  (int)$results_number + (int)$position;

        if($num_results = mysqli_num_rows($rapidas_query) != 0)
        {
            while($results = mysqli_fetch_array($rapidas_query))
            {
                $name = isset($results['name']) ? $results['name'] : '';
                $uname = isset($results['uname']) ? $results['uname'] : '';
                $img_array = isset($results['img_array']) ? $results['img_array'] : '';
                $price1 = isset($results['price']) ? $results['price'] : '';
                $status1 = isset($results['status']) ? $results['status'] : '';
                $location = isset($results['location']) ? $results['location'] : '';
                $deliver1 = isset($results['deliver']) ? $results['deliver'] : '';
                $expire_date = isset($results['expire_date']) ? $results['expire_date'] : '';
                $date_added = isset($results['date_added']) ? $results['date_added'] : '';
                $clicks = isset($results['clicks_num']) ? $results['clicks_num'] : '';
                $saved_num = isset($results['saved_num']) ? $results['saved_num'] : '';
                $id = isset($results['id']) ? $results['id'] : '';
     
                $date_time_now = date("Y-m-d");
                $start_date = new DateTime($expire_date); //time of post
                $end_date = new DateTime($today); //current time
                $interval = $start_date->diff($end_date); //difference between dates  
    
                if ($interval->y >= 1) {
                    if ($interval === 1) {
                        $time_message = $interval->y . " ano "; //one year ago
                    } else {
                        $time_message = $interval->y . " anos "; //years ago
                    }
                } else if ($interval->m >= 1) {
                    if ($interval->d == 0) {
                        $days = " ";
                    } else if ($interval->d == 1) {
                        $days = $interval->d . " dia ";
                    } else {
                        $days = $interval->d . " dias ";
                    }
    
                    if ($interval->m == 1) {
                        $time_message = $interval->m . " mes " . $days;
                    } else {
                        $time_message = $interval->m . " meses " . $days;
                    }
                } else if ($interval->d >= 1) {
                    if ($interval->d == 1) {
                        $time_message = " Amanhã";
                    } else {
                        $time_message = $interval->d . " dias ";
                    }
                } else if ($interval->h >= 1) {
                    if ($interval->d == 1) {
                        $time_message = $interval->h . " hora ";
                    } else {
                        $time_message = $interval->h . " horas ";
                    }
                } else if ($interval->i >= 1) {
                    if ($interval->i == 1) {
                        $time_message = $interval->i . " minuto ";
                    } else {
                        $time_message = $interval->i . " minutos ";
                    }
                } else {
                    if ($interval->s < 30) {
                        $time_message = "Hoje!";
                    } else {
                        $time_message = $interval->s . " segundos ";
                    }
                }


               

                $fullname = $user_functions->getFullname($uname);
                $icon =  $user_functions->getIcon($uname);
                $address =  $user_functions->getProvice($uname);
                $verified =  $user_functions->getVerified($uname);
                $isSeller =  $user_functions->getIsSeller($uname);
                $num_posts_rapidas =  $user_functions->getNumPostsRapidas($uname);
                $num_clicks =  $user_functions->getClicksRapidas($uname);

                $phone1 =  $user_functions->getphone1($uname);
                $call_phone = $phone1;
                if($phone1!=0)
                    $phone1 = '<p style="font-size:95%; color: #071e33;" ><i class="material-icons left">call</i>'.$phone1.'</p>';
                else
                    $phone1 =  '';

                $phone2 =  $user_functions->getphone2($uname);
                if($phone2!=0)
                    $phone2 = '<p style="font-size:95%; color: #071e33;" ><i class="material-icons left">call</i>'.$phone2.'</p>';
                else
                    $phone2 =  '';


                $email =  $user_functions->getEmail($uname);
                if($email!='')
                $email = '<p style="font-size:95%; color: #071e33;" ><i class="material-icons left">mail</i>'.$email.'</p>';
                else
                $email =  '';

                $whatsapp =  $user_functions->getWhatsapp($uname);
                if($whatsapp!=0)
                $whatsapp = '<p style="font-size:95%; color: #071e33;" ><ion-icon name="logo-whatsapp" class="left"></ion-icon>'.$whatsapp.'</p>';
                else
                $whatsapp =  '';

                $instagram =  $user_functions->getInstagram($uname);
                if($instagram!='')
                $instagram = '<p style="font-size:95%; color: #071e33;" ><ion-icon name="logo-instagram" class="left"></ion-icon>'.$instagram.'</p>';
                else
                $instagram =  '';
                

                $facebook =  $user_functions->getFacebook($uname); 
                if($facebook!='')
                $facebook = '<p style="font-size:95%; color: #071e33;" ><ion-icon name="logo-facebook" class="left"></ion-icon>'.$facebook.'</p>';
                else
                $facebook =  '';

                $linkedin =  $user_functions->getLinkedin($uname);
                if($linkedin!='')
                $linkedin = '<p style="font-size:95%; color: #071e33;" ><ion-icon name="logo-linkedin" class="left"></ion-icon>'.$linkedin.'</p>';
                else
                $linkedin =  '';

                $website =  $user_functions->getWebsite($uname);
                if($website!='')
                $website = '<p style="font-size:95%; color: #071e33;" ><ion-icon name="globe-outline" class="left"></ion-icon>'.$website.'</p>';
                else
                $website =  '';

                $img_array = explode(",", $img_array);

                if(array_key_exists(0, $img_array))
                {
                    $img1 = str_replace("../../", "", $img_array[0]);
                    $slide1 = '<img rel="preload" src="'.$img1.'"  alt="prod img" >';
                }
                else
                    $slide1 = "";
                    
                if(array_key_exists(1, $img_array))
                {
                    $img2 = str_replace("../../", "", $img_array[1]);
                    $slide2 = '<img rel="preload" src="'.$img2.'"  alt="prod img" >';
                }
                else
                    $slide2 = "";
                    
                if(array_key_exists(2, $img_array))
                {
                    $img3 = str_replace("../../", "", $img_array[2]);
                    $slide3 = '<img rel="preload" src="'.$img3.'"  alt="prod img" >';
                }
                else
                    $slide3 = "";
                    

                $array_length = count(array_unique(array_keys($img_array))) - 1;

                $slider = rand(0,$array_length);
                if($slider == 0)
                $slider = $slide1;
                elseif($slider == 1)
                $slider = $slide2;
                elseif($slider == 2)
                $slider = $slide3;

                if($isSeller == 'yes')
                $isSeller = "vendedor";
                elseif($isSeller == 'no')
                $isSeller = "Usuário";

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
                $saved_btn = $this->checkSavedRapidas($userlogged,$id);
                if($saved_btn == 0 && ($userlogged != ''))
                {
                    $saved_btn ='
                    <button class="btn btn_save_post" id="btn_save_post'.$id.'" onclick="savePost('.$id.','.$saved_num.')" >
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
                        <p>Expira em: <span id="'.$id.'">'.$time_message.'</span> 
                        </p>
                    </div>
                ';

                $post_extra =  '
                <div class="container_post_extra">
                    '.$status1.'
                    '.$deliver1.'
                </div>

                ';
           
                $reveal = 
                '
                    <div class="container_post_options">
        
                        <div class="container_user_info">
                            <div class="user_profile">
                             
                            </div>
                            <div class="user_contacts">
                                <p style="font-size:110%;margin-bottom:20px;font-weight:400" class="left">Contactos</p>
                                '.$phone1.$phone2.$whatsapp.' 
                            </div>
                        </div>
                      
                    </div>
    
                ';

                $main_content = '

                <div class="post_main_content">
                    <div class="row">
                        <h5>'.$price1.' <span>,00Mts</span></h5>
                        <input type="hidden" id="prod_id'.$id.'" value='.$id.'>
                    </div>
                    <div class="row">
                        <p class="location">'.$location.'</p>
                    </div>
                    <div class="row">
                        <h6>'.$name.'</h6>
                    </div>
                    <div class="row">
                        '.$post_extra.'
                    </div>
                    '.$timer.'
                    
                    
                </div>

                ';
                              
                $single_post = '
                <div class="single_post">
                    <script>
                        var num_id = document.getElementById("num_id").value = '.$results_number.';
                    </script>
                    <div class="row row_single_post">
                        <div class="card single_post_card">
                            <div class="card-image post_card_img">
                                <div class="img_container">
                                    '. $slider .'
                                </div>
                                <a class="btn-floating btn_call_card btn halfway-fab waves-effect waves-light"  href="tel:'.$call_phone.'"><i class="material-icons">call</i></a>
                            </div>
                            <div class="card-content">
                                <div>
                                    '.$main_content.'
                                </div>
                                <div class="post_btns">
                                    <button class="btn btn_know_more activator">
                                        Saiba mais
                                    </button>
                                    '.$saved_btn.'                                    
                                </div>
                            </div>
                            <div class="card-reveal post_reveal">
                                <span>
                                    <i class="card-title material-icons ">close</i>
                                </span>

                                <div class="container_reveal_options">
                                    '.$reveal.'
                                </div>
                                
                            </div>
                        </div>
                    </div>

                    <input type="hidden" id="num_id" value="'.$results_number.'">
                  

                </div>
                ';
               

                echo $single_post;
            }
            
             
        }
        else
        {
            echo "noposts";
        }
    }

    public function savePostsRapidas($userlogged,$post_id,$saved_num)
    {
        $post_data = mysqli_query($this->con, "SELECT * FROM `rapidas` WHERE `id`='$post_id' and `deleted`='no' ");

        $data = mysqli_fetch_array($post_data);
        $post_uname = isset($data['uname']) ? $data['uname'] : '';

        $date_added = date("Y-m-d");
        $deleted = 'no';

        if($saved_query = mysqli_query($this->con, "INSERT INTO `colecao_rapidas`(`id`, `prod_id`, `prod_seller`, `user_acc`, `date_added`, `deleted`) VALUES (NULL, '$post_id','$post_uname','$userlogged','$date_added','$deleted')"))
        {
            $saved_num = $saved_num + 1;
            if($update_post = mysqli_query($this->con, "UPDATE `rapidas` SET `saved_num`='$saved_num' WHERE `id`='$post_id'"))
            {
                echo "saved";
            }

        }
        else
            echo "error" . mysqli_errno($this->con);
    
        
    }

    public function LoadBoladas($userlogged,$price,$status,$deliver,$position,$num_posts, $sort)
    {
        
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

        $fullname = "";
        $icon = "";
        $address = "";
        $verified = "";
        $isSeller = "";
        $num_posts_rapidas = "";
        $num_clicks = "";
        $phone1 = "";
        $phone2 = "";
        $email = "";
        $whatsapp = "";
        $instagram = "";
        $facebook = ""; 
        $linkedin = ""; 
        $website = "";
        $delete_btn = "";
        $saved_btn = "";
        $main_content = "";
        $timer = "";
        $time_message = "";
        $results_number = "";
        $call_phone = "";

        $user_functions = new User($this->con);
        $today = date("Y-m-d");

        $boladas_query = mysqli_query($this->con, "SELECT * FROM `boladas` WHERE $price $status $deliver `deleted`='no' $sort LIMIT $position,$num_posts");

        $results_number = mysqli_num_rows($boladas_query);

        $results_number =  (int)$results_number + (int)$position;

        if($num_results = mysqli_num_rows($boladas_query) != 0)
        {
            while($results = mysqli_fetch_array($boladas_query))
            {
                $name = isset($results['name']) ? $results['name'] : '';
                $uname = isset($results['uname']) ? $results['uname'] : '';
                $img_array = isset($results['img_array']) ? $results['img_array'] : '';
                $price1 = isset($results['price']) ? $results['price'] : '';
                $status1 = isset($results['status']) ? $results['status'] : '';
                $location = isset($results['location']) ? $results['location'] : '';
                $deliver1 = isset($results['deliver']) ? $results['deliver'] : '';
                $expire_date = isset($results['expire_date']) ? $results['expire_date'] : '';
                $date_added = isset($results['date_added']) ? $results['date_added'] : '';
                $clicks = isset($results['clicks_num']) ? $results['clicks_num'] : '';
                $saved_num = isset($results['saved_num']) ? $results['saved_num'] : '';
                $id = isset($results['id']) ? $results['id'] : '';
     
                $date_time_now = date("Y-m-d");
                $start_date = new DateTime($expire_date); //time of post
                $end_date = new DateTime($today); //current time
                $interval = $start_date->diff($end_date); //difference between dates  

               

                setlocale(LC_TIME, 'pt_PT.utf8', 'Portuguese_Portugal');
                $date_added =  $this->dateToPortugueseText($date_added);

                $fullname = $user_functions->getFullname($uname);
                $icon =  $user_functions->getIcon($uname);
                $address =  $user_functions->getProvice($uname);
                $verified =  $user_functions->getVerified($uname);
                $isSeller =  $user_functions->getIsSeller($uname);
                $num_posts_rapidas =  $user_functions->getNumPostsRapidas($uname);
                $num_clicks =  $user_functions->getClicksRapidas($uname);

                $phone1 =  $user_functions->getphone1($uname);
                $call_phone = $phone1;
                if($phone1!=0)
                    $phone1 = '<p style="font-size:95%; color: #071e33;" ><i class="material-icons left">call</i>'.$phone1.'</p>';
                else
                    $phone1 =  '';

                $phone2 =  $user_functions->getphone2($uname);
                if($phone2!=0)
                    $phone2 = '<p style="font-size:95%; color: #071e33;" ><i class="material-icons left">call</i>'.$phone2.'</p>';
                else
                    $phone2 =  '';


                $email =  $user_functions->getEmail($uname);
                if($email!='')
                $email = '<p style="font-size:95%; color: #071e33;" ><i class="material-icons left">mail</i>'.$email.'</p>';
                else
                $email =  '';

                $whatsapp =  $user_functions->getWhatsapp($uname);
                if($whatsapp!=0)
                $whatsapp = '<p style="font-size:95%; color: #071e33;" ><ion-icon name="logo-whatsapp" class="left"></ion-icon>'.$whatsapp.'</p>';
                else
                $whatsapp =  '';

                $instagram =  $user_functions->getInstagram($uname);
                if($instagram!='')
                $instagram = '<p style="font-size:95%; color: #071e33;" ><ion-icon name="logo-instagram" class="left"></ion-icon>'.$instagram.'</p>';
                else
                $instagram =  '';
                

                $facebook =  $user_functions->getFacebook($uname); 
                if($facebook!='')
                $facebook = '<p style="font-size:95%; color: #071e33;" ><ion-icon name="logo-facebook" class="left"></ion-icon>'.$facebook.'</p>';
                else
                $facebook =  '';

                $linkedin =  $user_functions->getLinkedin($uname);
                if($linkedin!='')
                $linkedin = '<p style="font-size:95%; color: #071e33;" ><ion-icon name="logo-linkedin" class="left"></ion-icon>'.$linkedin.'</p>';
                else
                $linkedin =  '';

                $website =  $user_functions->getWebsite($uname);
                if($website!='')
                $website = '<p style="font-size:95%; color: #071e33;" ><ion-icon name="globe-outline" class="left"></ion-icon>'.$website.'</p>';
                else
                $website =  '';

                $img_array = explode(",", $img_array);

                if(array_key_exists(0, $img_array))
                {
                    $img1 = str_replace("../../", "", $img_array[0]);
                    $slide1 = '<img rel="preload" src="'.$img1.'"  alt="prod img">';
                }
                else
                    $slide1 = "";
                    
                if(array_key_exists(1, $img_array))
                {
                    $img2 = str_replace("../../", "", $img_array[1]);
                    $slide2 = '<img rel="preload" src="'.$img2.'"  alt="prod img" >';
                }
                else
                    $slide2 = "";
                    
                if(array_key_exists(2, $img_array))
                {
                    $img3 = str_replace("../../", "", $img_array[2]);
                    $slide3 = '<img rel="preload" src="'.$img3.'"  alt="prod img" >';
                }
                else
                    $slide3 = "";
                    

                $array_length = count(array_unique(array_keys($img_array))) - 1;

                $slider = rand(0,$array_length);
                if($slider == 0)
                $slider = $slide1;
                elseif($slider == 1)
                $slider = $slide2;
                elseif($slider == 2)
                $slider = $slide3;

                if($isSeller == 'yes')
                $isSeller = "vendedor";
                elseif($isSeller == 'no')
                $isSeller = "Usuário";

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
                $saved_btn = $this->checkSavedBoladas($userlogged,$id);
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
           
                $reveal = 
                '
                    <div class="container_post_options">
        
                        <div class="container_user_info">
                            <div class="user_profile">
                             
                            </div>
                            <div class="user_contacts">
                                <p style="font-size:110%;margin-bottom:20px;font-weight:400" class="left">Contactos</p>
                                '.$phone1.$phone2.$whatsapp.' 
                            </div>
                        </div>
                      
                    </div>
    
                ';

                $main_content = '

                <div class="post_main_content">
                    <div class="row">
                        <h5>'.$price1.'<span>,00Mts</span></h5>
                        <input type="hidden" id="prod_id'.$id.'" value='.$id.'>
                    </div>
                    <div class="row">
                        <p class="location">'.$location.'</p>
                    </div>
                    <div class="row">
                        <h6>'.$name.'</h6>
                    </div>
                    <div class="row">
                        '.$post_extra.'
                    </div>
                    '.$timer.'
                    
                    
                </div>

                ';
                              
                $single_post = '
                <div class="single_post">
                    <script>
                        var num_id_b = document.getElementById("num_id_b").value = '.$results_number.';
                    </script>
                    <div class="row row_single_post">
                        <div class="card single_post_card">
                            <div class="card-image post_card_img">
                                <div class="img_container">
                                    '. $slider .'
                                </div>
                                <a class="btn-floating btn_call_card btn halfway-fab waves-effect waves-light"  href="tel:'.$call_phone.'"><i class="material-icons">call</i></a>
                            </div>
                            <div class="card-content">
                                <div>
                                    '.$main_content.'
                                </div>
                                <div class="post_btns">
                                    <button class="btn btn_know_more" onclick="loadBoladasDescription('.$id.')">
                                        Saiba mais
                                    </button>
                                    '.$saved_btn.'                                    
                                </div>
                            </div>
                            <div class="card-reveal post_reveal">
                                <span>
                                    <i class="card-title material-icons ">close</i>
                                </span>

                                <div class="container_reveal_options">
                                    '.$reveal.'
                                </div>
                                
                            </div>
                        </div>
                    </div>

                    <input type="hidden" id="num_id_b" value="'.$results_number.'">
                  

                </div>
                ';
               

                echo $single_post;
            }
            
             
        }
        else
        {
            echo "noposts";
        }
    }

    public function savePostsBoladas($userlogged,$post_id,$saved_num)
    {
        $post_data = mysqli_query($this->con, "SELECT * FROM `boladas` WHERE `id`='$post_id' and `deleted`='no' ");

        $data = mysqli_fetch_array($post_data);
        $post_uname = isset($data['uname']) ? $data['uname'] : '';

        $date_added = date("Y-m-d");
        $deleted = 'no';

        if($saved_query = mysqli_query($this->con, "INSERT INTO `colecao_boladas`(`id`, `prod_id`, `prod_seller`, `user_acc`, `date_added`, `deleted`) VALUES (NULL, '$post_id','$post_uname','$userlogged','$date_added','$deleted')"))
        {
            $saved_num = $saved_num + 1;
            if($update_post = mysqli_query($this->con, "UPDATE `boladas` SET `saved_num`='$saved_num' WHERE `id`='$post_id'"))
            {
                echo "saved";
            }

        }
        else
            echo "error" . mysqli_errno($this->con);
    
        
    }

}