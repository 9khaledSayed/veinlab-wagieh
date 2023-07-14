<?php

namespace Database\Seeders;

use App\Models\MainAnalysis;
use App\Models\SubAnalysis;
use Illuminate\Database\Seeder;

class MainAnalysisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $main_analysis = array(
            array('general_name' => 'Vitamin B12','abbreviated_name' => 'Vitamin B12','code' => '#10','discount' => '0.00','demand_no' => '603','cost' => '18.00','price' => '99.00','created_at' => '2021-06-23 05:44:46','updated_at' => '2023-01-07 18:53:44','has_cultivation' => '0'),
            array('general_name' => 'FT4','abbreviated_name' => 'FT4','code' => 'T4','discount' => '0.00','demand_no' => '29','cost' => '25.00','price' => '195.00','created_at' => '2021-06-23 05:48:47','updated_at' => '2023-01-07 09:08:02','has_cultivation' => '0'),
            array('general_name' => 'FT4','abbreviated_name' => 'FT4','code' => '#3','discount' => '0.00','demand_no' => '144','cost' => '25.00','price' => '195.00','created_at' => '2021-06-23 05:49:35','updated_at' => '2022-12-11 18:38:02','has_cultivation' => '0')
        );
        $sub_analysis = array(
            array('id' => '1','main_analysis_id' => '3','name' => 'Berk Frazier','classification' => 'In ducimus magnam a','unit' => 'Quia sit dicta vel i','deleted_at' => NULL,'created_at' => '2023-02-04 23:52:01','updated_at' => '2023-02-04 23:52:01'),
            array('id' => '2','main_analysis_id' => '3','name' => 'Xandra Henson','classification' => 'Do delectus est et','unit' => 'Odit culpa esse cu','deleted_at' => NULL,'created_at' => '2023-02-04 23:52:01','updated_at' => '2023-02-04 23:52:01'),
            array('id' => '3','main_analysis_id' => '3','name' => 'Todd Larson','classification' => 'Deleniti non in corp','unit' => 'Mollit omnis ut inci','deleted_at' => NULL,'created_at' => '2023-02-04 23:52:01','updated_at' => '2023-02-04 23:52:01'),
            array('id' => '4','main_analysis_id' => '3','name' => 'Barrett Downs','classification' => 'Dolorem maiores repr','unit' => 'Cupidatat debitis do','deleted_at' => NULL,'created_at' => '2023-02-04 23:52:01','updated_at' => '2023-02-04 23:52:01'),
            array('id' => '5','main_analysis_id' => '3','name' => 'Phoebe Delaney','classification' => 'Tempore tempor dict','unit' => 'Molestias aut pariat','deleted_at' => NULL,'created_at' => '2023-02-04 23:52:01','updated_at' => '2023-02-04 23:52:01'),
            array('id' => '6','main_analysis_id' => '3','name' => 'Lana Aguilar','classification' => 'Non sit officiis est','unit' => 'Tempor ipsum labori','deleted_at' => NULL,'created_at' => '2023-02-04 23:52:01','updated_at' => '2023-02-04 23:52:01'),
            array('id' => '7','main_analysis_id' => '3','name' => 'Ezra Dalton','classification' => 'Eiusmod voluptatibus','unit' => 'Recusandae Perferen','deleted_at' => NULL,'created_at' => '2023-02-04 23:52:01','updated_at' => '2023-02-04 23:52:01'),
            array('id' => '8','main_analysis_id' => '2','name' => 'Lavinia Alford','classification' => 'Ut enim modi culpa e','unit' => 'Irure aliquid unde q','deleted_at' => NULL,'created_at' => '2023-02-04 23:52:18','updated_at' => '2023-02-04 23:52:18'),
            array('id' => '9','main_analysis_id' => '2','name' => 'Brenden Black','classification' => 'Asperiores cumque in','unit' => 'Do sed excepteur inc','deleted_at' => NULL,'created_at' => '2023-02-04 23:52:18','updated_at' => '2023-02-04 23:52:18'),
            array('id' => '10','main_analysis_id' => '2','name' => 'Igor Santos','classification' => 'Sed obcaecati recusa','unit' => 'Deserunt ipsa aute','deleted_at' => NULL,'created_at' => '2023-02-04 23:52:18','updated_at' => '2023-02-04 23:52:18'),
            array('id' => '11','main_analysis_id' => '2','name' => 'Xantha Mclaughlin','classification' => 'Ullam eaque id dolor','unit' => 'Aut voluptatem volup','deleted_at' => NULL,'created_at' => '2023-02-04 23:52:18','updated_at' => '2023-02-04 23:52:18'),
            array('id' => '12','main_analysis_id' => '2','name' => 'Kato Atkins','classification' => 'Ipsa illum esse la','unit' => 'Labore quas voluptat','deleted_at' => NULL,'created_at' => '2023-02-04 23:52:18','updated_at' => '2023-02-04 23:52:18'),
            array('id' => '13','main_analysis_id' => '2','name' => 'Meghan Fuller','classification' => 'Non in est qui face','unit' => 'Totam dolor vel culp','deleted_at' => NULL,'created_at' => '2023-02-04 23:52:18','updated_at' => '2023-02-04 23:52:18'),
            array('id' => '14','main_analysis_id' => '2','name' => 'Kirk Snyder','classification' => 'Amet ipsam asperior','unit' => 'Amet quos sint cons','deleted_at' => NULL,'created_at' => '2023-02-04 23:52:18','updated_at' => '2023-02-04 23:52:18'),
            array('id' => '15','main_analysis_id' => '2','name' => 'Christine Good','classification' => 'Sit quam ad tempor','unit' => 'Dicta adipisicing mi','deleted_at' => NULL,'created_at' => '2023-02-04 23:52:18','updated_at' => '2023-02-04 23:52:18'),
            array('id' => '16','main_analysis_id' => '2','name' => 'Boris Beach','classification' => 'Enim dignissimos sap','unit' => 'Fugit earum duis do','deleted_at' => NULL,'created_at' => '2023-02-04 23:52:18','updated_at' => '2023-02-04 23:52:18'),
            array('id' => '17','main_analysis_id' => '1','name' => 'Gregory Rush','classification' => 'Ut iusto explicabo','unit' => 'Sunt proident nobi','deleted_at' => NULL,'created_at' => '2023-02-04 23:52:35','updated_at' => '2023-02-04 23:52:35'),
            array('id' => '18','main_analysis_id' => '1','name' => 'Chloe Kirkland','classification' => 'Quo non cupiditate e','unit' => 'Eligendi adipisicing','deleted_at' => NULL,'created_at' => '2023-02-04 23:52:35','updated_at' => '2023-02-04 23:52:35'),
            array('id' => '19','main_analysis_id' => '1','name' => 'Baxter Barron','classification' => 'Consequuntur non odi','unit' => 'Quae delectus volup','deleted_at' => NULL,'created_at' => '2023-02-04 23:52:35','updated_at' => '2023-02-04 23:52:35'),
            array('id' => '20','main_analysis_id' => '1','name' => 'Hiram Holden','classification' => 'Numquam voluptas sed','unit' => 'Aute rerum maiores f','deleted_at' => NULL,'created_at' => '2023-02-04 23:52:35','updated_at' => '2023-02-04 23:52:35'),
            array('id' => '21','main_analysis_id' => '1','name' => 'Inez Mcclure','classification' => 'Debitis itaque ut de','unit' => 'Vel dolor incidunt','deleted_at' => NULL,'created_at' => '2023-02-04 23:52:35','updated_at' => '2023-02-04 23:52:35'),
            array('id' => '22','main_analysis_id' => '1','name' => 'Demetrius Long','classification' => 'Assumenda ratione qu','unit' => 'Maxime qui doloremqu','deleted_at' => NULL,'created_at' => '2023-02-04 23:52:35','updated_at' => '2023-02-04 23:52:35'),
            array('id' => '23','main_analysis_id' => '1','name' => 'Alexander Warren','classification' => 'Ea magnam tenetur po','unit' => 'Aut officiis sunt e','deleted_at' => NULL,'created_at' => '2023-02-04 23:52:35','updated_at' => '2023-02-04 23:52:35'),
            array('id' => '24','main_analysis_id' => '1','name' => 'Noah Mcdowell','classification' => 'Sapiente alias sed u','unit' => 'Laborum esse a aliq','deleted_at' => NULL,'created_at' => '2023-02-04 23:52:35','updated_at' => '2023-02-04 23:52:35'),
            array('id' => '25','main_analysis_id' => '1','name' => 'Macey Gomez','classification' => 'Reprehenderit blandi','unit' => 'Tempora consequuntur','deleted_at' => NULL,'created_at' => '2023-02-04 23:52:35','updated_at' => '2023-02-04 23:52:35'),
            array('id' => '26','main_analysis_id' => '1','name' => 'Aidan Wilder','classification' => 'Veniam elit aut do','unit' => 'Et occaecat elit ut','deleted_at' => NULL,'created_at' => '2023-02-04 23:52:35','updated_at' => '2023-02-04 23:52:35'),
            array('id' => '27','main_analysis_id' => '1','name' => 'Zephr Davidson','classification' => 'Et voluptates ut ani','unit' => 'Impedit sunt quo la','deleted_at' => NULL,'created_at' => '2023-02-04 23:52:35','updated_at' => '2023-02-04 23:52:35')
          );
        MainAnalysis::insert($main_analysis);
        SubAnalysis::insert($sub_analysis);
    }
}
