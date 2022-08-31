<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use  App\Models\Bootcamp;
use File;

class BootcampSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1 eliminar o truncar la tabla bootcamps
        //Bootcamp::truncate();
        //2 leer el archivo bootcamps.json
        $json = File::get("database/_data/bootcamps.json");
        //2.1 convertir el contenido en array
        $arreglo_bootcamps = json_decode($json);
        //3 recorrer ese archivo y por cada bootcamp
        foreach($arreglo_bootcamps as $bootcamp){
        //4 crear un bootcamp por cada uno
        $b = new Bootcamp();
        $b->name = $bootcamp->name;
        $b->descripcion = $bootcamp->description;
        $b->website = $bootcamp->website;
        $b->phone = $bootcamp->phone;
        $b->average_cost = $bootcamp->average_cost;
        $b->average_reating = $bootcamp->average_rating;
        $b->user_id = 1;
        $b->save();
        }
        

    }
}
