<?php

        require_once "../model/Connexion.php";
	require_once "../includes/header.php";
        require_once "../model/produitsDAO.php";
	require_once "../includes/footer.php";
        require_once '../model/DialogueBD.php';
        try {
            $undlg = new DialogueBD();
        }
        catch (Exception $e) {
        $erreur = $e->getMessage();
        }
        $cmd = @$_GET['cmd'];
            if($cmd=="achat"){
            $daoP = new produitsDAO();
            $prods = $daoP->getProduit(@$_GET['produit']);
            $nbP=0;
            while($tabP = $prods->fetch())
            {
                    $id[] = $tabP['id'];
                    $nom[] = $tabP['name'];
                    $cat_id=$tabP['cat_id'];
                    $description[] = $tabP['description'];
                    $image[] = $tabP['image'];
                    $prix[] = $tabP['price'];
                    $nbP++;
            }
        }
        

?>
