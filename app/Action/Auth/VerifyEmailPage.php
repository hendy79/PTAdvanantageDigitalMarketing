<?php
    namespace App\Action\Auth;
    
    use Lorisleiva\Actions\Concerns\AsAction;
    use App\Providers\RouteServiceProvider;
    use Illuminate\Auth\Events\Verified;
    use Illuminate\Foundation\Auth\EmailVerificationRequest;

    class VerifyEmailPage
    {
        use AsAction;
        
        public function asController(EmailVerificationRequest $request)
        {
            if ($request->user()->hasVerifiedEmail()) {
                return redirect()->intended(RouteServiceProvider::HOME.'?verified=1');
            }
    
            if ($request->user()->markEmailAsVerified()) {
                event(new Verified($request->user()));
            }
    
            return redirect()->intended(RouteServiceProvider::HOME.'?verified=1');
        }
    }