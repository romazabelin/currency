<?php
require '../../vendor/autoload.php';

use app\models\OpenExchange as Currency;

$currency = new Currency;

if (isset($_POST['convert'])) {
    $currencyTotal     = $_POST['currencyTotal'];
    $currencyToConvert = $_POST['currencyToConvert'];

    $total = round($currency->convertCurrency($currencyTotal, $currencyToConvert), 2);

    echo json_encode([
        'total' => $total
    ]);
}