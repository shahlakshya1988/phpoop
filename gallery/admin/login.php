<?php
error_reporting(0);
require_once __DIR__ . DIRECTORY_SEPARATOR . "includes" . DIRECTORY_SEPARATOR . "header.php";
if ($session->is_signed_in()) {
    redirect("index.php");
    die();
}
if (isset($_POST["submit"])) {
    $username = $database->escape_string(trim($_POST["username"]));
    $password = $database->escape_string(trim($_POST["password"]));
    if (!empty($username) && !empty($password)) {
        // method to verify the user with username and password 
        $user_found = Users::verify_user($username, $password);
        // method to verify the user with username and password 
        if ($user_found) {
            $session->login($user_found);
            redirect("index.php");
        } else {
            $the_message = "Your Password And Username are incorrect";
        }
    } else {
        if (empty($username)) {
            $the_message = "Please Enter Your Username";
        }
        if (empty($password)) {
            $the_message = "Please Enter Your Password";
        }
    }
}
?>


<div class="col-md-4 col-md-offset-3">

    <h4 class="bg-danger"><?php echo $the_message; ?></h4>

    <form id="login-id" action="" method="post">

        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="username" value="<?php echo htmlentities($username); ?>">

        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" value="<?php echo htmlentities($password); ?>">

        </div>


        <div class="form-group">
            <input type="submit" name="submit" value="Submit" class="btn btn-primary">

        </div>


    </form>


</div>