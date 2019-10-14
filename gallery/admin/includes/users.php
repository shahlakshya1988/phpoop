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
    public $image_placeholder = "https://via.placeholder.com/400&text=Image";

    public $tmp_path; // this path will be used to move images
    public $upload_dir = "images"; // this dir is used to store images

    public $upload_errors = array(
        UPLOAD_ERR_OK => "There is no error",
        UPLOAD_ERR_INI_SIZE => "The uploaded file exceeds the upload_max_filesize directive",
        UPLOAD_ERR_FORM_SIZE => "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form. ",
        UPLOAD_ERR_PARTIAL=>"The uploaded file was only partially uploaded.",
        UPLOAD_ERR_NO_FILE=>"No file was uploaded.",
        UPLOAD_ERR_NO_TMP_DIR=>"Missing a temporary folder.",
        UPLOAD_ERR_CANT_WRITE=>"Failed to write file to disk.",
        UPLOAD_ERR_EXTENSION=>" A PHP extension stopped the file upload. PHP does not provide a way to ascertain which extension caused the file upload to stop"
    );

    public $errors = array(); // this is custom error message

    /**
     * THIS IS PASSING THE $_FILES AS AN ARGUMENT
     */
    public function set_file($file){
        if(empty($file) || !$file || !is_array($file)){
            $this->errors[]="There was no file uploaded here";
            return false;
        }else if($file["error"]){
            $this->errors[]=$this->upload_errors[$file["error"]];
            return false;
        }else{
            $this->user_image = basename($file["name"]);
            $this->size = $file["size"];
            $this->tmp_path = $file["tmp_name"];
            $this->type = $file["type"];
        }
        
    } //public function set_file($file)

   

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
        if($this->id){
            $this->update();
        }else{
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
     }



} // user class ends 
?>
