<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class VolunteerForm extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function up(): void
    {
        if(!$this->hasTable('volunteerform')){
            // create table
            $table = $this->table('volunteerform');

            // adding columns
            $table->addColumn('fullName', 'string', ['limit' => 50, 'null' => false])
                ->addColumn('email', 'string', ['limit' => 100, 'null' => false])
                ->addColumn('mobile', 'string', ['limit' => 15, 'null' => false])
                ->addColumn('education', 'string', ['limit' => 100, 'null' => false])
                ->addColumn('occupation', 'string', ['limit' => 50, 'null' => false])
                ->addColumn('designation', 'string', ['limit' => 50, 'null' => false])
                ->addColumn('pinCode', 'string', ['limit' => 6, 'null' => false])
                ->addColumn('city', 'string', ['limit' => 50, 'null' => false])
                ->addColumn('state', 'string', ['limit' => 50, 'null' => false])
                ->addColumn('country', 'string', ['limit' => 50, 'null' => false])
                ->addColumn('availableToParticipate', 'string', ['limit' => 50, 'null' => false])
                ->addColumn('message', 'text')
                ->addColumn('date', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
                ->create();
        }
    }
    public function down(){
        $this->table('volunteerform')->drop()->save();
    }
}
