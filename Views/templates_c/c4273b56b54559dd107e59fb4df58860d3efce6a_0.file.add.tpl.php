<?php
/* Smarty version 4.1.0, created on 2026-04-29 13:34:45
  from 'C:\Users\maletchi\Downloads\Annuaire-MVC\Annuaire-MVC\Views\templates\Categorie\add.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_69f208f51ed0e2_47132795',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c4273b56b54559dd107e59fb4df58860d3efce6a' => 
    array (
      0 => 'C:\\Users\\maletchi\\Downloads\\Annuaire-MVC\\Annuaire-MVC\\Views\\templates\\Categorie\\add.tpl',
      1 => 1777465733,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_69f208f51ed0e2_47132795 (Smarty_Internal_Template $_smarty_tpl) {
?><p><?php echo $_smarty_tpl->tpl_vars['vue']->value['description'];?>
</p>
<form action="index.php?page=categorie&action=insert" method="post">
    <input type="text" name="libelle" placeholder="Votre libelle" id="libelle" maxlength="45" required="required"/>
    <input type="submit" value="Valider">
</form><?php }
}
