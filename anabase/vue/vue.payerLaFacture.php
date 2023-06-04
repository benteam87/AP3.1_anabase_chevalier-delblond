<div>
	<?php
	include "entete.html.php";
	include "vue.menu.php";
	?>
</div>
<div class="payment">

	<?php
	$recupe = $c->data["payerLaFacture"];
	?>
	<fieldset>
		<div class="alert-message">
			<h1>Ne mettez pas vos vraies données bancaire, ceci est un paiement fictif afin de simuler un paiement</h1>
		</div>


		<form action="./index.php?controleur=payerLaFacture" method="POST">
			<label for="amount">Montant :</label>
			<input type="text" id="amount" name="amount" value="<?php echo $recupe->MONTANT_FACTURE ?>" disabled>

			<label for="card_number">Numéro de carte :</label>
			<input type="number" id="card_number" name="card_number" required>
			<div>
				<label for="type_card">Type de carte :</label>
				<select name="type_card" id="type_card">
					<option value="visa">Visa</option>
					<option value="mastercard">Mastercard</option>
					<option value="american_express">American Express</option>
				</select>
			</div>
			<label for="expiry_date">Date d'expiration :</label>
			<input type="month" id="month_expiry_date" name="expiry_date" placeholder="MM" required>

			<label for="security_code">Code de sécurité :</label>
			<input type="text" id="security_code" name="security_code" required>

			<div class="bouton">
				<input type="submit" name="todo" value="payer">
			</div>
		</form>
	</fieldset>


</div>
<div class="pied_page">
	<?php
	include "pied.html.php";
	?>
</div>