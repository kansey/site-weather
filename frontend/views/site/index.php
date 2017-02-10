<?php

/* @var $this yii\web\View */
use sjaakp\gcharts\LineChart;
use sjaakp\gcharts\ColumnChart;
use sjaakp\gcharts\BarChart;
$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="body-content">
        <?= LineChart::widget([
            'height' => '500px',
            'width' => '850px',
            'dataProvider' => $dataProvider,
            'columns' => [
                'date:string',
                'tempAir',
                'tempFeel',
                'rainfall',
                'precipChance',
                'rainChance',
                'windSpeed'
            ],
            'options' => [
                'title' => 'Почасовой прогноз погоды'
            ],
        ]) ?>
        <?= ColumnChart::widget([
            'height' => '500px',
            'width' => '900px',
            'dataProvider' => $dataProvider,
            'columns' => [
                'date:string',
                'relativeHumidity',
                'cloudiness'
            ],
            'options' => [
                'title' => 'Почасовой прогноз погоды'
            ],
        ]) ?>
        <?= BarChart::widget([
            'height' => '500px',
            'width' => '900px',
            'dataProvider' => $dataProvider,
            'columns' => [
                'date:string',
                'atmospherePressure'
            ],
            'options' => [
                'title' => 'Почасовой прогноз погоды'
            ],
        ]) ?>

    </div>
</div>
