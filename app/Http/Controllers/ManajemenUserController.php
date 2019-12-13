<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Session;
class ManajemenUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // public function dashboard(Request $request)
    // {
    //   if ($request->ajax()) {

    //     $user = User::all();
    //     return Datatables::of($user)
    //     ->addColumn('action', function($user){
    //       $action = '<a href="'. route('user.edit', base64_encode($user->id)) .'" data-toggle="tooltip" data-placement="top" title="Ubah" class="btn btn-xs btn-primary btn-border btn-round"><i class="fa fa-edit" aria-hidden="true"></i></a>&nbsp;';
    //       $action .= '<div class="pull-right" style="margin-right: 20%">';
    //       $action .= \Form::open(['url'=> route('user.destroy', $user->id),'method'=>'delete', 'id' => 'form_id']);
    //       $action .= "<button type='submit' class='btn btn-xs btn-round btn-danger'><i class='fas fa-trash-alt'></i></button>";
    //       $action .= \Form::close();
    //       $action .= '</div>';
    //       return $action;
    //     })
    //     ->editColumn('foto', function($foto){
    
    //         $url = url('/images/man-1.png/'.$foto->foto);
    //         return "<img src='{!! url(\"/images/man-1.png/\".$foto->foto) !!}' alt='mostafid' height='20' width='20'>";
            
    //     })
    //     ->make(true);
    //   }
    // }
    public function index()
    {
        $user = User::all();
        return view('user.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'alamat'=> 'required',
            'notelp'=> 'required',
            'email'=>'required',
            'foto'=> 'required|image|mimes:jpeg,png,jpg'

        ]);
        $user = new User;
        $user->role = 'user';
        $user->name = $request->name;
        $user->alamat = $request->alamat;
        $user->notelp = $request->notelp;
        $user->email = $request->email;
        $user->remember_token = str_random(60);
        $user->password = bcrypt('rahasia');
        // $user->save();
        // if ($request->hasFile('foto')) {
        //    $request->file('foto')->move('images/', $request->file('foto')->getClientOriginalName());
        //    $user->foto = $request->file('foto')->getClientOriginalName();
        //    $user->save();

        // }
        $file = $request->file('foto');
        $ext = $file->getClientOriginalExtension();
        $newName = rand(100000,1001238912).".".$ext;
        $file->move('images/',$newName);
        $user->foto = $newName;
        $user->save();
       alert()->success('Menambahkan User', 'Berhasil')->persistent('Close'); 
       return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->alamat= $request->alamat;
        $user->notelp= $request->notelp;
        $user->email = $request->email;
        $user->remember_token = str_random(60);
        if (empty($request->file('foto'))){
            $user->foto = $user->foto;
        }
        else{
            unlink('images/'.$user->foto); //menghapus file lama
            $file = $request->file('foto');
            $ext = $file->getClientOriginalExtension();
            $newName = rand(100000,1001238912).".".$ext;
            $file->move('images/',$newName);
            $user->foto = $newName;
            
        }
        $user->save();
        alert()->success('Menambahkan User', 'Berhasil')->persistent('Close'); 
        return redirect()->route('user.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        alert()->success('Menghapus User', 'Berhasil')->persistent('Close'); 
        return redirect()->route('user.index');

    }
}
