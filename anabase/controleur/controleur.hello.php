<?php
include ("./modele/modele.hello.php");
Class Controleur_hello{
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
		$this->vue = "hello";
		$this->modele = new Modele_hello();	
	}
	
	public function todo_initialiser(){
		$this->post["nom"] = "";
		$this->data["liste"] = $this->modele->getListeNom();
	}
	
	public function todo_enregistrer(){
		$this->modele->insererNom($this->post["nom"]);
		$this->data["liste"] = $this->modele->getListeNom();
	}
}
?>