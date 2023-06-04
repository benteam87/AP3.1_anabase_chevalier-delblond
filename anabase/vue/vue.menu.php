<?php
include "./vue/entete.html.php";
?>
<div class="titre">
    <h1 class="titre_menu">Anabase</h1>
</div>


<div class="navigation">
        <ul class="bloc_navigation">
            <li class="item__link">
                <a href="index.php?controleur=accueil">Accueil</a>
            </li>

            <li id="gestion_payeur" class="item__link">
                <a href="index.php?controleur=payeur&todo=initialiser">Gestion des Organismes payeurs</a>
            </li>

            <li id="paiement" class="item__link">
                <a href="index.php?controleur=paiement">Paiement</a>
                <ul class="sous-menu">
                    <li><a href="index.php?controleur=voirLesFactures">Voir les factures</a></li>
                    <li><a href="index.php?controleur=payerLesFactures">Paiement des Factures</a></li>
                </ul>
            </li>

            <li id="facturation" class="item__link">
                <a href="index.php?controleur=facturation">Facturation</a>
            </li>
            <!-- <li id="congressiste" class="item__link">
                <a href="index.php?controleur=congressiste">Congressiste</a>
            </li> -->
            <li id="|" class="item__link">
                <a>|</a>
            </li>
            <li id="sujet" class="item__link">
                <a href="./ppe3.1.1.projet.anabase.pdf">Sujet</a>
            </li>
        </ul>
</div>