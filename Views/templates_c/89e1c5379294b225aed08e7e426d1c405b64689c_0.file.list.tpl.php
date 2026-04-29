<?php
/* Smarty version 4.1.0, created on 2026-04-29 13:33:47
  from 'C:\Users\maletchi\Downloads\Annuaire-MVC\Annuaire-MVC\Views\templates\Site\list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_69f208bbe90a82_01341717',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '89e1c5379294b225aed08e7e426d1c405b64689c' => 
    array (
      0 => 'C:\\Users\\maletchi\\Downloads\\Annuaire-MVC\\Annuaire-MVC\\Views\\templates\\Site\\list.tpl',
      1 => 1777465733,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_69f208bbe90a82_01341717 (Smarty_Internal_Template $_smarty_tpl) {
?><p><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['vue']->value['description'], ENT_QUOTES, 'UTF-8', true);?>
</p>
<p><a class="btn btn-primary" href="index.php?page=site&action=add">Ajouter un site</a></p>
<table class="table">
    <thead><tr><th>Titre</th><th>URL</th><th>Catégorie</th><th>Actions</th></tr></thead>
    <tbody>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['vue']->value['sites'], 'site');
$_smarty_tpl->tpl_vars['site']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['site']->value) {
$_smarty_tpl->tpl_vars['site']->do_else = false;
?>
        <tr>
            <td><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['site']->value['Titre'], ENT_QUOTES, 'UTF-8', true);?>
</td>
            <td><a href="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['site']->value['URL'], ENT_QUOTES, 'UTF-8', true);?>
" target="_blank"><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['site']->value['URL'], ENT_QUOTES, 'UTF-8', true);?>
</a></td>
            <td><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['site']->value['categorie'], ENT_QUOTES, 'UTF-8', true);?>
</td>
            <td>
                <a class="btn btn-primary btn-sm" href="index.php?page=site&action=edit&id=<?php echo $_smarty_tpl->tpl_vars['site']->value['Id_Categorie'];?>
">Modifier</a>
                <a class="btn btn-danger btn-sm" href="index.php?page=site&action=delete&id=<?php echo $_smarty_tpl->tpl_vars['site']->value['Id_Categorie'];?>
">Supprimer</a>
            </td>
        </tr>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </tbody>
</table><?php }
}
