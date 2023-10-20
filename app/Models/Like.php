<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Like extends Model
{
    // ...

    protected $fillable = [
        'user_id',
        'comment_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }

    protected $primaryKey = 'id'; // Nome da coluna de chave primária
    public $incrementing = false; // Não use autoincrement
    protected $keyType = 'string'; // Tipo de dado da chave primária

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($like) {
            $like->id = Uuid::uuid4()->toString();
        });
    }

    // ...
}
