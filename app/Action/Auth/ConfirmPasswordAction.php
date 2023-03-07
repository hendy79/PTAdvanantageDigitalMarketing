<?php
    namespace App\Action\Auth;
    
    use Lorisleiva\Actions\Concerns\AsAction;
    use Illuminate\Http\Request;
    use App\Providers\RouteServiceProvider;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Validation\ValidationException;

    class ConfirmPasswordAction
    {
        use AsAction;
        
        public function asController(Request $request)
        {
            if (! Auth::guard('web')->validate([
                'email' => $request->user()->email,
                'password' => $request->password,
            ])) {
                throw ValidationException::withMessages([
                    'password' => __('auth.password'),
                ]);
            }
    
            $request->session()->put('auth.password_confirmed_at', time());
    
            return redirect()->intended(RouteServiceProvider::HOME);
        }
    }