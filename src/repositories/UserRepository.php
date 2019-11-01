<?php
namespace App\repositories;



class UserRepository
{
    /**
     * @var \PDO
     */
    private $pdo;


    public function __construct()
    {
        $this->pdo = \App\database\Connection::createConnect();

    }

    public function get (int $id)
    {
        $stmt = $this->pdo->query('select * from table_name where id = '.$id);

        return $stmt->fetch();
    }

    public function getList ()
    {

        $stmt = $this->pdo->query('select * from table_name ');

        return $stmt->fetchAll();
    }

    public function update (int $id, array $user)
    {

        $this->pdo->exec('update table_name set
    name_1 = "'.$user['name_1'].'",
    name_2 = "'.$user['name_2'].'",
    email = "'.$user['email'].'"
    where id ='.$id);

    }

    public function create (array $user)
    {
        $this->pdo->exec('insert into table_name (name_1, name_2, email) value 
                            ("' . $user['name_1'] . '", "' . $user['name_2'] . '", "' . $user['email'] . '")'
        );

    }

    public function delete (int $id)
    {
        $this->pdo->exec('delete from table_name where id = '.$id);
    }

}
