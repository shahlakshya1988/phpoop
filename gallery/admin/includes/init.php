<?php
defined("DS") ? NULL : define("DS",DIRECTORY_SEPARATOR);
defined("SITE_ROOT")? NULL : define("SITE_ROOT",__DIR__.DS."..".DS."..");
defined("INCLUDES_PATH") ? NULL : define("INCLUDES_PATH",SITE_ROOT.DS."admin".DS."INCLUDES");
//var_dump(SITE_ROOT);
require_once INCLUDES_PATH.DIRECTORY_SEPARATOR."new_config.php";
require_once INCLUDES_PATH.DIRECTORY_SEPARATOR."database.php";
require_once INCLUDES_PATH.DIRECTORY_SEPARATOR."db_object.php";
require_once INCLUDES_PATH.DIRECTORY_SEPARATOR."session.php";
require_once INCLUDES_PATH.DIRECTORY_SEPARATOR."users.php";
require_once INCLUDES_PATH.DIRECTORY_SEPARATOR."photo.php";
require_once INCLUDES_PATH.DIRECTORY_SEPARATOR."functions.php";

//require_once "includes/users.php";
?>
