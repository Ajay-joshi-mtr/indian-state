<?php

namespace Logistics\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
 protected $table = 'countries';

 /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
 protected $fillable = [
  "name", "status",
 ];

 public function state()
 {
  return $this->hasMany('Logistics\Models\State', 'state_id', 'id');
 }

 public function city()
 {
  return $this->hasMany('Logistics\Models\City', 'city_id', 'id');
 }
}
