<?php
/* Smarty version 3.1.30, created on 2022-03-29 09:15:29
  from "/Applications/XAMPP/xamppfiles/htdocs/php_06_namespaces/app/views/templates/main.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_6242b211f186a2_20361044',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '219909cc021af1f9a58073f8098b6d85cf8a560d' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/php_06_namespaces/app/views/templates/main.tpl',
      1 => 1648538127,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6242b211f186a2_20361044 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!doctype html>
<html lang="pl">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['page_description']->value)===null||$tmp==='' ? 'Opis domyślny' : $tmp);?>
">
	<title><?php echo (($tmp = @$_smarty_tpl->tpl_vars['page_title']->value)===null||$tmp==='' ? "Tytuł domyślny" : $tmp);?>
</title>
	<link rel="stylesheet" href="https://unpkg.com/purecss@0.6.2/build/pure-min.css" integrity="sha384-UQiGfs9ICog+LwheBSRCt1o5cbyKIHbwjWscjemyBMT9YCUMZffs6UqUTd0hObXD" crossorigin="anonymous">
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/css/style.css">	
</head>
<body>

<div class="header">
	<h1><?php echo (($tmp = @$_smarty_tpl->tpl_vars['page_title']->value)===null||$tmp==='' ? "Tytuł domyślny" : $tmp);?>
</h1>
	<h2><?php echo (($tmp = @$_smarty_tpl->tpl_vars['page_header']->value)===null||$tmp==='' ? "Tytuł domyślny" : $tmp);?>
</h1>
	
</div>

<div class="content">
<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_21389119606242b211f16259_20197660', 'content');
?>

</div><!-- content -->

<div class="footer">
	<p>
<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3455989766242b211f17c24_45132061', 'footer');
?>

	</p>
	<p>
		Widok oparty na stylach <a href="http://purecss.io/" target="_blank">Pure CSS Yahoo!</a>
	</p>
</div>

</body>
</html><?php }
/* {block 'content'} */
class Block_21389119606242b211f16259_20197660 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 Domyślna treść zawartości .... <?php
}
}
/* {/block 'content'} */
/* {block 'footer'} */
class Block_3455989766242b211f17c24_45132061 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 Domyślna treść stopki .... <?php
}
}
/* {/block 'footer'} */
}
