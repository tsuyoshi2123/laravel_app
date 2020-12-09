<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // $this->call(TodosTableSeeder::class); // 追加 クラスのクラス名を追記するとによりデータの投入が可能になる 
        $this->call(PrefecturesSeeder::class);
    }
}
