<?php
    namespace App\Action\Auth;
    
    use Lorisleiva\Actions\Concerns\AsAction;
    use Illuminate\Http\Request;

    class RegisterPage
    {
        use AsAction;
        
        public function asController(Request $request)
        {
            return view('auth.register');
        }
    }