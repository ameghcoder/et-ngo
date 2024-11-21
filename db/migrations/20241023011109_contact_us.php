<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class ContactUs extends AbstractMigration
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
        if(!$this->hasTable('contactus')){
            // create table
            $table = $this->table('contactus');

            // adding columns
            $table->addColumn('firstName', 'string', ['limit' => 50])
                ->addColumn('lastName', 'string', ['limit' => 50])
                ->addColumn('phoneNumber', 'string', ['limit' => 15])
                ->addColumn('emailAddress', 'string', ['limit' => 100])
                ->addColumn('message', 'text')
                ->addColumn('date', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
                ->create();
        }
    }
    public function down(){
        $this->table('contactus')->drop()->save();
    }
}
