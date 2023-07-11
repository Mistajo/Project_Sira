<?php

class Membre{

    private $id_membre;
    private $pseudo;
    private $mdp;
    private $nom;
    private $prenom;
    private $email;
    private $civilite;
    private $statut;
    private $date_enregistrement;

//     public function __construct($id_membre, $pseudo, $mdp, $nom, $prenom, $email, $civilte, $statut, $date_enregistrement)
//     {
//           $this->id_membre = $id_membre;
//           $this->pseudo = $pseudo;
//           $this->mdp = $mdp;
//           $this->nom = $nom;
//           $this->prenom = $prenom;
//           $this->email = $email;
//           $this->civilte = $civilte;
//           $this->statut = $statut;
//           $this->date_enregistrement = $date_enregistrement;
          
//     }

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
      * Get the value of id_membre
      */
     public function getId_membre()
     {
          return $this->id_membre;
     }

     /**
      * Set the value of id_membre
      */
     public function setId_membre($id_membre): self
     {
          $this->id_membre = $id_membre;

          return $this;
     }

     /**
      * Get the value of pseudo
      */
     public function getPseudo()
     {
          return $this->pseudo;
     }

     /**
      * Set the value of pseudo
      */
     public function setPseudo($pseudo): self
     {
          $this->pseudo = $pseudo;

          return $this;
     }

     /**
      * Get the value of mdp
      */
     public function getMdp()
     {
          return $this->mdp;
     }

     /**
      * Set the value of mdp
      */
     public function setMdp($mdp): self
     {
          $this->mdp = $mdp;

          return $this;
     }

     /**
      * Get the value of nom
      */
     public function getNom()
     {
          return $this->nom;
     }

     /**
      * Set the value of nom
      */
     public function setNom($nom): self
     {
          $this->nom = $nom;

          return $this;
     }

     /**
      * Get the value of prenom
      */
     public function getPrenom()
     {
          return $this->prenom;
     }

     /**
      * Set the value of prenom
      */
     public function setPrenom($prenom): self
     {
          $this->prenom = $prenom;

          return $this;
     }

     /**
      * Get the value of email
      */
     public function getEmail()
     {
          return $this->email;
     }

     /**
      * Set the value of email
      */
     public function setEmail($email): self
     {
          $this->email = $email;

          return $this;
     }

     /**
      * Get the value of civilte
      */
     public function getCivilite()
     {
          return $this->civilite;
     }

     /**
      * Set the value of civilte
      */
     public function setCivilite($civilite): self
     {
          $this->civilite = $civilite;

          return $this;
     }

     /**
      * Get the value of statut
      */
     public function getStatut()
     {
          return $this->statut;
     }

     /**
      * Set the value of statut
      */
     public function setStatut($statut): self
     {
          $this->statut = $statut;

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
      */
     public function setDate_enregistrement($date_enregistrement): self
     {
          $this->date_enregistrement = $date_enregistrement;

          return $this;
     }
}