<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\UserEditRequest;
use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    
    public function index(Request $request)
    {
    	$data = $request->all();

    	$search = (isset($data['q'])) ? $data['q'] : '';

        if($search !='')
        {

        	$users =  User::where(function ($query) use($search){
        		$query->where('name','like','%'.$search.'%')
        			->orWhere('email','like','%'.$search.'%');
        	})->paginate(10);

        }else{
        	$users = User::paginate(10);
        }
    	
    	return view('admin.users.index')->with(compact('users','search'));
    }

     public function create()
     {
      
        return view('admin.users.create');
     }

     public function store(UserRequest $request)
     {
        
        $data = $request->all();
      
        if(empty($data['password']))
            $data = array_except($data, array('password'));
        else
            $data['password'] = bcrypt($data['password']);

        $user = User::create($data);

        ($data['role'] == 1) ? $user->assignRole(1) : $user->assignRole(2); 

        flash('Usuario Creado Correctamente','success');
      
        return Redirect()->route('admin.users.index');
     }




     public function edit($id)
     {
        $user =  User::find($id);
        
        return view('admin.users.edit')->with(compact('user'));
     }

     public function update($id, UserEditRequest $request)
     {
        $user =  User::find($id);
        $data = $request->all();

        if(empty($data['password']))
            $data = array_except($data, array('password'));
        else
            $data['password'] = bcrypt($data['password']);

      
       
        $user->fill($data);
        $user->save();
        $user->roles()->sync([$request->input('role')]);
       
        flash('Usuario Actualizado Correctamente','success');

        return Redirect()->route('admin.users.index');
     }

    public function destroy($id)
    {
        $user =  User::find($id);
        
        if(!$user)
        { 
            flash('Usuario No Encontrado.. No se pudo eliminar','danger');
            return Redirect()->route('admin.users.index');
        }

        $user->delete();

    	flash('Usuario Eliminado','success');

    	return Redirect()->route('admin.users.index');
    }
}
