<?php
require_once dirname(__FILE__).'/../config.php';

// KONTROLER strony kalkulatora

// W kontrolerze niczego nie wysyła się do klienta.
// Wysłaniem odpowiedzi zajmie się odpowiedni widok.
// Parametry do widoku przekazujemy przez zmienne.

//ochrona kontrolera - poniższy skrypt przerwie przetwarzanie w tym punkcie gdy użytkownik jest niezalogowany
include _ROOT_PATH.'/app/security/check.php';

//pobranie parametrów
function getParams(&$k,&$r,&$p){
	$k = isset($_REQUEST['k']) ? $_REQUEST['k'] : null;
	$r = isset($_REQUEST['r']) ? $_REQUEST['r'] : null;
	$p = isset($_REQUEST['p']) ? $_REQUEST['p'] : null;	
}

//walidacja parametrów z przygotowaniem zmiennych dla widoku
function validate(&$k,&$r,&$p,&$messages){
	// sprawdzenie, czy parametry zostały przekazane
	if ( ! (isset($k) && isset($r) && isset($p))) {
		// sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
		// teraz zakładamy, ze nie jest to błąd. Po prostu nie wykonamy obliczeń
		return false;
	}

	// sprawdzenie, czy potrzebne wartości zostały przekazane
	if ( $k == "") {
	$messages [] = 'Nie podano kwoty';
	}
	if ( $r == "") {
	$messages [] = 'Nie podano liczby rat';
	}

	if ( $p == "") {
	$messages [] = 'Nie podano oprocentowania';
	}

	//nie ma sensu walidować dalej gdy brak parametrów
	if (count ( $messages ) != 0) return false;
	
	// sprawdzenie, czy $x i $y są liczbami całkowitymi
	if (! is_numeric( $k )) {
		$messages [] = 'Pierwsza wartość nie jest liczbą całkowitą';
	}
	
	if (! is_numeric( $r )) {
		$messages [] = 'Druga wartość nie jest liczbą całkowitą';
	}	

	if (! is_numeric( $p )) {
		$messages [] = 'Trzecia wartość nie jest liczbą całkowitą';
	}	
	if (count ( $messages ) != 0) return false;
	else return true;
}

function process(&$k,&$r,&$p,&$messages,&$result){
	global $role;
	
	//konwersja parametrów na int
	$k = intval($k);
	$r = intval($r);
	$p = intval($p);
	
	//wykonanie operacji
				$result = ((($p/100)*$k)+$k)/$r;
}

//definicja zmiennych kontrolera
$k = null;
$r = null;
$p = null;
$result = null;
$messages = array();

//pobierz parametry i wykonaj zadanie jeśli wszystko w porządku
getParams($k,$r,$p);
if ( validate($k,$r,$p,$messages) ) { // gdy brak błędów
	process($k,$r,$p,$messages,$result);
}

// Wywołanie widoku z przekazaniem zmiennych
// - zainicjowane zmienne ($messages,$x,$y,$operation,$result)
//   będą dostępne w dołączonym skrypcie
include 'calc_view.php';