<?php

class VehiculeModel extends ModelGenerique{

    public function getVehicule(int $id){
        $res = $this->getOne("vehicule", "id_vehicule", $id);
        return new Vehicule($res);
    }

    public function inserer(Vehicule $vehicule){
        $query = "INSERT INTO vehicule VALUES(NULL, :agence, :titre, :marque, :modele, :description, :photo, :prix)";
        $this->executeRequete($query, [
            "agence"  => $vehicule->getId_agence(),
            "titre"  => $vehicule->getTitre(),
            "marque"   => $vehicule->getMarque(),
            "modele"      => $vehicule->getModele(),
            "description"    => $vehicule->getDescription(),
            "photo"   => $vehicule->getPhoto(),
            "prix"   => $vehicule->getPrix_journalier(),
        ]);
    }

    public function Vehicules(){
        $stmt = $this->executeRequete("SELECT * FROM vehicule");

        $tabVehicule = [];

        while($res = $stmt->fetch()){
            $tabVehicule[] = new Vehicule($res);
        }

        return $tabVehicule;
    }

    public function update(Vehicule $vehicule){
    //  var_dump($agence); die;  
        $query = "UPDATE vehicule SET agence = :agence, titre = :titre, marque = :marque, modele = :modele, , description = :description, photo = :photo, prix = :prix WHERE id_vehicule = :id";

        $this->executeRequete($query, [
            "agence"  => $vehicule->getId_agence(),
            "titre"  => $vehicule->getTitre(),
            "marque"   => $vehicule->getMarque(),
            "modele"      => $vehicule->getModele(),
            "description"    => $vehicule->getDescription(),
            "photo"   => $vehicule->getPhoto(),
            "prix"   => $vehicule->getPrix_journalier(),
        ]);
    }
        public function delete(Vehicule $vehicule){
        $this->executeRequete("DELETE FROM vehicule WHERE id_vehicule = :id", ['id' => $vehicule->getId_vehicule()]);
     }
}