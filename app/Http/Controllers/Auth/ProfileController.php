<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * @Middleware("web")
 * @Middleware("guard:any")
 */
class ProfileController extends Controller {
    
    /**
     * @Get("/profile")
     *
     * @return void
     */
    function index() {
        return view('@auth.pages.profile');
    }

    /**
     * @Post("/profile")
     *
     * @return void
     */
    function save() {}
}

// End of file
