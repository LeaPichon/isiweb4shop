<?php 
	require_once "Connexion.php";

	class clientDAO 
	{
		public function getClients()
		{
			try
			{
				$cnx = Connexion::getConnexion();
				$query = "SELECT * FROM customers";
				$resultat = $cnx->prepare($query);
				$resultat->execute();
				return $resultat;
			}
			catch(PDOException $e)
			{
				$erreur = $e -> getMessage();
			}
		}
		
		public function getOneClient($idp, $nom, $prenom)
		{
			try
			{
				$cnx = Connexion::getConnexion();
				$query = "UPDATE prof SET nom = ? , prenom = ? WHERE idp = ?";
				$resultat = $cnx->prepare($query);
				$resultat->execute(array($nom, $prenom, $idp));
				return $resultat;
			}
			catch(PDOException $e)
			{
				$erreur = $e -> getMessage();
			}
		}
		
		public function getOneClient(int $id)
		{
			try
			{
				$cnx = Connexion::getConnexion();
				$query = "SELECT * FROM customers WHERE id = ?";
				$resultat = $cnx->prepare($query);
				$resultat->execute(array($id));
				return $resultat;
			}
			catch(PDOException $e)
			{
				$erreur = $e -> getMessage();
			}
		}
	}
?>