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
        $result_set_array = self::find_this_query("SELECT * FROM `".self::$db_table."` where `username` = '{$username}' and `password` = '{$password}' LIMIT 1");
        return !empty($result_set_array) ? array_shift($result_set_array) : false;
    }

    public function save(){
       // var_dump(isset($this->id));
        return (isset($this->id)) ? $this->update() : $this->create();
    }

    public function create(){

       $properties = $this->clean_properties();
       //var_dump($properties);
       //var_dump(implode(",", array_keys($properties)));
        global $database;
        $username = $database->escape_string($this->username);
        $password = $database->escape_string($this->password);
        $first_name = $database->escape_string($this->first_name);
        $last_name = $database->escape_string($this->last_name);
        $sql="INSERT INTO `".self::$db_table."` (".implode(",", array_keys($properties)).") values ('". implode("','",array_values($properties))  ."')";
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
       

        $sql="UPDATE `".self::$db_table."` SET ";
        $sql.=implode(", ",$property_pairs);
        $sql.=" where `id` = '{$id}' LIMIT 1 ";
       // echo $sql;
        $database->query($sql);
       return (mysqli_affected_rows($database->connection))? true : false;
        
    } // update method ends 

    public function delete(){
        global $database;
        $id = $database->escape_string($this->id);
        $sql="DELETE FROM `".self::$db_table."` where `id` = '{$id}' LIMIT 1";
        $database->query($sql);
        return (mysqli_affected_rows($database->connection)) ? true : false;
    }




} // user class ends 
?>
