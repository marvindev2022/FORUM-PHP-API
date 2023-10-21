<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Ramsey\Uuid\Uuid;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'username',
        'password',
    ];

    protected $primaryKey = 'id'; 
    public $incrementing = false; 
    protected $keyType = 'string';

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            $user->id = Uuid::uuid4()->toString(); 
            
        });
    }

    public function topics()
    {
        return $this->hasMany(Topic::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
