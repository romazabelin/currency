<?php
namespace app\models;

class OpenExchange implements iCurrency
{
    protected static $apiUrl       = 'a9e5e1c064a949bf94337815d8198da1';
    protected static $baseCurrency = 'USD';

    /**
     * Implement getCurrencies() method
     */
    public function getCurrencies()
    {
        $currenciesFromApi = json_decode(file_get_contents('https://openexchangerates.org/api/currencies.json'));

        foreach($currenciesFromApi as $currencyShortCode => $currencyName) {
            $currencies[$currencyShortCode] = $currencyName;
        }

        return $currencies;
    }

    /**
     * Implement getExchangeRates() method.
     */
    public function getExchangeRates()
    {
        $baseCurrencyRates = json_decode(file_get_contents('https://openexchangerates.org/api/latest.json?app_id=' . self::$apiUrl . '&base=' . self::$baseCurrency));

        foreach($baseCurrencyRates->rates as $shortCode => $currencyRate) {
            $exchangeRates[$shortCode] = $currencyRate;
        }

        return $exchangeRates;
    }

    /**
     * @param $total
     * @param $currency
     * Implement convertCurrency() method.
     */
    public function convertCurrency($total, $currency)
    {
        $baseCurrencyRates = json_decode(file_get_contents('https://openexchangerates.org/api/latest.json?app_id=' . self::$apiUrl . '&base=' . self::$baseCurrency));
        return $baseCurrencyRates->rates->$currency * $total;
    }
}