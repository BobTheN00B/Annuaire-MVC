<?php
/* Smarty version 4.1.0, created on 2026-04-01 13:57:32
  from 'C:\Users\maletchi\annuaire\Views\templates\categorie\update.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_69cd244c081292_02622077',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '89f015356289f06f1cd617a95c6cf013d44f83f3' => 
    array (
      0 => 'C:\\Users\\maletchi\\annuaire\\Views\\templates\\categorie\\update.tpl',
      1 => 1775051542,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_69cd244c081292_02622077 (Smarty_Internal_Template $_smarty_tpl) {
?><p><?php echo $_smarty_tpl->tpl_vars['vue']->value['description'];?>
</p>

<form action="index.php?page=categorie&action=update" method="post">
    <input type="hidden" name="id"  id="id" value="<?php echo $_smarty_tpl->tpl_vars['vue']->value['categorie'][0]['id'];?>
" /> 
    <input type="text" name="Libelle" placeholder="Votre libelle" id="libelle" value="<?php echo $_smarty_tpl->tpl_vars['vue']->value['categorie'][0]['libelle'];?>
" maxlength="45" required="required"/> 
    <input type="submit" value="Valider">
</form>
<?php }
}
