<?php  
    require '../config/config.php'; 
    include '../classes/Main.php';
   
    $userlogged = "";
    $post_id = "";
    $saved_num = "";
  
    $userlogged = $_POST['userloggedin'];
    $post_id = $_POST['post_id'];
    $saved_num = $_POST['saved_num'];
  
    $functions = new Main($con);

    $success = $functions->savePostsBoladas($userlogged,$post_id,$saved_num);
    echo $success;

    

?>