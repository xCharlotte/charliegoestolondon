<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  protected $guarded = [];

  public function comment() {
    return $this->hasMany(Comment::class);
  }

  public function creator() {
    return $this->BelongsTo(User::class, 'user_id');
  }

  public function storeComment($comment) {
    $this->comment()->create($comment);
  }
}
