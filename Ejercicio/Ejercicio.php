<?php

/**
  * Valida que se haya ingresado un valor
  *
  * @param [type] $valor
  * @return bool True si se ingresó un valor False en caso contrario
  */
function requerido($valor)
{
    $trimmedValue = trim($valor);
    return isset($trimmedValue) && $trimmedValue !== "";
}

/**
 * Valida que el valor se encuentre dentro de la lista especificada
 *
 * @param [type] $valor
 * @param array $set Lista de valores donde se desea buscar el valor
 * @return void
 */
function enLista($valor, $set = [])
{
    return in_array($valor, $set);
}


/**
 * Valida la longitud de una cadena, de acuerdo a la opción
 * especificada en el segundo parametro
 *
 * Ejemplos:
 * longitud($curp, ['exacto' => 18])
 * longitud($nombre, ['min' => 5, 'max' => 100])
 *
 * @param mixed $valor Valor que se debe validar
 * @param array $opciones Arreglo para especificar opciones 'exacto', 'min', 'max' (obligatorio especificar)
 * @return True si el valor cumple con la longitud, False en caso contrario
 */
function longitud($valor, $opciones)
{
    if (isset($opciones['max']) && (strlen($valor) > (int)$opciones['max'])) {
        return false;
    }
    if (isset($opciones['min']) && (strlen($valor) < (int)$opciones['min'])) {
        return false;
    }
    if (isset($opciones['exacto']) && (strlen($valor) != (int)$opciones['exacto'])) {
        return false;
    }
    return true;
}

?>
