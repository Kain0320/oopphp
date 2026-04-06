<?php
   include "init.php";
   if(count($_POST) > 0)
   {
       //a post was made
       $errors = User::action()->create($_POST);
       if(!is_array ($errors)){
           header('Location: login.php');
           die;
       }
   }

?>

<html>
<head>
    <title>Signup</title>
    <meta charset="utf8">
</head>
<body>

<style type="text/css">
    form{
        width: 340px;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    input, select{
        width: 310px;
        padding: 10px;
        margin: 5px 0;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-shadow: 0 0 5px rgba(0,0,0,0.1);
    }
    input[type="text"], input[type="password"], input[type="email"]{
        font-size: 16px;
    }
    input[type="text"]:focus, input[type="password"]:focus, input[type="email"]:focus{
        border-color: #4CAF50;
        box-shadow: 0 0 5px rgba(76, 175, 80, 0.5);
    }
    button{
        background-color: #4CAF50;
        color: white;
        border: none;
        box-shadow: 0 0 5px rgba(0,0,0,0.1);
        cursor: pointer;
        width: 100%;
        padding: 10px;
        font-size: 16px;
    }
    button:hover{
        background-color: #45a049;
    }

    
</style>
   <form method="post">
        <h2>Signup</h2>
        <div style="color: red;font-size: 16px;">
            <?php

               if(isset($errors) && is_array( $errors ))
            {
                foreach($errors as $error) {
                    echo $error . "<br>";
                }
            }
           ?>
        </div>
        <input class="input" type="text" name="username" placeholder='Username' value="<?= isset($_POST['username']) ? $_POST['username'] : '' ?>"><br>
        <input class="input" type="password" name="password" placeholder="Password" value="<?= isset($_POST['password']) ? $_POST['password'] : '' ?>"><br>
        <input class="input" type="email" name="email" placeholder="Email" value="<?= isset($_POST['email']) ? $_POST['email'] : '' ?>"><br>
        <select class="input" name="gender" style="width: 310px;">
            <option><?= isset($_POST['gender']) ? $_POST['gender'] : '--Choose gender--' ?></option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select><br><br>
        <button class="btn" type="submit">Sign up</button>

   </form>

</body>
</html>