<?php

namespace Modules\Entity\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Base\Proxies\Repositories\TermRepository;

class TermTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $terms =
        [
            'person-genders' =>
            [
                'title'     => 'Person Genders',
                'children'  =>
                [
                    ["title" => "Male",      "slug" => "gender-male"],
                    ["title" => "Female",    "slug" => "gender-female"],
                ]
            ]
        ];

        TermRepository::bulkInsert($terms);

        // $this->call("OthersTableSeeder");
    }
}
