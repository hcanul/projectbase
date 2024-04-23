<?php

namespace Database\Seeders;

use App\Models\Coordinator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CoordinatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * 'name'
     * 'lastname'
     * 'tel'
     * 'email'
     * 'facebook'
     * 'address'
     * 'town_id'
     * 'yearold'
     * 'section'
     * 'clave'
     * 'curp'
     * 'type'
     * 'ruta'
     */
    protected $coordinadores = [
        ['LIZBETH LILIANA', 'CAB HU', '9831178821', 'Lizbeth.liliana.cab.@gmail.com', 'Liz Cab', 'C. 54 X C. 69 No. 779', '2', '36', '220', ' CBHULZ87071423M800', 'CAHL870714MQRBXZ09',  'General', 'ALL'],
        ['MARIA LUISA', 'POOT	EK', '9837003857', 'malupoek@outlook.com', 'Maria Luisa', 'C. 50 X 77 Y 75', '17', '56', '215', 'PTEKLS68013131M800', 'POEL680131MYNTKS04', 'Urbano', '1'],
        ['FRANCISCO', 'TALLES CHI', '9831238822', 'talleschifrancisco@gmail.com', 'Francisco Talles Chi', 'C. 65 X 60 Y 62 No. 701', '2', '55', '220', 'TLCHFR68071331H400', 'TACF689713HYNLHR05', 'Rural', '1'],
        ['NEYDI MARILU', 'ZAPATA MEDINA', '9831259855', 'neydizz_13@hotmail.com', 'NM Zapata', '84/ 79 y 81 No. 886', '6', '40', '218', 'ZPMDNY83020531M600', 'ZAMN830205MYNPDY01', 'Urbano', '1'],
        ['SANDRA DEL ROSARIO', 'LOPEZ DIAZ', '9831388003', 'SI1195493@gmail.com', 'Sandra López', '88 X 57 y 55', '5', '31', '223', 'LPDZSN92031307M800', 'LODS920313MCSPZN05', 'Urbano', '2'],
        ['JORGE ISAIAS', 'PANTI CETINA', '9832079253', 'jorgepanti6@gmail.com', 'JorgePanti', '85 X diag. 63 y 88', '8', '44', '217', 'PNCTJR79070623H701', 'PACJ790706HQRNTR07', 'Urbano', '3'],
        ['CARLOS ISARAEL', 'MOO	MOO', '9837006269', 'moomoocarlossisrael@gmail.com', 'Carlos Moo (Tatto califas)', '50 X 53 Y 55 No. 405', '11', '32', '226', 'MOMOCR91051523H300', 'MOMC910515HQRXXR05', 'Urbano', '4'],
        ['RUBI EUGENIA', 'ESTRELLA CHI', '9837008024', 'rubiestre70@gmail.com', 'Rubi Estrella Chi', '67 X 54 Y 56', '2', '53', '220', 'ESCHRB70080423M701', 'EECR700804MQRSHB07', 'Urbano', '5'],
        ['CELIA TERESA', 'ESCOBAR REYES', '9831144605', 'celiaescobar@hotmail.com', 'SIN NOMBRE', 'SIN NUMERO', '23', '55', '249', 'ESRYCL68102123M300', 'EORC681021MQRSYL05', 'Rural', '1A'],
        ['GUALBERTO', 'CASANOVA	MEZETA', '9831119987', 'SIN CORREO', 'SIN FACEBOOK','SIN NOMBRE','23', '62', '249', 'CZMZGL61101431H800', 'CAMG611014HYNZZL01', 'Rural', '1B'],
        ['PETRONILO', 'UCAN CHI', '9831303588','petro.0909@hotmail.com', 'Petronilo Ucan Chi',	'C 81 Y 72 Y CONSTITUYENTES	826A', '8','64','217', 'UCCHPT59020923100', 'UACP590209HQRCHT09', 'Rural', '2'],
        ['PEDRO ARMANDO', 'SEGURA CHAN', '9831062080', 'SIN CORREO', 'SIN FACEBOOK', '53 B X 78 Y 80 885', '16', '54', '223', '5GCHPD69111431H500', 'SECP691114HYNGHD02', 'Rural', '3'],
        ['YARI AURORA', 'POOT LOPEZ', '9831683104', 'SIN NOMBRE', 'SIN NUMERO','SIN DIRECCION', '45', '44', '242', 'PTLPYL79061304M101', 'POLY790613MCCTPR05', 'Rural', '5'],
        ['OLGA MARIA', 'CANALES	AGUILAR', '9995505609', 'SIN CORREO', 'SIN FACEBOOK', 'C.INDEPENDENCIA', '48', '59', '251', 'CNAGOL64020323M400', 'CAAO640203MQRNGL09', 'Rural', '6'],
        ['FLORENCIA', 'CANCHE PECH', '9831826575', 'florcanche@hotmail.com', 'Canche Florench', 'AV. 7 X 6 Y 8', '39', '36', '237',	'CNPCFL87060123M300', 'CAPF870601MQRNCL06', 'Rural', '7A'],
        ['RODRIGO',	'UH	CASTILLO',	'9831856540', 'SIN CORREO', 'SIN FACEBOOK', 'SIN DIRECCION','57', '42', '250', 'UHCSRD01033123H200', 'UXCR810331HQRHSD02', 'Rural', '7B'],
        ['SANTOS TOMAS', 'BALAM YAM', '9831680030',	'mariavirginiaquinonescornelio@gmail.com', 'Balan Yam Santos Tomas', 'C. 49 X 60 Y 62',	'11', '0','226', 'BLYMSN79102823H300', 'BAYS701028HQRLMN03', 'Rural', '8A'],
        ['ROSALIA',	'MAY SULUB', '9833525917', 'SIN NOMBRE', 'SIN NUMERO', 'SIN DIRECCION','61', '47', '238', 'MYSLRS76090523M00', 'MASR760905MQRYLS01', 'Rural', '8B'],
        ['CANDIDO', 'PAT CANCHE', '9831683990',	'candidopatcanche@hotmail.com', 'SIN FACEBOOK',	'SIN DIRECCION','66', '61', '234', 'PTCNCN62082923H400', 'PACC620829HQRTNN07', 'Rural', '9'],
        ['MARCO ANTONIO', 'ABAN	UC', '9831589507', 'marcoaban1302@gmail.com', 'marco antonio aban uc', 'SIN DIRECCION', '73', '55','229', 'ABUCMR68021323H502', 'AAUM680213HQRBCR07', 'Rural',	'10A'],
        ['MARIA AURORA', 'CHULIM POOT',	'9841247221', 'chuimpootmariaaurora@gmail.com', 'Aurora Chulim', 'SIN DIRECCION', '78', '41', '233', 'CHPTAR82081331M400', 'CUPA820813MYNHTR00',	'Rural', '10B'],
        ['PEDRO MARIANO', 'XOOL UICAB',	'9831833606', 'moshino27@hotmail.com', 'Pedro mosh', 'SIN DIRECCION', '75', '53', '228', 'XLUCPD70092704H700', 'XOUP700927HCCLCD03',	'Rural', '11'],
        ['JUAN EDGAR', 'KU	KAUIL',	'9831247717', 'kauil_94@hotmail.com', 'Edgar Kauil', 'SIN DIRECCION', '73', '30', '229', 'KUKLJN93092423H300', 'KUKJ930924HQRXLN02',	'Rural', '12'],
        ['VICTOR MANUEL', 'CHE CHE', '9832674639', 'victormanuelcheche@gmail.com',	'Victor Che', 'C. SAN FRANCISCO C TRES REYES Y JSE LOPEZ', '91', '55', '230',	'CHCHVC68091431H900', 'CECV680914HYNHHC03',	'Rural', '13'],
        ['TEODOMIRO', 'TUN CHE', '9995091240', 'Tunteo48@gmail.com', 'Teo Tun', 'SIN DIRECCION','93', '25',	'230', 'TNCHTD98070123H300', 'TUCT980701HQRNHD00', 'Rural',	'14'],
        ['SANTOS VITALIANO', 'CHE MOO',	'9842540579', 'SIN CORREO',	'SIN FACEBOOK',	'AV. SANTIAGO PACHECO CRUZ X 52 Y 64',	'2', '49', '220', 'CHMOSN74012723H800',	'CEMS740127HQRHXN02', 'Rural', '15'],
        ['DEYSI', 'MAY SULUB', '9838090879', 'maysulubdeysimaria@gmail.com', 'Dey May', 'SIN NUMERO', '61', '33', '238', 'MYSLDY90081223M100', 'MASD900812MQRYLY06', 'Rural',	'16'],
        ['ARON', 'X X',	'9837003815', 'SIN CORREO',	'SIN FACEBOOK', 'SIN NOMBRE', '0', '0', '0', 'SIN DATOS', 'SIN DATOS', 'Rural', '17'],
        ['MARIANO',	'CAUICH	MAY', '9831833606',	'mario cauich',	'C. 44 X AV. LAZARO CARDENAS Y C. 73', 'SIN NUMERO', '17', '64', '215',	'CCMYMR59090823H700', 'CAMM590908HQRCYR07',	'Rural', '18']
    ];

    public function run(): void
    {
        foreach ($this->coordinadores as $value) {
            Coordinator::create([
                'name' => $value[0],
                'lastname' => $value[1],
                'tel' => $value[2],
                'email' => $value[3],
                'facebook' => $value[4],
                'address' => $value[5],
                'town_id' => $value[6],
                'yearold' => $value[7],
                'section' => $value[8],
                'clave' => $value[9],
                'curp' => $value[10],
                'type' => $value[11],
                'ruta' => $value[12],
                ]);
        }
    }
}
