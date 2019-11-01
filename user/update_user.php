<?php
require_once '../src/database/Connection.php';

$pdo = App\database\Connection::createConnect();

if (isset($_GET['id'])) {
    $id = $_GET['id'];


    $stmt = $pdo->query('select * from table_name where id = '.$id);

    $user = $stmt->fetch();

    echo '<form name="update" method="post" action="update_user.php">
    <input type="hidden" name="id" value="'.$user['id'].'" ><br>
    <input type="text" name="name_1" value="'.$user['name_1'].'" placeholder="first name"><br>
    <input type="text" name="name_2" value="'.$user['name_2'].'" placeholder="last name"><br>
    <input type="text" name="email" value="'.$user['email'].'" placeholder="email"><br>
    <input type="submit" value="save">
    <form>';
}

var_dump($_POST);

if (isset($_POST['id'])) {
    $id = $_POST['id'];


    $stmt = $pdo->query('select * from table_name where id = '.$id);

    $user = $stmt->fetch();

    $user['name_1'] = $_POST['name_1'];
    $user['name_2'] = $_POST['name_2'];
    $user['email'] = $_POST['email'];

    $pdo->exec('update table_name set
    name_1 = "'.$user['name_1'].'",
    name_2 = "'.$user['name_2'].'",
    email = "'.$user['email'].'"
    where id ='.$id);

    header("Location: /user/show_user.php");
}