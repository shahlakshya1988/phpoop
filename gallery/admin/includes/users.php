<?php
class Users extends Db_object{
    protected static $db_table = "users";
    public $id;
    public $username;
    public $first_name;
    public $last_name;
    public $password;

    protected static $db_table_fields = array("username","password","first_name","last_name");
    
  
    
    
    public static function verify_user($username,$password){
        $result_set_array = self::find_by_query("SELECT * FROM `".self::$db_table."` where `username` = '{$username}' and `password` = '{$password}' LIMIT 1");
        return !empty($result_set_array) ? array_shift($result_set_array) : false;
    }
    public function save(){
        // var_dump(isset($this->id));
         return (isset($this->id)) ? $this->update() : $this->create();
     }
  



} // user class ends 
?>
