<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Documento;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Response;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $rol = Auth::user()->rol;
      $id = Auth::user()->id;
      if($rol==1){
        $documentos=Documento::orderBy('id')->paginate(50);
        return view('home',compact('documentos','rol'));
      }else{
        $documentos=Documento::where('id_user',$id)->orderBy('id')->paginate(50);
        return view('home',compact('documentos','rol'));
      }
    }

    public function edit($id)
    {
        //
        $documento=Documento::find($id);
        $users = User::where('rol',0)->get();
        return view('documentos.edit',compact('documento','users'));
    }

    public function create()
   {
       $users = User::where('rol',0)->get();
       return view('documentos.create',compact('users'));
   }

   public function store(Request $request)
    {
        $validatedData = $request->validate([
          'file' => 'required',
          'users_id' => 'required',
         ]);

        $titulo = $request->file('file')->getClientOriginalName();
        $link = $request->file('file')->store('public/files');

        Documento::create([
          'titulo' => $titulo,
          'link' => $link,
          'id_user' => $request->users_id,
        ]);

        return $this->index();
    }

    public function update(Request $request,int $documento)
     {
         $validatedData = $request->validate([
           'users_id' => 'required',
          ]);

          Documento::where('id', $documento)
                 ->update(['id_user' => $request->users_id]);

         return $this->index();
     }

    public function destroy($id)
     {
          Documento::find($id)->delete();
          return $this->index();
     }

    public function downloadFile($documento){

       $doc = Documento::where('id',$documento)->get()[0];
       return Storage::download($doc['link']);
    }
}
