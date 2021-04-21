<?php


namespace App\Controller;


use App\Entity\Country;
use App\Model\CountryManager;

/**
 * Class CountryController
 * gestion des actions sur la country
 * @package App\Controller
 */
class CountryController
{


    private $countryManager;

    public function __construct()
    {
        $this->countryManager = new CountryManager();
    }

    /**
     * Formulaire d'ajout de pays
     */
    public function formAddCountry() {
        require('views/addcountry.php');
    }

    /**
     * Validdation de l'ajout d'un pays
     */
    public function add()
    {
        $this->countryManager->addCountry($_POST['name']);
        header('Location: index.php?token='.$_GET['token']);
    }

}
