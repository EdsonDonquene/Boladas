<?php
    require '../config/config.php'; 
    $phone_number = mysqli_real_escape_string($con, $_POST['number']);
    $phone_number = str_replace(" ","",$phone_number);
    $phone_number = strip_tags($phone_number);
    $phone_number = str_replace("+","",$phone_number);

    $check_phone = mysqli_query($con, "SELECT * FROM `accounts` WHERE `acc_phone` = '$phone_number' and `deleted` = 'no' ");

    if(mysqli_num_rows($check_phone) > 0)
    {
        echo "Número de telefone já foi usado!";
    }
    elseif(mysqli_num_rows($check_phone) == 0)
    {
        echo "";
    }

?>