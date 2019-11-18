<?php
namespace App\repositories;

use App\database\Connection;

class PhoneDbRepository
{
    /**
     * @var \PDO
     */

    private $pdo;

    public function __construct()
    {
        $this->pdo = Connection::createConnect();
    }

    public function getPhoneList() {

        $stmt = $this->pdo->query('select * from table_phones ');

        return $stmt->fetchAll();
    }




}