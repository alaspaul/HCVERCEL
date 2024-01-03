<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\medicine;

class medicineSeeder extends Seeder
{
    public function run(): void
    {
        $medicines = [
            [
                'medicine_id' => 'M1',
                'medicine_name' => 'SILIBININ + PHOSPHATIDYLCHOLINE',
                'medicine_brand' => 'LIVER PRIME',
                'medicine_dosage' => '',
                'medicine_price' => 0.0,
                'medicine_type' => 'CAPSULE',

                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'medicine_id' => 'M2',
                'medicine_name' => '0.9% SODIUM CHLORIDE',
                'medicine_brand' => 'P NSS (ENDURE)',
                'medicine_dosage' => '1L',
                'medicine_price' => 0.0,
                'medicine_type' => 'BOTTLE',

                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'medicine_id' => 'M3',
                'medicine_name' => '100% SEA WATER NASAL SPRAY',
                'medicine_brand' => 'HUMER BLOCKED NOSE ',
                'medicine_dosage' => '50ML',
                'medicine_price' => 0.0,
                'medicine_type' => 'SPRAY',

                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'medicine_id' => 'M4',
                'medicine_name' => '100% SEA WATER NASAL SPRAY',
                'medicine_brand' => 'HUMER INFANT/CHILD NASAL HYGIENE',
                'medicine_dosage' => '150ML',
                'medicine_price' => 0.0,
                'medicine_type' => 'SPRAY',

                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'medicine_id' => 'M5',
                'medicine_name' => 'SOLUTION FOR IV INFUSION',
                'medicine_brand' => 'PARANOVA',
                'medicine_dosage' => '1G/100ML',
                'medicine_price' => 0.0,
                'medicine_type' => 'I.V. FLUID',

                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'medicine_id' => 'M6',
                'medicine_name' => '5% DEXTROSE IN 0.9% SODIUM CHLORIDE',
                'medicine_brand' => 'D5 NSS ENDURE',
                'medicine_dosage' => '1L',
                'medicine_price' => 0.0,
                'medicine_type' => 'BOTTLE',

                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'medicine_id' => 'M7',
                'medicine_name' => 'ACETAZOLAMIDE',
                'medicine_brand' => 'CETAMID',
                'medicine_dosage' => '250MG',
                'medicine_price' => 0.0,
                'medicine_type' => 'TABLET',

                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'medicine_id' => 'M8',
                'medicine_name' => 'ACETATED RINGERS SOLUTION (AR)',
                'medicine_brand' => 'ACETATED RINGERS SOLUTION (AR)',
                'medicine_dosage' => '1L',
                'medicine_price' => 0.0,
                'medicine_type' => 'BOTTLE',

                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'medicine_id' => 'M9',
                'medicine_name' => 'ACETYLCYSTEINE',
                'medicine_brand' => 'EXFLEM GRANULES',
                'medicine_dosage' => '600MG',
                'medicine_price' => 0.0,
                'medicine_type' => 'SACHET',

                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'medicine_id' => 'M10',
                'medicine_name' => 'ACETYLCYSTEINE',
                'medicine_brand' => 'EXFLEM EFF ',
                'medicine_dosage' => '600MG',
                'medicine_price' => 0.0,
                'medicine_type' => 'TABLET',

                'created_at' => now(),
                'updated_at' => now(),
            ],






            [
                'medicine_id' => 'M11',
                'medicine_name' => 'ACETYLCYSTEINE',
                'medicine_brand' => 'FLUIMUCIL GRANULES',
                'medicine_dosage' => '100MG',
                'medicine_price' => 0.0,
                'medicine_type' => 'SACHET',

                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'medicine_id' => 'M12',
                'medicine_name' => 'ACETYLCYSTEINE',
                'medicine_brand' => 'FLUIMUCIL AMP',
                'medicine_dosage' => '100MG/ml-3ML',
                'medicine_price' => 0.0,
                'medicine_type' => 'INJECTION',

                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'medicine_id' => 'M13',
                'medicine_name' => 'ACETYLCYSTEINE',
                'medicine_brand' => 'FLUIMUCIL AMP',
                'medicine_dosage' => '100MG/ML-3ML ',
                'medicine_price' => 0.0,
                'medicine_type' => 'AMPULE',

                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'medicine_id' => 'M14',
                'medicine_name' => 'ACETYLCYSTEINE',
                'medicine_brand' => 'FLUIMUCIL GRANULES',
                'medicine_dosage' => '200MG',
                'medicine_price' => 0.0,
                'medicine_type' => 'SACHET',

                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'medicine_id' => 'M15',
                'medicine_name' => 'ACETYLCYSTEINE',
                'medicine_brand' => 'FLUIMUCIL EFF',
                'medicine_dosage' => '600MG',
                'medicine_price' => 0.0,
                'medicine_type' => 'TABLET',

                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'medicine_id' => 'M16',
                'medicine_name' => 'ACETYLCYSTEINE',
                'medicine_brand' => 'SOLUFLEM',
                'medicine_dosage' => '600MG',
                'medicine_price' => 0.0,
                'medicine_type' => 'SACHET',

                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'medicine_id' => 'M17',
                'medicine_name' => 'ACETYLYCYSTEINE',
                'medicine_brand' => 'FLUIMUCIL ',
                'medicine_dosage' => '100MG/5ML',
                'medicine_price' => 0.0,
                'medicine_type' => 'SYRUP',

                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'medicine_id' => 'M18',
                'medicine_name' => 'ACYCLOVIR',
                'medicine_brand' => 'ZOVIRAX  ',
                'medicine_dosage' => '800MG',
                'medicine_price' => 0.0,
                'medicine_type' => 'TABLET',

                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'medicine_id' => 'M19',
                'medicine_name' => 'ACYCLOVIR',
                'medicine_brand' => 'ZOVIRAX CREAM ',
                'medicine_dosage' => '100MG/2G',
                'medicine_price' => 0.0,
                'medicine_type' => 'TUBE',

                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'medicine_id' => 'M20',
                'medicine_name' => 'ADEMETIONINE BUTANEDISULFONATE',
                'medicine_brand' => 'TRANSMETIL',
                'medicine_dosage' => '500mg',
                'medicine_price' => 0.0,
                'medicine_type' => 'TABLET',

                'created_at' => now(),
                'updated_at' => now(),
            ],








            [
                'medicine_id' => 'M21',
                'medicine_name' => 'ADENOSINE',
                'medicine_brand' => 'ADESAN',
                'medicine_dosage' => '3MG/ML',
                'medicine_price' => 0.0,
                'medicine_type' => 'SACHET',

                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'medicine_id' => 'M22',
                'medicine_name' => 'ALBUMIN (HUMAN) USP 20%',
                'medicine_brand' => 'ALBUREL 20% VL',
                'medicine_dosage' => '50ML',
                'medicine_price' => 0.0,
                'medicine_type' => 'VIAL',

                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'medicine_id' => 'M23',
                'medicine_name' => 'ALBUMIN (HUMAN) USP 25%',
                'medicine_brand' => 'ALBUMINAR 25% VL',
                'medicine_dosage' => '50ML',
                'medicine_price' => 0.0,
                'medicine_type' => 'VIAL',

                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'medicine_id' => 'M24',
                'medicine_name' => 'ALENDRONIC ACID',
                'medicine_brand' => 'REVENTA ',
                'medicine_dosage' => '70MG',
                'medicine_price' => 0.0,
                'medicine_type' => 'TABLET',

                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'medicine_id' => 'M25',
                'medicine_name' => 'ALLOPURINOL',
                'medicine_brand' => 'LLANOL ',
                'medicine_dosage' => '100MG',
                'medicine_price' => 0.0,
                'medicine_type' => 'TABLET',

                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'medicine_id' => 'M26',
                'medicine_name' => 'ALLOPURINOL',
                'medicine_brand' => 'LLANOL',
                'medicine_dosage' => '300MG',
                'medicine_price' => 0.0,
                'medicine_type' => 'TABLET',

                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'medicine_id' => 'M27',
                'medicine_name' => 'ALPRAZOLAM',
                'medicine_brand' => 'ALTROX',
                'medicine_dosage' => '500MCG',
                'medicine_price' => 0.0,
                'medicine_type' => 'TABLET',

                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'medicine_id' => 'M28',
                'medicine_name' => 'ALPRAZOLAM',
                'medicine_brand' => 'XANOR',
                'medicine_dosage' => '500MCG',
                'medicine_price' => 0.0,
                'medicine_type' => 'TABLET',

                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'medicine_id' => 'M29',
                'medicine_name' => 'ALUMINUM HYDROXIDE, MG HYDROXIDE, SIMETICONE',
                'medicine_brand' => 'KREMIL-S',
                'medicine_dosage' => '',
                'medicine_price' => 0.0,
                'medicine_type' => 'TABLET',

                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'medicine_id' => 'M30',
                'medicine_name' => 'AMBROXOL',
                'medicine_brand' => 'MUCOSOLVAN RET ',
                'medicine_dosage' => '75MG',
                'medicine_price' => 0.0,
                'medicine_type' => 'CAPSULE',

                'created_at' => now(),
                'updated_at' => now(),
            ],







            [
                'medicine_id' => 'M31',
                'medicine_name' => 'AMBROXOL',
                'medicine_brand' => 'ZOBRIXOL 15/5 ',
                'medicine_dosage' => '60ML',
                'medicine_price' => 0.0,
                'medicine_type' => 'BOTTLE',

                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'medicine_id' => 'M32',
                'medicine_name' => 'AMIKACIN SULFATE',
                'medicine_brand' => 'AMIKACIDE',
                'medicine_dosage' => '100MG/2ML',
                'medicine_price' => 0.0,
                'medicine_type' => 'AMPULE',

                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'medicine_id' => 'M33',
                'medicine_name' => 'AMIKACIN SULFATE',
                'medicine_brand' => 'AMIKACIDE AMP',
                'medicine_dosage' => '250MG/2ML',
                'medicine_price' => 0.0,
                'medicine_type' => 'AMPULE',

                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'medicine_id' => 'M34',
                'medicine_name' => 'AMIKACIN SULFATE',
                'medicine_brand' => 'AMIKACIDE AMP',
                'medicine_dosage' => '500MG/2ML',
                'medicine_price' => 0.0,
                'medicine_type' => 'AMPULE',

                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'medicine_id' => 'M35',
                'medicine_name' => 'AMIKACIN SULFATE',
                'medicine_brand' => 'AMIKACIN SULFATE  ',
                'medicine_dosage' => '100MG',
                'medicine_price' => 0.0,
                'medicine_type' => 'VIAL',

                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'medicine_id' => 'M36',
                'medicine_name' => 'AMIKACIN SULFATE',
                'medicine_brand' => 'AMIKACIN SULFATE',
                'medicine_dosage' => '250mg',
                'medicine_price' => 0.0,
                'medicine_type' => 'VIAL',

                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'medicine_id' => 'M37',
                'medicine_name' => 'AMINO ACIDS',
                'medicine_brand' => 'AMINOLEBAN SOLN',
                'medicine_dosage' => '500ML',
                'medicine_price' => 0.0,
                'medicine_type' => 'BOTTLE',

                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'medicine_id' => 'M38',
                'medicine_name' => 'AMINO ACID + SORBITOL',
                'medicine_brand' => 'PROTEMIN SOLN',
                'medicine_dosage' => '500ML',
                'medicine_price' => 0.0,
                'medicine_type' => 'VIAL',

                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'medicine_id' => 'M39',
                'medicine_name' => 'AMINO ACID + SORBITOL',
                'medicine_brand' => 'EVAMIN SN5',
                'medicine_dosage' => '500MG',
                'medicine_price' => 0.0,
                'medicine_type' => 'BOTTLE',

                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'medicine_id' => 'M40',
                'medicine_name' => 'AMINO ACID +5% SORBITOL',
                'medicine_brand' => 'PHARMINE',
                'medicine_dosage' => '500ML',
                'medicine_price' => 0.0,
                'medicine_type' => 'BOTTLE',

                'created_at' => now(),
                'updated_at' => now(),
            ],






            [
                'medicine_id' => 'M41',
                'medicine_name' => 'AMINO ACIDS',
                'medicine_brand' => 'AMINOSTERIL INFANT 6%  SOLN',
                'medicine_dosage' => '100ML',
                'medicine_price' => 0.0,
                'medicine_type' => 'BOTTLE',

                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'medicine_id' => 'M42',
                'medicine_name' => 'AMINO ACIDS',
                'medicine_brand' => 'NEPHROSTERIL 7%',
                'medicine_dosage' => '100ML',
                'medicine_price' => 0.0,
                'medicine_type' => 'BOTTLE',

                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'medicine_id' => 'M43',
                'medicine_name' => 'AMINO ACIDS + SORBITOL',
                'medicine_brand' => 'AMINOGEN-S  SOLN',
                'medicine_dosage' => '500ML',
                'medicine_price' => 0.0,
                'medicine_type' => 'BOTTLE',

                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'medicine_id' => 'M44',
                'medicine_name' => 'AMINO ACIDS+VITS+MINERALS',
                'medicine_brand' => 'AMINOLEBAN EN PWDR',
                'medicine_dosage' => '50G',
                'medicine_price' => 0.0,
                'medicine_type' => 'PACK',

                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'medicine_id' => 'M45',
                'medicine_name' => 'AMINOPHYLLINE',
                'medicine_brand' => 'AMINOPHYLLINE AMP',
                'medicine_dosage' => '25MG',
                'medicine_price' => 0.0,
                'medicine_type' => 'AMPULE',

                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'medicine_id' => 'M46',
                'medicine_name' => 'AMIODARONE HYDROCHLORIDE',
                'medicine_brand' => 'VASOCAR',
                'medicine_dosage' => '10MG',
                'medicine_price' => 0.0,
                'medicine_type' => 'TABLET',

                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'medicine_id' => 'M47',
                'medicine_name' => 'AMIODARONE HCL',
                'medicine_brand' => 'ANOION',
                'medicine_dosage' => '200MG',
                'medicine_price' => 0.0,
                'medicine_type' => 'TABLET',

                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'medicine_id' => 'M48',
                'medicine_name' => 'AMIODARONE HYDROCHLORIDE',
                'medicine_brand' => 'CORDARONE',
                'medicine_dosage' => '200MG',
                'medicine_price' => 0.0,
                'medicine_type' => 'TABLET',

                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'medicine_id' => 'M49',
                'medicine_name' => 'AMIODARONE HYDROCHLORIDE',
                'medicine_brand' => 'CORDARONE  ',
                'medicine_dosage' => '50MG',
                'medicine_price' => 0.0,
                'medicine_type' => 'AMPULE',

                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'medicine_id' => 'M50',
                'medicine_name' => 'AMIODARONE HYDROCHLORIDE',
                'medicine_brand' => 'RYTHMA ',
                'medicine_dosage' => '50mg',
                'medicine_price' => 0.0,
                'medicine_type' => 'AMPULE',

                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Medicine::insert($medicines);
    }
}

