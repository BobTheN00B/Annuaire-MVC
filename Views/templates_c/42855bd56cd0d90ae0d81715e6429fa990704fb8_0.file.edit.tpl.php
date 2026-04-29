<?php
/* Smarty version 4.1.0, created on 2026-04-29 13:37:34
  from 'C:\Users\maletchi\Downloads\Annuaire-MVC\Annuaire-MVC\Views\templates\Site\edit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_69f2099ecd2a01_30206000',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '42855bd56cd0d90ae0d81715e6429fa990704fb8' => 
    array (
      0 => 'C:\\Users\\maletchi\\Downloads\\Annuaire-MVC\\Annuaire-MVC\\Views\\templates\\Site\\edit.tpl',
      1 => 1777465733,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_69f2099ecd2a01_30206000 (Smarty_Internal_Template $_smarty_tpl) {
?><p><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['vue']->value['description'], ENT_QUOTES, 'UTF-8', true);?>
</p>
<form method="post" action="index.php?page=site&action=update" class="col-md-8">
    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['vue']->value['site']['id'];?>
">
    <input class="form-control mb-2" name="titre" value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['vue']->value['site']['titre'], ENT_QUOTES, 'UTF-8', true);?>
" required>
    <input class="form-control mb-2" type="url" name="url" value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['vue']->value['site']['url'], ENT_QUOTES, 'UTF-8', true);?>
" required>
    <textarea class="form-control mb-2" name="description" required><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['vue']->value['site']['description'], ENT_QUOTES, 'UTF-8', true);?>
</textarea>
    <select class="form-select mb-2" name="id_categorie" required>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['vue']->value['categories'], 'cat');
$_smarty_tpl->tpl_vars['cat']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['cat']->value) {
$_smarty_tpl->tpl_vars['cat']->do_else = false;
?><option value="<?php echo $_smarty_tpl->tpl_vars['cat']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['vue']->value['site']['id_categorie'] == $_smarty_tpl->tpl_vars['cat']->value['id']) {?>selected<?php }?>><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['cat']->value['libelle'], ENT_QUOTES, 'UTF-8', true);?>
</option><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </select>
    <button class="btn btn-primary" type="submit">Enregistrer</button>
</form><?php }
}
