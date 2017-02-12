<?php

/* @var $this yii\web\View */
use yii\grid\GridView;
use sjaakp\gcharts\LineChart;
use sjaakp\gcharts\ColumnChart;
use sjaakp\gcharts\BarChart;

$this->title = 'Прогноз погоды';
?>
<div class="site-index">
    <div class="body-content">
        <div class="week">
            <h3>Прогноз погоды на неделю</h3>
            <?= GridView::widget([
                'dataProvider' => $week,
                'columns'      => [
                    [
                        'attribute'     => 'date',
                        'headerOptions' => ['class' => 'text-center']
                    ],
                    [
                        'attribute'      => 'tempMin',
                        'contentOptions' => ['class' => 'text-center-td'],
                    ],
                    [
                        'attribute'      => 'tempMax',
                        'contentOptions' => ['class' => 'text-center-td'],
                    ],
                    [
                        'attribute'      => 'rainfall',
                        'contentOptions' => ['class' => 'text-center-td'],
                    ],
                    [
                        'attribute'      => 'windSpeedMax',
                        'contentOptions' => ['class' => 'text-center-td'],
                    ],
                    [
                        'attribute'      => 'windDirectionMax',
                        'contentOptions' => ['class' => 'text-center-td'],
                        'headerOptions'  => ['class' => 'text-center']
                    ],
                    [
                        'attribute'      => 'precipChance',
                        'contentOptions' => ['class' => 'text-center-td'],
                    ],
                    [
                        'attribute'      => 'averageCloud',
                        'contentOptions' => ['class' => 'text-center-td'],
                    ],
                    [
                        'attribute'      => 'sunSet',
                        'contentOptions' => ['class' => 'text-center-td'],
                        'headerOptions'  => ['class' => 'text-center']
                    ],
                    [
                        'attribute'      => 'moonRise',
                        'contentOptions' => ['class' => 'text-center-td'],
                        'headerOptions'  => ['class' => 'text-center']
                    ],
                ],
            ]);?>
        </div>
        <div class="line-chart">
            <?= LineChart::widget([
                'height'       => '500px',
                'width'        => '900px',
                'dataProvider' => $day,
                'columns'      => [
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
        </div>
        <div class="column-chart">
            <?= ColumnChart::widget([
                'height'       => '500px',
                'width'        => '900px',
                'dataProvider' => $day,
                'columns'      => [
                    'date:string',
                    'relativeHumidity',
                    'cloudiness'
                ],
                'options' => [
                    'title' => 'Облачность и влажность воздуха'
                ],
            ]) ?>
        </div>
        <div class="bar-chart">
            <?= BarChart::widget([
                'height'       => '500px',
                'width'        => '900px',
                'dataProvider' => $day,
                'columns'      => [
                    'date:string',
                    'atmospherePressure'
                ],
                'options' => [
                    'title' => 'Атмосферное давление'
                ],
            ]) ?>
        </div>
    </div>
</div>
