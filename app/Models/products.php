<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;
class products extends Authenticatable implements JWTSubject
{
    use HasFactory,Notifiable;
    /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
        protected $table = 'products';

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
