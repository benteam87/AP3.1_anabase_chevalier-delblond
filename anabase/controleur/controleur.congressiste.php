<?php
include ("./modele/modele.congressiste.php");
Class Controleur_congressiste{
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
		$this->vue ="congressiste";
        $this->modele = new Modele_congressiste;
	}
	
	public function todo_initialiser(){
		$this->data["liste"] = $this->modele->getListeCongressiste();
	}

	public function todo_enregistrer(){
		// $this->modele->insererCongressiste($this->post["nom"],$this->post["prenom"], $this->post["adresse"]);
		// $this->data["liste"] = $this->modele->getListeCongressiste();
	}
	
	
}
?>