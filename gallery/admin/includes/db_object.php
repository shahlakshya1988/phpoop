<?php
class Db_object{
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


	public static function find_all(){
	  /*  global $database;
	    $result_set = $database->query("SELECT * FROM `users`");
	    return $result_set; */
	    return static::find_by_query("SELECT * FROM `".static::$db_table."`");
	}

	public static function find_by_id($id){
	   /* global $database;
	    $id = $database->escape_string($id);
	    $result_set = $database->query("SELECT * FROM `users` where `id` = '{$id}'");
	    return $result_set; */
	   $result_set_array = static::find_by_query("SELECT * FROM `".static::$db_table."` where `id` = '{$id}'");
	  /* if(!empty($result_set_array)){
	   return array_shift($result_set_array);
	  }else{
	    return false;
	  } */
	 return !empty($result_set_array) ? array_shift($result_set_array) : false;
	}

	public static function find_by_query($sql){
	    global $database;
		$result_set = $database->query($sql);
	    $object_array = array();
	    while($fh_row = mysqli_fetch_assoc($result_set)){
	        $object_array[]= static::instantiation($fh_row);
	    }

	    return $object_array;
	}
	public static function instantiation($the_record){
	   // var_dump($the_record);
	  $calling_class = get_called_class();
	   $thisObject = new $calling_class;
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
	protected function properties(){
	  //  return get_object_vars($this);
	    $properties = array();
	   // var_dump(static::$db_table_fields);
	    foreach (static::$db_table_fields as $db_field) {
	        if(property_exists($this, $db_field)){
	            $properties[$db_field]=$this->$db_field;
	        }
	    }
	    return $properties;
	}

	protected function clean_properties(){
	    global $database;
	    $clean_properties = array();
	    foreach($this->properties() as $key => $value){
	        $clean_properties[$key]= $database->escape_string($value);
	    }
	    return $clean_properties;
	}



	public function create(){

	   $properties = $this->clean_properties();
	   //var_dump($properties);
	   //var_dump(implode(",", array_keys($properties)));
	    global $database;
	   /* $username = $database->escape_string($this->username);
	    $password = $database->escape_string($this->password);
	    $first_name = $database->escape_string($this->first_name);
	    $last_name = $database->escape_string($this->last_name);*/
	    $sql="INSERT INTO `".static::$db_table."` (".implode(",", array_keys($properties)).") values ('". implode("','",array_values($properties))  ."')";
	    echo "<br>";
	    echo $sql;
	    echo "<br>";
	    if($database->query($sql)){
	        $this->id = $database->the_insert_id();
	        return true;
	    }else{
	        return false;
	    }

	}
	public function update(){
	    global $database;
	   // $username = $database->escape_string($this->username);
	   // $password = $database->escape_string($this->password);
	   // $first_name = $database->escape_string($this->first_name);
	   // $last_name = $database->escape_string($this->last_name);
	    $id = $database->escape_string($this->id);

	    $properties = $this->clean_properties();
	   // var_dump($properties);
	    $property_pairs= array();
	    foreach($properties as $key => $value){

	        $property_pairs[] = "{$key} = '{$value}'";
	    }
	   // var_dump($property_pairs);


	    $sql="UPDATE `".static::$db_table."` SET ";
	    $sql.=implode(", ",$property_pairs);
	    $sql.=" where `id` = '{$id}' LIMIT 1 ";
	   // echo $sql;
	    $database->query($sql);
	   return (mysqli_affected_rows($database->connection))? true : false;

	} // update method ends

	public function delete(){
	    global $database;
	    $id = $database->escape_string($this->id);
	    $sql="DELETE FROM `".static::$db_table."` where `id` = '{$id}' LIMIT 1";
	    $database->query($sql);
	    return (mysqli_affected_rows($database->connection)) ? true : false;
	}
	public function save(){
        // var_dump(isset($this->id));
         return (isset($this->id)) ? $this->update() : $this->create();
     }

     public static function count_all(){
         global $database;
         $sql="SELECT COUNT(*) FROM ".static::$db_table;
         $result_set = $database->query($sql);
         $row = mysqli_fetch_array($result_set);
         return array_shift($row);

     }


}
?>
