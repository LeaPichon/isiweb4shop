<?php 
	
        $cmd = @$_POST['cmd'];
        include "../controller/controllerCommande.php";     
?>
<section>
	<?php for ($i=0;$i<$nbP;$i++)
		{
			echo "<div class=\"produit\">";
			echo "<img src=\"../images/$image[$i]\">";
                        echo "<h3>$nom[$i]</h3>";
			echo "<p>$description[$i]</p>";
			echo "<p><strong>Notre prix : $prix[$i]</strong></p>";
			echo "</div>";
		}
	?>
    <h1>Quelle Quantité voulez-vous acheter ?</h1>
    <form name="Qte" action="panier.php?cmd=addprod" method="POST">
        <input type="number" name="Quantite" required min="0" value="1">
        <input type="hidden" name="produit"  value="<?php echo $id[0]; ?>">
        <input type="submit" name="submit" value="Ajouter au panier" id="submit"/>
    </form>
	
                
        
</section>