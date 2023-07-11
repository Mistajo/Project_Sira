<?php 

class MembreModel extends ModelGenerique
{
    public function inserer(Membre $membre)
    {
        $query = "INSERT INTO membre (pseudo, mdp, nom, prenom, email, civilite, statut, date_enregistrement) VALUES(:pseudo, :mdp, :nom, :prenom, :email, :civilite, :statut, now())";

        $this->executeRequete($query,[
            "pseudo"    => $membre->getPseudo(),
            "mdp"       => password_hash($membre->getMdp(),PASSWORD_DEFAULT),
            "nom"       => $membre->getNom(),
            "prenom"    => $membre->getPrenom(),
            "email"     => $membre->getEmail(),
            "civilite"  => $membre->getCivilite(),
            "statut"    => $membre->getStatut() ?? 0
        ]);
    }

    public function connexion($pseudo, $password)
    {
        $stmt = $this->executeRequete("SELECT * FROM membre WHERE pseudo =:pseudo", ["pseudo" =>$pseudo]);

        if ( $stmt->rowCount() !=0 )
        {
            $res = $stmt->fetch();

            if (password_verify($password, $res['mdp'])) 
            {
                return new Membre($res);
            }
        }
        return null;
    }

    public function listeMembre(){
        $stmt = $this->executeRequete("SELECT * FROM membre");

        $tab = [];

        while($res = $stmt->fetch()){
            $m = new Membre($res);
            $tab[] = $m;
        }

        return $tab;
    }

    public function getMembre(int $id){
        $stmt = $this->executeRequete("SELECT * FROM membre WHERE id_membre = :id", ['id' => $id]);

        return new Membre($stmt->fetch());
    }

    public function update(Membre $membre){
        $query = "UPDATE membre SET pseudo = :pseudo, nom = :nom, prenom = :prenom, civilite = :sexe, statut = :statut, email = :email WHERE id_membre = :id";

        $stmt = $this->executeRequete($query, [
            "pseudo"    => $membre->getPseudo(),
            "nom"       => $membre->getNom(),
            "prenom"    => $membre->getPrenom(),
            "sexe"      => $membre->getCivilite(),
            "statut"    => $membre->getStatut(),
            "email"     => $membre->getEmail(),
            "id"        => $membre->getId_membre()
        ]);
    }

    public function delete(Membre $membre){
        if( $this->exists("commande", "id_membre", $membre->getId_membre()) ){
            throw new Exception("Ce membre possède au moins une commande");
        }

        $this->executeRequete("DELETE FROM membre WHERE id_membre = :id", ["id" => $membre->getId_membre()]);
    }

}