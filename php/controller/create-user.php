<?php

require_once (__DIR__ . "/../model/config.php");

$array = array(
 'exp' => '',
 'exp1' => '',
 'exp2' => '',
 'exp3' => '',
 'exp4' => '',
);

$username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);

echo $password;

$salt = "$5$" . "rounds = 5000" . uniqid(mt_rand(), true) . "$";

$hashedPassword = crypt($password, $salt);

$query = $_SESSION["connection"]->query("INSERT INTO users SET "
        . "email = '', "
        . "username = '$username', "
        . "password = '$hashedPassword', "
        . "salt = '$salt', "
        .  "exp = 0, "
        . "exp1 = 0, "
        . "exp2 = 0, "
        . "exp3 = 0, "
        . "exp4 = 0");

$_SESSION["name"] = $username;


if ($query) {
    echo "succesfully created user: $username";
}
?>

<br /><button type="button" ><a href="index.php" >HOME</a></button>
<br /><button type="button" ><a href="login.php" >LOGIN</a></button>