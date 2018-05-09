<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller {

    /**
     * @Get("/")
     *
     * @return void
     */
    function show() {
        return view('@dashboard.pages.home', [ 'title' => 'Inicio' ] );
    }
}

// End of file
