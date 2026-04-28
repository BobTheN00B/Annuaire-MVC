<?php
/* Smarty version 4.1.0, created on 2026-04-28 12:19:06
  from 'C:\Users\Andrian\Desktop\Annuaire-MVC\Views\templates\Utilisateur\login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_69f0a5bac65c98_11556102',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '46cf3aa4f7b6712561f0b6666d9f989bfcd0faf0' => 
    array (
      0 => 'C:\\Users\\Andrian\\Desktop\\Annuaire-MVC\\Views\\templates\\Utilisateur\\login.tpl',
      1 => 1777309061,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_69f0a5bac65c98_11556102 (Smarty_Internal_Template $_smarty_tpl) {
?><p><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['vue']->value['description'], ENT_QUOTES, 'ISO-8859-1', true);?>
</p>
<?php if ($_smarty_tpl->tpl_vars['vue']->value['error']) {?><div class="alert alert-danger">Email ou mot de passe incorrect.</div><?php }?>
<form method="post" action="index.php?page=utilisateur&action=login" class="col-md-6">
    <input class="form-control mb-2" type="email" name="mail" placeholder="Email" required>
    <input class="form-control mb-2" type="password" name="password" placeholder="Mot de passe" required>
    <button class="btn btn-primary" type="submit">Se connecter</button>
</form><?php }
}
