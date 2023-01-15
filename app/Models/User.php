<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

use Tymon\JWTAuth\Contracts\JWTSubject;
    class User extends Authenticatable implements JWTSubject
    {
        use HasRoles,  HasFactory,Notifiable;

        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
        protected $table = 'admin_users';

        /**
         * The attributes that should be hidden for arrays.
         *
         * @var array
         */
      
        public function getJWTIdentifier()
        {
            return $this->getKey();
        }
        public function getJWTCustomClaims()
        {
            return [];
        }
    }