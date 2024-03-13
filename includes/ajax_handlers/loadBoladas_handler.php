<?php  
    require '../config/config.php'; 
    include '../classes/Main.php';

    $price = "";
    $status = "";
    $deliver = "";
    $success = "";
    $userlogged = "";

    $price = $_POST['price'];
    $status = $_POST['status'];
    $deliver = $_POST['deliver'];
    $userlogged = $_POST['userloggedin'];
    $num_posts = 8;
    $position = 0;
    $sort = $_POST['sort'];
    

    $functions = new Main($con);

    $success = $functions->LoadBoladas($userlogged,$price,$status,$deliver,$position,$num_posts, $sort);
    echo $success;

    

?>