<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request; //Handling http request from lumen
use App\Models\User; //My Model
use App\Traits\ApiResponser; //Standard API response
use DB; // can be use if not using eloquent, you can use DB component in lumen
use Illuminate\Http\Response;


Class UserController extends Controller {
    use ApiResponser;

    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function getUser(){
        $user = User::all();
        return $this -> successResponse($user);
    }
    
    public function show($id){

        $user = User::findOrFail($id);
        return $this -> successResponse($user);
    }

    // ADD FUNCTION
    public function add(Request $request){
        
        $rules = [
            'username' => 'required|max:50',
            'password' => 'required|max:50',
            'roleid'=>'required',
        ];

        $this->validate($request,$rules);
        // $userjob = UserJob::findOrFail($request->jobid);
        $user = User::create($request->all());
            
    }

    

     // UPDATE FUNCTION
     public function updateUser(Request $request, $id)
     {
        $rules = [
            'username' => 'required|max:50',
            'password' => 'required|max:50',
            'roleid'=>'required',
        ];

         $this->validate($request,$rules);
        //  $userjob = UserJob::findOrFail($request->jobid);
         $user = User::where('userid', $id)->firstOrFail();
         $user->fill($request->all());
         
        //  IF NO CHANGE HAPPENED
         if ($user->isClean()){
            return $this->errorResponse('At least one value must change', Response::HTTP_UNPROCESSABLE_ENTITY);
         }
         $user->save();
         return $this -> successResponse($user);
     } 
    //  DELETE FUNCTION
     public function delete($id) {
        $user = User::findOrFail($id);
        $user->delete();
        return $this -> successResponse($user);

    }
    
}


