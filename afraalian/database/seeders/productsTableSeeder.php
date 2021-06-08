<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class productsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            "name" => "عسل آویشن 1کیلویی",
            "slug" => "aslale-avishan-1-kilohi",
            "details" => "545/45/45562",
            "price" => 200500,
            "description" => "vjdbvjnadvj nnsn jdsnxn ndsijvh uerdfcvhudcbvuisdbvhedsbivjsdbuhebsidfuviae a aih hahfui ahufi hawi fhhau hfhwa h g hfh ahfhqUFH UQWEHEFUHWEUHFUHWEU FHU  uHAU FH GAUHGUAEHG UVhuhuh uwhguerhug7 yerugheh",
        ]);
        Product::create([
            "name" => "عسل آویشن 2کیلویی",
            "slug" => "aslale-avishan-1-kilohi",
            "details" => "545/45/45562",
            "price" => 230000,
            "description" => "vjdbvjnadvj nnsn jdsnxn ndsijvh uerdfcvhudcbvuisdbvhedsbivjsdbuhebsidfuviae a aih hahfui ahufi hawi fhhau hfhwa h g hfh ahfhqUFH UQWEHEFUHWEUHFUHWEU FHU  uHAU FH GAUHGUAEHG UVhuhuh uwhguerhug7 yerugheh",
        ]);
        Product::create([
            "name" => "عسل آویشن 3کیلویی",
            "slug" => "aslale-avishan-1-kilohi",
            "details" => "545/45/45562",
            "price" => 450000,
            "description" => "vjdbvjnadvj nnsn jdsnxn ndsijvh uerdfcvhudcbvuisdbvhedsbivjsdbuhebsidfuviae a aih hahfui ahufi hawi fhhau hfhwa h g hfh ahfhqUFH UQWEHEFUHWEUHFUHWEU FHU  uHAU FH GAUHGUAEHG UVhuhuh uwhguerhug7 yerugheh",
        ]);
        Product::create([
            "name" => "عسل گون 1کیلویی",
            "slug" => "aslale-avishan-1-kilohi",
            "details" => "545/45/45562",
            "price" => 20005,
            "description" => "vjdbvjnadvj nnsn jdsnxn ndsijvh uerdfcvhudcbvuisdbvhedsbivjsdbuhebsidfuviae a aih hahfui ahufi hawi fhhau hfhwa h g hfh ahfhqUFH UQWEHEFUHWEUHFUHWEU FHU  uHAU FH GAUHGUAEHG UVhuhuh uwhguerhug7 yerugheh",
        ]);
        Product::create([
            "name" => "عسل گون 5کیلویی",
            "slug" => "aslale-avishan-1-kilohi",
            "details" => "545/45/45562",
            "price" => 5123025,
            "description" => "vjdbvjnadvj nnsn jdsnxn ndsijvh uerdfcvhudcbvuisdbvhedsbivjsdbuhebsidfuviae a aih hahfui ahufi hawi fhhau hfhwa h g hfh ahfhqUFH UQWEHEFUHWEUHFUHWEU FHU  uHAU FH GAUHGUAEHG UVhuhuh uwhguerhug7 yerugheh",
        ]);
    }
}
