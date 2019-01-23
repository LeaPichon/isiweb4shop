<?php
	require_once "../includes/header.php";
	
	//récupère la catégorie
	$categ = $_GET['categ'];
	
	//récupération des produits
	require_once "../model/produitsDAO.php";
	$daoP = new produitsDAO();
	$prods = $daoP->getProduits($categ);
	$nbP=0;
	while($tabP = $prods->fetch())
	{
		$id[] = $tabP['id'];
		$nom[] = $tabP['name'];
		$description[] = $tabP['description'];
		$image[] = $tabP['image'];
		$prix[] = $tabP['price'];
		$nbP++;
	}	
	require_once "../view/produits.php";
	require_once "../includes/footer.php";
?>