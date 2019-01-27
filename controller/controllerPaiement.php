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
        $cmd = @$_GET['cmd'];        
        if($cmd=='new'){
            $request='INSERT INTO delivery_addresses( firstname, lastname, add1, add2, city, postcode, phone, email) VALUES ("'.@$_POST['forename'].'","'.@$_POST['surename'].'","'.@$_POST['add1'].'","'.@$_POST['add2'].'","'.@$_POST['city'].'","'.@$_POST['postcode'].'","'.@$_POST['phone'].'","'.@$_POST['email'].'")';
            $res=$undlg->SQLRequete($request);
        }
        if($cmd=='customer'){  
            $request='SELECT firstname, surname, add1, add2, city, postcode, phone, email FROM customers WHERE id='.$_SESSION['UserId'] ;
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
            $request='INSERT INTO delivery_addresses( firstname, lastname, add1, add2, city, postcode, phone, email) VALUES ("'.$forename[0].'","'.$surename[0].'","'.$add1[0].'","'.$add2[0].'","'.$city[0].'","'.$postcode[0].'","'.$phone[0].'","'.$email[0].'")';
            
            $res=$undlg->SQLRequete($request);
        }
        
        $request='SELECT id FROM delivery_addresses ORDER BY id DESC LIMIT 1';
        $res=$undlg->SQLRequete($request);
        
        foreach($res as $add_id){
                    $add[]=$add_id['id'];
                }
        $request='UPDATE Orders SET  delivery_add_id='.$add[0].', status=1 WHERE id='.$_SESSION['SESS_ORDERNUM'];
        $res=$undlg->SQLRequete($request);
        ?>