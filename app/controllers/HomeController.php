<?php
namespace app\controllers;

use app\models\OpenExchange as Currency;

class HomeController
{
    public function actionConvertCurrency()
    {
        $currencyTotal     = $_POST['currencyTotal'];
        $currencyToConvert = $_POST['currencyToConvert'];
        $currency          = new Currency;

        echo json_encode([
            'total' => round($currency->convertCurrency($currencyTotal, $currencyToConvert), 2)
        ]);
    }
}