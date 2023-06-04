<?php
include "vue.menu.php";
?>
<div class="Formulaire">
    <form method="POST" class="formulaire_create">
            <fieldset class="form_org" action="./?controleur=payeur">
                <h3> Veuillez entrer les informations du congressiste pour le créer.</h3>
                <!-- <label for"size1">N°</label> -->
                <input class="create_input_text" type="text" name="num" placeholder="Nom" min="0" required>
                </br>
                <br />
                <!-- <label for "size1">Nom</label> -->
                <input class="create_input_text" type="text" name="Prenom" placeholder="Prénom" required >
                </br>
                <br />
                <!-- <label for "size1">Adresse</label> -->
                <input class="create_input_text" type="text" name="adresse" placeholder="Adresse" required >
                </br>
                <br />
                <button type="submit" name="todo" value="modifier">Enregistrer</button>
                
            </fieldset>
    </form>
</div>