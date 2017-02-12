<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\Week;

/**
 * Return object yii\db\ActiveRecord
 *
 * @return mixed
 */
class WeekSearch extends Week
{
    public function getQuery()
    {
        $currentDay = date('Y-m-d');
        $lastDay    = new \DateTime($currentDay);
        $lastDay->modify('+7 day');
        $lastDay    = $lastDay->format('Y-m-d');

        $sql  = 'SELECT * FROM week WHERE date BETWEEN :start AND :end';
        $week = Week::findBySql($sql, [
            ':start' => $currentDay,
            ':end'   => $lastDay
        ]);

        return $week;
    }
}
