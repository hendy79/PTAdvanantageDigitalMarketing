<?php
    namespace App\Action\Auth;
    
    use Lorisleiva\Actions\Concerns\AsAction;
    use Illuminate\Http\Request;

    class NewPasswordPage
    {
        use AsAction;
        
        public function asController(Request $request)
        {
            return view('auth.reset-password', ['request' => $request]);
        }
    }