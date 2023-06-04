<div>
	<?php
	include "entete.html.php";
	include "vue.menu.php";
	?>
</div>

<?php
if (isset($_GET["idChoisirFacture"])) {
	$recupe = $c->data["listeFacture"];
?>
	<div class="div_paiement">
		<div class="Formulaire">
			<form method="POST" class="formulaire_create">
				<fieldset class="form_org" action="./index.php?controleur=payerLaFacture">
					<div class="titre">
						<h2>Récapitulatif : </h2>
					</div>
					<div class="numFacture">
						<input class="create_input_text" type="number" name="numero_facture" id="num" min="0" required disabled value="<?php echo $recupe->NUM_FACTURE; ?>">
					</div>
					<br>
					<div class="nomFacture">
						<input class="create_input_text" type="text" name="nom_congressiste" id="nom" required disabled value="<?php echo $recupe->NOM_CONGRESSISTE; ?>">
					</div>
					<br>
					<div class="prenomFacture">
						<input class="create_input_text" type="text" name="prenom_congressiste" id="prenom" required disabled value="<?php echo $recupe->PRENOM_CONGRESSISTE; ?>">
					</div>
					<br>
					<div class="dateFacture">
						<input class="create_input_text" type="text" name="date_facture" id="date" required disabled value="<?php echo $recupe->DATE_FACTURE; ?>">
					</div>
					<br>
					<div class="montantFacture">
						<input class="create_input_text" type="text" name="montant_facture" id="montant" required disabled value="<?php echo $recupe->MONTANT_FACTURE; ?>">
					</div>
					<br>
					<div class="bouton">
						<input type="submit" name="todo" value="Payer">
						
						<input type="button" value="Annuler" onclick="history.go(-1)">
					</div>
				</fieldset>
			</form>
		</div>
	</div>
<?php
} else {
?>
	<h1 style="text-align: center; margin: 40px;">PAYER LES FACTURES</h1>
	<div class="div_paiement">
		<div class="Formulaire">
			<form method="POST" action="./index.php?controleur=payerLesFactures">
				<h2>Choisissez une facture :</h2>
				<div class="div_table_paiement">
					<table class="table_paiement">

						<th style="width: 14%; text-align:center">NUMERO DE FACTURE</th>
						<th>NOM</th>
						<th>PRENOM</th>
						<th>DATE DE LA FACTURE</th>
						<th>MONTANT FACTURE</th>
						<th>ETAT DU REGLEMENT</th>
						<th style="width: 1%;"></th>

						<?php
						foreach ($c->data["payerLesFactures"] as $liste) {
						?>
							<tr>
								<td id="num_facture" style="text-align: center;"><?php echo $liste->NUM_FACTURE; ?> </td>
								<td id="nom_congressiste"><?php echo $liste->NOM_CONGRESSISTE; ?></td>
								<td id="prenom_congressiste"><?php echo ucfirst(strtolower($liste->PRENOM_CONGRESSISTE)); ?></td>
								<td id="date_facture"><?php echo date('d/m/Y', strtotime($liste->DATE_FACTURE)) ?></td>
								<td id="montant_facture"><?php echo $liste->MONTANT_FACTURE; ?>€</td>
								<td id="code_reglement"><?php if ($liste->CODE_REGLEMENT == 0) {
															echo "A payer";
														} else {
															echo "Payé";
														} ?>
								</td>
								<td><a href="?controleur=payerLesFactures&idChoisirFacture=<?php echo $liste->NUM_FACTURE; ?>" name="payer" value="payé"> Payer</a></td>
							</tr>


				</div>
			<?php
						} ?>

			</table>
			<br>
		</div>
		</form>
	</div>

<?php
}
?>
</div>
<div class="pied_page">
	<?php
	include "pied.html.php";
	?>
</div>