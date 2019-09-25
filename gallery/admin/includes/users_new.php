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
       $result_set = self::find_this_query("SELECT * FROM `users` where `id` = '{$user_id}'");
        return $fh_user = mysqli_fetch_assoc($result_set);

    }
    public static function find_this_query($sql){
        global $database;
        $result_set = $database->query($sql);
        return $result_set;
    }
}
?>
