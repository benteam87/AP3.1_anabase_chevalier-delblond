<?php
include("./modele/modele.voirLesFactures.php");
class Controleur_voirLesFactures
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
		$this->vue = "voirLesFactures";
		$this->modele = new Modele_voirLesFactures();
	}

	public function todo_initialiser()
	{
		$this->data["voirLesFactures"] = $this->modele->getFactures();
	}

	public function todo_facture()
	{
		$num_facture = $_GET["num_facture"];

		$facture = $this->modele->getFacture($num_facture);
		$nom_congressiste = $facture[0]->NOM_CONGRESSISTE;
		$prenom_congressiste = $facture[0]->PRENOM_CONGRESSISTE;
		$adresse_congressiste = $facture[0]->ADRESSE_CONGRESSISTE;
		$date_facture = $facture[0]->DATE_FACTURE;
		$montant_facture = $facture[0]->MONTANT_FACTURE;
		$etat = $facture[0]->CODE_REGLEMENT;

		if ($etat = 0){
			$etat = "A payé";
		}
		else{
			$etat = "En attente de paiement";
		}

		require('./fpdf.php');
		$pdf = new FPDF();
		$pdf->AddPage();
		$pdf->SetFont('Arial', 'B', 16);
		$pdf->Cell(40, 10, utf8_decode('Facture n°' . $num_facture));
		$pdf->Ln(10);
		$pdf->SetFont('Arial', 'B', 12);
		$pdf->Cell(40, 10, utf8_decode('Société Anabase'));
		$pdf->Ln(7);
		$pdf->SetFont('Arial', '', 12);
		$pdf->Cell(40, 10, utf8_decode('Adresse : 39 rue François Perrin'));
		$pdf->Ln(5);
		$pdf->Cell(40, 10, utf8_decode('                87000 Limoges'));
		$pdf->Ln(7);
		$pdf->Cell(40, 10, utf8_decode('Téléphone : 05 55 45 56 00'));
		$pdf->Ln(7);
		$pdf->Cell(40, 10, utf8_decode('Email : contact@anabase.com'));
		$pdf->Ln(10);



		// print_r($facture);
		// var_dump($facture); 

		$pdf->SetFont('Arial', '', 12);
		$pdf->Cell(40, 10, utf8_decode('Nom : ' . $nom_congressiste));
		$pdf->Ln(7);
		$pdf->SetFont('Arial', '', 12);
		$pdf->Cell(40, 10, utf8_decode('Prenom : ' . $prenom_congressiste));
		$pdf->Ln(7);
		$pdf->SetFont('Arial', '', 12);
		$pdf->Cell(40, 10, utf8_decode('Date : ' . $date_facture));
		$pdf->Ln(7);
		$pdf->SetFont('Arial', '', 12);
		$texte = 'Montant : ' . $montant_facture . '€';
		$pdf->Cell(40, 10, iconv('UTF-8', 'windows-1252', $texte));
		$pdf->Ln(7);
		$pdf->SetFont('Arial', '', 12);
		$pdf->Cell(40, 10, utf8_decode('Adresse : ' . $adresse_congressiste));
		$pdf->Ln(7);
		$pdf->SetFont('Arial', '', 12);
		$pdf->Cell(40, 10, utf8_decode('Etat du reglement : ' . $etat));

		$pdf->Output();
	}


	public function todo_selectionner()
	{
		// $this->modele->insererPayeur($this->post["num"], $this->post["nom"], $this->post["adresse"]);
	}
	public function todo_retour()
	{
		//
	}
}
