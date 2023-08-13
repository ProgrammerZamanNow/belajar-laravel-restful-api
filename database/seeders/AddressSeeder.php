<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Contact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contact = Contact::query()->limit(1)->first();
        Address::create([
            'contact_id' => $contact->id,
            'street' => 'test',
            'city' => 'test',
            'province' => 'test',
            'country' => 'test',
            'postal_code' => '11111'
        ]);
    }
}
