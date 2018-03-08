
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./preferences');
require('./admin');

window.exchangeRates = function(){
    var url = "/api/exchange";
    $.ajax({
        url: url,
        type:'GET',
        success:function(res){
            var rates = res.rates;
            for (var property in rates) {
                if (rates.hasOwnProperty(property)) {
                    var listItem = "<li><a onClick='window.changeCurrency(this)' id='"+property+"'>"+ property +"</a></li>";
                    $("#currencyList").append(listItem);
                    localStorage.setItem(property, rates[property]);
                }
            }
        }
    });
};

window.changeCurrency = function(link){
    $('#currencyDropdown').text("Price ("+link.id+")");
    $('#currencyDropdown').addClass("disabled").prop('onclick',null).off('click');
    $('.price').each(function(i, elem){
        var $elem = $(elem);
        var currPrice = $elem.text();
        var newPrice = Math.round((currPrice.replace('$','')*localStorage.getItem(link.id))*100)/100;
        $elem.text(newPrice);
    });
};