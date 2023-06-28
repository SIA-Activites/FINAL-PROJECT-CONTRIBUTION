<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request; //Handling http request from lumen
use App\Models\Role; //role MODEL
use App\Traits\ApiResponser; //Standard API response
use DB; // can be use if not using eloquent, you can use DB component in lumen
use Illuminate\Http\Response;


Class RoleController extends Controller {
    use ApiResponser;

    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function getrole(){
        $role = Role::all();
        return $this -> successResponse($role);
    }
    
    // ADD FUNCTION
    public function add(Request $request){
        
        $rules = [
            'rolename' => 'required|max:50',
            'description' => 'required|max:50',
        ];

        $this->validate($request,$rules);
        // $userjob = UserJob::findOrFail($request->jobid);
        $role = Role::create($request->all());
        return $this -> successResponse($role, Response::HTTP_CREATED);
    }

    public function show($id){

        $role = Role::findOrFail($id);
        return $this -> successResponse($role);
    }

     // UPDATE FUNCTION
     public function updaterole(Request $request, $id)
     {
        $rules = [
            'rolename' => 'required|max:50',
            'description' => 'required|max:50',
        ];

         $this->validate($request,$rules);
        //  $userjob = UserJob::findOrFail($request->jobid);
         $role = Role::where('roleid', $id)->firstOrFail();
         $role->fill($request->all());
         
        //  IF NO CHANGE HAPPENED
         if ($role->isClean()){
            return $this->errorResponse('At least one value must change', Response::HTTP_UNPROCESSABLE_ENTITY);
         }
         $role->save();
         return $this -> successResponse($role);
     } 
    //  DELETE FUNCTION
     public function delete($id) {
        $role = Role::findOrFail($id);
        $role->delete();
        return $this -> successResponse($role);

    }
    
}


