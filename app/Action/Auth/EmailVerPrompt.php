<?php
    namespace App\Action\Auth;
    
    use Lorisleiva\Actions\Concerns\AsAction;
    use Illuminate\Http\Request;
    use App\Providers\RouteServiceProvider;

    class EmailVerPrompt
    {
        use AsAction;
        
        public function asController(Request $request)
        {
            return $request->user()->hasVerifiedEmail()
                        ? redirect()->intended(RouteServiceProvider::HOME)
                        : view('auth.verify-email');
        }
    }