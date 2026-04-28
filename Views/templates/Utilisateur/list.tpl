<p>{$vue.description|escape}</p>
<div class="card col-md-6">
    <div class="card-body">
        <h2 class="h5">Informations</h2>
        <p><strong>Email :</strong> {$vue.user.mail|escape}</p>
        <a class="btn btn-primary" href="index.php?page=site&action=list">Gérer mes sites</a>
        <a class="btn btn-outline-secondary" href="index.php?page=utilisateur&action=logout">Se déconnecter</a>
    </div>
</div>