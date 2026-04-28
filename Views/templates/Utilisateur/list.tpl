<p>{$vue.description|escape}</p>
<div class="row g-3">
    <div class="col-md-6">
        <div class="card h-100">
            <div class="card-body">
                <h2 class="h5">Informations</h2>
                <p><strong>Email actuel :</strong> {$vue.user.mail|escape}</p>
                <form method="post" action="index.php?page=utilisateur&action=updateMail">
                    <label class="form-label" for="mail">Nouvel email</label>
                    <input class="form-control mb-2" id="mail" type="email" name="mail" required>
                    <button class="btn btn-primary" type="submit">Mettre à jour l'email</button>
                </form>
            </div>
        </div>
<div class="col-md-6">
        <div class="card h-100">
            <div class="card-body">
                <h2 class="h5">Sécurité</h2>
                <form method="post" action="index.php?page=utilisateur&action=updatePassword">
                    <label class="form-label" for="password">Nouveau mot de passe</label>
                    <input class="form-control mb-2" id="password" type="password" name="password" minlength="6" required>
                    <label class="form-label" for="password_confirm">Confirmation</label>
                    <input class="form-control mb-2" id="password_confirm" type="password" name="password_confirm" minlength="6" required>
                    <button class="btn btn-primary" type="submit">Changer le mot de passe</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="mt-3 d-flex gap-2">
    <a class="btn btn-primary" href="index.php?page=site&action=list">Gérer mes sites</a>
    <a class="btn btn-outline-secondary" href="index.php?page=utilisateur&action=logout">Se déconnecter</a>
    <a class="btn btn-danger" href="index.php?page=utilisateur&action=deleteAccount" onclick="return confirm('Supprimer votre compte et tous vos sites ?');">Supprimer mon compte</a>
</div>