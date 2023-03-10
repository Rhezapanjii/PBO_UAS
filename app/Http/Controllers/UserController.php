<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        if ($request->ajax()) {
            $data = User::latest()->get();
            return Datatables::of($data)
                // ->addIndexColumn()
                ->addColumn('action', function($row){
                $html = '<a href='. route('users.edit', $row) . ' class="btn btn-info btn-m ml-3">Edit</a>';
                $html .= '<a href='. route('users.destroy', $row) . ' class="btn btn-danger btn-m ml-1" onclick="notificationBeforeDelete(event, this)">Delete</a>';
                return $html;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('users.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function create()
{
    return view('users.create');
}
public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|confirmed'
    ]);
    $array = $request->only([
        'name', 'email', 'password'
    ]);
    $array['password'] = bcrypt($array['password']);
    $user = User::create($array);
    return redirect()->route('users.index')
        ->with('success_message', 'Berhasil menambah user baru');
}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

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
    if (!$user) return redirect()->route('users.index')
        ->with('error_message', 'User dengan id'.$id.' tidak ditemukan');

    return view('users.edit', [
        'user' => $user
    ]);
}


public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users,email,'.$id,
        'password' => 'sometimes|nullable|confirmed'
    ]);

    $user = User::find($id);
    $user->name = $request->name;
    $user->email = $request->email;
    if ($request->password) $user->password = bcrypt($request->password);
    $user->save();

    return redirect()->route('users.index')
        ->with('success_message', 'Berhasil mengubah user');
}
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $user = User::find($id);
        if ($id == $request->user()->id) return redirect()->route('users.index')
        ->with('error_message', 'Anda tidak dapat menghapus diri sendiri.');
        if ($user) $user->delete();
    return redirect()->route('users.index')
        ->with('success_message', 'Berhasil menghapus user');
}
    function userpdf()
    {
        dd('hai');
        $user = User::all();
        $pdf = \PDF::loadView('userpdf', ['users' => $user]);
        return $pdf -> download('Data User.pdf');
    }

}