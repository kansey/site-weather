<?php
namespace backend\models;
use Yii;
use yii\base\Model;
use Guzzle\Http\Client;
use Guzzle\Http\EntityBody;
use Guzzle\Http\Message\Request;
use Guzzle\Http\Message\Response;
use light\yii2\XmlParser;
use common\models\Day;

/**
 *
 */
class Fetch extends Model
{
    public function fetchDay()
    {
        $prognosis = $this->getResponse('feed.php/1hour.xml?user=moscow&pass=N4nkR3At');
        $prognosis = $this->filterPrognosisOnDay($prognosis);
        return (empty($prognosis) ? false : $prognosis);
    }

    public function fetchWeek()
    {
        $prognosis = $this->getResponse('http://http.foreca.com/feed/feed.php/day.xml?user=moscow&pass=N4nkR3At');
        $prognosis = $this->filterPrognosisOnWeek($prognosis);
        return (empty($prognosis) ? false : $prognosis);
    }

    private function filterPrognosisOnDay($arr)
    {
        $sort = [];

        foreach ($arr as $value) {
            $date = date('Y-m-d');
            if (stristr($value["@attributes"]['dt'], $date)) {
                array_push($sort, $value["@attributes"]);
            }
        }

        return $sort;
    }

    private function filterPrognosisOnWeek($days)
    {
        $sort       = [];
        $currentDay = date('Y-m-d');
        $lastDay    = $this->getLastDay($currentDay);
        $nextDay    = $currentDay;

        foreach ($days as $day) {

            if (stristr($day["@attributes"]['dt'], $nextDay)) {
                array_push($sort, $day["@attributes"]);
            }

            if (strcasecmp($nextDay, $lastDay) < 0) {
                $nextDay = $this->getNextDay($nextDay);
            }
        }

        return $sort;
    }

    private function getLastDay($current)
    {
        $lastDay = new \DateTime($current);
        $lastDay->modify('+7 day');
        return $lastDay->format('Y-m-d');
    }

    private function getNextDay($current)
    {
        $nextDay = new \DateTime($current);
        $nextDay->modify('+1 day');
        return $nextDay->format('Y-m-d');
    }

    private function getResponse($query)
    {
        $client    = new Client("http://http.foreca.com/feed/");
        $request   = $client->get($query);
        $response  = $request->send();
        $body      = $response->getBody();

        $parser    = new XmlParser;
        $data      = $parser->parse($body,'');

        return $data['loc'][0]['step'];
    }

    public function saveInDB($list)
    {
        foreach ($list as $item) {
            $model = new Day();
            Day::getDb()->transaction(function($db) use ($model, $item) {

                $values = [
                    'date'               => $item['dt'],
                    'tempAir'            => $item['t'],
                    'simbForec'          => $item['s'],
                    'tempFeel'           => $item['tf'],
                    'rainfall'           => $item['pr'],
                    'windSpeed'          => $item['ws'],
                    'windDirection'      => $item['wn'],
                    'relativeHumidity'   => $item['rh'],
                    'atmospherePressure' => $item['p'],
                    'precipChance'       => $item['pp'],
                    'rainChance'         => $item['tp'],
                    'cloudiness'         => $item['c']
                ];

                $model->attributes = $values;
                $model->save();
            });
        }
    }
}
