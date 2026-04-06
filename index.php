<?php

include "init.php";

$array ['username'] = 'mary2';
$array ['password'] = 'password';
$array ['email'] = 'mary2@example.com';
// User::action()->update_by_id(2, $array);
$data = User::action()->get_by_username('mary2');
echo '<pre>';
var_dump($data);