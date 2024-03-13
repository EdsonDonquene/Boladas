<?php  
    require '../config/config.php'; 
    include '../classes/Main.php';

    $price = "";
    $status = "";
    $deliver = "";
    $success = "";

    $price = $_POST['price'];
    $status = $_POST['status'];
    $deliver = $_POST['deliver'];
    $userlogged = $_POST['userloggedin'];
    $num_posts = 4;
    $position = $_POST['position'];
    $sort = $_POST['sort'];
    

    $functions = new Main($con);

    $success = $functions->LoadRapidas($userlogged,$price,$status,$deliver,$position,$num_posts, $sort);
    echo $success;

    

?>