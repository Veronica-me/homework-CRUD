<?php
namespace App\repositories;

use App\database\Connection;

class PhoneRepository
{
    /**
     * @var \PDO
     */
    private $pdo;

    public function __construct()
    {
        $this->pdo = Connection::createConnect();
    }

    public function getPhone()
    {
        $stmt = $this->pdo->prepare('select * from table_name left join table_phones on table_name.phone_id=table_phones.phone_id ');
        $stmt->bindParam('$phone_id', $phone_id);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function create (string $phone)
    {
        $stmt = $this->pdo->prepare('insert into table_phones (phone_id, phone_number) values (?,?)');
        $stmt->bindParam('phone_id', $phone);
        $stmt->execute();
    }


}