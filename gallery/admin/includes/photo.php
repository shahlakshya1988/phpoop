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

	public $custome_errors = array();
	
} 
?>