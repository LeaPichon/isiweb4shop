<?php 
	require_once "Connexion.php";

	class produitsDAO 
	{
		public function getProduits(int $categ)
		{
			try
			{
				$cnx = Connexion::getConnexion();
				$query = "SELECT * FROM products WHERE cat_id = ?";
				$resultat = $cnx->prepare($query);
				$resultat->execute(array($categ));
				return $resultat;
			}
			catch(PDOException $e)
			{
				$erreur = $e -> getMessage();
			}
		}
	}
?>