<?php

	/**
	 * Método que devuelve valor de una clave del REQUEST limpia o cadena vacía si no existe
	 * @param {string} - Clave del REQUEST de la que queremos obtener el valor
	 * @return {string}
	 */
	function obtenerValorCampo(string $campo): string{
        if (isset($_REQUEST[$campo])){
            $valor = trim(htmlspecialchars($_REQUEST[$campo], ENT_QUOTES, "UTF-8"));
        }else{
            $valor = "";
        }
        
        return $valor;
    }

	/**
	 * Método que valida si un texto no esta vacío
	 * @param {string} - Texto a validar
	 * @return {boolean}
	 */
	function validar_requerido(string $texto): bool
	{
	    return !(trim($texto) == '');
	}

	/**
	 * Método que valida si es un número entero 
	 * @param {string} - Número a validar
	 * @return {bool}
	 */
	function validar_entero(string $numero): bool
	{
	    return (filter_var($numero, FILTER_VALIDATE_INT) === FALSE) ? False : True;
	}

	/**
	 * Método que valida si el texto tiene un formato válido de E-Mail
	 * @param {string} - Email
	 * @return {bool}
	 */
	function validar_email(string $texto): bool
	{
	    return (filter_var($texto, FILTER_VALIDATE_EMAIL) === FALSE) ? False : True;
	}

    // Función para inicializar las variables de sesión del ejercicio de Record de Dados
    function iniciarVariablesDados() {
        $_SESSION["dadosDiferentes"] = 0;
        $_SESSION["dado1"] = 1;
        $_SESSION["dado2"] = 1;
        $_SESSION["dado3"] = 1;
        $_SESSION["dado4"] = 1; 
        $_SESSION["dado5"] = 1;
        $_SESSION["record"] = 5;
		$_SESSION["tiradas"] = 0;
    }
	
	function iniciarVariablestragaperras() {
		$_SESSION["monedas"] = 0;
	 	$_SESSION["tiradas"] = 0;
	 	$_SESSION["premio"] = 0;
		$_SESSION["fruta1"] = rand(1, 8);
		$_SESSION["fruta2"] = rand(1, 8);
		$_SESSION["fruta3"] = rand(1, 8);
		$_SESSION["noCredit"] = false;
}

?>