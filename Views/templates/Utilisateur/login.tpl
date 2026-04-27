<p>{$vue.description|escape}</p>
{if $vue.error}<div class="alert alert-danger">Email ou mot de passe incorrect.</div>{/if}
<form method="post" action="index.php?page=utilisateur&action=login" class="col-md-6">
    <input class="form-control mb-2" type="email" name="mail" placeholder="Email" required>
    <input class="form-control mb-2" type="password" name="password" placeholder="Mot de passe" required>
    <button class="btn btn-primary" type="submit">Se connecter</button>
</form>