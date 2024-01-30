<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
    // protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function transferCart()
    {
        if (Auth::check()) {
            $userId = auth()->user()->id;
            $sessionCart = session()->get('cart', []);
            foreach ($sessionCart as $productId => $quantity) {
                $cartItem = Cart::where('user_id', $userId)
                    ->where('product_id', $productId)
                    ->first();

                if ($cartItem) {
                    $cartItem->update([
                        'quantity' => $cartItem->quantity + $quantity,
                    ]);
                } else {
                    Cart::create([
                        'user_id' => $userId,
                        'product_id' => $productId,
                        'quantity' => $quantity,
                    ]);
                }
            }
            session()->forget('cart');

            return true;
        }

        return false; // User is not authenticated
    }
    protected function authenticated(Request $request, $user)
    {
        // Check the user's status before allowing login
        if ($user->status !== 'user') {
            Auth::logout(); // Log out the user
            return back()->with('error', 'Your account is not authorized to log in.');
        } else {
            $this->transferCart();

            $message = 'Welcome, ' . $user->name . '! You have successfully logged in.';

            session()->flash('success', $message);
        }

        return redirect()->intended($this->redirectPath());
    }

    public function logout(Request $request)
    {
        session()->flash('success', 'You have successfully logged out.');

        Auth::logout();
        return redirect('/');
    }
}
