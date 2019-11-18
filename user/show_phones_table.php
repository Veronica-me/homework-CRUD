<?php

require_once '../load.php';


$userPhoneTable = new \App\repositories\PhoneDbRepository();
$phoneArr = $userPhoneTable->getPhoneList();

echo '<table>';
echo '<tr>';
echo '<th>phone ID</th>';
echo '<th>phone number</th>';

echo '</tr>';

foreach ($phoneArr as $value){

    echo '<tr>';
    echo '<th>' .$value['phone_id'].'</th>';
    echo '<th>' .$value['phone_number'].'</th>';

    echo '</tr>';
}
echo '</table>';
