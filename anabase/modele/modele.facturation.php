<?php
Class Modele_facturation{
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
	
	public function getIdentiteCongressiste(){
		$req = $this->conn->prepare ("SELECT num_congressiste, nom_congressiste, prenom_congressiste FROM congressiste");
		
		$req->execute();
		
		return $req->fetchAll(PDO::FETCH_OBJ);
	}

	public function getFacture(){
	$req = $this->conn->prepare("SELECT * FROM facture");
	$req->execute();
	return $req->fetchAll(PDO::FETCH_OBJ);
	}

	public function creerFacture($congressiste, $date, $montant, $estPaye){
		$req = $this->conn->prepare("INSERT INTO Facture VALUES(NULL, ?, ?, ?, ?)");
        $req->bindValue(1, $congressiste);
        $req->bindValue(2, $date);
        $req->bindvalue(3, $montant);
		$req->bindvalue(4, $estPaye);
		$req->execute();
	}

	public function supprimerFacture($num){
		$req = $this->conn->prepare("DELETE FROM facture WHERE NUM_FACTURE = ? ");
        $req->bindvalue(1, $num);
		$req->execute();
	}
	
}