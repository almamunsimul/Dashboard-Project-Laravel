<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
public function CreatorInfo()
{
    return $this->belongsTo('App\Models\User', 'ban_creator', 'id');
}

public function EditorInfo()
{
    return $this->belongsTo('App\Models\User', 'ban_editor', 'id');
}

protected $fillable = [
    'ban_title',
    'ban_subtitle',
    'ban_btn',
    'ban_url',
    'ban_slug',
    'ban_creator',
];

}
