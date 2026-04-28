<?php
/* Smarty version 4.1.0, created on 2026-04-28 19:06:11
  from 'C:\Users\Andrian\Desktop\Annuaire-MVC\Views\templates\Categorie\add.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_69f1052336eaa0_10536865',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '78a85663fe1b845ce69b256e73f5ee2fb4b85c49' => 
    array (
      0 => 'C:\\Users\\Andrian\\Desktop\\Annuaire-MVC\\Views\\templates\\Categorie\\add.tpl',
      1 => 1777403053,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_69f1052336eaa0_10536865 (Smarty_Internal_Template $_smarty_tpl) {
?><p><?php echo $_smarty_tpl->tpl_vars['vue']->value['description'];?>
</p>
<form action="index.php?page=categorie&action=insert" method="post">
    <input type="text" name="libelle" placeholder="Votre libelle" id="libelle" maxlength="45" required="required"/>
    <input type="submit" value="Valider">
</form><?php }
}
