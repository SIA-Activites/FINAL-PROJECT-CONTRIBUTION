<?php
namespace App\Services;
use App\Traits\ConsumesExternalService;

class UserService
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
        $this->baseUri = config('services.user.base_uri');
        $this->secret = config('services.user.secret');
    }

    public function obtainUser()
    {
        return $this->performRequest('GET', '/user');
    }
    public function showUser($id)
    {
    return $this->performRequest('GET', "/user/{$id}");
    }
    
    public function createUser($data)
    { 
        return $this->performRequest('POST', '/user', $data);
    }


    public function updateUser1($data, $id)
    {
        return $this->performRequest('PUT', "update/users1/{$id}", $data);
    }
    public function deleteUser1($id)
    {
        return $this->performRequest('DELETE', "/users1/{$id}");
    }

}
