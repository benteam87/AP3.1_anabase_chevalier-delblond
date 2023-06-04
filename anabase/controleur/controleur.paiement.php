<?php
include("./modele/modele.paiement.php");
class Controleur_paiement
{
	// --- champs de base du controleur
	public $vue = ""; //vue appelée par le controleur

	public $message = "";
	public $erreur = "";

	public $data; // le tableau des données de la vue

	public $modele; // nom du modele

	public $m; // objet modele

	public $post; // renseigné par index
	public $get;

	public function __construct()
	{
		$this->vue = "paiement";
		$this->modele = new Modele_paiement();
	}

	public function todo_initialiser()
	{
		$this->data["paiement"] = $this->modele->getListeCongressiste();
		
	}
	

	public function todo_selectionner()
	{
		// $this->modele->insererPayeur($this->post["num"], $this->post["nom"], $this->post["adresse"]);
	}
}
