
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./preferences');

window.changeCurrency = function(link){

    // get the currency type we're converting from, from the dropdown display
    var baseCurrency = $('#currCurrencyCode').text().split(/[()]+/)[1];
    var url = "/api/exchange/";

    var newCurrency = link.id;
    $('#currCurrencyCode').text("Price ("+link.id+")");

    $.ajax({
        url: url,
        type:'GET',
        // who needs error handling
        success:function(res){
            var rates = res.rates;
            var newConversionRate = rates[newCurrency];
            var oldConversationRate= rates[baseCurrency];
            $('.price').each(function(i, elem){
                var $elem = $(elem);
                var currPrice = $elem.text();
                // the dumb external API we're using doesn't allow you to change the base conversion
                // unless you pay for it, so we're doing some math to get accurate conversions.
                var newPrice = ((currPrice.replace('$','')/oldConversationRate)*newConversionRate).toFixed(2);
                $elem.text(newPrice);
            });
        }
    });
};