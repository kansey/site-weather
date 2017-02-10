<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'My Yii Application';
?>
<div class="site-index">
<?php $form = ActiveForm::begin(); ?>
    <div class="jumbotron">
        <h1>Congratulations!</h1>
        <p class="lead">You have successfully created your Yii-powered application.</p>
    </div>
    <div class="body-content">
        <div class="panel">
            <ol>
                <li>
                    <?= Html::a('Загрузить данные о погоде на день', ['site/fetch-day'], ['class' => 'profile-link']) ?>
                </li>
                <li>
                    <?= Html::a('Загрузить данные о погоде на неделю', ['site/view'], ['class' => 'profile-link']) ?>
                </li>
            </ol>
        </div>
    </div>
<?php ActiveForm::end(); ?>
</div>
