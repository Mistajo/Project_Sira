<?php

class Vehicule
{
    private $id_vehicule;
    private $id_agence;
    private $titre;
    private $marque;
    private $modele;
    private $description;
    private $photo;
    private $prix_journalier;

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
     * Get the value of titre
     */ 
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set the value of titre
     *
     * @return  self
     */ 
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get the value of marque
     */ 
    public function getMarque()
    {
        return $this->marque;
    }

    /**
     * Set the value of marque
     *
     * @return  self
     */ 
    public function setMarque($marque)
    {
        $this->marque = $marque;

        return $this;
    }

    /**
     * Get the value of modele
     */ 
    public function getModele()
    {
        return $this->modele;
    }

    /**
     * Set the value of modele
     *
     * @return  self
     */ 
    public function setModele($modele)
    {
        $this->modele = $modele;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of photo
     */ 
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set the value of photo
     *
     * @return  self
     */ 
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get the value of prix_journalier
     */ 
    public function getPrix_journalier()
    {
        return $this->prix_journalier;
    }

    /**
     * Set the value of prix_journalier
     *
     * @return  self
     */ 
    public function setPrix_journalier($prix_journalier)
    {
        $this->prix_journalier = $prix_journalier;

        return $this;
    }
}