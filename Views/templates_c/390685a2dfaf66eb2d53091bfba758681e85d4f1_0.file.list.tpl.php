<?php
/* Smarty version 4.1.0, created on 2026-04-28 18:15:47
  from 'C:\Users\Andrian\Desktop\Annuaire-MVC\Views\templates\Accueil\list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_69f0f95362a976_89563541',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '390685a2dfaf66eb2d53091bfba758681e85d4f1' => 
    array (
      0 => 'C:\\Users\\Andrian\\Desktop\\Annuaire-MVC\\Views\\templates\\Accueil\\list.tpl',
      1 => 1777400098,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_69f0f95362a976_89563541 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['vue']->value['errorMessage']) {?>
    <div class="alert alert-warning" role="alert"><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['vue']->value['errorMessage'], ENT_QUOTES, 'ISO-8859-1', true);?>
</div>
<?php }?>

<p class="mb-4"><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['vue']->value['description'], ENT_QUOTES, 'ISO-8859-1', true);?>
</p>

<section class="search-panel mb-4">
    <form method="get" action="index.php" class="row g-3 align-items-end">
        <input type="hidden" name="page" value="accueil">
        <input type="hidden" name="action" value="list">

    <div class="col-md-4">
            <label for="categorie" class="form-label">Catégorie</label>
            <select class="form-select" name="categorie" id="categorie">
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

<div class="col-md-5">
            <label for="motcle" class="form-label">Mot-clé</label>
            <input class="form-control" id="motcle" type="search" name="motcle" value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['vue']->value['motcle'], ENT_QUOTES, 'ISO-8859-1', true);?>
" placeholder="Titre, URL, catégorie, description...">
        </div>

<div class="col-md-3 d-grid gap-2 d-md-flex justify-content-md-end">
            <button class="btn btn-primary" type="submit">Rechercher</button>
            <?php if ($_smarty_tpl->tpl_vars['vue']->value['hasFilters']) {?>
                <a class="btn btn-outline-dark" href="index.php?page=accueil&action=list">Réinitialiser</a>
            <?php }?>
        </div>
    </form>
</section>

<section class="results-panel">
    <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
        <h2 class="h4 m-0">Résultats</h2>
        <span class="badge result-badge"><?php echo $_smarty_tpl->tpl_vars['vue']->value['resultCount'];?>
 site(s)</span>
    </div>

    <?php if ($_smarty_tpl->tpl_vars['vue']->value['resultCount'] > 0) {?>
        <div class="row g-3">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['vue']->value['sites'], 'site');
$_smarty_tpl->tpl_vars['site']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['site']->value) {
$_smarty_tpl->tpl_vars['site']->do_else = false;
?>
                <div class="col-12">
                    <article class="site-card p-3">
                        <div class="d-flex justify-content-between align-items-start gap-2 flex-wrap">
                            <h3 class="h5 mb-1"><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['site']->value['titre'], ENT_QUOTES, 'ISO-8859-1', true);?>
</h3>
                            <span class="badge category-badge"><?php echo htmlspecialchars((string)(($tmp = $_smarty_tpl->tpl_vars['site']->value['categorie'] ?? null)===null||$tmp==='' ? 'Sans catégorie' ?? null : $tmp), ENT_QUOTES, 'ISO-8859-1', true);?>
</span>
                        </div>
                        <p class="mb-2">
                            <a href="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['site']->value['url'], ENT_QUOTES, 'ISO-8859-1', true);?>
" target="_blank" rel="noopener" class="site-url"><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['site']->value['url'], ENT_QUOTES, 'ISO-8859-1', true);?>
</a>
                        </p>
                        <p class="mb-0 text-muted"><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['site']->value['description'], ENT_QUOTES, 'ISO-8859-1', true);?>
</p>
                    </article>
                </div>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </div>
    <?php } else { ?>
        <div class="alert alert-light border" role="status">
            Aucun résultat trouvé. Essayez une autre catégorie ou un autre mot-clé.
        </div>
    <?php }?>
</section><?php }
}
