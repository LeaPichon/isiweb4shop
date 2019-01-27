<?php
require_once 'Connexion.php';
class DialogueBD {
//put your code here 
    public function SQLRequete( $request ) {
        try {$conn = Connexion::getConnexion();
        //$sql = "SELECT id_adherent,nom_adherent,prenom_adherent,ville_adherent FROM adherent ORDER BY nom_adherent ASC";
        $sth = $conn->prepare($request);$sth->execute();$results =$sth->fetchAll(PDO::FETCH_ASSOC);
        return $results;
        
        } catch (PDOException $e) {
            $erreur = $e->getMessage();  
        }
        
        }
        
}
?>
