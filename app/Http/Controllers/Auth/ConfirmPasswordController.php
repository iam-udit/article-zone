<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\GuestUserHelper;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ConfirmsPasswords;

class ConfirmPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Confirm Password Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password confirmations and
    | uses a simple trait to include the behavior. You're free to explore
    | this trait and override any functions that require customization.
    |
    */

    use ConfirmsPasswords;

    /**
     * Where to redirect users when the intended url fails.
     *
     * @var string
     */
    protected $redirectTo;

    /**
     * Apply the redirecting url
     *
     * @return void
     */
    public function __construct()
    {
        // Get redirectTo path for user
        $this->redirectTo = GuestUserHelper::getRedirectUrl();

        $this->middleware('auth');
    }
}
