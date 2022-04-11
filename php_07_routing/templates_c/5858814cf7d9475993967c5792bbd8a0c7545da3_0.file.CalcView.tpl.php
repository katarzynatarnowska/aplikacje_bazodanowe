<?php
/* Smarty version 3.1.30, created on 2022-04-11 23:00:54
  from "/Applications/XAMPP/xamppfiles/htdocs/php_07_routing/app/views/CalcView.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_62549706cecc37_41000292',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5858814cf7d9475993967c5792bbd8a0c7545da3' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/php_07_routing/app/views/CalcView.tpl',
      1 => 1649710831,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:main.tpl' => 1,
    'file:messages.tpl' => 1,
  ),
),false)) {
function content_62549706cecc37_41000292 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_118735431362549706cec7a3_77903735', 'content');
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'content'} */
class Block_118735431362549706cec7a3_77903735 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="pure-menu pure-menu-horizontal bottom-margin">
	<a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
logout"  class="pure-menu-heading pure-menu-link">wyloguj</a>
	<span style="float:right;">użytkownik: <?php echo $_smarty_tpl->tpl_vars['user']->value->login;?>
, rola: <?php echo $_smarty_tpl->tpl_vars['user']->value->role;?>
</span>
</div>

<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
calcCompute" method="post" class="pure-form pure-form-aligned bottom-margin">
	<legend>Kalkulator kredytowy</legend>
	<fieldset>
        
        <div class="pure-control-group">
			<label for="id_op">Kwota: </label>
			<select name="op">
				<?php if (isset($_smarty_tpl->tpl_vars['res']->value->op_name)) {?>
				<option value="<?php echo $_smarty_tpl->tpl_vars['form']->value->op;?>
"><?php echo $_smarty_tpl->tpl_vars['res']->value->op_name;?>
</option>
				<option value="piec" disabled="true">---</option>
				<?php }?>
				<option value="times">1000</option>
				<option value="">5000</option>
				
				<?php if ($_smarty_tpl->tpl_vars['user']->value->role == "admin") {?>
				<option value="div">10000</option>
				<?php }?>
				
				<?php if ($_smarty_tpl->tpl_vars['user']->value->role == "admin") {?>
				<option value="minus">20000</option>
				<?php }?>

			</select>
		</div>

	<div class="pure-control-group">
			<label for="r">Okres (lata): </label>
			<input id="r" type="text" name="r" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->r;?>
" />
		</div>
        <div class="pure-control-group">
			<label for="p">Oprocentowanie: </label>
			<input id="p" type="text" name="p" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->p;?>
" />
		</div>
		<div class="pure-controls">
			<input type="submit" value="Oblicz" class="pure-button pure-button-primary"/>
		</div>
	</fieldset>
</form>	

<?php $_smarty_tpl->_subTemplateRender("file:messages.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<?php if (isset($_smarty_tpl->tpl_vars['res']->value->result)) {?>
<div class="messages info">
	Wynik: <?php echo $_smarty_tpl->tpl_vars['res']->value->result;?>

</div>
<?php }?>

<?php
}
}
/* {/block 'content'} */
}
