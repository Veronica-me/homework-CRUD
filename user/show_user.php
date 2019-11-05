<?php

require_once '../load.php';

$userReposirtory = new \App\repositories\UserRepository();
$userPhone = new \App\repositories\PhoneRepository();
$users = $userReposirtory->getList();
//$userNumner = $userPhone->getPhone('1');

$usersPhones = $userPhone->getPhone();


echo '<a href="create_user.php">Create</a><br><br>';

echo '<table>';
echo '<tr>';
echo '<th>first name</th>';
echo '<th>last name</th>';
echo '<th>email</th>';
echo '<th>phone_id</th>';
echo '<th>phone_number</th>';
echo '<th>create</th>';
echo '<th>action</th>';
echo '</tr>';


foreach ($usersPhones as $user){

    echo '<tr>';
    echo '<th>' .$user['name_1'].'</th>';
    echo '<th>' .$user['name_2'].'</th>';
    echo '<th>' .$user['email'].'</th>';
    echo '<th>' .$user['phone_id'].'</th>';
    echo '<th>' .$user['phone_number'].'</th>';
    echo '<th>' .$user['create_id'].'</th>';
    echo '<th><a href="update_user.php?id='.$user['id'].'">edit</th>';
    echo '<th><a href="delete_user.php?id='.$user['id'].'">delete</th>';
    echo '</tr>';


}

echo '</table>';
