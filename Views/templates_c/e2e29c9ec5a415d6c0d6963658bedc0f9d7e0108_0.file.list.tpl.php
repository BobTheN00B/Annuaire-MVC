<?php
/* Smarty version 4.1.0, created on 2026-04-29 13:33:46
  from 'C:\Users\maletchi\Downloads\Annuaire-MVC\Annuaire-MVC\Views\templates\Categorie\list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_69f208ba9b21b9_62420020',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e2e29c9ec5a415d6c0d6963658bedc0f9d7e0108' => 
    array (
      0 => 'C:\\Users\\maletchi\\Downloads\\Annuaire-MVC\\Annuaire-MVC\\Views\\templates\\Categorie\\list.tpl',
      1 => 1777465733,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_69f208ba9b21b9_62420020 (Smarty_Internal_Template $_smarty_tpl) {
?><h2><a class="btn btn-primary" href="index.php?page=categorie&action=add">Ajouter</a></h2>
<p><?php echo $_smarty_tpl->tpl_vars['vue']->value['description'];?>
<p>    
<div>
    <table class="table"><thead><tr><td>Libelle</td><td>Action</td></tr></thead>
        <tbody>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['vue']->value['categories'], 'cat');
$_smarty_tpl->tpl_vars['cat']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['cat']->value) {
$_smarty_tpl->tpl_vars['cat']->do_else = false;
?>
    <tr><td><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['cat']->value['libelle'], ENT_QUOTES, 'UTF-8', true);?>
<td>
        <td><a class="btn btn-primary" href="index.php?page=categorie&action=update&id=<?php echo $_smarty_tpl->tpl_vars['cat']->value['id'];?>
">modification</a>
            | <a class="btn btn-danger" href="#" onclick="sup(<?php echo $_smarty_tpl->tpl_vars['cat']->value['id'];?>
);">Suppression</a>
        </td>
    </tr>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </tbody>
    </table>
</div>
    <?php echo '<script'; ?>
>
        function sup(id){
            if(window.confirm("Voulez vous vraiment supprimer l'élément?")){
                window.location.replace("index.php?page=categorie&action=delete&id="+id);
            }
        };
        
    <?php echo '</script'; ?>
>
<?php }
}
