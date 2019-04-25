<?php

namespace Logistics\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
 protected $table = 'states';

 /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
 protected $fillable = [
  "country_id", "name", "status",
 ];

 public function country()
 {
  return $this->belongsTo('Logistics\Models\Country', 'country_id', 'id');
 }

 public function city()
 {
  return $this->hasMany('Logistics\Models\City', 'city_id', 'id');
 }
}
