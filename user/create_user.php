<?php
require_once '../load.php';


$userReposirtory = new \App\repositories\UserRepository();
$userPhone = new \App\repositories\PhoneRepository();



if (isset($_POST['name_1']) && isset($_POST['name_2']) && isset($_POST['email'])){
    $user['name_1'] = $_POST['name_1'];
$user['name_2'] = $_POST['name_2'];
$user['email'] = $_POST['email'];

$userReposirtory->create($user);
//$userPhone->create($user);

header("Location: /user/show_user.php");
}

    echo '<form name="create" method="post" action="create_user.php">
    
    <input type="text" name="name_1" value="" placeholder="first name"><br>
    <input type="text" name="name_2" value="" placeholder="last name"><br>
    <input type="text" name="email" value="" placeholder="email"><br>
    <input type="text" name="phone_id" value="" placeholder="phone_id"><br>
    <input type="submit" value="save">
    <form>';

