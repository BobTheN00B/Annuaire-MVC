<?php
/* Smarty version 4.1.0, created on 2026-04-28 21:33:54
  from 'C:\Users\Andrian\Desktop\Annuaire-MVC\Views\templates\Site\list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_69f127c2357688_09484052',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '28e7fc17c8e25d10f2e0e9538d7c8db46afbb30a' => 
    array (
      0 => 'C:\\Users\\Andrian\\Desktop\\Annuaire-MVC\\Views\\templates\\Site\\list.tpl',
      1 => 1777412027,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_69f127c2357688_09484052 (Smarty_Internal_Template $_smarty_tpl) {
?><p><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['vue']->value['description'], ENT_QUOTES, 'ISO-8859-1', true);?>
</p>
<p><a class="btn btn-primary" href="index.php?page=site&action=add">Ajouter un site</a></p>

<table class="table">
    <thead>
        <tr>
            <th>Titre</th>
            <th>URL</th>
            <th>Catégorie</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['vue']->value['sites'], 'site');
$_smarty_tpl->tpl_vars['site']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['site']->value) {
$_smarty_tpl->tpl_vars['site']->do_else = false;
?>
        <tr>
            <td><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['site']->value['Titre'], ENT_QUOTES, 'ISO-8859-1', true);?>
</td>
            <td><a href="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['site']->value['URL'], ENT_QUOTES, 'ISO-8859-1', true);?>
" target="_blank"><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['site']->value['URL'], ENT_QUOTES, 'ISO-8859-1', true);?>
</a></td>
            <td><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['site']->value['categorie'], ENT_QUOTES, 'ISO-8859-1', true);?>
</td>
            <td>
                <a class="btn btn-primary btn-sm" href="index.php?page=site&action=edit&id=<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['site']->value['id'], ENT_QUOTES, 'ISO-8859-1', true);?>
">Modifier</a>
                <a class="btn btn-danger btn-sm" href="index.php?page=site&action=delete&id=<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['site']->value['id'], ENT_QUOTES, 'ISO-8859-1', true);?>
" onclick="return confirm('Supprimer ce site ?');">Supprimer</a>
            </td>
        </tr>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </tbody>
</table><?php }
}
