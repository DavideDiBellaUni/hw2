<?php


use Illuminate\Routing\Controller as BaseController;


class PreferitiController extends BaseController{
    
    public function addpref(){
        $user = User:: find(session('username'));

        Preferiti::create([
            'cod_articolo'=> request('par1'),
            'username'=> $user->username
        ]);
    }

    public function removepref(){
        $user = User:: find(session('username'));
        $pref = Preferiti::where('cod_articolo',request('par1'))->where('username',$user->username);
        $pref->delete();

    }



    public function checkPref()
    {
        $user = User:: find(session('username'));
        $pref = Preferiti::where('cod_articolo',request('par1'))->where('username',$user->username)->first();
        if($pref!== null){
            $check = true;
            return json_encode($check);
        }else{
            $check = false;
            return json_encode($check);
        }

    
    }
}
?>