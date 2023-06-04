<div>
    <?php
    include "entete.html.php";
    include "vue.menu.php";
    ?>
</div>

<h1 style="text-align: center; margin: 40px;">VOIR LES FACTURES</h1>
<div class="div_paiement">
    <form method="POST" action="">

        <div class="div_table_paiement">
            <table class="table_paiement">
                <th style="width: 14%; text-align:center">NUMERO DE FACTURE</th>
                <th style="width: auto; text-align:center">NOM</th>
                <th style="width: auto; text-align:center">PRENOM</th>
                <th>DATE DE LA FACTURE</th>
                <th>MONTANT FACTURE</th>
                <th>ETAT DU REGLEMENT</th>
                <th></th>

                <?php
                foreach ($c->data["voirLesFactures"] as $liste) {
                ?>
                    <tr>
                        <td id="num_facture" style="text-align: center;"><?php echo $liste->NUM_FACTURE; ?></td>
                        <td id="nom_congressiste" style="text-align: center;"><?php echo $liste->NOM_CONGRESSISTE; ?></td>
                        <td id="prenom_congressiste" style="width: auto; text-align:center"><?php echo ucfirst(strtolower($liste->PRENOM_CONGRESSISTE)); ?></td>
                        <td id="date_facture"><?php echo date('d/m/Y', strtotime($liste->DATE_FACTURE)) ?></td>
                        <td id="montant_facture"><?php echo $liste->MONTANT_FACTURE; ?>€</td>
                        <td id="code_reglement"><?php if ($liste->CODE_REGLEMENT == 0) {
                                                    echo "En attente de paiement";
                                                } else {
                                                    echo "Payé";
                                                } ?>
                        </td>
                        <td><a href="index.php?controleur=voirLesFactures&todo=facture&num_facture=<?php echo $liste->NUM_FACTURE ; ?>">Générer la facture</a></td>
                    </tr>
                <?php
                } ?>
            </table>

        </div>
    </form>
</div>
<div class="pied_page">
    <?php
    include "pied.html.php";
    ?>
</div>