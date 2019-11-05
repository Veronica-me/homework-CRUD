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
      $stmt = $this->pdo->prepare('select * from table_name where id = :id');
      $stmt->bindValue('id', $id);
      $stmt->execute();
      /*  $stmt = $this->pdo->query('select * from table_name where id = '.$id);*/

        return $stmt->fetch();
    }

    public function getList ()
    {

        $stmt = $this->pdo->query('select * from table_name ');

        return $stmt->fetchAll();
    }

    public function update (int $id, array $user)
    {
        $stmt = $this->pdo->prepare('update table_name set
                        name_1 = :name_1;
                        name_2 = :name_2;
                        email = :email;
                        where id = :id'
        );
        $firstName = $user['name_1'];
        $lastName = $user['name_2'];

        $stmt->bindParam('name_1', $firstName, \pdo::param_str);
        $stmt->bindValue('name_2', $lastName, \pdo::param_str);
        $stmt->bindValue('email', $user['email'], \pdo::param_str);
        $stmt->bindValue('id', $id, \pdo::param_int);

        $stmt->execute();

     /*   $this->pdo->exec('update table_name set
    name_1 = "'.$user['name_1'].'",
    name_2 = "'.$user['name_2'].'",
    email = "'.$user['email'].'"
    where id ='.$id); */

    }

    public function create (array $user)
    {
       $stmt = $this->pdo->prepare('insert into table_name (name_1, name_2, email) values (?, ?, ?)');
       $stmt->execute([
           $user['name_1'],
           $user['name_2'],
           $user['email']
       ]);
       /* $this->pdo->exec('insert into table_name (name_1, name_2, email) value
                            ("' . $user['name_1'] . '", "' . $user['name_2'] . '", "' . $user['email'] . '")'
        );*/

    }

    public function delete (int $id)
    {
       $stmt = $this->pdo->prepare('delete from table_name where id = :id');
       $stmt->bindValue('id', $id);
       $stmt->execute();
       /* $this->pdo->exec('delete from table_name where id = '.$id);*/
    }

}
