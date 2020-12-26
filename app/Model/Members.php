<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Members extends Model
{
  protected $fillable = ['name'];
  
  public function scores()
  {
      return $this->hasMany('Scores','member_id');
  }
}
