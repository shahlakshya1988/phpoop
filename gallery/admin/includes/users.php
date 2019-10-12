<?php
class Users extends Db_object{
    protected static $db_table = "users";
    public $id;
    public $username;
    public $first_name;
    public $last_name;
    public $password;
    public $user_image;
    public $upload_directory="images";
    public $image_placeholder = "https://via.placeholder.com/400&text=Image";

   

    protected static $db_table_fields = array("username","password","first_name","last_name","user_image");


    public function image_path_and_placeholder(){
        return (empty($this->user_image)) ? $this->image_placeholder : $this->upload_directory.DS.$this->user_image;
    }
    
  
    
    
    public static function verify_user($username,$password){
        $result_set_array = self::find_by_query("SELECT * FROM `".self::$db_table."` where `username` = '{$username}' and `password` = '{$password}' LIMIT 1");
        return !empty($result_set_array) ? array_shift($result_set_array) : false;
    }
    public function save(){
        // var_dump(isset($this->id));
         return (isset($this->id)) ? $this->update() : $this->create();
     }
  

     public function delete_user(){
        if($this->delete()){
            return (unlink(SITE_ROOT.DS."admin".DS.$this->upload_directory.DS.$this->user_image)) ?  true :  false;
        }else{
            return false;
        }
     }


} // user class ends 
?>
