<?php


use Illuminate\Routing\Controller as BaseController;

class ProfileController extends BaseController{
    public function profile()
    {
        $user = User:: find(session('username'));
        if((session('username'))!== null){
            return view('profile')->with('user',$user->username)->with('username',session('username'))->with('csrf_token',csrf_token());
        }else{
            return redirect('login');
        }
    }

    public function loadArticle()
    {
        $user = User::where('username',session('username'))->first();
        if(!empty($user->articolo)){
    
        return json_encode($user->articolo);
        }
    }

    public function loadPref()
    {
        $art = [];
        $user = Preferiti::where('username',session('username'))->get();
        $size = count($user);
        for($i = 0; $i < $size; ++$i){
            if(!empty($user[$i]->articolo))
            $art[] = $user[$i]->articolo;
        }
    
        return json_encode($art);
    }

}
?>