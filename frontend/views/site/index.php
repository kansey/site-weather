<?php

/* @var $this yii\web\View */
use sjaakp\gcharts\LineChart;
use sjaakp\gcharts\ColumnChart;
use sjaakp\gcharts\BarChart;
use yii\grid\GridView;

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="body-content">

<?= GridView::widget([
        'dataProvider' => $week,
        'columns' => [
            [
                'attribute' => 'date',
                'headerOptions' => ['class' => 'text-center']
            ],
            [
                'attribute' => 'tempMin',
                'contentOptions' => ['class' => 'text-center-td'],
            ],
            [
                'attribute' => 'tempMax',
                'contentOptions' => ['class' => 'text-center-td'],
            ],
            [
                'attribute' => 'rainfall',
                'contentOptions' => ['class' => 'text-center-td'],
            ],
            [
                'attribute' => 'windSpeedMax',
                'contentOptions' => ['class' => 'text-center-td'],
            ],
            [
                'attribute' => 'windDirectionMax',
                'contentOptions' => ['class' => 'text-center-td'],
                'headerOptions' => ['class' => 'text-center']
            ],
            [
                'attribute' => 'precipChance',
                'contentOptions' => ['class' => 'text-center-td'],
            ],
            [
                'attribute' => 'averageCloud',
                'contentOptions' => ['class' => 'text-center-td'],
            ],
            [
                'attribute' => 'sunSet',
                'contentOptions' => ['class' => 'text-center-td'],
                'headerOptions' => ['class' => 'text-center']
            ],
            [
                'attribute' => 'moonRise',
                'contentOptions' => ['class' => 'text-center-td'],
                'headerOptions' => ['class' => 'text-center']
            ],
        ],
]); ?>

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
