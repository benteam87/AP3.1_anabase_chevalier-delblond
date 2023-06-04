<?php
include("vue.menu.php");

?>
<div class="formFacturation">
    <br>
    <fieldset>
        <h1>CREATION D'UNE FACTURATION</h1>
        <br>
        <form action="./?controleur=facturation" method="POST">
            <div class="select">
                <label for="congressiste">Congressiste </label><select name="congressiste" id="congressiste">
                    <option value="" > -- Veuillez choisir un congressiste -- </option>

                    <?php
                    foreach ($c->data["liste"] as $congressiste) {
                        echo "<option value='$congressiste->num_congressiste'> $congressiste->nom_congressiste $congressiste->prenom_congressiste </option>";
                    }
                    ?>

                </select>
            </div>
            <br>
            <div class="date">
                <label for="date">Date </label><input type="date" name="date" id="date" required>
            </div>
            <br>
            <div class="montant-facture">
                <label for="montant-facture">Montant </label><input type="text" name="montant-facture" id="montant-facture" oninput="autoResize()" required> €
            </div>
            <br>
            <div class="estPaye">
                <label for="estPaye">Payé ?</label>
                <input type="radio" name="estPaye" id="oui" value="1" required><label for="oui">Oui</label>
                <input type="radio" name="estPaye" id="non" value="0" required><label for="non">Non</label>
            </div>

            <script>
                function autoResize() {
                    const montantFacture = document.getElementById("montant-facture");
                    montantFacture.style.width = `${montantFacture.value.length}ch`;
                }
            </script>

            <br>
            <div class="button">

                <button type="submit" name="todo" value="valider">Valider</button>
                <input type="reset" value="Annuler">
            </div>

        </form>

    </fieldset>
    <br>
</div>

<?php
include("pied.html.php");
?>