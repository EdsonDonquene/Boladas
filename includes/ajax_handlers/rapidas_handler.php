<?php  
    require '../config/config.php'; 

    $item = "";
    $img_array = "";
    $price = "";
    $location = "";
    $status = "";
    $deliver = "";
    $date_added = "";
    $expire_date = "";
    $user = "";
    $uploadedFiles = [];
    $uploadDir = "";
    $deleted = "";

    function compressImage($sourcePath, $destinationPath, $quality = 75) {
        $info = getimagesize($sourcePath);
    
        if ($info['mime'] == 'image/jpeg') {
            $image = imagecreatefromjpeg($sourcePath);
            imagejpeg($image, $destinationPath, $quality);
            imagedestroy($image);
        } elseif ($info['mime'] == 'image/png') {
            $image = imagecreatefrompng($sourcePath);
            imagepng($image, $destinationPath, $quality / 10); // For PNG, quality is a compression level (0-9)
            imagedestroy($image);
        } else {
            // Unsupported image type
            return false;
        }
    
        return true;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') 
    {
        $item = mysqli_real_escape_string($con, $_POST['item']);
        $item = strip_tags($item);
        $price = mysqli_real_escape_string($con, $_POST['price']);
        $price = strip_tags($price);
        $location = mysqli_real_escape_string($con, $_POST['location']);
        $location = strip_tags($location);
        $status = mysqli_real_escape_string($con, $_POST['status']);
        $status = strip_tags($status);
        $deliver = mysqli_real_escape_string($con, $_POST['delivery']);
        $deliver = strip_tags($deliver);
        $date_added = date('Y-m-d');
        $user = mysqli_real_escape_string($con, $_POST['uname']);
        $user = strip_tags($user);
        $uploadDir = "../../resources/img/users/posts/rapidas/";
        $deleted = "no";

        $today = new DateTime();
        $today->add(new DateInterval('P2W'));
        $expire_date = $today->format('Y-m-d');

        foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
            $uploadedFile = $uploadDir . basename($_FILES['images']['name'][$key]);
    
            if (move_uploaded_file($tmp_name, $uploadedFile)) {
                $uploadedFiles[] = $uploadedFile;

                $img_array = implode(",", $uploadedFiles);
                
                compressImage($uploadedFile, $uploadedFile, 50);

            }
        }

        if($img_array != "")
        {
            if($insert_rapidas_query = mysqli_query($con, "INSERT INTO `rapidas`(`id`, `uname`, `name`, `img_array`, `price`, `location`, `status`, `deliver`, `date_added`, `expire_date`, `clicks_num`, `saved_num`, `deleted`) 
            VALUES(NULL,'$user','$item','$img_array','$price','$location','$status','$deliver','$date_added','$expire_date','0','0','$deleted')"))
            {
                echo "success";
            }
            else
            echo mysqli_error($con);
        
        }
    }


?>