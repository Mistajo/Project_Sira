<?php

class Agence
{
    private $id_agence;
    private $titre;
    private $adresse;
    private $ville;
    private $cp;
    private $description;
    private $photo;

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
     * Get the value of adresse
     */ 
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set the value of adresse
     *
     * @return  self
     */ 
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get the value of ville
     */ 
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set the value of ville
     *
     * @return  self
     */ 
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get the value of cp
     */ 
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * Set the value of cp
     *
     * @return  self
     */ 
    public function setCp($cp)
    {
        $this->cp = $cp;

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
}