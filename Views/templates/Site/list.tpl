<p>{$vue.description|escape}</p>
<p><a class="btn btn-primary" href="index.php?page=site&action=add">Ajouter un site</a></p>
<table class="table">
    <thead><tr><th>Titre</th><th>URL</th><th>Catégorie</th><th>Actions</th></tr></thead>
    <tbody>
    {foreach $vue.sites as $site}
        <tr>
            <td>{$site.titre|escape}</td>
            <td><a href="{$site.url|escape}" target="_blank">{$site.url|escape}</a></td>
            <td>{$site.categorie|escape}</td>
            <td>
                <a class="btn btn-primary btn-sm" href="index.php?page=site&action=edit&id={$site.id}">Modifier</a>
                <a class="btn btn-danger btn-sm" href="index.php?page=site&action=delete&id={$site.id}">Supprimer</a>
            </td>
        </tr>
    {/foreach}
    </tbody>
</table>