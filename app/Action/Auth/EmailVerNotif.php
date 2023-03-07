<?php
    namespace App\Action\Auth;
    
    use Lorisleiva\Actions\Concerns\AsAction;
    use Illuminate\Http\Request;
    use App\Providers\RouteServiceProvider;

    class EmailVerNotif
    {
        use AsAction;
        
        public function asController(Request $request)
        {
            if ($request->user()->hasVerifiedEmail()) {
                return redirect()->intended(RouteServiceProvider::HOME);
            }
    
            $request->user()->sendEmailVerificationNotification();
    
            return back()->with('status', 'verification-link-sent');
        }
    }