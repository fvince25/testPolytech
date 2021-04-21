<?php

namespace App\Model;

use App\Entity\Country;
use App\Entity\User;

class CountryManager extends Manager {

    public function getCountries()
    {
        $query = $this->db->query('SELECT * FROM ' . Country::$_TABLE);
        $results=$query->fetchAll();
        $countries = [];
        foreach ($results as $result) {
            $countries[] = (new Country())->setId($result['id'])->setName($result['name']);
        }
        return $countries;
    }

    public function getCountry($id){
        $query = $this->db->prepare('SELECT id,name FROM ' . Country::$_TABLE.' WHERE id=?');
        $query->execute([id]);
        $results=$query->fetch();
        return (new Country())->setName($results['name'])->setId($results['id']);
    }

    public function addCountry($name){
        try {

            $sql = "INSERT INTO `" . Country::$_TABLE . "` (`name`) VALUES (?)";
            $query = $this->db->prepare($sql);
            return $query->execute(array($name));

        } catch(PDOException $e) {
            echo "une erreur s'est produit ".$e->getMessage();
        }
    }
}
