# AP3.1_anabase_chevalier-delblond

Le projet a pour nom Anabase, ce dernier étant divisé en ². Cette mission constistait à la gestion d'un organisme payeur ainsi que la partie facturation pour une entreprise de conférences. 

Ce projet doit être un site Web qui est en relation avec une base de données MySql. Nous avons donc développer le site en utilisant une sturcture en MVC, et comme language nous avons utilisé le php. 

Voici comment est structuré le modèle MVC:
* Le dossier **Modèle** permet de faire les requètes vers la base de données de manière sécurisée. 
> Petit conseil, pour éviter la majeur partie des [injonctions SQL](https://fr.wikipedia.org/wiki/Injection_SQL), faites des requêtes preparées.
* Le dossier **Vue** est le code html/php permettant l'affichage des informations
> Dans notre cas, tous les fichiers (sauf ceux du dossier CSS) ont l'extention .php pour pouvoir faire les liens entre les pages.
* Le dossier **Controleur** fais le lien entre la vue et le modèle, il est composé de fonctions appelant les variables du modèle et retournant des varibles pouvant être utilisé dans la Vue.


![image](https://user-images.githubusercontent.com/92931702/201041433-cd91c624-c771-4f9b-bd22-da7bbc21010a.png)

## Le modèle

Dans le modèle, on a différentes fonctions qui nous lies à la base de données.

* On a d'abord la fonction de connexion avec la base de données qu'on a appelée __construct() :

```php
public function __construct(){ 
  $login = ""; //Défénition du nom d'utilisateur de phpMyAdmin
  $mdp = ""; //Définition du mot de passe de phpMyAdmin
  $bd = ""; //Nom de la table dans la base
  $serveur = ""; //Nom du serveur

  try {
    $this->conn = new PDO("mysql:host=$serveur;dbname=$bd", $login, $mdp, 
    array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\'')); 
    $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch (PDOException $e) {
    print "Erreur de connexion PDO ";
    die();
  }
}
```
* Puis nous avons les fonctions avec les requetes SQL préparées
```php
//Fonction qui permet de recupérer les informations d'un organisme payeur
public function getListePayeur(){
  $req = $this->conn->prepare ("select * from organisme_payeur ORDER BY NUM_ORGANISME ASC"); //requête SQL de récupération des éléments
  $req->execute(); //Exécution de la requete
  return $req->fetchAll(PDO::FETCH_OBJ); //Renvoie de la variable avec la reponse de la requete utilisée dans le controleur
}
```

## Le controleur

* On retrouve dans le controleurl'instantiation des variables
```php
// --- champs de base du controleur
public $vue=""; //vue appelée par le controleur

public $message = "";
public $erreur = "";

public $data; // le tableau des données de la vue

public $modele; // nom du modele

public $m; // objet modele

public $post; // renseigné par index
public $get;
```

* Après il faut créer la fonction de construction de la classe :
```php
  public function __construct(){
  $this->vue="gestion"; // On défini la vue sur lequel le controleur doit pointé
  $this->modele = new Modele_gestion(); // on défini le modèle sur lequel le controleur doit pointé
}
```

* Maintenant nous pouvons créer les fonctions souhaitées :
```php
public function todo_enregistrer(){
  $this->modele->insererPayeur($this->post["num"], $this->post["nom"], $this->post["adresse"]); // On appelle le modèle relié au controleur et on lui passe en parametre les champs à insérer dans la base de données
  $this->data["liste"] = $this->modele->getListePayeur(); // Puis on affiche (dans notre cas on la réaffiche) la liste des organismes payeurs
}
```
## La vue - Gestion des Organismes Payeurs

Dans la vue on va créer la structure de la page et on va appeler les fonction du controlleur :
* Dans un premier temps on va inclure l'entete et le menu
```php
<div> 
	<?php
		// Inclusion de l'entete et du menu
		include "entete.html.php";
		include "vue.menu.php";
	?>
</div>
```
![image](https://user-images.githubusercontent.com/92931702/201146897-0a8e45f5-f5d9-4ad1-a2e3-5b3d5fbce916.png)

* Affichage du titre
```php
<!-- Titre -->
<h1>LA GESTION DES ORGANISMES PAYEURS</h1>
```
![image](https://user-images.githubusercontent.com/92931702/201146966-565bdbf4-ee69-44e0-8cc6-0b15060ab778.png)

* Affichage du tableau des organismes payeurs
```php
<div class="div_gestion">
  <div class="table_gestion">
    <table class="table_organismes"> 

      <!-- premiere ligne -->
      <th>ID</th>
      <th>NOM</th>
      <th>ADRESSE</th>
      <th></th>

      <!-- boucle permettant l'affichage des informations par ligne -->
      <?php
        foreach($c->data["liste"] as $liste){
      ?>

      <tr>
        <td id = "identifiant"><?php echo $liste->NUM_ORGANISME; ?></td> <!--colonne numero organisme-->
        <td id = "nom"><?php echo $liste->NOM_ORGANISME; ?></td> <!--colonne nom organisme-->
        <td id = "adresse"><?php echo $liste->ADRESSE_ORGANISME; ?></td><!--colonne adresse organisme-->

        <!-- bouttons -->
        <td> <a href="?controleur=payeur&idModif=<?php echo $liste->NUM_ORGANISME; ?>">Modifier</a><br> 
        <a href="?controleur=payeur&idSuppr=<?php echo $liste->NUM_ORGANISME; ?>">Supprimer</a> </td>

      </tr>

      <?php
      }?>
      </table>
  </div>
</div>
```
![image](https://user-images.githubusercontent.com/92931702/201147054-cc7d769d-d20a-4839-9c81-6e9077b1ef15.png)

* inclusion formulaire
```php
<div class="form_gestion">
  <?php
  include "vue.creation.php";
  ?>
</div>
```
![image](https://user-images.githubusercontent.com/92931702/201147110-35b3bd58-a75b-442d-87b0-85f4b86caa9f.png)

```php
<div class="pied_page">
<?php
include "pied.html.php";
?>
</div>
```
![image](https://user-images.githubusercontent.com/92931702/201147313-63637a4a-b492-4f34-8b72-9728629d7159.png)

## La Vue - Réglements
* La première chose à faire est toujours d'inclure l'entete et le menu
* Ensuite on y ajoute le titre 
* Puis le tableau qui se fait de la même manière que celui de la gestion des organismes payeurs
* ![image](https://user-images.githubusercontent.com/92931702/201191429-88c6d2d4-ddcc-4c68-a3c4-343615d441c6.png)

* Puis on y intègre le pied de page
