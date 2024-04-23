<?php

namespace Database\Seeders;

use App\Models\Journey;
use App\Models\Town;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TownsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    protected $ruta1U = [['Col. Leona Vicario', 215], ['Col. Cecilio Chi', 220], ['Col. Centro', 221]];
    protected $ruta2U = [['Col. Francisco May', 222], ['Col. Francisco May',223], ['Col. Leona Vicario', 218], ['Col. Lazaro Cardenas', 219]];
    protected $ruta3U = [['Col. Jesus Martinez Ross',217], ['Col. Leona Vicario',218], ['Col. Emiliano Zapata', 216]];
    protected $ruta4U = [['Col. Javier Rojo Gomez', 226], ['Col. Juan Bautista Vega', 224], ['Col. Juan Bautista Vega', 224], ['Col. Juan Bautista Vega', 225], ['Col. Rafael E. Melgar', 226], ['Col. Constituyentes', 224]];
    protected $ruta5U = [['Col. Plan de Ayala', 215], ['Col. Plan de Ayutla', 215], ['Col. Plan de Guadalupe', 215], ['Col. Plan de la Noria', 215], ['Col. Francionamiento Villas Del Bosque', 215], ['Col. Fraccionamiento Vivah', 215]];

    protected $ruta1R = [['Noh-Bec', 249], ['Polinkin', 249], ['Petcacab', 249], ['Andres Q. Roo', 248], ['Reforma Agraria', 248]];
    protected $ruta2R = [['Chancah Veracruz', 245], ['Uh-May', 245], ['x-Hazil Sur', 247], ['X Kon Ha', 247], ['Santa Isabel', 245]];
    protected $ruta3R = [['San Andres', 247], ['Noh Cah', 247], ['Kopchen', 247], ['Chancah Derrepente', 247], ['Mixtequilla', 247]];
    protected $ruta4R = [['Chunhuas', 237], ['Betania', 237], ['X Yatil', 239], ['San Luis', 239], ['Polyuc', 239], ['Tabi', 237]];
    protected $ruta5R = [['Chunhuhub', 241], ['Chunhuhub', 242], ['Ramonal', 243], ['Santa Lucia', 243]];
    protected $ruta6R = [['Nueva Loria', 251], ['Ignacio M. Altamirano', 251], ['Nuevo Israel', 251], ['Emiliano Zapata', 251], ['Presidente Juarez', 251]];
    protected $ruta7R = [['Dzula', 240], ['Laguna Kana', 244], ['Yoactun', 244], ['Chan Santa Cruz', 244], ['Santa Maria Poniente', 250], ['Naranjal Poniente', 250], ['Chanchen Chuc', 250]];
    protected $ruta8R = [['X Pichil', 238], ['Hobompich', 238], ['Filomeno Mata', 233], ['Dzoyola', 233], ['Yotdzonot Nuevo', 238]];
    protected $ruta9R = [['Pino Suarez', 235], ['Señor', 234], ['Señor', 235], ['Yaxley', 234], ['Tixcacal Guardia', 234], ['Tuzik', 234], ['San Antonio Nuevo', 235], ['Chanchen Comandante', 235]];
    protected $ruta10R = [['Tepich', 229], ['Tihosuco', 227], ['Tihosuco', 228], ['Melchor Ocampo', 232], ['Santa Rosa', 232], ['San Francisco Ake', 233], ['Kampocolche Nuevo', 238], ['La Noria', 229]];
    protected $ruta11R = [['San Jose II', 232], ['Cancepchen', 232], ['Trapich', 232], ['San Felipe Berriozabal', 232]];
    protected $ruta12R = [['San Ramon', 230], ['Francisco May', 230], ['Tac Chivo', 230], ['Yalchen', 230], ['San Silverio', 230], ['Xaan', 234]];
    protected $ruta13R = [['Francisco I. Madero', 230], ['X-Hazil Primero', 0], ['X-Hazil Norte', 230], ['Cancabzonot', 230], ['Tuzik I', 0], ['San Bartolo', 230], ['San Hipolito', 230], ['San Antonio', 0], ['Yaxchechal', 232]];
    protected $ruta14R = [['Chun Yah',231], ['Chun On', 231], ['Chumpon', 231], ['Sahcanchen', 230], ['Yotzonot Chico', 231]];
    protected $ruta15R = [['Chunyaxche', 231], ['Cecilio Chi', 231], ['Tres Reyes', 217], ['Santa Amalia', 217], ['Punta Herrero', 248]];

    public function run(): void
    {
        $ruta = Journey::whereName('1')->whereType('Urbano')->get('id')[0];
        foreach ($this->ruta1U as $key => $value) {
            Town::create([
                'name' => $value[0],
                'Journey_id' => $ruta->id,
                'section' => $value[1]
            ]);
        }
        $ruta = Journey::whereName('2')->whereType('Urbano')->get('id')[0];
        foreach ($this->ruta2U as $key => $value) {
            Town::create([
                'name' => $value[0],
                'Journey_id' => $ruta->id,
                'section' => $value[1]
            ]);
        }
        $ruta = Journey::whereName('3')->whereType('Urbano')->get('id')[0];
        foreach ($this->ruta3U as $key => $value) {
            Town::create([
                'name' => $value[0],
                'Journey_id' => $ruta->id,
                'section' => $value[1]
            ]);
        }
        $ruta = Journey::whereName('4')->whereType('Urbano')->get('id')[0];
        foreach ($this->ruta4U as $key => $value) {
            Town::create([
                'name' => $value[0],
                'Journey_id' => $ruta->id,
                'section' => $value[1]
            ]);
        }
        $ruta = Journey::whereName('5')->whereType('Urbano')->get('id')[0];
        foreach ($this->ruta5U as $key => $value) {
            Town::create([
                'name' => $value[0],
                'Journey_id' => $ruta->id,
                'section' => $value[1]
            ]);
        }
        $ruta = Journey::whereName('1')->whereType('Rural')->get('id')[0];
        foreach ($this->ruta1R as $key => $value) {
            Town::create([
                'name' => $value[0],
                'Journey_id' => $ruta->id,
                'section' => $value[1]
            ]);
        }
        $ruta = Journey::whereName('2')->whereType('Rural')->get('id')[0];
        foreach ($this->ruta2R as $key => $value) {
            Town::create([
                'name' => $value[0],
                'Journey_id' => $ruta->id,
                'section' => $value[1]
            ]);
        }
        $ruta = Journey::whereName('3')->whereType('Rural')->get('id')[0];
        foreach ($this->ruta3R as $key => $value) {
            Town::create([
                'name' => $value[0],
                'Journey_id' => $ruta->id,
                'section' => $value[1]
            ]);
        }
        $ruta = Journey::whereName('4')->whereType('Rural')->get('id')[0];
        foreach ($this->ruta4R as $key => $value) {
            Town::create([
                'name' => $value[0],
                'Journey_id' => $ruta->id,
                'section' => $value[1]
            ]);
        }
        $ruta = Journey::whereName('5')->whereType('Rural')->get('id')[0];
        foreach ($this->ruta5R as $key => $value) {
            Town::create([
                'name' => $value[0],
                'Journey_id' => $ruta->id,
                'section' => $value[1]
            ]);
        }
        $ruta = Journey::whereName('6')->whereType('Rural')->get('id')[0];
        foreach ($this->ruta6R as $key => $value) {
            Town::create([
                'name' => $value[0],
                'Journey_id' => $ruta->id,
                'section' => $value[1]
            ]);
        }
        $ruta = Journey::whereName('7')->whereType('Rural')->get('id')[0];
        foreach ($this->ruta7R as $key => $value) {
            Town::create([
                'name' => $value[0],
                'Journey_id' => $ruta->id,
                'section' => $value[1]
            ]);
        }
        $ruta = Journey::whereName('8')->whereType('Rural')->get('id')[0];
        foreach ($this->ruta8R as $key => $value) {
            Town::create([
                'name' => $value[0],
                'Journey_id' => $ruta->id,
                'section' => $value[1]
            ]);
        }
        $ruta = Journey::whereName('9')->whereType('Rural')->get('id')[0];
        foreach ($this->ruta9R as $key => $value) {
            Town::create([
                'name' => $value[0],
                'Journey_id' => $ruta->id,
                'section' => $value[1]
            ]);
        }
        $ruta = Journey::whereName('10')->whereType('Rural')->get('id')[0];
        foreach ($this->ruta10R as $key => $value) {
            Town::create([
                'name' => $value[0],
                'Journey_id' => $ruta->id,
                'section' => $value[1]
            ]);
        }
        $ruta = Journey::whereName('11')->whereType('Rural')->get('id')[0];
        foreach ($this->ruta11R as $key => $value) {
            Town::create([
                'name' => $value[0],
                'Journey_id' => $ruta->id,
                'section' => $value[1]
            ]);
        }
        $ruta = Journey::whereName('12')->whereType('Rural')->get('id')[0];
        foreach ($this->ruta12R as $key => $value) {
            Town::create([
                'name' => $value[0],
                'Journey_id' => $ruta->id,
                'section' => $value[1]
            ]);
        }
        $ruta = Journey::whereName('13')->whereType('Rural')->get('id')[0];
        foreach ($this->ruta13R as $key => $value) {
            Town::create([
                'name' => $value[0],
                'Journey_id' => $ruta->id,
                'section' => $value[1]
            ]);
        }
        $ruta = Journey::whereName('14')->whereType('Rural')->get('id')[0];
        foreach ($this->ruta14R as $key => $value) {
            Town::create([
                'name' => $value[0],
                'Journey_id' => $ruta->id,
                'section' => $value[1]
            ]);
        }
        $ruta = Journey::whereName('15')->whereType('Rural')->get('id')[0];
        foreach ($this->ruta15R as $key => $value) {
            Town::create([
                'name' => $value[0],
                'Journey_id' => $ruta->id,
                'section' => $value[1]
            ]);
        }
    }
}
