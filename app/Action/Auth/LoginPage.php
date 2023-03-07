<?php
    namespace App\Action\Auth;
    
    use Lorisleiva\Actions\Concerns\AsAction;
    use Illuminate\Http\Request;

    class LoginPage
    {
        use AsAction;
        
        public function asController(Request $request)
        {
            return view('auth.login');
        }
    }