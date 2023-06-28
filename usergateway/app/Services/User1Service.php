<?php
namespace App\Services;
use App\Traits\ConsumesExternalService;

class User1Service
{
    use ConsumesExternalService;

    public $baseUri;
    /**
     * The secret to consume the User1 Service
     * @var string
     */
    
    public $secret;

    public function __construct()
    {
        $this->baseUri = config('services.users1.base_uri');
        $this->secret = config('services.users1.secret');
    }

    public function obtainUser1()
    {
        return $this->performRequest('GET', '/users1');
    }

   public function createUser1($data)
    {
        
        $jobId = $data['jobid'];
        $this->showJob1($jobId); 
        return $this->performRequest('POST', '/users1', $data);
    }


    public function showUser1($id)
    {
    return $this->performRequest('GET', "/users1/{$id}");
    }
    public function updateUser1($data, $id)
    {
        return $this->performRequest('PUT', "update/users1/{$id}", $data);
    }
    public function deleteUser1($id)
    {
        return $this->performRequest('DELETE', "/users1/{$id}");
    }


    // FOR JOBS
      public function obtainjob1()
    {
        return $this->performRequest('GET', '/userjob1');
    }
    public function showJob1($id)
    {
    return $this->performRequest('GET', "/userjob1/{$id}");
    }
    
}
