<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Scores extends Model
{

  protected $fillable = [
                          'member_id',
                          'score',
                        ];

  protected $appends = [
                        'name',
                        ];

  public function getNameAttribute()
  {
      return $this->members->name;
  }

  public function members()
  {
      return $this->hasOne(Members::class,'id','member_id');
  }
}
