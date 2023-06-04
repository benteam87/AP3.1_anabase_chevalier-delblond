<?php

function controleurPrincipal($action){
    $lesActions = array();
    $lesActions["defaut"] = "controleur.accueil.php";
    $lesActions["hello"] = "controleur.hello.php";
    $lesActions["payeur"] = "controleur.payeur.php";
    $lesActions["paiement"] = "controleur.paiement.php";
    $lesActions["congressiste"] = "controleur.congressiste.php";
    $lesActions["facturation"] = "controleur.facturation.php";
    $lesActions["voirLesFactures"] = "controleur.voirLesFactures.php";
    $lesActions["payerLesFactures"] = "controleur.payerLesFactures.php";
    $lesActions["payerLaFacture"] = "controleur.payerLaFacture.php";
    
    if(array_key_exists ( $action , $lesActions )){
        return $lesActions[$action];
    }
    else{
        return $lesActions["defaut"];
    }

}

?>