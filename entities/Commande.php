<?php

class Commande
{
    private $id_commande;
    private $id_membre;
    private $id_agence;
    private $id_vehicule;
    private $date_heure_depart;
    private $date_heure_fin;
    private $prix_total;
    private $date_enregistrement;

    public function __construct($data = []){

        foreach($data as $key => $value){
             //création de la methode set...
             $methode  = "set" . ucfirst(  $key ) ;

             //teste si le setter existe
             if( method_exists($this, $methode) ){
                  //appel du setter et en paramètre la valeur ($value)
                  $this->$methode($value);
             }
        }

   }

    /**
     * Get the value of id_commande
     */ 
    public function getId_commande()
    {
        return $this->id_commande;
    }

    /**
     * Set the value of id_commande
     *
     * @return  self
     */ 
    public function setId_commande($id_commande)
    {
        $this->id_commande = $id_commande;

        return $this;
    }

    /**
     * Get the value of id_membre
     */ 
    public function getId_membre()
    {
        return $this->id_membre;
    }

    /**
     * Set the value of id_membre
     *
     * @return  self
     */ 
    public function setId_membre($id_membre)
    {
        $this->id_membre = $id_membre;

        return $this;
    }

    /**
     * Get the value of id_agence
     */ 
    public function getId_agence()
    {
        return $this->id_agence;
    }

    /**
     * Set the value of id_agence
     *
     * @return  self
     */ 
    public function setId_agence($id_agence)
    {
        $this->id_agence = $id_agence;

        return $this;
    }

    /**
     * Get the value of id_vehicule
     */ 
    public function getId_vehicule()
    {
        return $this->id_vehicule;
    }

    /**
     * Set the value of id_vehicule
     *
     * @return  self
     */ 
    public function setId_vehicule($id_vehicule)
    {
        $this->id_vehicule = $id_vehicule;

        return $this;
    }

    /**
     * Get the value of date_heure_depart
     */ 
    public function getDate_heure_depart()
    {
        return $this->date_heure_depart;
    }

    /**
     * Set the value of date_heure_depart
     *
     * @return  self
     */ 
    public function setDate_heure_depart($date_heure_depart)
    {
        $this->date_heure_depart = $date_heure_depart;

        return $this;
    }

    /**
     * Get the value of date_heure_fin
     */ 
    public function getDate_heure_fin()
    {
        return $this->date_heure_fin;
    }

    /**
     * Set the value of date_heure_fin
     *
     * @return  self
     */ 
    public function setDate_heure_fin($date_heure_fin)
    {
        $this->date_heure_fin = $date_heure_fin;

        return $this;
    }

    /**
     * Get the value of prix_total
     */ 
    public function getPrix_total()
    {
        return $this->prix_total;
    }

    /**
     * Set the value of prix_total
     *
     * @return  self
     */ 
    public function setPrix_total($prix_total)
    {
        $this->prix_total = $prix_total;

        return $this;
    }

    /**
     * Get the value of date_enregistrement
     */ 
    public function getDate_enregistrement()
    {
        return $this->date_enregistrement;
    }

    /**
     * Set the value of date_enregistrement
     *
     * @return  self
     */ 
    public function setDate_enregistrement($date_enregistrement)
    {
        $this->date_enregistrement = $date_enregistrement;

        return $this;
    }
}