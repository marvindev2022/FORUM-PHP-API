<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;
class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'user_id', 
    ];

    protected $with = ['user'];
    protected $primaryKey = 'id'; 
    public $incrementing = false;
    protected $keyType = 'string';

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($message) {
            $message->id = Uuid::uuid4()->toString();
        });
    }
    public function user()
    {
        return $this->belongsTo(User::class)->select(['id', 'username']);
    }


}
