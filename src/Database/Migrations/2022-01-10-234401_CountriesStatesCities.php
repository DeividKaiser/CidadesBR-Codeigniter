<?php

namespace DeividKaiser\CidadesBRCodeigniter\Database\Migrations;

use CodeIgniter\Database\Migration;

class CountriesStatesCities extends Migration
{
    public function up()
    {

        /*
        * Countries
        */
        $this->forge->addField([
            'id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'name' => ['type' => 'varchar', 'constraint' => 60, 'null' => true],
            'name_pt' => ['type' => 'varchar', 'constraint' => 60, 'null' => true],
            'code' => ['type' => 'varchar', 'constraint' => 5, 'null' => true],
            'bacen' => ['type' => 'int', 'constraint' => 5, 'null' => true],
        ]);

        $this->forge->addKey('id');
        $this->forge->createTable('countries');



        /*
        * States
        */
        $this->forge->addField([
            'id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'country_id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'name' => ['type' => 'varchar', 'constraint' => 25, 'null' => true],
            'letter' => ['type' => 'varchar', 'constraint' => 25, 'null' => true],
            'iso' => ['type' => 'int', 'constraint' => 15, 'null' => true],
            'slug' => ['type' => 'varchar', 'constraint' => 25, 'null' => true],
            'population' => ['type' => 'int', 'constraint' => 15, 'null' => true],
            'ddd' => ['type' => 'varchar', 'constraint' => 25, 'null' => true],
            'lati' => ['type' => 'varchar', 'constraint' => 25, 'null' => true],
            'long' => ['type' => 'varchar', 'constraint' => 25, 'null' => true],

        ]);  
        
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('country_id', 'countries', 'id', '', 'CASCADE');

        $this->forge->createTable('states');


        /*
        * Cities
        */
        $this->forge->addField([
            'id'                => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'state_id'          => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'name'              => ['type' => 'varchar', 'constraint' => 85, 'null' => true],
            'ibge'              => ['type' => 'int', 'constraint' => 15, 'null' => true],
            'ddd'               => ['type' => 'int', 'constraint' => 15, 'null' => true],
            'status'            => ['type' => 'int', 'constraint' => 5, 'null' => true],
            'slug'              => ['type' => 'varchar', 'constraint' => 85, 'null' => true],
            'population'        => ['type' => 'int', 'constraint' => 15, 'null' => true],
            'lat'               => ['type' => 'varchar', 'constraint' => 25, 'null' => true],
            'long'              => ['type' => 'varchar', 'constraint' => 25, 'null' => true],
            'income_per_capita' => ['type' => 'varchar', 'constraint' => 85, 'null' => true],
        ]);

        $this->forge->addKey('id');
        $this->forge->addForeignKey('state_id', 'states', 'id', '', 'CASCADE');

        $this->forge->createTable('cities');
    }

    public function down()
    {
        $this->forge->dropTable('countries');
        $this->forge->dropTable('states');
        $this->forge->dropTable('cities');
    }
}
