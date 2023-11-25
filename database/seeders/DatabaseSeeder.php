<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    DB::table('users')->insert(
      [
        'name' => 'admin', 'role' => 'admin', 'contact_person' => 'yes', 'email' => 'admin@admin.com', 'password' => bcrypt('12345678'), 'phone_number' => '085608014111'
      ]
    );
    //categorie
    DB::table('categories')->insert(
      [
        'name_categorie' => 'Table'
      ]
    );
    DB::table('categories')->insert(
      [
        'name_categorie' => 'Chair'
      ]
    );
    //bank
    DB::table('banks')->insert(
      [
        'name_bank' => 'BCA', 'no_rek' => '09876422222', 'an' => 'Tanamas'
      ]
    );
  }
}
