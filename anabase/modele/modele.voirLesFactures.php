<?php
Class Modele_voirLesFactures{
	private $conn;
	
	public function __construct(){
		$login = "root";
		$mdp = "";
		$bd = "anabase";
		$serveur = "localhost";

		try {
			$this->conn = new PDO("mysql:host=$serveur;dbname=$bd", $login, $mdp, 
			array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\'')); 
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $e) {
			print "Erreur de connexion PDO ";
			die();
		}
	}
	
	public function getFactures(){
		$req = $this->conn->prepare ("select NUM_FACTURE, C.NOM_CONGRESSISTE,C.PRENOM_CONGRESSISTE, DATE_FACTURE, CODE_REGLEMENT, MONTANT_FACTURE from facture f INNER JOIN congressiste c on c.NUM_CONGRESSISTE = f.NUM_CONGRESSISTE; ");
	
		$req->execute();
		
		return $req->fetchAll(PDO::FETCH_OBJ);
	}
	
	public function getFacture($num_facture){
		$req = $this->conn->prepare ("select C.NOM_CONGRESSISTE,C.PRENOM_CONGRESSISTE, ADRESSE_CONGRESSISTE, TEL_CONGRESSISTE, DATE_FACTURE, CODE_REGLEMENT, MONTANT_FACTURE from facture f INNER JOIN congressiste c on c.NUM_CONGRESSISTE = f.NUM_CONGRESSISTE WHERE NUM_FACTURE = ? ");
		$req->bindValue(1, $num_facture);
		$req->execute();
		return $req->fetchAll(PDO::FETCH_OBJ);
	}
}