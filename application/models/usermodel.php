<?php

class Usermodel extends CI_Model
{

public function get_users($user_is)
    {
        $myquery = "select * from users where username= $user_is";
        return $this->db->query($myquery);


    }


}


?>