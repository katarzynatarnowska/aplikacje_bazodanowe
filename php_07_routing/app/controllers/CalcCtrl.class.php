<?php

namespace app\controllers;

use app\forms\CalcForm;
use app\transfer\CalcResult;

class CalcCtrl {

	private $form;   //dane formularza (do obliczeń i dla widoku)
	private $result; //inne dane dla widoku

	/** 
	 * Konstruktor - inicjalizacja właściwości
	 */
	public function __construct(){
		//stworzenie potrzebnych obiektów
		$this->form = new CalcForm();
		$this->result = new CalcResult();
	}
	
	/** 
	 * Pobranie parametrów
	 */
	public function getParams(){
		$this->form->r = getFromRequest('r');
		$this->form->p = getFromRequest('p');
		$this->form->op = getFromRequest('op');
	}
	
	/** 
	 * Walidacja parametrów
	 * @return true jeśli brak błedów, false w przeciwnym wypadku 
	 */
	public function validate() {
		// sprawdzenie, czy parametry zostały przekazane
		if (! (isset ( $this->form->r ) && isset ( $this->form->p ) && isset ( $this->form->op ))) {
			// sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
			return false;
		}
		
		// sprawdzenie, czy potrzebne wartości zostały przekazane
		if ($this->form->r == "") {
			getMessages()->addError('Nie podano rat');
		}
		if ($this->form->p == "") {
			getMessages()->addError('Nie podano oprcentowania');
		}
		
		// nie ma sensu walidować dalej gdy brak parametrów
		if (! getMessages()->isError()) {
			
			// sprawdzenie, czy $x i $y są liczbami całkowitymi
			if (! is_numeric ( $this->form->r )) {
				getMessages()->addError('Pierwsza wartość nie jest liczbą ');
			}
			
			if (! is_numeric ( $this->form->p )) {
				getMessages()->addError('Druga wartość nie jest liczbą ');
			}
		}
		
		return ! getMessages()->isError();
	}
	
	/** 
	 * Pobranie wartości, walidacja, obliczenie i wyświetlenie
	 */
	public function action_calcCompute(){

		$this->getParams();
		
		if ($this->validate()) {
				
			//konwersja parametrów na int
			$this->form->r = intval($this->form->r);
			$this->form->p = intval($this->form->p);
			getMessages()->addInfo('Parametry poprawne.');
				
			//wykonanie operacji
			switch ($this->form->op) {
				case 'minus' :
					if (inRole('admin')) {
						$this->result->result = ((($this->form->p/100)* 10000* $this->form->r)+10000)/($this->form->r*12);
						$this->result->op_name = ' 10000';
					} else {
						getMessages()->addError('Tylko administrator może wykonać tę operację');
					}
					break;
				case 'times' :
					$this->result->result = ((($this->form->p/100)* 1000* $this->form->r)+1000)/($this->form->r*12);
					$this->result->op_name = '1000';
					break;
				case 'div' :
					if (inRole('admin')) {
						$this->result->result = ((($this->form->p/100)* 20000* $this->form->r)+20000)/($this->form->r*12);
						$this->result->op_name = '20000';
					} else {
						getMessages()->addError('Tylko administrator może wykonać tę operację');
					}
					break;
				default :
					$this->result->result = ((($this->form->p/100)* 5000* $this->form->r)+5000)/($this->form->r*12);
					$this->result->op_name = '5000';
					break;
			}
			
			getMessages()->addInfo('Wykonano obliczenia.');
		}
		
		$this->generateView();
	}
	
	public function action_calcShow(){
		getMessages()->addInfo('Kalkulator kredytowy');
		$this->generateView();
	}
	
	/**
	 * Wygenerowanie widoku
	 */
	public function generateView(){

		getSmarty()->assign('user',unserialize($_SESSION['user']));
				
		getSmarty()->assign('page_title','Kalkulator kredytowy');

		getSmarty()->assign('form',$this->form);
		getSmarty()->assign('res',$this->result);
		
		getSmarty()->display('CalcView.tpl');
	}
}
