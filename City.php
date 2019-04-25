<?php

namespace Logistics\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
 protected $table = 'cities';

 /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
 protected $fillable = [
  "country_id", "state_id", "name", "status",
 ];

 public function country()
 {
  return $this->belongsTo('Logistics\Models\Country', 'country_id', 'id');
 }
 public function state()
 {
  return $this->belongsTo('Logistics\Models\state', 'state_id', 'id');
 }
}
