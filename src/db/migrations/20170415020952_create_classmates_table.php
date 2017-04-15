<?php

use Phinx\Migration\AbstractMigration;

class CreateClassmatesTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        $classmates = $this->table('classmates');
        $classmates->addColumn('email', 'string', ['limit' => 100])
            ->addColumn('password', 'string', ['limit' => 40])
            ->addColumn('name', 'string', ['limit' => 90])
            ->addColumn('is_verified', 'bool', ['default' => 0])

            ->addColumn('phone', 'string', ['limit' => 17, 'null' => true])
            ->addColumn('photo_url', 'string', ['limit' => 80, 'null' => true])
            ->addColumn('hobbies', 'string', ['limit' => 50, 'null' => true])
            ->addColumn('passion', 'string', ['limit' => 50, 'null' => true])
            ->addColumn('fav_quote', 'string', ['limit' => 120, 'null' => true])
            ->addColumn('fav_quote_author', 'string', ['limit' => 30, 'null' => true])

            ->addColumn('whatsapp', 'string', ['limit' => 17, 'null' => true])
            ->addColumn('facebook', 'string', ['limit' => 40, 'null' => true])
            ->addColumn('twitter', 'string', ['limit' => 30, 'null' => true])
            ->addColumn('linkedin', 'string', ['limit' => 50, 'null' => true])
            ->addColumn('instagram', 'string', ['limit' => 30, 'null' => true])
            ->addColumn('snapchat', 'string', ['limit' => 30, 'null' => true])
            ->addColumn('website', 'string', ['limit' => 50, 'null' => true])
            ->addColumn('blog', 'string', ['limit' => 50, 'null' => true])

            ->addColumn('created', 'datetime')
            ->addColumn('updated', 'datetime', ['null' => true])

            ->addIndex(['email'], ['unique' => true])
            ->create();
    }
}
