<?php  
    require '../config/config.php'; 

    $item = "";
    $img_array = "";
    $price = "";
    $location = "";
    $description = "";
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
        $description = mysqli_real_escape_string($con, $_POST['description']);
        $description = strip_tags($description);
        $location = mysqli_real_escape_string($con, $_POST['location']);
        $location = strip_tags($location);
        $date_added = date('Y-m-d');
        $user = mysqli_real_escape_string($con, $_POST['uname']);
        $user = strip_tags($user);
        $uploadDir = "../../resources/img/users/posts/alugar/";
        $deleted = "no";

        $today = new DateTime();
        $today->add(new DateInterval('P2W'));
        $expire_date = $today->format('Y-m-d');

        foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
            $uploadedFile = $uploadDir .basename($_FILES['images']['name'][$key]);
    
            if (move_uploaded_file($tmp_name, $uploadedFile)) {
                $uploadedFiles[] = $uploadedFile;

                $img_array = implode(",", $uploadedFiles);

                compressImage($uploadedFile, $uploadedFile, 50);

            }
        }

        if($img_array != "")
        {
            if($insert_alugar_query = mysqli_query($con, "INSERT INTO `alugar`(`id`, `uname`, `name`, `img_array`, `description`, `price`, `location`, `date_added`, `click_num`, `deleted`) 
            VALUES (NULL,'$user','$item','$img_array','$description','$price','$location','$date_added','0','$deleted')"))
            {
                echo "success";
            }
            else
            echo mysqli_error($con);
        
        }
    }


?>