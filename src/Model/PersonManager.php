<?php

namespace App\Model;

use App\Entity\Country;
use App\Entity\Person;

class PersonManager extends Manager {

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return Person[] | array
     */
    public function getPersons()
    {
        $query = $this->db->prepare('SELECT uid,firstName,lastName,country_id, name, id FROM ' . Person::$_TABLE . ' INNER JOIN ' . Country::$_TABLE . ' ON ' . Person::$_TABLE . '.country_id=' . Country::$_TABLE . '.id');
        $query->execute();
        $results = $query->fetchAll();
        $persons = [];
        foreach ($results as $result) {
            $country= (new Country())->setId($result['id'])->setName($result['name']);
            $persons[] = (new Person())->setUid($result['uid'])->setFirstName($result['firstName'])->setLastName($result['lastName'])->setCountryId($result['country_id'])->setCountry($country);
        }
        return $persons;
    }

    public function getPerson($uid)
    {
        $query = $this->db->prepare('SELECT * FROM ' . Person::$_TABLE . '  WHERE uid = ?');
        $query->execute(array($uid));
        $result = $query->fetch();
        return (new Person())->setUid($result['uid'])->setFirstName($result['firstName'])->setLastName($result['lastName'])->setCountryId($result['country_id']);
    }

    /**
     * @param Person $person
     * @return mixed
     */
    function add($person)
    {
        try {
            $sql = "INSERT INTO `" . Person::$_TABLE . "` (`uid`, `firstName`, `lastName`, `country_id`) VALUES (?,?,?,?)";
            $query = $this->db->prepare($sql);
            return $query->execute(array($person->getUid(), $person->getFirstName(), $person->getLastname(), $person->getCountryId()));

        } catch(PDOException $e) {
            echo "une erreur s'est produit ".$e->getMessage();
        }

    }

    /**
     * @param Person $person
     * @return mixed
     */
    function update($person)
    {
        $sql = "UPDATE `" . Person::$_TABLE . "` SET `firstName`=?,`lastName`=?,`country_id`=? WHERE `uid`=?";
        $query = $this->db->prepare($sql);
        $query->execute(array($person->getFirstName(), $person->getLastname(), $person->getCountryId(), $person->getUid()));

    }

    /**
     * @param string $uid
     * @return mixed
     */
    function delete($uid)
    {
        $query = $this->db->prepare('DELETE FROM ' . Person::$_TABLE . ' WHERE uid=?');
        return $query->execute(array($uid));
    }
}
