<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\Day;
use frontend\models\DaySearch;
use frontend\models\WeekSearch;
use yii\data\ActiveDataProvider;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'error'],
                'rules' => [
                    [
                        'actions' => ['index','error'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays a weather forecast for the week
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $weekSearch = new WeekSearch();
        $queryWeek  = $weekSearch->getQuery();
        $daySearch  = new DaySearch();
        $queryDay   =  $daySearch->getQuery();

        if (empty($queryDay->all()) && empty($queryWeek->all())) {
            return $this->render('error', [
                'message'=> 'Данные о прогнозе недоступны',
                'name'   => 'Error'
            ]);
        }
        else {
            $week = new ActiveDataProvider([
                'query' => $queryWeek,
            ]);
            $day = new ActiveDataProvider([
                'query' => $queryDay,
                'pagination' => false
            ]);
            return $this->render('index', [
                'week' => $week,
                'day'  => $day
            ]);
        }
    }
}
