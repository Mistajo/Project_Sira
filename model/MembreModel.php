<?php 

class MembreModel extends ModelGenerique
{
    public function inserer($membre)
    {
        $query = "INSERT INTO membre (pseudo, mdp, nom, prenom, email, civilte, statut, date_enregistrement) VALUES(:pseudo, :mdp, :nom, :prenom, :email, :civilte, 0, now())";

        $this->executeRequete($query,[
            "pseudo"    => $membre->getPseudo(),
            "mdp"       => password_hash($membre->getMdp(),PASSWORD_DEFAULT),
            "nom"       => $membre->getNom(),
            "prenom"    => $membre->getPrenom(),
            "email"     => $membre->getEmail(),
            "civilte"   => $membre->getCivilte()
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
                extract($res);

                return new Membre($id_membre, $pseudo, $mdp, $nom, $prenom, $email, $civilte, $statut, $date_enregistrement);
            }
        }
        return null;
    }
    public function listeMembre()
    {
        $stmt = $this->executeRequete("SELECT * FROM membre");

        $tmembre = [];

        while ($res = $stmt->fetch())
        
        {
            extract($res);
            $tmembre[] = new Membre($id_membre,$pseudo,$mdp,$nom,$prenom,$email,$civilte,$statut,$date_enregistrement);
        }

        // var_dump($tAgence);

        return $tmembre;
    }

     public function getMembre(int $id){
        $stmt = $this->executeRequete("SELECT * FROM membre WHERE id_membre = :id", ['id' => $id]);

        return new Membre();
    }

    public function update(Membre $membre){
        $query = "UPDATE membre SET pseudo = :pseudo, nom = :nom, prenom = :prenom, civilite = :sexe, statut = :statut, email = :email WHERE id_membre = :id";

        $stmt = $this->executeRequete($query, [
            "pseudo"    => $membre->getPseudo(),
            "nom"       => $membre->getNom(),
            "prenom"    => $membre->getPrenom(),
            "sexe"      => $membre->getCivilte(),
            "statut"    => $membre->getStatut(),
            "email"     => $membre->getEmail(),
            "id"        => $membre->getId_membre()
        ]);
    }

    public function delete(Membre $membre){
        $this->executeRequete("DELETE FROM membre WHERE id_membre = :id", ["id" => $membre->getId_membre()]);
    }
    }
