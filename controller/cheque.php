<?php
            session_start();
            require('../fpdf.php');
            require_once '../model/DialogueBD.php';
            require_once "../model/Connexion.php";
            try {
            $undlg = new DialogueBD();
            }
            catch (Exception $e) {
            $erreur = $e->getMessage();
            }
            
            
            $request='UPDATE Orders SET  payment_type="cheque", status=2 WHERE id='.$_SESSION['SESS_ORDERNUM'];
            $res=$undlg->SQLRequete($request);
      
                $request='SELECT firstname, lastname, add1, add2, city, postcode, phone, email FROM delivery_addresses JOIN orders ON orders.delivery_add_id=delivery_addresses.id WHERE orders.id='.$_SESSION['SESS_ORDERNUM'] ;
                
                $res=$undlg->SQLRequete($request);
                foreach($res as $adresse){  
                    $forename[] = $adresse['firstname'];
                    $surename[] = $adresse['lastname'];
                    $add1[] = $adresse['add1'];
                    $add2[] = $adresse['add2'];
                    $city[] = $adresse['city'];
                    $postcode[] = $adresse['postcode'];
                    $phone[] = $adresse['phone'];
                    $email[] = $adresse['email'];
            }
            $request='SELECT product_id, name,description,image,quantity FROM orders INNER JOIN orderitems ON orders.id=orderitems.order_id INNER JOIN products ON products.id=orderitems.product_id WHERE orders.id='.$_SESSION['SESS_ORDERNUM'];
            $nbP=0;
            $res=$undlg->SQLRequete($request);
            foreach($res as $product){  
		$id[] = $product['product_id'];
		$nom[] = $product['name'];
		$description[] = $product['description'];
		$image[] = $product['image'];
                $quantity[] = $product['quantity'];
		$nbP++;
            }	 
            $pdf = new FPDF();
            $pdf->AddPage();
            $pdf->SetFont('Arial','B',16);
            $pdf->Cell(40,10,utf8_decode('Commande n°:'.$_SESSION['SESS_ORDERNUM']));
            $pdf->Ln();
            $pdf->Cell(40,10,utf8_decode('Au nom de : '.$forename[0].' '.$surename[0]));
            $pdf->Ln();
            $pdf->Cell(40,10,utf8_decode('Adresse de livraison:'));
            $pdf->Ln();
            $pdf->Cell(40,10,utf8_decode($add1[0]));
            $pdf->Ln();
            $pdf->Cell(40,10,utf8_decode($add2[0]));
            $pdf->Ln();
            $pdf->Cell(40,10,utf8_decode($postcode[0].' '.$city[0]));
            $pdf->Ln();
            $pdf->Ln();
            $pdf->Cell(40,10,utf8_decode('Recapitulatif de la commande'));
            $pdf->Ln();
            for ($i=0;$i<$nbP;$i++)
		{
                    $pdf->Cell(40,10,utf8_decode($nom[$i].' '.$quantity[$i]));
                    $pdf->Ln();
		}
            $pdf->Ln();
            $pdf->Cell(40,10,utf8_decode('Envoyer votre chèque à l\'ordre isiWeb4Shop à l\'adresse:')) ;
            $pdf->Ln();
            $pdf->Cell(40,10,utf8_decode('4 Rue ISI 69100 Villeurbanne'));
            $pdf->Output();
?>
