<?php
const OPEN_EXCHANGE_APP_ID = 'a9e5e1c064a949bf94337815d8198da1';
const BASE_CURRENCY        = 'USD';

$currenciesFromApi = json_decode(file_get_contents('https://openexchangerates.org/api/currencies.json'));
//$baseCurrencyData  = json_decode(file_get_contents('https://openexchangerates.org/api/latest.json?app_id=' . OPEN_EXCHANGE_APP_ID . '&base=' . BASE_CURRENCY));
//echo $baseCurrencyData->rates->AWG;

foreach ($currenciesFromApi as $currencyShortCode => $currencyName) {
    $currencies[$currencyShortCode] = $currencyName;
}
?>

<select>
    <?foreach($currencies as $currencyShortCode => $currencyName):?>
        <option value="<?= $currencyShortCode?>">
            <?= $currencyName?>(<?= $currencyShortCode?>)
        </option>
    <?endforeach;?>
</select>

<input type="number">

<input type="button" value="Convert">