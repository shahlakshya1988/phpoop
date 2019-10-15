<?php 
class Comment extends Db_object{
    protected static $db_table = "commnets";
    protected static $db_table_fields = array("photo_id","author","body");
    public $id;
    public $photo_id;
    public $author;
    public $body;
    
    public static function create_comment($photo_id="",$author = "John Doe",$body = ""){
        if(!empty($photo_id) && !empty  ($author) && !empty($body)){
            $comment = new Comment();
            $comment->photo_id = (int)$photo_id;
            $comment->author = $author;
            $comment->body = $body;
            return $comment;
        }else{
            return false;
        }
    }
}
?>