
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./preferences');

window.exchangeRates = function(){
    var url = "/api/exchange";
    $.ajax({
        url: url,
        type:'get',
        success:function(res){
            console.log(res);
        }
    });
};