<?php
namespace app\models;

interface iCurrency
{
    public function getCurrencies();

    public function getExchangeRates();
}