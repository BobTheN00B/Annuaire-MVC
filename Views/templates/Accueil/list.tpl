{if $vue.errorMessage}
    <div class="alert alert-warning" role="alert">{$vue.errorMessage|escape}</div>
{/if}

<p class="mb-4">{$vue.description|escape}</p>

<section class="search-panel mb-4">
    <form method="get" action="index.php" class="row g-3 align-items-end">
        <input type="hidden" name="page" value="accueil">
        <input type="hidden" name="action" value="list">

    <div class="col-md-4">
            <label for="categorie" class="form-label">Catégorie</label>
            <select class="form-select" name="categorie" id="categorie">
                <option value="">Toutes les catégories</option>
                {foreach $vue.categories as $cat}
                    <option value="{$cat.id}" {if $vue.selectedCategorie == $cat.id}selected{/if}>{$cat.libelle|escape}</option>
                {/foreach}
            </select>
        </div>

<div class="col-md-5">
            <label for="motcle" class="form-label">Mot-clé</label>
            <input class="form-control" id="motcle" type="search" name="motcle" value="{$vue.motcle|escape}" placeholder="Titre, URL, catégorie, description...">
        </div>

<div class="col-md-3 d-grid gap-2 d-md-flex justify-content-md-end">
            <button class="btn btn-primary" type="submit">Rechercher</button>
            {if $vue.hasFilters}
                <a class="btn btn-outline-dark" href="index.php?page=accueil&action=list">Réinitialiser</a>
            {/if}
        </div>
    </form>
</section>

<section class="results-panel">
    <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
        <h2 class="h4 m-0">Résultats</h2>
        <span class="badge result-badge">{$vue.resultCount} site(s)</span>
    </div>

    {if $vue.resultCount > 0}
        <div class="row g-3">
            {foreach $vue.sites as $site}
                <div class="col-12">
                    <article class="site-card p-3">
                        <div class="d-flex justify-content-between align-items-start gap-2 flex-wrap">
                            <h3 class="h5 mb-1">{$site.titre|escape}</h3>
                            <span class="badge category-badge">{$site.categorie|default:'Sans catégorie'|escape}</span>
                        </div>
                        <p class="mb-2">
                            <a href="{$site.url|escape}" target="_blank" rel="noopener" class="site-url">{$site.url|escape}</a>
                        </p>
                        <p class="mb-0 text-muted">{$site.description|escape}</p>
                    </article>
                </div>
            {/foreach}
        </div>
    {else}
        <div class="alert alert-light border" role="status">
            Aucun résultat trouvé. Essayez une autre catégorie ou un autre mot-clé.
        </div>
    {/if}
</section>