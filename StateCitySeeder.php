<?php

use Illuminate\Database\Seeder;
use Logistics\Models\City;
use Logistics\Models\Country;
use Logistics\Models\State;

class StateCitySeeder extends Seeder
{
 /**
  * Run the database seeds.
  *
  * @return void
  */
 public function run()
 {
  $this->command->info('Importing City database...');

  $country = Country::create(['name' => 'INDIA']);
  $cities  = config('city');
  foreach ($cities as $key => $city_row) {
   if ($key % 100 == 0) {
    $this->command->info('Tolat Cities :' . count($cities) . " /  Imported  " . ($key + 1));

   }

   $city     = $city_row['city_name'];
   $state    = $city_row['city_state'];
   $stateobj = State::where('name', '=', $state)->first();
   if (empty($stateobj)) {
    $stateobj = State::create(['name' => $state, 'country_id' => $country->id]);
   }
   $cityObj = City::where('name', $city)->where('state_id', $stateobj->id)->first();
   if (empty($cityObj)) {
    City::create(['name' => $city, 'country_id' => $country->id, 'state_id' => $stateobj->id]);
   }
  }
  $this->command->info('Tolat Cities :' . count($cities) . " /  Imported  " . ($key + 1));

 }
}
