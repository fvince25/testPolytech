<?php

namespace App\Controller;

use App\Model\Entity;
use App\Model\CountryManager;
use App\Entity\Person;
use App\Model\PersonManager;

/**
 * Class PersonController
 * Gestion des actions sur les souscripteurs
 * @package App\Controller
 */
class PersonController {

    private $personManager;
    private $countryManager;

    public function __construct()
    {
        $this->personManager = new PersonManager();
        $this->countryManager= new CountryManager();
    }


    /**
     * Forumlaire d'ajout  de personne
     */
    public function formAddPerson(){
        $countries = $this->countryManager->getCountries();
        require('views/addPerson.php');
    }

    /**
     * Formulaire d'édition de personnes
     */
    public function formEditPerson(){
        $countries = $this->countryManager->getCountries();
        $person=$this->personManager->getPerson($_GET['uid']);
        require('views/editPerson.php');
    }


    /**
     * Lite des personnes
     */
    public function getList()
    {
        $countries = $this->countryManager->getCountries();
        $persons = $this->personManager->getPersons();
        require('views/listPersons.php');

    }

    /**
     * Validation de l'ajout d'une personne
     */
    public function add()
    {
        $person = new Person();
        $person->setFirstName($_POST['firstName']);
        $person->setLastName($_POST['lastName']);
        $person->setCountryId($_POST['country_id']);
        $this->personManager->add($person);
        header('Location: index.php?token='.$_GET['token']);
    }

    /**
     * Validation de la mise à jour d'une personne
     */
    public function update()
    {
        $person = $this->personManager->getPerson($_POST['uid']);
        $person->setFirstName($_POST['firstName']);
        $person->setLastName($_POST['lastName']);
        $person->setCountryId($_POST['country_id']);
        $this->personManager->update($person);
        header('Location: index.php?token='.$_GET['token']);
    }

    /**
     * Validation de la suppression d'une personne
     */
    public function delete()
    {
        $uid = $_GET['uid'];
        $this->personManager->delete($uid);
        header('Location: index.php?token='.$_GET['token']);
    }
}
