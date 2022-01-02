<?php
namespace App\Faq\Database;

use App\Faq\Entity\Question;
use ClientX\Database\Query;
use ClientX\Database\Table;

class QuestionTable extends Table
{

    protected $table = "faq_questions";
    protected $entity = Question::class;
    protected $order = "position DESC";

    /**
     * @return \ClientX\Database\Query
     */
    public function findNotHidden(): \ClientX\Database\Query
    {
        return $this->makeQuery()->where("hidden = 0");
    }

    public function makeQuery(): Query
    {
        return parent::makeQuery()->order($this->order);
    }

    public function insert(array $params): int
    {
        $params['icon'] = empty($params['icon']) ? null : $params['icon'];
        return parent::insert($params);
    }

    public function update($condition, $params, $where = 'id'): bool
    {
        if (array_key_exists('position', $params)){

            return parent::update($condition, $params, $where);
        }
        $params['icon'] = empty($params['icon']) ? null : $params['icon'];
        return parent::update($condition, $params, $where);
    }
}
