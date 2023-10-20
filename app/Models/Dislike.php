<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Dislike extends Model
{

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

    protected $primaryKey = 'id'; 
    public $incrementing = false; 
    protected $keyType = 'string'; 

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($dislike) {
            $dislike->id = Uuid::uuid4()->toString();
        });
    }

}

