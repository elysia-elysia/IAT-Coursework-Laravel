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

//generate 15 records for the orders table
        foreach (range(1,15) as $index) {
            DB::table('orders')->insert([
                'userid' =>$faker->numberBetween(4,5),
                'username' =>$faker->name,
                'address' =>$faker->address,
                'cardno'=> $faker->creditCardNumber,
               // 'orderno'=>$faker->numberBetween(1000,9999),
                'orderquantity'=>$faker->numberBetween(1,15),
                'orderprice'=>$faker->randomFloat(2,0,70),
                'created_at'=>$faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now')
            ]);
        }
    }
}
