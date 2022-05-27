<?php

namespace App\Http\Controllers;

use App\Models\Employeer;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Departament;
use Hash;
use Alert;

class EmployeerController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('verified');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(5);

        return view('admin.users.index', [
            'users' => $users
        ]);
    }                                                                                                                                                                                                                       

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departaments = Departament::all();

        return view('admin.users.form', [
            'title' => 'Adicionar',
            'departaments' => $departaments,
            'employeer' => null,
            'today' => date('Y-m-d')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'cpf' => 'required|min:11|unique:employeers',
            'rg' => 'required|min:9|unique:employeers',
            'birthdate' => 'required|date',
            'salary' => 'required|min:2',
            'departament_id' => 'required',
            'email' => 'required|email|unique:users',
            'address' => 'required|min:10',
            'password' => 'required|confirmed|min:8',
        ]);

        User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'employeer_id' => Employeer::create($request->all())->id,
        ]);

        Alert::success('Tudo certo!', 'O registro foi efetuado com sucesso.');
        return redirect()->route('funcionarios.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employeer  $employeer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employeer_data = [];
        $user_data = User::findOrFail($id);
        $departaments = Departament::get();

        if(!is_null($user_data->employeer_id)){
            $employeer_data = Employeer::findOrFail($user_data->employeer_id);
        } 

        return view('admin.users.form',[
            'title' => 'Editar',
            'employeer' => $employeer_data,
            'user' => $user_data,
            'departaments' => $departaments,
            'today' => date('Y-m-d')
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employeer  $employeer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user_data = User::findOrFail($id);

        return view('admin.users.delet', [
            'title' => 'Deletar',
            'user' => $user_data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employeer  $employeer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:3',
            'cpf' => 'required|min:11',
            'rg' => 'required|min:9',
            'birthdate' => 'required|date',
            'salary' => 'required|min:2',
            'departament_id' => 'required',
            'email' => 'required|email',
            'address' => 'required|min:10',
            'password' => 'required|min:8',
        ]);

        $user_data = User::findOrFail($id);
        $employeer_data =  Employeer::findOrFail($user_data->employeer_id);

        //Verifica se a senha atual está correta, caso não redireciona o usuário
        if(!Hash::check($request->get('password'), $user_data->password)){
            Alert::error('Oops!', 'Verifique os dados e tente novamente.');
            return redirect()->back();
        } 

        $user_data->update([
            'name' => $request->get('name'),
            'email' =>  $request->get('email'),
            'password' => (is_null($request->get('password_confirmation'))) ? Hash::make($request->get('password')) : Hash::make($request->get('password_confirmation'))
        ]);

        $employeer_data->update([
            'name' => $request->get('name'),
            'birthdate' => $request->get('birthdate'), 
            'address' => $request->get('address'),
            'salary' => $request->get('salary'),
            'departament_id' => $request->get('departament_id')
        ]);

        Alert::success('Tudo certo!', 'A atualização ocorreu com sucesso.');
        return redirect()->route('funcionarios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employeer  $employeer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $user_data = User::findOrFail($id);

        //Verifica se a senha atual está correta, caso não redireciona o usuário
        if(!Hash::check($request->get('password'), $user_data->password)){
            Alert::error('Oops!', 'Verifique os dados e tente novamente.');
            return redirect()->back();
        } 

        $user_data->delete();
        Alert::success('Tudo certo!', 'O usuário foi deletado com sucesso!');
        return redirect()->route('funcionarios.index');
    }
}
