<?php
        session_start();
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
        
        if(isset($_SESSION['UserId'])){
            $request='SELECT firstname, surname, add1, add2, city, postcode, phone, email FROM customers WHERE id='.$_SESSION['UserId'] ;
            echo '<p>'.$request.'</p>';
            $res=$undlg->SQLRequete($request);
            foreach($res as $adresse){  
		$forename[] = $adresse['firstname'];
		$surename[] = $adresse['surname'];
                $add1[] = $adresse['add1'];
		$add2[] = $adresse['add2'];
		$city[] = $adresse['city'];
		$postcode[] = $adresse['postcode'];
                $phone[] = $adresse['phone'];
		$email[] = $adresse['email'];
            }
        
        }
        
?>