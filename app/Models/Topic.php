<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;
class Topic extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
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

        static::creating(function ($topic) {
            $topic->id = Uuid::uuid4()->toString();
        });
    }
    public function user()
    {
        return $this->belongsTo(User::class)->select(['id', 'username']);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}

