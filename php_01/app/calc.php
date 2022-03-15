<?php
// KONTROLER strony kalkulatora
require_once dirname(__FILE__).'/../config.php';

// W kontrolerze niczego nie wysyła się do klienta.
// Wysłaniem odpowiedzi zajmie się odpowiedni widok.
// Parametry do widoku przekazujemy przez zmienne.

// 1. pobranie parametrów

$k = $_REQUEST ['k'];
$r = $_REQUEST ['r'];
$p = $_REQUEST ['p'];

// 2. walidacja parametrów z przygotowaniem zmiennych dla widoku

// sprawdzenie, czy parametry zostały przekazane
if ( ! (isset($k) && isset($r) && isset($p))) {
	//sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
	$messages [] = 'Błędne wywołanie aplikacji. Brak jednego z parametrów.';
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
if (empty( $messages )) {
	
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

}

// 3. wykonaj zadanie jeśli wszystko w porządku

if (empty ( $messages )) { // gdy brak błędów
	
	//konwersja parametrów na int
	$k = intval($k);
	$r = intval($r);
	$p = intval($p);
	
	//wykonanie operacji
	
			$result = ((($p/100)*$k*$r)+$k)/($r*12);



			
}

// 4. Wywołanie widoku z przekazaniem zmiennych
// - zainicjowane zmienne ($messages,$x,$y,$operation,$result)
//   będą dostępne w dołączonym skrypcie
include 'calc_view.php';
