<?php
/* Smarty version 4.1.0, created on 2026-04-28 20:25:11
  from 'C:\Users\Andrian\Desktop\Annuaire-MVC\Views\templates\Site\add.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_69f117a7e913f9_52399863',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4847a9c63ee8b3a3a06043d7eeb67363cc7845f7' => 
    array (
      0 => 'C:\\Users\\Andrian\\Desktop\\Annuaire-MVC\\Views\\templates\\Site\\add.tpl',
      1 => 1777308886,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_69f117a7e913f9_52399863 (Smarty_Internal_Template $_smarty_tpl) {
?><p><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['vue']->value['description'], ENT_QUOTES, 'ISO-8859-1', true);?>
</p>
<form method="post" action="index.php?page=site&action=insert" class="col-md-8">
    <input class="form-control mb-2" name="titre" placeholder="Titre" required>
    <input class="form-control mb-2" type="url" name="url" placeholder="https://..." required>
    <textarea class="form-control mb-2" name="description" placeholder="Description" required></textarea>
    <select class="form-select mb-2" name="id_categorie" required>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['vue']->value['categories'], 'cat');
$_smarty_tpl->tpl_vars['cat']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['cat']->value) {
$_smarty_tpl->tpl_vars['cat']->do_else = false;
?><option value="<?php echo $_smarty_tpl->tpl_vars['cat']->value['id'];?>
"><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['cat']->value['libelle'], ENT_QUOTES, 'ISO-8859-1', true);?>
</option><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </select>
    <button class="btn btn-primary" type="submit">Ajouter</button>
</form><?php }
}
