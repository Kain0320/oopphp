<?php

include "init.php";
if (!$answer = User::action()->is_logged_in())
{
    header("Location: login.php");
    die;
}

?>

<<!DOCTYPE html>
<html>
<head>
    <title>Shop</title>
    <meta charset="utf8">
</head>
<body>
    <h1>Welcome to Shop</h1>
    <p>You can buy whatever you want.</p>
    <a href="login.php">Login</a> | <a href="signup.php">Signup</a> | <a href="logout.php">Logout</a>
    | <a href="shop.php">Shop</a> | <a href="index.php">HomePage</a>
</body>


</html>














