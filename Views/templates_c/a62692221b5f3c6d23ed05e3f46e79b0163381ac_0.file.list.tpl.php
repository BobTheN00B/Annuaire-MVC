<?php
/* Smarty version 4.1.0, created on 2026-04-27 17:13:05
  from 'C:\Users\Andrian\Desktop\Annuaire-MVC\Views\templates\categorie\list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_69ef9921d9a258_12031237',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a62692221b5f3c6d23ed05e3f46e79b0163381ac' => 
    array (
      0 => 'C:\\Users\\Andrian\\Desktop\\Annuaire-MVC\\Views\\templates\\categorie\\list.tpl',
      1 => 1777302940,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_69ef9921d9a258_12031237 (Smarty_Internal_Template $_smarty_tpl) {
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
    <tr><td><?php echo $_smarty_tpl->tpl_vars['cat']->value['Libelle'];?>
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
