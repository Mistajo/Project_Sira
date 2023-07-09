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


}