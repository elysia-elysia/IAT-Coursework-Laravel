<?php
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\User;
class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        //created an instance of Faker class to the variable $faker
        $faker = Faker::create();

        //getting all existing User ids into a $users array
        $users = User::all()->pluck('id')->toArray();

//generate 10 records for the orders table
        foreach (range(1,10) as $index) {
            DB::table('orders')->insert([
                'userid' =>$faker->randomElement($users),
                'orderno'=>$faker->numberBetween(100000,999999),
                'orderprice'=>$faker->randomFloat(2,0,999999),
            ]);
        }
    }
}
