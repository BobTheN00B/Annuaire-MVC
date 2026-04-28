<p>{$vue.description}</p>

<form action="index.php?page=categorie&action=update" method="post">
    input type="hidden" name="id"  id="id" value="{$vue.categorie.id}" />
    <input type="text" name="libelle" placeholder="Votre libelle" id="libelle" value="{$vue.categorie.libelle|escape}" maxlength="45" required="required"/>
    <input type="submit" value="Valider">
</form>
