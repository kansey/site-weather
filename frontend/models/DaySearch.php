<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\Day;

/**
 * Return object yii\db\ActiveRecord
 *
 * @return mixed
 */
class DaySearch extends Day
{
    public function getQuery()
    {
        $date = date('Y-m-d');
        $sql  = 'SELECT * FROM day WHERE date like :date';
        $day = Day::findBySql($sql, [
            ':date' => $date . '%',
        ]);
        return $day;
    }
}
