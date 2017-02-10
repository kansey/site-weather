<?php
namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use yii\base\NotSupportedException;

/**
 *
 */
class Day extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%day}}';
    }

    public function rules()
  {
      return [
          [['date', 'tempAir', 'simbForec', 'tempFeel', 'rainfall', 'windSpeed', 'windDirection', 'relativeHumidity', 'atmospherePressure', 'precipChance', 'rainChance', 'cloudiness'], 'required'],
          [['date', 'simbForec', 'tempAir', 'tempFeel', 'windDirection'], 'string'],
          [['atmospherePressure', 'cloudiness', 'precipChance', 'rainChance', 'relativeHumidity'], 'integer'],
      ];
  }

  public function attributeLabels()
{
    return [
        'id' => 'ID',
        'date' => 'Дата',
        'tempAir' => 'Температура воздуха',
        'simbForec' => 'Код символов от Форека',
        'tempFeel' => 'Температура "ощущается как" (с точностью в 1 °C)',
        'rainfall' => 'Сумма осадков за 1 час (с точностью в 0.1 мм)',
        'windSpeed' => 'Скорость ветра (с точностью в 0.1 м/с)',
        'windDirection' => 'Направление ветра',
        'relativeHumidity' => 'Относительная влажность воздуха (с точностью в 1 %)',
        'atmospherePressure' => 'Атмосферное давление (с точностью в мм.рт.ст.)',
        'precipChance'  => 'Вероятность осадков (с точностью в 1 %)',
        'rainChance'  => 'Вероятность грозы (с точностью в 1 %)',
        'cloudiness'  => 'Облачность (с точностью в 1 %)'
    ];
}
}
