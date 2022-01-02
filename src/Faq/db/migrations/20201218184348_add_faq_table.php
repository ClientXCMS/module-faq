<?php

use Phinx\Migration\AbstractMigration;

class AddFaqTable extends AbstractMigration
{
    public function change()
    {
        $this->table('faq_questions')
            ->addColumn('name', 'string')
            ->addColumn('answer', 'text', ['limit' => \Phinx\Db\Adapter\MysqlAdapter::TEXT_LONG])
            ->addColumn('position', 'integer', ['default' => 0])
            ->addColumn('icon', 'string', ['null' => true])
            ->addColumn("hidden", "boolean", ['default' => false])
            ->create();

    }
}