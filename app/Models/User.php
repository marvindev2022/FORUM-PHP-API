<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Ramsey\Uuid\Uuid;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use  HasFactory, Notifiable;

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
    public function getJWTIdentifier()
{
    return $this->getKey(); // Retorna a chave primária do usuário
}

public function getJWTCustomClaims()
{
    return [
        'username' => $this->username,
        // Adicione quaisquer outras reivindicações (claims) adicionais que você deseja incluir na carga útil JWT
    ];
}
}
