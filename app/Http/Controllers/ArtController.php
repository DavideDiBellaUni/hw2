<?php


use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Illuminate\Support\MessageBag;



class ArtController extends BaseController{
    public function checkLogin()
    {
        $user = User:: find(session('username'));
        if((session('username'))!== null){
            return view('nart')->with('csrf_token',csrf_token());
        }else{
            return redirect('login');
        }
    }

    public function newArt(Request $req)
    {
         $req->validate([
            'testo' => 'required|mimes:doc,docx,pdf|max:10000000',
            'titolo'=> 'required',
            'sezione'=> 'required'
            ]);

            $filename= $req->file('testo')->getClientOriginalName();
            $timestamp = date("H-i-s-d-m-Y"); 
            $nomefile = $timestamp.'-'.$filename;
            $req->file('testo')->storeAs('articoli',$nomefile);
            //$percorso = storage_path('app/articoli/'.$nomefile);
            $date = date("Y/m/d");
            Articolo::create([
                'username'=> session('username'),
                'sezione'=> $req['sezione'],
                'titolo'=> $req['titolo'],
                'nomefile'=> $nomefile,
                'data_pubblicazione'=> $date

            ]);
            return redirect('dashboard');    
       
    }

  public function removeArticle($par1)
  {
    $user = User:: find(session('username'));
    $pref = Preferiti::where('cod_articolo',$par1);
    if($pref!== null){
    $pref->delete();
    }

    $art = Articolo::where('cod_articolo',$par1)->where('username',$user->username)->first();

    $filename = $art->nomefile;
    $percorso = storage_path('app/articoli/'.$filename);
    unlink($percorso);
    $art->delete();
  }

  public function downloadContent($par1)
  {
      $percorso = storage_path('app/articoli/'.$par1);
      return Response:: download($percorso);
  }

}
?>