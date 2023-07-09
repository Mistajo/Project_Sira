<?php 

class AgenceModel extends ModelGenerique
{
    public function inserer($agence)
    {
        $query = "INSERT INTO agence (titre, adresse, ville, cp, description, photo,) VALUES(:titre, :adresse, :ville, :cp, :description, :photo, now())";

        $this->executeRequete($query,[
            "titre"    => $agence->getTitre(),
            "adresse"       => $agence->getAdresse(),
            "ville"       => $agence->getVille(),
            "cp"    => $agence->getCp(),
            "description"     => $agence->getDescription(),
            "photo"   => $agence->getPhoto(),
        ]);
    }
}