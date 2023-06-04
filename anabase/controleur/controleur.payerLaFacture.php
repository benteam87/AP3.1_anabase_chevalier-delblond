<?php
include("./modele/modele.payerLaFacture.php");
class Controleur_payerLaFacture
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
        $this->vue = "payerLaFacture";
        $this->modele = new Modele_payerLaFacture();
    }

    public function todo_initialiser()
    {
        $num_facture = $_SESSION["idChoisirFacture"];
        $this->data["payerLaFacture"] = $this->modele->getFacture($num_facture);
        
        
    }


    public function todo_payer()
    {
        $num_facture = $_SESSION["idChoisirFacture"];
        $this->modele->payer($num_facture);
        $this->data["payerLaFacture"] = $this->modele->getFacture($num_facture);

        



        header("Location: index.php?controleur=payerLesFactures");
    }
    



// public function todo_payer(){
	// 	$this->modele->payer($this->post["num_facture"], $this->post["nom_congressiste"], $this->post["prenom_congressiste"], $this->post["date_facture"], $this->post["montant_facture"], $this->post["code_reglement"]);
	// 	$this->data["liste"] = $this->modele->getFacture();
	// 	header("Location:index.php?controleur=payerLesFactures");
	// }
}
