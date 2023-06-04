<?php
include ("./modele/modele.gestion.php");
class Controleur_payeur{
    // --- champs de base du controleur
	public $vue=""; //vue appelée par le controleur
	
	public $message = "";
	public $erreur = "";
	
	public $data; // le tableau des données de la vue
	
	public $modele; // nom du modele
	
	public $m; // objet modele
	
	public $post; // renseigné par index
	public $get;

    public function __construct(){
		$this->vue="gestion";
		$this->modele = new Modele_gestion();
	}

	public function todo_initialiser(){
		$this->data["liste"] = $this->modele->getListePayeur();
		if(isset($this->get["idModif"])){
            $this->data["listeA"] = $this->modele->getOrganismePayeur($this->get["idModif"]);
			
        }
		if(isset($this->get["idSuppr"])){
            $this->modele->supprimerPayeur($this->get["idSuppr"]);
			header("Location:index.php?controleur=payeur");
        }
	}	

	public function todo_enregistrer(){
		$this->modele->insererPayeur($this->post["num"],$this->post["nom"], $this->post["adresse"]);
		$this->data["liste"] = $this->modele->getListePayeur();
	}

	public function todo_modifier(){
		$this->modele->modifierPayeur($this->post["num"], $this->post["nom"], $this->post["adresse"]);
		$this->data["liste"] = $this->modele->getListePayeur();
		header("Location:index.php?controleur=payeur");
	}

	public function todo_supprimer(){
		$this->modele->supprimerPayeur($this->post["num"]);
		$this->data["liste"] = $this->modele->getListePayeur();
		
	}

	


}
?>
