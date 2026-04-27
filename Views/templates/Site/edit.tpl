<p>{$vue.description|escape}</p>
<form method="post" action="index.php?page=site&action=update" class="col-md-8">
    <input type="hidden" name="id" value="{$vue.site.id}">
    <input class="form-control mb-2" name="titre" value="{$vue.site.titre|escape}" required>
    <input class="form-control mb-2" type="url" name="url" value="{$vue.site.url|escape}" required>
    <textarea class="form-control mb-2" name="description" required>{$vue.site.description|escape}</textarea>
    <select class="form-select mb-2" name="id_categorie" required>
        {foreach $vue.categories as $cat}<option value="{$cat.id}" {if $vue.site.id_categorie == $cat.id}selected{/if}>{$cat.libelle|escape}</option>{/foreach}
    </select>
    <button class="btn btn-primary" type="submit">Enregistrer</button>
</form>