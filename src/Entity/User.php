<?php


namespace App\Entity;


class User extends BaseEntity
{

    public static $_TABLE = "users";

    private $firstName;
    private $lastName;
    private $uid;
    private $email;
    private $password;



    public function __construct()
    {
        $this->setUid(uniqid());
    }

    public function setUid($uid)
    {
        $this->uid = $uid;
        return $this;
    }


    /**
     * @return string
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * @return String
     */
    public function getLastname()
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
        return $this;
    }



    /**
     * @return String
     */
    public function getEmail()
    {
        return $this->email;
    }


    /**
     * @param string $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }


    /**
     * @return String
     */
    public function getPassword()
    {
        return $this->password;
    }


    /**
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }


}
