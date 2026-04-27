<p>{$vue.description|escape}</p>
{if $vue.error}<div class="alert alert-danger">Email déjà utilisé ou mot de passe trop court (6 caractères min).</div>{/if}
<form method="post" action="index.php?page=utilisateur&action=register" class="col-md-6">
    <input class="form-control mb-2" type="email" name="mail" placeholder="Email" required>
    <input class="form-control mb-2" type="password" name="password" placeholder="Mot de passe (6 caractères min)" required>
    <button class="btn btn-primary" type="submit">Créer le compte</button>
</form>