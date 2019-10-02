<?php
class Users{
    public $id;
    public $username;
    public $first_name;
    public $last_name;
    public $password;
    
    public static function find_all_users(){
      /*  global $database;
        $result_set = $database->query("SELECT * FROM `users`");
        return $result_set; */
        return self::find_this_query("SELECT * FROM `users`");
    }

    public static function find_user_by_id($user_id){
       /* global $database;
        $user_id = $database->escape_string($user_id);
        $result_set = $database->query("SELECT * FROM `users` where `id` = '{$user_id}'");
        return $result_set; */
       $result_set_array = self::find_this_query("SELECT * FROM `users` where `id` = '{$user_id}'");
      /* if(!empty($result_set_array)){
       return array_shift($result_set_array);
      }else{
        return false;
      } */
     return !empty($result_set_array) ? array_shift($result_set_array) : false;
    }
    public static function find_this_query($sql){
        global $database;
        $result_set = $database->query($sql);
        $object_array = array();
        while($fh_row = mysqli_fetch_assoc($result_set)){
            $object_array[]= self::instantiation($fh_row);
        }

        return $object_array;
    }
    public static function instantiation($the_record){
       // var_dump($the_record);
        $thisObject = new self;
        /*$thisObject->id = $singleUser["id"];
        $thisObject->username = $singleUser["username"];
        $thisObject->password = $singleUser["password"];
        $thisObject->first_name = $singleUser["first_name"];
        $thisObject->last_name = $singleUser["last_name"];*/
        foreach($the_record as $the_attribute=>$value){
            if($thisObject->has_the_attr($the_attribute)){
                    $thisObject->$the_attribute = $value;
            }
           
        }
        return $thisObject;
    }

    private function has_the_attr($the_attribute){
        $object_vars = get_object_vars($this);
       // var_dump($object_vars);
       //echo "<br><br><br>";
        return array_key_exists($the_attribute, $object_vars);
    }

    public static function verify_user($username,$password){
        $result_set_array = self::find_this_query("SELECT * FROM `users` where `username` = '{$username}' and `password` = '{$password}' LIMIT 1");
        return !empty($result_set_array) ? array_shift($result_set_array) : false;
    }

    public function create(){
        global $database;
        $username = $database->escape_string($this->username);
        $password = $database->escape_string($this->password);
        $first_name = $database->escape_string($this->first_name);
        $last_name = $database->escape_string($this->last_name);
        $sql="INSERT INTO `users` (`username`,`password`,`first_name`,`last_name`) values ('{$username}','{$password}','{$first_name}','{$last_name}')";
        if($database->query($sql)){
            $this->id = $database->the_insert_id();
            return true;
        }else{
            return false;
        }

    }
}
?>
