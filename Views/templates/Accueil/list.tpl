<p>{$vue.description|escape}</p>

<form method="get" action="index.php" class="row g-2 mb-4">
    <input type="hidden" name="page" value="accueil">
    <input type="hidden" name="action" value="list">

    <div class="col-md-4">
        <select class="form-select" name="categorie">
            <option value="">Toutes les catégories</option>
            {foreach $vue.categories as $cat}
                <option value="{$cat.id}" {if $vue.selectedCategorie == $cat.id}selected{/if}>{$cat.libelle|escape}</option>
            {/foreach}
        </select>
    </div>
    <div class="col-md-6">
        <input class="form-control" type="search" name="motcle" value="{$vue.motcle|escape}" placeholder="Mot-clé (titre, url, description)">
    </div>
    <div class="col-md-2 d-grid">
        <button class="btn btn-primary" type="submit">Rechercher</button>
    </div>
</form>

<p><strong>{$vue.resultCount}</strong> résultat(s) trouvé(s).</p>

<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr><th>Titre</th><th>URL</th><th>Catégorie</th><th>Description</th></tr>
        </thead>
        <tbody>
        {foreach $vue.sites as $site}
            <tr>
                <td>{$site.titre|escape}</td>
                <td><a href="{$site.url|escape}" target="_blank" rel="noopener">{$site.url|escape}</a></td>
                <td>{$site.categorie|escape}</td>
                <td>{$site.description|escape}</td>
            </tr>
        {foreachelse}
            <tr>
                <td colspan="4">Aucun résultat pour cette recherche.</td>
            </tr>
        {/foreach}
        </tbody>
    </table>
</div>