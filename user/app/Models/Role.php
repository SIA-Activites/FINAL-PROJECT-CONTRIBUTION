<?php

    namespace App\Models;
    use Illuminate\Database\Eloquent\Model;

    class Role extends Model{
        protected $table = 'tblrole';
        protected $fillable = [
            'rolename','description'
        ];

        public $timestamps = false;
        protected $primaryKey = 'roleid';
    }

