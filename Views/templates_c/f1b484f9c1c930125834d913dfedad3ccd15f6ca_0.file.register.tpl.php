<?php
/* Smarty version 4.1.0, created on 2026-04-28 12:19:08
  from 'C:\Users\Andrian\Desktop\Annuaire-MVC\Views\templates\Utilisateur\register.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_69f0a5bcc799a6_18778102',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f1b484f9c1c930125834d913dfedad3ccd15f6ca' => 
    array (
      0 => 'C:\\Users\\Andrian\\Desktop\\Annuaire-MVC\\Views\\templates\\Utilisateur\\register.tpl',
      1 => 1777309101,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_69f0a5bcc799a6_18778102 (Smarty_Internal_Template $_smarty_tpl) {
?><p><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['vue']->value['description'], ENT_QUOTES, 'ISO-8859-1', true);?>
</p>
<?php if ($_smarty_tpl->tpl_vars['vue']->value['error']) {?><div class="alert alert-danger">Email déjà utilisé ou mot de passe trop court (6 caractères min).</div><?php }?>
<form method="post" action="index.php?page=utilisateur&action=register" class="col-md-6">
    <input class="form-control mb-2" type="email" name="mail" placeholder="Email" required>
    <input class="form-control mb-2" type="password" name="password" placeholder="Mot de passe (6 caractères min)" required>
    <button class="btn btn-primary" type="submit">Créer le compte</button>
</form><?php }
}
