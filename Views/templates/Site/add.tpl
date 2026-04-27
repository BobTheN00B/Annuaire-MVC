<p>{$vue.description|escape}</p>
<form method="post" action="index.php?page=site&action=insert" class="col-md-8">
    <input class="form-control mb-2" name="titre" placeholder="Titre" required>
    <input class="form-control mb-2" type="url" name="url" placeholder="https://..." required>
    <textarea class="form-control mb-2" name="description" placeholder="Description" required></textarea>
    <select class="form-select mb-2" name="id_categorie" required>
        {foreach $vue.categories as $cat}<option value="{$cat.id}">{$cat.libelle|escape}</option>{/foreach}
    </select>
    <button class="btn btn-primary" type="submit">Ajouter</button>
</form>