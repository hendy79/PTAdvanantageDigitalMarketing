<?php
    namespace App\Action\Auth;
    
    use Lorisleiva\Actions\Concerns\AsAction;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;

    class LogoutAction
    {
        use AsAction;
        
        public function asController(Request $request)
        {
            Auth::guard('web')->logout();
    
            $request->session()->invalidate();
    
            $request->session()->regenerateToken();
    
            return redirect('/');
        }
    }