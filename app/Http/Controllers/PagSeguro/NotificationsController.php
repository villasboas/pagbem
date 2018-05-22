<?php

namespace App\Http\Controllers\PagSeguro;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NotificationsController extends Controller {

    /**
     * @Get("/pagseguro/notifications", as="pagseguro.notification")
     *
     * @return void
     */
    function index() {
        return 'aqui';
    }
}

// End of file
