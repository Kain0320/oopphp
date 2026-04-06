<?php

include("init.php");
$ses = new Session();

    if ($ses->exists("USER")) {
        $ses->remove("USER");
    }
// session_destroy();
header("Location: login.php");
die;