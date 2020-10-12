<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserCollection;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use Validator;
use Hash;

class RolesController extends Controller
{
    
    public function roles_user(Request $request){           

        if(!$request['id_user']){
            $response['error'] = 'Debe ingresar el id del user';
            $response['data'] = [];
            return Response()->json($response);
        }     
    
        $response['data'] = new UserCollection(Role::sameUser($request['id_user']));
        return $response['data'];
    }   

}
