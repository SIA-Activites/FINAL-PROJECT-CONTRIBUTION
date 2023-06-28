<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Traits\ApiResponser;
use App\Services\UserService;

class UserController extends Controller
{
    use ApiResponser;

    public $UserService;

    public function __construct(UserService $UserService)
    {
        $this->UserService = $UserService;
    }

    public function getUser()
    {
        return $this->successResponse($this->UserService->obtainUser());
    }
    public function show($id)
    {
        return $this->successResponse($this->UserService->showUser($id));
    }
    public function add(Request $request)
        {
            return $this->successResponse($this->UserService->createUser($request->all(), Response::HTTP_CREATED));
        }

    public function updateUser(Request $request, $id)
    {
        if ($request->jobid <= 5)
        {
            $this->UserService->obtainUser($request->jobid);
            return $this->successResponse($this->UserService->updateUser($request->all(),$id));
        }
         elseif($request->jobid <= 10)
        {
             $this->User2Service->obtainUser2($request->jobid);
             return $this->successResponse($this->UserService->updateUser($request->all(),$id));
        }
        return response()->json(['error' => "Does not exist any instance of jobid with the given id", 'site' => 1, "code" => Response::HTTP_NOT_FOUND]);        
    }
      
    public function deleteUser($id)
    {
        return $this->successResponse($this->UserService->deleteUser($id));
    }


}
