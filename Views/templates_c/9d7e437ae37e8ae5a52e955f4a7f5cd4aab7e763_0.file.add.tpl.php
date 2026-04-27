<?php
/* Smarty version 4.1.0, created on 2026-04-27 17:12:38
  from 'C:\Users\Andrian\Desktop\Annuaire-MVC\Views\templates\categorie\add.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_69ef9906aafb65_54390778',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9d7e437ae37e8ae5a52e955f4a7f5cd4aab7e763' => 
    array (
      0 => 'C:\\Users\\Andrian\\Desktop\\Annuaire-MVC\\Views\\templates\\categorie\\add.tpl',
      1 => 1777302940,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_69ef9906aafb65_54390778 (Smarty_Internal_Template $_smarty_tpl) {
?><p><?php echo $_smarty_tpl->tpl_vars['vue']->value['description'];?>
</p>
<form action="index.php?page=categorie&action=insert" method="post">
    <input type="text" name="Libelle" placeholder="Votre libelle" id="libelle" maxlength="45" required="required"/> 
    <input type="submit" value="Valider">
</form><?php }
}
