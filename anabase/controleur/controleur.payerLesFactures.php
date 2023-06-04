<?php
include("./modele/modele.payerLesFactures.php");
class Controleur_payerLesFactures
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
		$this->vue = "payerLesFactures";
		$this->modele = new Modele_payerLesFactures();
	}

	public function todo_initialiser()
	{
		$this->data["payerLesFactures"] = $this->modele->getFacture();
		if(isset($this->get["idChoisirFacture"])){
            $this->data["listeFacture"] = $this->modele->afficherFacture($this->get["idChoisirFacture"]);
        }
		
	}
	
	public function todo_selectionner()
	{

	}

	public function todo_payer()
    {
		$_SESSION["idChoisirFacture"] = $this->get["idChoisirFacture"];
		$this->data["payerLesFactures"] = $this->modele->getFacture();
		if(isset($this->get["idChoisirFacture"])){
            $this->data["listeFacture"] = $this->modele->afficherFacture($this->get["idChoisirFacture"]);
        }

		$facture = $_GET["idChoisirFacture"];
		header("Location: index.php?controleur=payerLaFacture&num_facture=" . $facture);

    }

	// public function todo_afficher(){
	// 	$this->modele->afficherFacture($this->post["num"],$this->post["nom"], $this->post["prenom"], $this->post["date"],$this->post["montant"], $this->post["code"] );
	// 	$this->data["liste"] = $this->modele->getFacture();
	// }

	// public function todo_payer(){
	// 	$this->modele->payer($this->post["num_facture"], $this->post["nom_congressiste"], $this->post["prenom_congressiste"], $this->post["date_facture"], $this->post["montant_facture"], $this->post["code_reglement"]);
	// 	$this->data["liste"] = $this->modele->getFacture();
	// 	header("Location:index.php?controleur=payerLesFactures");
	// }
}