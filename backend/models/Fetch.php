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
    public function FetchDay()
    {
        $client    = new Client("http://http.foreca.com/feed/");
        $request   = $client->get('feed.php/1hour.xml?user=moscow&pass=N4nkR3At');
        $response  = $request->send();
        $body      = $response->getBody();

        $parser    = new XmlParser;
        $data      = $parser->parse($body,'');
        $prognosis = $data['loc'][0]['step'];
        $prognosis = $this->filterPrognosis($prognosis);

        return (empty($prognosis) ? false : $prognosis);
    }

    private function filterPrognosis($arr)
    {
        $sort = [];

        foreach ($arr as $value) {
            array_push($sort, $value["@attributes"]);
        }
        return $sort;
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
