<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['post_id','body','author','is_active','author_photo'];
    public function post(){
      return $this->belongsTo('App\Post');
    }
    public function replies(){
      return $this->hasMany('App\CommentReply');
    }
}
