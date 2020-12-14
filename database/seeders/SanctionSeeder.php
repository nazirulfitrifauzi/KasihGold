<?php

namespace Database\Seeders;

use App\Models\SanctionListWebsites;
use Illuminate\Database\Seeder;

class SanctionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SanctionListWebsites::insert([
            [
                'name' => 'Office of Foreign Asset Control (OFAC) Sanctions',
                'website' => 'https://sanctionssearch.ofac.treas.gov/',
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'United Nations Security Council List - Consolidated',
                'website' => 'https://www.un.org/securitycouncil/content/un-sc-consolidated-list',
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Her Mejesty‘s (HM) Treasury List',
                'website' => 'https://www.gov.uk/government/publications/financial-sanctions-consolidated-list-of-targets/consolidated-list-of-targets',
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'EU Consolidated Sanctions List',
                'website' => 'https://data.europa.eu/euodp/en/data/dataset/consolidated-list-of-persons-groups-and-entities-subject-to-eu-financial-sanctions',
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'EU Most Wanted Warnings',
                'website' => 'https://eumostwanted.eu/',
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bureau of Industry and Security',
                'website' => 'https://www.bis.doc.gov/',
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'State Department Foreign Terrorist Organizations List and Non-Proliferation List',
                'website' => 'https://www.state.gov/foreign-terrorist-organizations/',
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Interpol Wanted - Red Notices',
                'website' => 'https://www.interpol.int/en/How-we-work/Notices/View-Red-Notices',
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Interpol Wanted - Yellow Notices',
                'website' => 'https://www.interpol.int/en/How-we-work/Notices/View-Yellow-Notices',
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Central Bureau of Investigation - List',
                'website' => 'http://www.cbi.gov.in/wantedbycbi.php',
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bank Negara Malaysia Watchlist - Consumer Alert',
                'website' => 'https://www.bnm.gov.my/index.php?lang=en&ch=en_financialconsumeralert',
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
