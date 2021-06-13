<?php




use Illuminate\Routing\Controller as BaseController;


class DashboardController extends BaseController{
    public function dashboard()
    {
        $user = User:: find(session('username'));
        if((session('username'))!== null){
            return view('dashboard')->with('nome',$user->nome)->with('username',session('username'))->with('csrf_token',csrf_token());
        }else{
            return redirect('login');
        }
    }

    public function loadContent()
    {
         $art = [];
        $user = Articolo::all();
        $size = count($user);
        for($i = 0; $i < $size; ++$i){
            if(!empty($user[$i]))
            $art[] = $user[$i];
        }
        return json_encode($art);
    }
    

}
?>