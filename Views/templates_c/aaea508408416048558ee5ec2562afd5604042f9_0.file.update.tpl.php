<?php
/* Smarty version 4.1.0, created on 2026-04-28 17:39:51
  from 'C:\Users\Andrian\Desktop\Annuaire-MVC\Views\templates\Categorie\update.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_69f0f0e75927c7_02017037',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'aaea508408416048558ee5ec2562afd5604042f9' => 
    array (
      0 => 'C:\\Users\\Andrian\\Desktop\\Annuaire-MVC\\Views\\templates\\Categorie\\update.tpl',
      1 => 1777397971,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_69f0f0e75927c7_02017037 (Smarty_Internal_Template $_smarty_tpl) {
?><p><?php echo $_smarty_tpl->tpl_vars['vue']->value['description'];?>
</p>

<form action="index.php?page=categorie&action=update" method="post">
    <input type="hidden" name="id"  id="id" value="<?php echo $_smarty_tpl->tpl_vars['vue']->value['categorie'][0]['Id_Categorie'];?>
" />
    <input type="text" name="libelle" placeholder="Votre libelle" id="libelle" value="<?php echo $_smarty_tpl->tpl_vars['vue']->value['categorie'][0]['Libelle'];?>
" maxlength="45" required="required"/>
    <input type="submit" value="Valider">
</form>
<?php }
}
