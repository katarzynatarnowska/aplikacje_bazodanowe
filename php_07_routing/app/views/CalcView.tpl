{extends file="main.tpl"}

{block name=content}

<div class="pure-menu pure-menu-horizontal bottom-margin">
	<a href="{$conf->action_url}logout"  class="pure-menu-heading pure-menu-link">wyloguj</a>
	<span style="float:right;">użytkownik: {$user->login}, rola: {$user->role}</span>
</div>

<form action="{$conf->action_url}calcCompute" method="post" class="pure-form pure-form-aligned bottom-margin">
	<legend>Kalkulator kredytowy</legend>
	<fieldset>
        
        <div class="pure-control-group">
			<label for="id_op">Kwota: </label>
			<select name="op">
				{if isset($res->op_name)}
				<option value="{$form->op}">{$res->op_name}</option>
				<option value="piec" disabled="true">---</option>
				{/if}
				<option value="times">1000</option>
				<option value="">5000</option>
				
				{if $user->role == "admin"}
				<option value="div">10000</option>
				{/if}
				
				{if $user->role == "admin"}
				<option value="minus">20000</option>
				{/if}

			</select>
		</div>

	<div class="pure-control-group">
			<label for="r">Okres (lata): </label>
			<input id="r" type="text" name="r" value="{$form->r}" />
		</div>
        <div class="pure-control-group">
			<label for="p">Oprocentowanie: </label>
			<input id="p" type="text" name="p" value="{$form->p}" />
		</div>
		<div class="pure-controls">
			<input type="submit" value="Oblicz" class="pure-button pure-button-primary"/>
		</div>
	</fieldset>
</form>	

{include file='messages.tpl'}

{if isset($res->result)}
<div class="messages info">
	Wynik: {$res->result}
</div>
{/if}

{/block}