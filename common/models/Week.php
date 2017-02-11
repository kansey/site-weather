<?php
namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use yii\base\NotSupportedException;

/**
 *
 */
class Week extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%week}}';
    }

    public function rules()
  {
      return [
          [['date', 'tempMin', 'tempMax', 'simbForec', 'rainfall', 'windSpeedMax', 'windDirectionMax', 'precipChance', 'rainChance', 'sunRise', 'sunSet', 'dayLength', 'uvIndexMax', 'averageCloud', 'phaseMoon', 'moonRise', 'moonSet'], 'required'],
          [['date','tempMin', 'tempMax', 'simbForec', 'windDirectionMax', 'sunSet', 'uvIndexMax', 'moonSet'], 'string'],
          [['precipChance', 'rainChance', 'dayLength', 'averageCloud', 'phaseMoon'], 'integer'],
      ];
  }

    public function attributeLabels()
    {
        return [
            'id'               => 'ID',
            'date'             => 'Дата',
            'tempMin'          => 'Минимальная температура воздуха за сутки (с точностью в 1 °C)',
            'tempMax'          => 'Максимальная температура воздуха за сутки (с точностью в 1 °C)',
            'simbForec'        => 'Код символов от Форека',
            'rainfall'         => 'Суточная сумма осадков (с точностью в 0.1 мм)',
            'windSpeedMax'     => 'Максимальная скорость ветра за сутки (с точностью в 0.1 м/с)',
            'windDirectionMax' => 'Направление ветра в момент максимальной скорости ветра',
            'precipChance'     => 'Вероятность осадков (с точностью в 1 %)',
            'rainChance'       => 'Вероятность грозы (с точностью в 1 %)',
            'sunRise'          => 'Время восхода солнца',
            'sunSet'           => 'Время захода солнца',
            'dayLength'        => 'Продолжительность дня',
            'uvIndexMax'       => 'Максимальное значения УФ-индекса за сутки (с точностью в 1 )',
            'averageCloud'     => 'Среднее значение облачности (с точностью в 1 %)',
            'phaseMoon'        => 'Фаза луны (с точностью в 10 град.)',
            'moonRise'         => 'Время восхода луны',
            'moonSet'          => 'Время захода луны'
        ];
    }
}
