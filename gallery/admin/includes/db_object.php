<?php 
class Db_object{

	public static function find_all(){
	  /*  global $database;
	    $result_set = $database->query("SELECT * FROM `users`");
	    return $result_set; */
	    return static::find_by_query("SELECT * FROM `".static::$db_table."`");
	}

	public static function find_by_id($user_id){
	   /* global $database;
	    $user_id = $database->escape_string($user_id);
	    $result_set = $database->query("SELECT * FROM `users` where `id` = '{$user_id}'");
	    return $result_set; */
	   $result_set_array = static::find_by_query("SELECT * FROM `".static::$db_table."` where `id` = '{$user_id}'");
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
	   /* echo "<br>";
	    echo $sql;
	    echo "<br>"; */
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


}
?>