<?php

        if(session_id()=="") {
            session_start();
            session_regenerate_id();
        }
	require_once "../model/Connexion.php";
        require_once "../includes/footer.php";
        require_once '../model/DialogueBD.php';
        try {
            $undlg = new DialogueBD();
        }
        catch (Exception $e) {
        $erreur = $e->getMessage();
        }
        $cmd = @$_GET['cmd'];
        
        echo '<h1>Liste des commandes à valider</h1>';
        
        if (($cmd == 'connexion') ) {
            $UserId=@$_POST['username'];
            $UserPwd=@$_POST['password'];
            $request='SELECT id FROM admin WHERE username="'.$UserId.'" AND password="'.$UserPwd.'"';
            $res=$undlg->SQLRequete($request);
            foreach($res as $user){
                $_SESSION['UserId']=$user['id'];    
            }  
        }
        if($cmd=='confirm'){
            $request='UPDATE Orders SET  status=10 WHERE id='.@$_GET['id'];
            $res=$undlg->SQLRequete($request);
        }  
        if(isset($_SESSION['UserId'])){
            $request="SELECT id, customer_id, date, status FROM orders WHERE status=2";
            $nbP=0;
            $res=$undlg->SQLRequete($request);
            foreach($res as $order){  
		$id[] = $order['id'];
		$customer[] = $order['customer_id'];
		$date[] = $order['date'];
		$status[] = $order['status'];
		$nbP++;
            }
            echo '<table width="100%">
                    <thead>
                        <td>Numéro de la commande</td>
                        <td>Numéro du client</td>
                        <td>Date de commande</td>
                        <td>statut</td>
                        <td></td>
                    </thead>';
            for ($i=0;$i<$nbP;$i++)
                    {
                            echo '<tr>';
                            echo "<td>$id[$i]</td>";
                            echo "<td>$customer[$i]</td>";
                            echo "<td>$date[$i]</td>";
                            echo "<td>$status[$i]</td>";
                            echo "<td><a href=controllerAdmin.php?cmd=confirm&id=".$id[$i].">Valider la commande</a></td>";
                    }    
        }
        else{
            echo   '<section>
                    <h1>Connexion Admin</h1>
                    <form action="controllerAdmin.php?cmd=connexion" method="post">
                        <label for="champNom">&nbsp  &nbsp &nbsp  &nbsp  &nbsp  &nbsp &nbsp;Login:</label>
                        <input type="text" name="username" id="username" required />
                        <p> &nbsp  &nbsp; </p><label for="champMdp">Mot de passe :</label>
                        <input type="password" name="password" id="password" required />
                        <input type="submit" value="Connexion">
                    </form> 
                    </section>';
        }
        ?>