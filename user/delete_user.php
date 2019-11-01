<?php
require_once '../load.php';


$userRepository = new \App\repositories\UserRepository();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $user = $userRepository->get($id);


  if (!empty($user)) {
    echo '<form name="delete" method="post" action="delete_user.php">
    <input type="hidden" name="id" value="'.$user['id'].'">
    Are you sure want to delete user: '.
        $user['name_1'].'   
    <input type="hidden" name="id" value="'.$user['id'].'" ><br>
    <input type="submit" value="delete">
    <form>';
    } else {
      echo 'user is not exist<a href="show_user.php">back</a>';
  }

}


if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $userRepository->delete($id);

    header("Location: /user/show_user.php");
}