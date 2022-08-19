<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Message extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'content', 'notice', 'closed'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function messageTo() {
        return $this->belongsToMany(Message::class, 'message_to_id', 'message_id', 'to_id')->withTimestamps();
    }

    public function messageFrom() {
        return $this->belongsToMany(Message::class, 'message_to_id', 'to_id', 'message_id')->withTimestamps();
    }

    public function reply($messageId) {
        $this->messageTo()->attach($messageId);
    }
}
