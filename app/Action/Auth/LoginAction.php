<?php
    namespace App\Action\Auth;
    
    use Lorisleiva\Actions\Concerns\AsAction;
    use App\Http\Requests\Auth\LoginRequest;
    use App\Providers\RouteServiceProvider;

    class LoginAction
    {
        use AsAction;

        public function asController(LoginRequest $request)
        {
            $request->authenticate();
    
            $request->session()->regenerate();
    
            return redirect()->intended(RouteServiceProvider::HOME);
        }
    }