<?php
Class Modele_gestion{
	private $conn;
	
	public function __construct(){ 
		$login = "root"; //Défénition du nom d'utilisateur de phpMyAdmin
		$mdp = ""; //Définition du mot de passe de phpMyAdmin
		$bd = "anabase"; //Nom de la table dans la base
		$serveur = "localhost"; //Nom du serveur

		try {
			$this->conn = new PDO("mysql:host=$serveur;dbname=$bd", $login, $mdp, 
			array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\'')); 
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $e) {
			print "Erreur de connexion PDO ";
			die();
		}
	}
	
	//Fonction qui permet de recupérer les informations d'un organisme payeur
	public function getListePayeur(){
		$req = $this->conn->prepare ("select * from organisme_payeur ORDER BY NUM_ORGANISME ASC"); //requête SQL de récupération des éléments
		$req->execute(); //Exécution de la requete
		return $req->fetchAll(PDO::FETCH_OBJ); //Renvoie de la variable avec la reponse de la requete utilisée dans le controleur
	}
	
	public function insererPayeur($num, $nom, $adresse){
		$req = $this->conn->prepare("INSERT INTO ORGANISME_PAYEUR VALUES(?, ?, ?)");
        $req->bindValue(1, $num);
        $req->bindValue(2, $nom);
        $req->bindvalue(3, $adresse);
		$req->execute();
	}

	public function modifierPayeur($num, $nom, $adresse){
		$req = $this->conn->prepare("UPDATE ORGANISME_PAYEUR SET NOM_ORGANISME = ?, ADRESSE_ORGANISME = ? WHERE NUM_ORGANISME = ? ");
		$req->bindValue(1, $nom);
        $req->bindValue(2, $adresse);
        $req->bindvalue(3, $num);
		$req->execute();
	}

	public function supprimerPayeur($num){
		$req = $this->conn->prepare("DELETE FROM ORGANISME_PAYEUR WHERE NUM_ORGANISME = ? ");
        $req->bindvalue(1, $num);
		$req->execute();
	}

	public function getOrganismePayeur($num){
		$req = $this->conn->prepare ("SELECT NUM_ORGANISME, NOM_ORGANISME, ADRESSE_ORGANISME FROM organisme_payeur WHERE NUM_ORGANISME = :num");
		$req->bindValue('num', $num);
		$req->execute();

		return $req->fetch(PDO::FETCH_OBJ);
	}
	
}