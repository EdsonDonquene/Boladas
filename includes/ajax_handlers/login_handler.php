<?php
    require '../config/config.php'; 
    $phone_number = "";
    $user_psw = "";

    $phone_number = mysqli_real_escape_string($con, $_POST['user_phone']);
    $phone_number = strip_tags($phone_number);
    $phone_number = trim($phone_number);
    $password = mysqli_real_escape_string($con, $_POST['user_psw']);
    $password = strip_tags($password);
    $password = trim($password);
    $password = md5($password);

    $check_acc = mysqli_query($con, "SELECT * FROM `accounts` WHERE `acc_phone` = '$phone_number' AND `hash_psw` = '$password' and `deleted` = 'no'  ");
   
    if(mysqli_num_rows($check_acc) == 1)
    {
        session_destroy();
        session_start();
        $acc_data = mysqli_fetch_array($check_acc);
        $acc_id = isset($acc_data['id']) ? $acc_data['id'] : '';
        $acc_uname = isset($acc_data['uname']) ? $acc_data['uname'] : '';
        $seller = isset($acc_data['seller']) ? $acc_data['seller'] : '';
        $acc_phone = $phone_number;

        $_SESSION['uname'] = $acc_uname;
        $_SESSION['phone'] = $acc_phone;
        $_SESSION['id'] = $acc_id;
        $_SESSION['seller'] = $seller;

        echo "success";
        exit();


    }
    elseif(mysqli_num_rows($check_acc) > 1)
    {
       echo "Error: 00x0001NOTEXCLUSIVE! Por favor contactar a nossa equipe de suporte. <a href='helpcenter.php'>Centro de ajuda.</a> ";
    }
    elseif(mysqli_num_rows($check_acc) == 0)
    {
       echo "Error: 00x0002NOTEXISTANT! Por favor verifique a <b>palavra passe</b> e volte a tentar novamente";
    }
    else
    echo "Error: 00x0003SYSTEMUNKNOWN! Por favor contactar a nossa equipe de suporte. <a href='helpcenter.php'>Centro de ajuda.</a> ";



    
?>