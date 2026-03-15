<?php

date_default_timezone_set("America/Sao_Paulo");
$data = date("d/m/y H:i:s");
echo "<p>$data</p>";
$valor = 10545.8888888888;
$valor_arredondado = round($valor);
echo("<p>Valor Aredondado: $valor_arredondado</p>");
$valor_formatado = number_format($valor, 2, ",", ".");
echo("<p>Valor Formatado: $valor_formatado</p>");

$exp = pow(3, 4);
$raiz = sqrt(16);
$aleatorio = rand(1, 10);

if (isset($nome)) {
    echo "<p>nome infomrado</p>";
} else {
    echo "<p>nome não informado</p>";
    die();

}

if (is_float($valor)) {
    echo "<p> é float</p>";
}
