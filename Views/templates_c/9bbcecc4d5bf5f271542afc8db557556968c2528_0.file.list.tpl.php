<?php
/* Smarty version 4.1.0, created on 2026-04-29 13:34:50
  from 'C:\Users\maletchi\Downloads\Annuaire-MVC\Annuaire-MVC\Views\templates\Utilisateur\list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_69f208fa5ea8a9_42690677',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9bbcecc4d5bf5f271542afc8db557556968c2528' => 
    array (
      0 => 'C:\\Users\\maletchi\\Downloads\\Annuaire-MVC\\Annuaire-MVC\\Views\\templates\\Utilisateur\\list.tpl',
      1 => 1777465733,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_69f208fa5ea8a9_42690677 (Smarty_Internal_Template $_smarty_tpl) {
?><p><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['vue']->value['description'], ENT_QUOTES, 'UTF-8', true);?>
</p>

<div class="row g-4">
    <div class="col-md-6">
        <div class="card h-100">
            <div class="card-body">
                <h2 class="h5">Informations</h2>
                <p><strong>Email actuel :</strong> <?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['vue']->value['user']['mail'], ENT_QUOTES, 'UTF-8', true);?>
</p>
                <form method="post" action="index.php?page=utilisateur&action=updateMail">
                    <div class="mb-3">
                        <label class="form-label" for="mail">Nouvel email</label>
                        <input class="form-control" id="mail" type="email" name="mail" required>
                    </div>
                    <button class="btn btn-primary w-100" type="submit">Mettre à jour l'email</button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card h-100">
            <div class="card-body">
                <h2 class="h5">Sécurité</h2>
                <form method="post" action="index.php?page=utilisateur&action=updatePassword">
                    <div class="mb-3">
                        <label class="form-label" for="password">Nouveau mot de passe</label>
                        <input class="form-control" id="password" type="password" name="password" minlength="6" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="password_confirm">Confirmation</label>
                        <input class="form-control" id="password_confirm" type="password" name="password_confirm" minlength="6" required>
                    </div>
                    <button class="btn btn-primary w-100" type="submit">Changer le mot de passe</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="mt-4 d-flex flex-wrap gap-2">
    <a class="btn btn-primary" href="index.php?page=site&action=list">Gérer mes sites</a>
    <a class="btn btn-outline-secondary" href="index.php?page=utilisateur&action=logout">Se déconnecter</a>
    <a class="btn btn-danger ms-auto" href="index.php?page=utilisateur&action=deleteAccount" onclick="return confirm('Supprimer votre compte et tous vos sites ?');">Supprimer mon compte</a>
</div><?php }
}
