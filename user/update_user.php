<?php
require_once '../load.php';
/*require_once '../src/database/Connection.php';

$pdo = App\database\Connection::createConnect(); */

$userReposirtory = new \App\repositories\UserRepository();

if (isset($_GET['id'])) {
    $id = $_GET['id'];


  /*  $stmt = $pdo->query('select * from table_name where id = '.$id);

    $user = $stmt->fetch();  */

    $user = $userReposirtory->get($id);

    echo '<form name="update" method="post" action="update_user.php">
    <input type="hidden" name="id" value="'.$user['id'].'" ><br>
    <input type="text" name="name_1" value="'.$user['name_1'].'" placeholder="first name"><br>
    <input type="text" name="name_2" value="'.$user['name_2'].'" placeholder="last name"><br>
    <input type="text" name="email" value="'.$user['email'].'" placeholder="email"><br>
    <input type="text" name="phone_id" value="'.$user['phone_id'].'" placeholder="phone_id"><br>
    <input type="submit" value="save">
    <form>';
}



if (isset($_POST['id'])) {
    $id = $_POST['id'];



 /*   $userReposirtory->update($id, $user);
    /*
    $stmt = $pdo->query('select * from table_name where id = '.$id);

    $user = $stmt->fetch();

    $user['name_1'] = $_POST['name_1'];
    $user['name_2'] = $_POST['name_2'];
    $user['email'] = $_POST['email'];

    $pdo->exec('update table_name set
    name_1 = "'.$user['name_1'].'",
    name_2 = "'.$user['name_2'].'",
    email = "'.$user['email'].'"
    where id ='.$id); */

    header("Location: /user/show_user.php");
}