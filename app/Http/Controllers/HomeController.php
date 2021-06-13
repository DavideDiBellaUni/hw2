<?php


use Illuminate\Routing\Controller as BaseController;


class HomeController extends BaseController{
    public function checkLogin()
    {
        $user = User:: find(session('username'));
        if((session('username'))!== null){
            return view('dashboard')->with('nome',$user->nome)->with('username',session('username'))->with('csrf_token',csrf_token());
        }else{
            return view('home');
        }
    }

        public function translation($c)
        {
           
            $json = Http::get("https://api.mymemory.translated.net/get?",[
                'q'=> $c,
                'langpair'=> 'en|it',
                'de'=> 'dibbi27@outlook.it',
            ]);

           /* $str = json_decode($json);

            str_replace("&#39;","'",$str->responseData->translatedText);

            $corr = json_encode($str);*/

            return $json;


        }

        public function SpotifAPI($q)
        {
            $token = Http::asForm()->withHeaders([
                'Authorization' => 'Basic '.base64_encode(env('SPOTIFAPI_CLIENT_ID').':'.env('SPOTIFAPI_CLIENT_SECRET')),
            ])->post('https://accounts.spotify.com/api/token', [
                'grant_type' => 'client_credentials',
            ]);

            $json = Http::withHeaders([
                'Authorization' => 'Bearer '.$token['access_token']
            ])->get('https://api.spotify.com/v1/search', [
                'type' => 'track',
                'market'=> "IT",
                'q' => $q
            ]);

            return $json;
        }
   
    
}
?>