<?php


use Illuminate\Routing\Controller as BaseController;


class LoginController extends BaseController{
    public function login()
    {
         //verifico se l'utente ha già fatto l'accesso
    if((session('username'))!== null){
        return redirect('dashboard');
    }else{
        $old_username = Request::old('username');
    return view('login')
    ->with('csrf_token',csrf_token())
    ->with('old_username',$old_username);
    }
    }

    public function checkLogin()
    {
        $password = request('password');
        //Verifichiamo che l'utente esista
        //METODO QUERY CLASSICO (NON FARE)
        //$result = DB::select('SELECT * FROM utente WHERE username = ? AND password = ?',[request('username')],[request('password')]);
        //METODO QUERY BUILDER(NON FARE)
        //$result = DB::table('utente')->where('username',request('username'))->where('password',request('password'))->get();
        //ORM
        $result = User::where('username',request('username'))->first();

       /* $passhash = $result->password;
        $check = password_verify($password,$passhash);*/
        
        if(isset($result->password)){

            $passhash = $result->password;
            $check = password_verify($password,$passhash);
            if($check){
            //credenziali valide
            Session::put('username',$result->username);
            return redirect('dashboard');
            }else{
                return redirect('login')->withInput();
            }
        }else{
            //credenziali non valide
            return redirect('login')->withInput(); 
           
        }
       
    }

    public function logout(){
        Session:: flush();
        //torniamo al login
    return redirect('login');

    }
}
?>