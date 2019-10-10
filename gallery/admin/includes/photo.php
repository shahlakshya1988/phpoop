<?php 
class Photo extends Db_object{
	protected static $db_table = "photos";
	public $photo_id;
	public $title;
	public $description;
	public $filename;
	public $type;
	public $size;
	protected static $db_table_fields = array("title","description","filename","type","size");
} 
?>