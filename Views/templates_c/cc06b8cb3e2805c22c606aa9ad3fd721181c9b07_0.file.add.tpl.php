<?php
/* Smarty version 4.1.0, created on 2026-04-01 13:53:15
  from 'C:\Users\maletchi\annuaire\Views\templates\categorie\add.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_69cd234bbb2754_33339841',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cc06b8cb3e2805c22c606aa9ad3fd721181c9b07' => 
    array (
      0 => 'C:\\Users\\maletchi\\annuaire\\Views\\templates\\categorie\\add.tpl',
      1 => 1775051537,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_69cd234bbb2754_33339841 (Smarty_Internal_Template $_smarty_tpl) {
?><p><?php echo $_smarty_tpl->tpl_vars['vue']->value['description'];?>
</p>
<form action="index.php?page=categorie&action=insert" method="post">
    <input type="text" name="Libelle" placeholder="Votre libelle" id="libelle" maxlength="45" required="required"/> 
    <input type="submit" value="Valider">
</form><?php }
}
