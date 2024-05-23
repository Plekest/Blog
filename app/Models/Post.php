<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Tonysm\RichTextLaravel\Models\Traits\HasRichText;

class Post extends Model
{
    use HasRichText;

    protected $richTextAttributes = [
        'content',
    ];

    protected $guarded = [];

    protected $fillable = [
        'title',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
