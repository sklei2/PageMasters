<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Routing\Router;

class ExchangeRateController extends Controller
{
    private $router;

    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    public function get()
    {
        print "nothing";
        $requestRates = Request::create('https://openexchangerates.org/api/latest.json', 'GET', array(["app_id" => env('OPENEXCHANGE_APP_ID'), "base" => "USD"]));
        $resRates = $this->router->dispatch($requestRates);
        $decodedRates = json_decode($resRates->content());
        $code = $decodedRates != null ? 200 : 404;
        return response($decodedRates, $code);
    }

}
