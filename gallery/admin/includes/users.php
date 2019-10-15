<?php
class Users extends Db_object{
    protected static $db_table = "users";
    public $id;
    public $username;
    public $first_name;
    public $last_name;
    public $password;
    public $user_image;
   // public $upload_dir="images";
    
    

    
   

    protected static $db_table_fields = array("username","password","first_name","last_name","user_image");


    public function image_path_and_placeholder(){
        return (empty($this->user_image)) ? $this->image_placeholder : $this->upload_dir.DS.$this->user_image;
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
            return (unlink(SITE_ROOT.DS."admin".DS.$this->upload_dir.DS.$this->user_image)) ?  true :  false;
        }else{
            return false;
        }
     }


     public function save_user_and_image(){
       
            if(!empty($this->errors)){
                return false;
            }
            if(empty($this->user_image) || empty($this->tmp_path)){
                $this->errors[]="The file is not available";
                return false;
            }
            $target_path = SITE_ROOT.DS."admin".DS.$this->upload_dir.DS.$this->user_image;
            if(file_exists($target_path)){
                $this->errors[]="The {$this->user_image}, already exists";
                return false;
            }
            if(move_uploaded_file($this->tmp_path,$target_path)){
                if($this->create()){
                    unset($this->tmp_path);
                    return true;
                }
            }else{
                $this->errors[]="The Permission Issue";
                return false;

            }
            
        
     }



} // user class ends 
?>
