<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Comment extends Model
{

    protected $fillable = [
        'content',
        'user_id',
        'topic_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class)->select(['id', 'username']);
    }

    public function comment()
    {
        return $this->belongsTo(Comment::class)->select(['id', 'content', 'user_id', 'topic_id']);
    }
    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($comment) {
            $comment->id = Uuid::uuid4()->toString();
        });
    }
}
