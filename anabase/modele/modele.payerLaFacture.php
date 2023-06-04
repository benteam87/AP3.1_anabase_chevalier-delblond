<?php
Class Modele_payerLaFacture{
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

    public function payer($num_facture){
        $req = $this->conn->prepare("UPDATE facture set CODE_REGLEMENT = 1 WHERE num_facture = ?");
        $req->bindValue(1, $num_facture);
        $req->execute();
    }

	public function getFacture($num_facture){
		$req = $this->conn->prepare("SELECT * FROM facture WHERE CODE_REGLEMENT = 0 AND NUM_FACTURE = ? ");
		$req->bindValue(1, $num_facture);
		$req->execute();
		$res = $req->fetch(PDO::FETCH_OBJ);
		return $res;
	}

	public function getFactures(){
		$req = $this->conn->prepare("SELECT * FROM facture");
		$req->execute();
		$res = $req->fetchAll(PDO::FETCH_OBJ);
		return $res;
	}
	
}
