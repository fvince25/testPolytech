<?php


namespace App\Controller;

use App\Model\Entity;
use App\Entity\User;
use App\Model\UserManager;

/**
 * Class UserController
 * Les actions sur la gestion des utilisateurs
 * @package App\Controller
 */
class UserController
{

    private $userManager;

    public function __construct()
    {
        $this->userManager = new UserManager();
    }


    /**
     * Validation de l'ajout d'un utilisateur
     */
    public function add()
    {
        $user = new User();
        $user->setFirstName($_POST['firstName']);
        $user->setLastName($_POST['lastName']);
        $user->setEmail($_POST['email']);
        $user->setPassword(password_hash($_POST['password'],PASSWORD_DEFAULT));

        $this->userManager->add($user);
    }

    /**
     * Valide les identifiants de connexion
     * @return mixed
     */
    public function verifyCredentials()
    {
        $user = $this->userManager->getUser($_POST['email']);

        if (!$user->getEmail()) {
            return 'noMatchingEmail';
        } else {

            if (password_verify($_POST['password'], $user->getPassword())) {

                // On renvoie un payload
                return [
                    'firstName'=>$user->getFirstName(),
                    'lastName'=>$user->getLastname(),
                    'email'=>$user->getEmail(),
                ];
            } else {
                return 'wrongPassword';
            }
        }
    }

}



