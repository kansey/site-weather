<?php
namespace backend\models;
use Yii;
use yii\base\Model;
use common\models\Day;
use common\models\Week;

/**
 *
 */
class Save extends Model
{
    public function saveDayInDB($list)
    {
        foreach ($list as $item) {
            $db = Yii::$app->db;
            $transaction = $db->beginTransaction();

            try {
                Yii::$app->db->createCommand(
                    "INSERT INTO day (date,tempAir,simbForec, tempFeel,rainfall, windSpeed,windDirection, relativeHumidity, atmospherePressure, precipChance, rainChance, cloudiness)
                    VALUES (:date, :tempAir, :simbForec, :tempFeel, :rainfall, :windSpeed, :windDirection, :relativeHumidity, :atmospherePressure, :precipChance, :rainChance, :cloudiness)
                    ON DUPLICATE KEY UPDATE date = VALUES(date)"
                 )->bindValues([
                    ':date'               => $item['dt'],
                    ':tempAir'            => $item['t'],
                    ':simbForec'          => $item['s'],
                    ':tempFeel'           => $item['tf'],
                    ':rainfall'           => $item['pr'],
                    ':windSpeed'          => $item['ws'],
                    ':windDirection'      => $item['wn'],
                    ':relativeHumidity'   => $item['rh'],
                    ':atmospherePressure' => $item['p'],
                    ':precipChance'       => $item['pp'],
                    ':rainChance'         => $item['tp'],
                    ':cloudiness'         => $item['c']
                ])->execute();

            $transaction->commit();
            }
            catch(\Exception $e) {
                $transaction->rollBack();
                throw $e;
            }
            catch(\Throwable $e) {
                $transaction->rollBack();
            }
        }
    }

    public function saveWeekInDB($list)
    {
        foreach ($list as $item) {
            $db = Yii::$app->db;
            $transaction = $db->beginTransaction();

            try {
                    Yii::$app->db->createCommand(
                        "INSERT INTO week (date, tempMin, tempMax, simbForec, rainfall, windSpeedMax, windDirectionMax, precipChance, rainChance, sunRise, sunSet, dayLength, uvIndexMax, averageCloud, phaseMoon, moonRise, moonSet)
                         VALUES (:date, :tempMin, :tempMax, :simbForec, :rainfall, :windSpeedMax, :windDirectionMax, :precipChance, :rainChance, :sunRise, :sunSet, :dayLength, :uvIndexMax, :averageCloud, :phaseMoon, :moonRise, :moonSet)
                         ON DUPLICATE KEY UPDATE date = VALUES(date)"
                    )->bindValues([
                        ':date'             => $item['dt'],
                        ':tempMin'          => $item['tn'],
                        ':tempMax'          => $item['tx'],
                        ':simbForec'        => $item['s'],
                        ':rainfall'         => $item['pr'],
                        ':windSpeedMax'     => $item['wsx'],
                        ':windDirectionMax' => $item['wn'],
                        ':precipChance'     => $item['pp'],
                        ':rainChance'       => $item['tp'],
                        ':sunRise'          => $item['rise'],
                        ':sunSet'           => $item['set'],
                        ':dayLength'        => $item['dl'],
                        ':uvIndexMax'       => $item['uv'],
                        ':averageCloud'     => $item['ca'],
                        ':phaseMoon'        => $item['mp'],
                        ':moonRise'         => $item['mrise'],
                        ':moonSet'          => $item['mset']
                    ])->execute();

                    $transaction->commit();
            }

            catch(\Exception $e) {
                $transaction->rollBack();
                throw $e;
            }

            catch(\Throwable $e) {
                $transaction->rollBack();
            }
        }
    }
}
