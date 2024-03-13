<?php

class User
{
    private $con;

    public function __construct($con)
    {
        $this->con = $con;
    }

    public function getIcon($uname)
    {
        $icon_query = mysqli_query($this->con, "SELECT `img` from `accounts` where `uname`='$uname' and `deleted` = 'no' ");
        $row = mysqli_fetch_array($icon_query);

        $icon = isset($row['img']) ? $row['img']:'';
        return $icon;
    }

    public function getFullname($uname)
    {
        $full_name_query = mysqli_query($this->con, "SELECT `full_name` from `accounts` where `uname`='$uname' and `deleted` = 'no' ");
        $row = mysqli_fetch_array($full_name_query);

        $fullname = isset($row['full_name']) ? $row['full_name']:'';

        $fullname_array = explode(" ", $fullname);
        $first_name = $fullname_array[0];
        $last_name = end($fullname_array);

        $fullname = $first_name . " " . $last_name;

        return $fullname;
    }

    public function getIsSeller($uname)
    {
        $seller_query = mysqli_query($this->con, "SELECT `seller` from `accounts` where `uname`='$uname' and `deleted` = 'no' ");
        $row = mysqli_fetch_array($seller_query);

        $seller = isset($row['seller']) ? $row['seller']:'';

        
        return $seller;
    }

    public function getVerified($uname)
    {
        $verified_query = mysqli_query($this->con, "SELECT `verified` from `accounts` where `uname`='$uname' and `deleted` = 'no' ");
        $row = mysqli_fetch_array($verified_query);

        $verified = isset($row['verified']) ? $row['verified']:'';

        
        return $verified;
    

    }
    
    public function getProvice($uname)
    {
        $province_query = mysqli_query($this->con, "SELECT `province` from `accounts` where `uname`='$uname' and `deleted` = 'no' ");
        $row = mysqli_fetch_array($province_query);
        $province = isset($row['province']) ? $row['province']:'';
        return $province;
    }

    public function getClicksRapidas($uname)
    {
        $clicks_query = mysqli_query($this->con, "SELECT SUM(`clicks_num`) as total_clicks from `rapidas` where `uname`='$uname' and `deleted` = 'no' ");

        $row = mysqli_fetch_array($clicks_query);
       
        $clicks = isset($row['total_clicks']) ? $row['total_clicks']:'';

        return $clicks;
    }

    public function getNumPostsRapidas($uname)
    {
        $num_posts_query = mysqli_query($this->con, "SELECT * from `rapidas` where `uname`='$uname' and `deleted` = 'no' "); 
        
        $num_posts = mysqli_num_rows($num_posts_query);
        return $num_posts;
    }

    public function getphone1($uname)
    {
        $phone_query = mysqli_query($this->con, "SELECT `p_phone` from `acc_contacts` where `uname`='$uname' and `deleted` = 'no' ");
        $row = mysqli_fetch_array($phone_query);

        $phone = isset($row['p_phone']) ? $row['p_phone']:'';

        return $phone;
    }

    public function getphone2($uname)
    {
        $phone_query = mysqli_query($this->con, "SELECT `s_phone` from `acc_contacts` where `uname`='$uname' and `deleted` = 'no' ");
        $row = mysqli_fetch_array($phone_query);

        $phone = isset($row['s_phone']) ? $row['s_phone']:'';

        return $phone;
    }

    public function getWhatsapp($uname)
    {
        $phone_query = mysqli_query($this->con, "SELECT `whatsapp` from `acc_contacts` where `uname`='$uname' and `deleted` = 'no' ");
        $row = mysqli_fetch_array($phone_query);

        $whatsapp = isset($row['whatsapp']) ? $row['whatsapp']:'';

        return $whatsapp;
    }

    public function getEmail($uname)
    {
        $phone_query = mysqli_query($this->con, "SELECT `email` from `acc_contacts` where `uname`='$uname' and `deleted` = 'no' ");
        $row = mysqli_fetch_array($phone_query);

        $email = isset($row['email']) ? $row['email']:'';

        return $email;
    }

    public function getWebsite($uname)
    {
        $phone_query = mysqli_query($this->con, "SELECT `website` from `acc_contacts` where `uname`='$uname' and `deleted` = 'no' ");
        $row = mysqli_fetch_array($phone_query);

        $website = isset($row['website']) ? $row['website']:'';

        return $website;
    }

    public function getInstagram($uname)
    {
        $phone_query = mysqli_query($this->con, "SELECT `instagram` from `acc_contacts` where `uname`='$uname' and `deleted` = 'no' ");
        $row = mysqli_fetch_array($phone_query);

        $instagram = isset($row['instagram']) ? $row['instagram']:'';

        return $instagram;
    }

    public function getFacebook($uname)
    {
        $phone_query = mysqli_query($this->con, "SELECT `facebook` from `acc_contacts` where `uname`='$uname' and `deleted` = 'no' ");
        $row = mysqli_fetch_array($phone_query);

        $facebook = isset($row['facebook']) ? $row['facebook']:'';

        return $facebook;
    }

    public function getLinkedin($uname)
    {
        $phone_query = mysqli_query($this->con, "SELECT `linkedin` from `acc_contacts` where `uname`='$uname' and `deleted` = 'no' ");
        $row = mysqli_fetch_array($phone_query);

        $linkedin = isset($row['linkedin']) ? $row['linkedin']:'';

        return $linkedin;
    }
   
}
?>