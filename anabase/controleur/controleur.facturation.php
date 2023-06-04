<?php
include ("./modele/modele.facturation.php");
Class Controleur_facturation{
	// --- champs de base du controleur
	public $vue=""; //vue appelée par le controleur
	
	public $message = "";
	public $erreur = "";
	
	public $data; // le tableau des données de la vue
	
	public $modele; // nom du modele
	
	public $m; // objet modele
	
	public $post; // renseigné par index
	
	// --- Constructeur
	public function __construct(){
		// déclarer la vue
		$this->vue ="facturation";
        $this->modele = new Modele_facturation;
	}
	
	public function todo_initialiser(){
		$this->data["liste"] = $this->modele->getIdentiteCongressiste();
		$this->modele->getFacture();
	}

	public function todo_valider(){
		$this->modele->creerFacture($this->post["congressiste"],$this->post["date"], $this->post["montant-facture"], $this->post["estPaye"]);
		$this->data["liste"] = $this->modele->getIdentiteCongressiste();
	}
	
	public function todo_supprimer(){
		$this->modele->supprimerFacture($this->post["num"]);
		$this->data["liste"] = $this->modele->getFacture();
		
	}
	
}
