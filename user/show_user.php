<?php
require_once '../src/database/Connection.php';

$pdo = App\database\Connection::createConnect();

$stmt = $pdo->query('select * from table_name');

$users = $stmt->fetchAll();

echo '<table>';
echo '<tr>';
echo '<th>first name</th>';
echo '<th>last name</th>';
echo '<th>email</th>';
echo '<th>phone_id</th>';
echo '<th>create</th>';
echo '<th>action</th>';
echo '</tr>';


foreach ($users as $user){


    echo '<tr>';
    echo '<th>' .$user['name_1'].'</th>';
    echo '<th>' .$user['name_2'].'</th>';
    echo '<th>' .$user['email'].'</th>';
    echo '<th>' .$user['phone_id'].'</th>';
    echo '<th>' .$user['create_id'].'</th>';
    echo '<th><a href="update_user.php?id='.$user['id'].'">edit</th>';
    echo '<th><a href="delete_user.php?id='.$user['id'].'">delete</th>';
    echo '</tr>';


}

echo '</table>';
