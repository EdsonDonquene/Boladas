<?php
    require '../config/config.php';  
    $uname = "";
    $date_added = "";
    $deleted = "";
    $hash_psw = "";
    $img = "";
    $insert_uname ="";
    $i = 0;

    function getFirstTwoWords($inputString) 
    {
        // Use explode to split the string into an array of words
        $words = explode(' ', $inputString);

        // Use array_slice to get the first two words
        $firstTwoWords = array_slice($words, 0, 2);

        // Use implode to join the array elements back into a string
        $result = implode(' ', $firstTwoWords);

        return $result;
    }

    function replaceSpecialCharacters($inputString) 
    {
        $specialChars = array(
            'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A',
            'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a',
            'È' => 'E', 'É' => 'E', 'Ê' => 'E', 'Ë' => 'E',
            'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e',
            'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï' => 'I',
            'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i',
            'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O',
            'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o', 'ö' => 'o',
            'Ù' => 'U', 'Ú' => 'U', 'Û' => 'U', 'Ü' => 'U',
            'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ü' => 'u',
            'Ý' => 'Y', 'ý' => 'y', 'ÿ' => 'y',
            'Ç' => 'C', 'ç' => 'c',
            'Ñ' => 'N', 'ñ' => 'n',
            'ß' => 'ss',
            'Œ' => 'OE', 'œ' => 'oe',
            'Æ' => 'AE', 'æ' => 'ae',
        );

        // Use strtr to replace special characters with their normal English counterparts
        $outputString = strtr($inputString, $specialChars);

        return $outputString; 
    }

    $full_name = mysqli_real_escape_string($con, $_POST['full_name1']);
    $full_name = strip_tags($full_name);
    $full_name = trim($full_name);
    $phone_number = mysqli_real_escape_string($con, $_POST['phone_number1']);
    $phone_number = strip_tags($phone_number);
    $phone_number = trim($phone_number);
    $province = mysqli_real_escape_string($con, $_POST['province1']);
    $province = strip_tags($province);
    $province = trim($province);
    $psw = mysqli_real_escape_string($con, $_POST['psw1']);
    $psw = strip_tags($psw);
    $psw = trim($psw);
    $date_added = date('Y-m-d');
    $deleted = "no";

    $uname = getFirstTwoWords($full_name);
    $uname = replaceSpecialCharacters($uname);
    $uname = str_replace(" ", "", $uname);
    $uname = strtolower($uname);
    $insert_uname = $uname;

    $check_uname = mysqli_query($con, "SELECT * FROM `accounts` WHERE `uname` = '$uname' AND `deleted` = 'no' ");
    while (mysqli_num_rows($check_uname) != 0) {
        $i++;
        $insert_uname = $uname . "_" . $i;
        $check_uname = mysqli_query($con, "SELECT * FROM `accounts` WHERE `uname` = '$insert_uname' ");
    }
    
    //$uname = $insert_uname;

    $hash_psw = md5($psw);

    $img = "resources/img/logos/logo-04.svg";

    

    if($create_acc = mysqli_query($con, "INSERT INTO `accounts`(`id`, `uname`, `full_name`, `acc_phone`, `dob`, `address`, `province`, `psw`, `hash_psw`, `img`, `verified`, `seller`, `user_rating`, `accepted_terms`,`wellcomed`, `date_added`, `deleted`)
    VALUES(NULL, '$insert_uname', '$full_name',$phone_number, '', '', '$province', '$psw', '$hash_psw', '$img', 'no', 'no',0 , 'yes','no', '$date_added', '$deleted')" ))
    {
        if($insert_contact = mysqli_query($con, "INSERT INTO `acc_contacts`(`id`, `uname`, `p_phone`, `s_phone`, `whatsapp`, `email`, `instagram`, `facebook`, `linkedin`, `website`, `deleted`) 
        VALUES(NULL, '$insert_uname', '$phone_number', '', '', '', '', '', '', '', '$deleted') "))
        {
            echo "success";
            //echo mysqli_error($con);
        }
       
    }
    else
        echo mysqli_error($con);

?>