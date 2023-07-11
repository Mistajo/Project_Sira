<?php 

class CommandeModel extends ModelGenerique{

     public function inserer(Commande $commande){
          var_dump($commande);
          $query = "INSERT INTO commande VALUES(NULL, :membre, :agence, :vehicule, :debut, :fin, :total, now())";

          $this->executeRequete($query, [
               "membre"       => $commande->getId_membre(),
               "agence"       => $commande->getId_agence(),
               "vehicule"     => $commande->getId_vehicule(),
               "debut"        => $commande->getDate_heure_depart(),
               "fin"          => $commande->getDate_heure_fin(),
               "total"        => $commande->getPrix_total()
          ]);
     }
}