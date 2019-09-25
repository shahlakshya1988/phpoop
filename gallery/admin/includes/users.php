<?php
class Users{
    public function find_all_methods(){
        global $database;
        $result_set = $database->query("SELECT * FROM `users`");
        return $result_set;
    }
}
?>
