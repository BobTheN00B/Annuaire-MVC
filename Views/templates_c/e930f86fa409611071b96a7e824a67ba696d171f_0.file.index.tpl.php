<?php
/* Smarty version 4.1.0, created on 2026-04-29 13:33:41
  from 'C:\Users\maletchi\Downloads\Annuaire-MVC\Annuaire-MVC\Views\templates\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_69f208b5458c77_90115180',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e930f86fa409611071b96a7e824a67ba696d171f' => 
    array (
      0 => 'C:\\Users\\maletchi\\Downloads\\Annuaire-MVC\\Annuaire-MVC\\Views\\templates\\index.tpl',
      1 => 1777465733,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_69f208b5458c77_90115180 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- Template de base avec le moteur de template Smarty -->
<!DOCTYPE html>
<html>
    <head>
        <title><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['vue']->value["titre"], ENT_QUOTES, 'UTF-8', true);?>
</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"><?php echo '</script'; ?>
>
        <link href="style.css" rel="stylesheet">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-custom mb-4">
            <div class="container">
                <a class="navbar-brand" href="index.php">Annuaire</a>
                <div class="navbar-nav gap-2">
                    <a class="nav-link" href="index.php?page=accueil&action=list">Accueil</a>
                    <a class="nav-link" href="index.php?page=categorie&action=list">Catégories</a>
                    <?php if ($_smarty_tpl->tpl_vars['isConnected']->value) {?>
                        <a class="nav-link" href="index.php?page=site&action=list">Mes sites</a>
                        <a class="nav-link" href="index.php?page=utilisateur&action=list">Mon compte</a>
                        <a class="nav-link" href="index.php?page=utilisateur&action=logout">Déconnexion</a>
                    <?php } else { ?>
                        <a class="nav-link" href="index.php?page=utilisateur&action=login">Connexion</a>
                        <a class="nav-link" href="index.php?page=utilisateur&action=register">Inscription</a>
                    <?php }?>
                </div>
            </div>
        </nav>

        <main class="container">
            <?php if ($_smarty_tpl->tpl_vars['flash']->value) {?>
                <div class="alert alert-<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['flash']->value['type'], ENT_QUOTES, 'UTF-8', true);?>
"><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['flash']->value['message'], ENT_QUOTES, 'UTF-8', true);?>
</div>
            <?php }?>
            <h1><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['vue']->value["titre"], ENT_QUOTES, 'UTF-8', true);?>
</h1>
            <?php ob_start();
echo $_smarty_tpl->tpl_vars['tpl']->value;
$_prefixVariable1 = ob_get_clean();
$_smarty_tpl->_subTemplateRender($_prefixVariable1, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
        </main>
    </body>
</html><?php }
}
