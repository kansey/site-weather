<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\Day;

/**
 *
 */
class DaySearch extends Day
{
    public function getQuery()
    {
        $date = date('Y-m-d');
        $query = Day::find("date like '$date%'");
        return $query;
    }
}
