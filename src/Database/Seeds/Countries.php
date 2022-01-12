<?php

namespace DeividKaiser\CidadesBRCodeigniter\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Countries extends Seeder
{
    public function run()
    {   

        $this->db->table('countries')->insertBatch([
            [
                'name' => 'Brazil',
                'name_pt' => 'Brasil',
                'code' => 'BR',
                'bacen' => '1058',
            ],
        ]);
        
    }
}
