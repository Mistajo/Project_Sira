<?php 

class AgenceModel extends ModelGenerique
{
    public function insererAgence($agence)
    {
        var_dump($agence);
        $query = "INSERT INTO agence (titre, adresse, ville, cp, description, photo) VALUES(:titre, :adresse, :ville, :cp, :description, :photo)";

        $this->executeRequete($query,[
            "titre"    => $agence->getTitre(),
            "adresse"       => $agence->getAdresse(),
            "ville"       => $agence->getVille(),
            "cp"    => $agence->getCp(),
            "description"     => $agence->getDescription(),
            "photo"   => $agence->getPhoto()
        ]);
    }

    public function getAgence() 
    {
        $stmt =$this->executeRequete("SELECT * FROM agence");

        $tAgence = [];

        

        while ($res = $stmt->fetch())
        
        {
            extract($res);
            $tAgence[] = new Agence($id_agence,$titre,$adresse,$ville,$cp,$description,$photo);
        }

        // var_dump($tAgence);

        return $tAgence;
    }
}