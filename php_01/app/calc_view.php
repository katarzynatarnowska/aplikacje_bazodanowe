<?php require_once dirname(__FILE__) .'/../config.php';?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
<meta charset="utf-8" />
<title>Kalkulator spłat kredytu</title>
</head>
<body>

<form action="<?php print(_APP_URL);?>/app/calc.php" method="post">
	<label for="kwota">Kwota kredytu: </label>
	<input id="kwota" type="text" name="k" value="<?php print($k); ?>" /><br />
	<label for="raty">Ilość rat: </label>
	<input id="raty" type="text" name="r" value="<?php print($r); ?>" /><br />
	<label for="procent">Oprocentowanie: </label> 
	<input id="procent" type="text" name="p" value="<?php print($p); ?>" />%<br />
	<input type="submit" value="Oblicz" />
</form>	

<?php
//wyświeltenie listy błędów, jeśli istnieją
if (isset($messages)) {
	if (count ( $messages ) > 0) {
		echo '<ol style="margin: 20px; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width:300px;">';
		foreach ( $messages as $key => $msg ) {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';
	}
}
?>

<?php if ($result){ ?>
<div style="margin: 20px; padding: 10px; border-radius: 5px; background-color: #ff0; width:300px;">
<?php echo 'Miesięczna rata (zł): '.round ($result, 2);  ?>
</div>
<?php } ?>

</body>
</html>