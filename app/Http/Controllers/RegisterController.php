<?php
use Illuminate\Routing\Controller as BaseController;


class RegisterController extends BaseController{
    public function signupCheck()
    {
        //verifico se l'utente ha già fatto l'accesso
    if((session('username'))!== null){
        return redirect('dashboard');
    }else{
    return view('signup')
    ->with('csrf_token',csrf_token());
    }
    }

    public function checkUser()
    {
        
        $result = User::where('username',request('q'))->first();

        if($result !== null){
            $check = false;
            return json_encode($check);
        }else{
            $check = true;
            return json_encode($check);
        }

    }

    public function checkMail()
    {
        
        $result = User::where('email',request('q'))->first();

        if($result !== null){
            $check = false;
            return json_encode($check);
        }else{
            $check = true;
            return json_encode($check);
        }

    }

    public function createUser()
    {
        $request = request();
        $pass = password_hash($request['password'],PASSWORD_BCRYPT);
        
        $newUser = User::create([
            'username'=>$request['username'],
            'password'=> $pass,
            'nome'=> $request['name'],
            'cognome'=>$request['surname'],
            'email'=>$request['email'],
            'num_articoli'=> $num_articoli = 0
        ]);
        
         Session::put('username',request('username'));
         return redirect('dashboard')
         ->with('csrf_token',csrf_token());
            
       
    }
}
?>