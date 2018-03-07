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
        $url = 'https://openexchangerates.org/api/latest.json?app_id=' . env('OPENEXCHANGE_APP_ID') . '&base=USD';
        $decodedRates = json_decode(file_get_contents($url), true);
        $code = $decodedRates != null ? 200 : 404;
        return response($decodedRates, $code);
    }

}
