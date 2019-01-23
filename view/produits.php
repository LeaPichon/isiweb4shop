<?php 
	require_once "../controller/controllerProduits.php";
?>
<section>			
	<?php for ($i=0;$i<$nbP;$i++)
		{
			echo "<div class=\"produit\">";
			echo "<img src=\"../images/$image[$i]\">";
			echo "<h3>$nom[$i]</h3>";
			echo "<p>$description[$i]</p>";
			echo "<p><strong>Notre prix : $prix[$i]</strong></p>";
			echo "<p>[acheter]</p>"; //bouton à faire
			echo "</div>";
		}
	?>
</section>