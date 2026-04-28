<?php
/* Smarty version 4.1.0, created on 2026-04-27 20:21:24
  from 'C:\Users\Andrian\Desktop\Annuaire-MVC\Views\templates\Accueil\list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_69efc54497f0c2_73078732',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '390685a2dfaf66eb2d53091bfba758681e85d4f1' => 
    array (
      0 => 'C:\\Users\\Andrian\\Desktop\\Annuaire-MVC\\Views\\templates\\Accueil\\list.tpl',
      1 => 1777318696,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_69efc54497f0c2_73078732 (Smarty_Internal_Template $_smarty_tpl) {
?><p><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['vue']->value['description'], ENT_QUOTES, 'ISO-8859-1', true);?>
</p>

<form method="get" action="index.php" class="row g-2 mb-4">
    <input type="hidden" name="page" value="accueil">
    <input type="hidden" name="action" value="list">

    <div class="col-md-4">
        <select class="form-select" name="categorie">
            <option value="">Toutes les catégories</option>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['vue']->value['categories'], 'cat');
$_smarty_tpl->tpl_vars['cat']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['cat']->value) {
$_smarty_tpl->tpl_vars['cat']->do_else = false;
?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['cat']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['vue']->value['selectedCategorie'] == $_smarty_tpl->tpl_vars['cat']->value['id']) {?>selected<?php }?>><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['cat']->value['libelle'], ENT_QUOTES, 'ISO-8859-1', true);?>
</option>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </select>
    </div>
    <div class="col-md-6">
        <input class="form-control" type="search" name="motcle" value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['vue']->value['motcle'], ENT_QUOTES, 'ISO-8859-1', true);?>
" placeholder="Mot-clé (titre, url, description)">
    </div>
    <div class="col-md-2 d-grid">
        <button class="btn btn-primary" type="submit">Rechercher</button>
    </div>
</form>

<table class="table table-striped">
    <thead>
        <tr><th>Titre</th><th>URL</th><th>Catégorie</th><th>Description</th></tr>
    </thead>
    <tbody>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['vue']->value['sites'], 'site');
$_smarty_tpl->tpl_vars['site']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['site']->value) {
$_smarty_tpl->tpl_vars['site']->do_else = false;
?>
        <tr>
            <td><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['site']->value['titre'], ENT_QUOTES, 'ISO-8859-1', true);?>
</td>
            <td><a href="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['site']->value['url'], ENT_QUOTES, 'ISO-8859-1', true);?>
" target="_blank" rel="noopener"><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['site']->value['url'], ENT_QUOTES, 'ISO-8859-1', true);?>
</a></td>
            <td><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['site']->value['categorie'], ENT_QUOTES, 'ISO-8859-1', true);?>
</td>
            <td><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['site']->value['description'], ENT_QUOTES, 'ISO-8859-1', true);?>
</td>
        </tr>
    <?php
}
if ($_smarty_tpl->tpl_vars['site']->do_else) {
?>
        <tr>
            <td colspan="4">Aucun résultat.</td>
        </tr>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </tbody>
</table><?php }
}
