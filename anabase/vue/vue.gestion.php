<div>
	<?php
	// Inclusion de l'entete et du menu
	include "entete.html.php";
	include "vue.menu.php";
	?>
</div>

<!-- Titre -->
<h1 style="text-align: center; margin: 40px" class="">LA GESTION DES ORGANISMES PAYEURS</h1>

<!-- Tableau des Organismes payeurs -->
<div class="div_gestion ">
	<div class="table_gestion">
		<table class="table_organismes">

			<!-- premiere ligne -->
			<th>ID</th>
			<th>NOM</th>
			<th>ADRESSE</th>
			<th></th>

			<!-- boucle permettant l'affichage des informations par ligne -->
			<?php
			foreach ($c->data["liste"] as $liste) {
			?>

				<tr>
					<td id="identifiant"><?php echo $liste->NUM_ORGANISME; ?></td> <!--colonne numero organisme-->
					<td id="nom"><?php echo $liste->NOM_ORGANISME; ?></td> <!--colonne nom organisme-->
					<td id="adresse"><?php echo $liste->ADRESSE_ORGANISME; ?></td><!--colonne adresse organisme-->

					<!-- boutons -->
					<td> <a href="?controleur=payeur&idModif=<?php echo $liste->NUM_ORGANISME; ?>">Modifier</a><br>
						<a href="?controleur=payeur&idSuppr=<?php echo $liste->NUM_ORGANISME; ?>">Supprimer</a>
					</td>

				</tr>

			<?php
			} ?>
		</table>
	</div>

	<div class="form_gestion">
		<?php
		if (isset($_GET["idModif"])) {
			$recup = $c->data["listeA"];
		?>

			<div class="Formulaire">
				<form method="POST" class="formulaire_create">
					<fieldset class="form_org" action="./index?controleur=payeur">
						<h3> Veuillez entrer les informations de l'organisme payeur pour le modifier.</h3>

						<input class="create_input_text" type="number" name="num" id="num" placeholder="Numéro" min="0" value="<?php echo $recup->NUM_ORGANISME; ?>">
						</br>
						<br />
						<!-- <label for "size1">Nom</label> -->
						<input class="create_input_text" type="text" name="nom" placeholder="Nom" required value="<?php echo $recup->NOM_ORGANISME; ?>">
						</br>
						<br />
						<!-- <label for "size1">Adresse</label> -->
						<input class="create_input_text" type="text" name="adresse" placeholder="Adresse" required value="<?php echo $recup->ADRESSE_ORGANISME; ?>">
						</br>
						<br />
						<button type="submit" name="todo" value="modifier">Modifier</button>
						<input type="button" value="Annuler" onclick="history.go(-1)">
					</fieldset>
				</form>
			</div>

		<?php
		} else {
		?>
			<div class="Formulaire">
				<form method="POST" class="formulaire_create">
					<fieldset class="form_org" action="./index?controleur=payeur">
						<h3> Veuillez entrer les informations de l'organisme payeur pour le créer.</h3>
						<input class="create_input_text" type="number" name="num" placeholder="Num" required>
						</br>
						<br />
						<input class="create_input_text" type="text" name="nom" placeholder="Nom" maxlength='50' required>
						</br>
						<br />
						<input class="create_input_text" type="text" name="adresse" placeholder="Adresse" required>
						<!-- minlength='8' -->
						</br>
						<br />
						<button type="submit" name="todo" value="enregistrer">Enregistrer</button>
					</fieldset>
				</form>
			</div>
		<?php }
		?>
	</div>
</div>

<div class="pied_page">
	<?php
	include "pied.html.php";
	?>
</div>