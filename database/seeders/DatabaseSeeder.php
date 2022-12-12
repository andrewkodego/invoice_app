<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

        \App\Models\User::factory()->create([
             'name' => 'Super Admin',
             'email' => 'supeadmin@kodego.ph',
        ]);

        \App\Models\User::factory(10)->create();

        \App\Models\Invoice::factory(20)->create();

        \App\Models\Currency::factory()->create(['cur_code' => 'AUD','cur_name' => 'AUS Dollar',]);
        \App\Models\Currency::factory()->create(['cur_code' => 'EUR','cur_name' => 'Euro',]);
        \App\Models\Currency::factory()->create(['cur_code' => 'JPY','cur_name' => 'Yen',]);
        \App\Models\Currency::factory()->create(['cur_code' => 'PHP','cur_name' => 'Peso',]);
        \App\Models\Currency::factory()->create(['cur_code' => 'USD','cur_name' => 'US Dollar',]);

        \App\Models\OptionGroup::factory()->create(['opg_code' => 'INVSTAT','opg_name' => 'Invoice Status',]);

        \App\Models\Option::factory()->create(['opt_code' => 'DRAFT','opt_name' => 'Draft','opt_group_id' => 1,]);
        \App\Models\Option::factory()->create(['opt_code' => 'NEW','opt_name' => 'New','opt_group_id' => 1,]);
        \App\Models\Option::factory()->create(['opt_code' => 'RELEASED','opt_name' => 'Released','opt_group_id' => 1,]);
        \App\Models\Option::factory()->create(['opt_code' => 'PAID','opt_name' => 'Paid','opt_group_id' => 1,]);
        \App\Models\Option::factory()->create(['opt_code' => 'CANCELLED','opt_name' => 'Cancelled','opt_group_id' => 1,]);

        \App\Models\OptionGroup::factory()->create(['opg_code' => 'PAYMETH','opg_name' => 'Payment Method',]);

        \App\Models\Option::factory()->create(['opt_code' => 'COD','opt_name' => 'Cash on Delivery','opt_group_id' => 2,]);
        \App\Models\Option::factory()->create(['opt_code' => 'CC','opt_name' => 'Credit Card','opt_group_id' => 2,]);
        \App\Models\Option::factory()->create(['opt_code' => 'GCash','opt_name' => 'GCash','opt_group_id' => 2,]);
        \App\Models\Option::factory()->create(['opt_code' => 'MAYA','opt_name' => 'MAYA','opt_group_id' => 2,]);
        \App\Models\Option::factory()->create(['opt_code' => 'Paypal','opt_name' => 'Paypal','opt_group_id' => 2,]);

    }
}
