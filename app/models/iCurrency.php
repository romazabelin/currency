<?php
namespace app\models;

interface iCurrency
{
    /**
     * @return mixed
     * Description: get list of currencies with short code and name
     */
    public function getCurrencies();

    /**
     * @return mixed
     * Description: get exchange rates according to base currency
     */
    public function getExchangeRates();

    /**
     * @param $total
     * @param $currency
     * @return mixed
     * Description: convert to currency by exchange rate
     */
    public function convertCurrency($total, $currency);
}