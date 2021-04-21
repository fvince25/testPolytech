<?php


namespace App\Model;


use App\Entity\User;

class UserManager extends Manager
{

    public function __construct()
    {
        parent::__construct();
    }


    public function getUser($email)
    {
        $query = $this->db->prepare('SELECT * FROM ' . User::$_TABLE . '  WHERE email = ?');
        $query->execute(array($email));
        $result = $query->fetch();
        return (new User())
            ->setUid($result['uid'])
            ->setFirstName($result['firstName'])
            ->setLastName($result['lastName'])
            ->setEmail($result['email'])
            ->setPassword($result['password']);
    }

    /**
     * @param User $user
     * @return mixed
     */
    function add($user)
    {
        try {

            $sql = "INSERT INTO `" . User::$_TABLE . "` (`uid`, `firstName`, `lastName`, `email` , `password`) VALUES (?,?,?,?,?)";
            $query = $this->db->prepare($sql);
            return $query->execute(array($user->getUid(), $user->getFirstName(), $user->getLastname(), $user->getEmail(), $user->getPassword()));

        } catch(PDOException $e) {
            echo "une erreur s'est produit ".$e->getMessage();
        }

    }
}
