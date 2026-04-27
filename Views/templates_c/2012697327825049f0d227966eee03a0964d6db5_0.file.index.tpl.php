<?php
/* Smarty version 4.1.0, created on 2026-04-27 19:10:56
  from 'C:\Users\Andrian\Desktop\Annuaire-MVC\Views\templates\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_69efb4c00500f6_13008860',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2012697327825049f0d227966eee03a0964d6db5' => 
    array (
      0 => 'C:\\Users\\Andrian\\Desktop\\Annuaire-MVC\\Views\\templates\\index.tpl',
      1 => 1777317047,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_69efb4c00500f6_13008860 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- Template de base avec le moteur de template Smarty -->
<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $_smarty_tpl->tpl_vars['vue']->value["titre"];?>
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
        <div class="container">
            <h1><?php echo $_smarty_tpl->tpl_vars['vue']->value["titre"];?>
</h1>
            <?php ob_start();
echo $_smarty_tpl->tpl_vars['tpl']->value;
$_prefixVariable1 = ob_get_clean();
$_smarty_tpl->_subTemplateRender($_prefixVariable1, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
            <a class="navbar-brand" href="index.php">Annuaire</a>
                <div class="navbar-nav gap-2">
                    <a class="nav-link" href="index.php">Accueil</a>
                    <a class="nav-link" href="index.php?page=categorie&action=list">Catégories</a>
                    <a class="nav-link" href="index.php?page=site&action=list">Mes sites</a>
                    <a class="nav-link" href="index.php?page=utilisateur&action=login">Connexion</a>
                    <a class="nav-link" href="index.php?page=utilisateur&action=register">Inscription</a>
                    <a class="nav-link" href="index.php?page=utilisateur&action=logout">Déconnexion</a>
                </div>
        </div>
    </body>
</html>

<?php }
}
