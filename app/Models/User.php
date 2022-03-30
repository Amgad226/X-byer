<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; //default
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Laravel\Passport\Passport;

use \Staudenmeir\EloquentHasManyDeep\HasRelationships;
use \Znck\Eloquent\Traits\BelongsToThrough;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'users';
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'phone' ,
        'img' 
    ];

    protected $hidden = [  'password', 'remember_token',];

    public function item()
    {
        return $this->hasMany(Item::class );
    }
 /*___________________________________________________________________________________________________________________________________*/
    public function comment()
     {
        return $this->hasMany(Comment::class );
     }

     public function offer()
    {
        return $this->hasManyThrough(Offer::class,Item::class  );
    }
   
}
