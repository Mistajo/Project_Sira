<?php

class AgenceModel extends ModelGenerique{

     public function getAgence(int $id){
          $res = $this->getOne("agence", "id_agence", $id);
          return new Agence($res);
     }

     public function inserer(Agence $agence){
          $query = "INSERT INTO agence VALUES(NULL, :titre, :adress, :ville, :cp, :desc, :photo)";
          $this->executeRequete($query, [
               "titre"   => $agence->getTitre(),
               "adress"  => $agence->getAdresse(),
               "ville"   => $agence->getVille(),
               "cp"      => $agence->getCp(),
               "desc"    => $agence->getDescription(),
               "photo"   => $agence->getPhoto()
          ]);
     }

     public function agences(){
          $stmt = $this->executeRequete("SELECT * FROM agence");

          $tab = [];

          while($res = $stmt->fetch()){
               $tab[] = new Agence($res);
          }

          return $tab;
     }

     public function update(Agence $agence){
        //  var_dump($agence); die;  
          $query = "UPDATE agence SET titre = :titre, adresse = :adr, ville = :ville, cp = :cp, description = :desc, photo = :photo WHERE id_agence = :id";

          $this->executeRequete($query, [
               "titre"   => $agence->getTitre(),
               "adr"  => $agence->getAdresse(),
               "ville"   => $agence->getVille(),
               "cp"      => $agence->getCp(),
               "desc"    => $agence->getDescription(),
               "photo"   => $agence->getPhoto(),
               "id"      => $agence->getId_agence()
          ]);
     }

     public function delete(Agence $agence){
          $this->executeRequete("DELETE FROM agence WHERE id_agence = :id", ['id' => $agence->getId_agence()]);
     }

}