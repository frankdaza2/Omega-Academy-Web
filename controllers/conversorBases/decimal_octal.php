<?php 

require "../../models/conversorBases/Validator.php";
require "../../models/conversorBases/Decimal.php";

// Obtengo los valores del formulario conversor de bases y elimino los espacios en blanco.
$decimal = str_replace(" ", "", $_GET["decimal"]);

$numeroValidado = new Validator($decimal);

if (strlen($decimal) > 0) {
	if ($decimal >= 0) {
		if ($numeroValidado->validator_decimal()) {
			$number = new Decimal($decimal);
			
			$octal = $number->decimal_octal();
			echo $octal;
		}else {
			echo "¡ERROR!";
		}
	}
	else {
		$decimal = abs($decimal);
		if ($numeroValidado->validator_decimal()) {
			$number = new Decimal($decimal);
			
			$octal = $number->decimal_octal();
			echo "-".$octal;
		}else {
			echo "¡ERROR!";
		}
	}
}


?>