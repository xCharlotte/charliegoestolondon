<?php

namespace charliegoestolondon;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

  protected $fillable = ['body', 'name'];

  public function creator() {
    return $this->BelongsTo(Post::class,'post_id');
  }
}
