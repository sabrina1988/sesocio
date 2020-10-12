<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserCollection;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use Validator;
use Hash;

class UsersController extends Controller
{
    
    public function users(Request $request){        
        $response['data'] = new UserCollection(User::paginate());      
        return $response['data'];
    }   

    public function users_role(Request $request){

        if(!$request['id_role']){
            $response['error'] = 'Debe ingresar el id del role';
            $response['data'] = [];
            return Response()->json($response);
        }

        $response['data'] = new UserCollection(User::sameRole($request['id_role'])); 
        return $response['data'];
    }

    
    public function token(Request $request){

        $datos = $request->all();
        
        $rules = [
            'password' => 'bail|required|min:4',            
            'email' => 'bail|required|email:rfc'
        ];
        $mensajes = [
            'password.required' => 'Ingrese una contraseña.',
            'password.min' => 'La contraseña es muy corta.',            
            'email.*' => 'Ingrese un email válido.'
        ];

        $validator = Validator::make($datos, $rules, $mensajes);

        if ($validator->fails()) 
            return response()->json($validator->getMessageBag(),401);

        $usuario = User::where('email',$request->get('email'))->first();

        if(!($usuario && Hash::check($request->get('password'), $usuario->password))) 
            return response()->json(['msg'=>['Usuario y/o contraseña inválidos!']],403);
        
        $token = $usuario->tokenCreate();
        
        return response()->json(compact('token'));
    }   

}
