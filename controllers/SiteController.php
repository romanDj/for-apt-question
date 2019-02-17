<?php

namespace app\controllers;

use app\models\Module;
use app\models\Participant;
use app\models\Practice;
use app\models\Question;
use app\models\Result;
use app\models\Specialty;
use app\models\Test;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
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
     * {@inheritdoc}
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

    public function actionIndex()
    {
        $listSp = Specialty::find()->all();
        $listMd = Module::find()->all();
        $listPr = Practice::find()->all();
        return $this->render('index', [
            'listSp' => JSON::encode($listSp),
            'listMd' => Json::encode($listMd),
            'listPr' => Json::encode($listPr)
        ]);
    }


    public function actionReport($id)
    {
        $quest = Result::find()
            ->joinWith('participant')
            ->select('result.*, COUNT(result.id_question) as countQuestion')
            ->where(['participant.id_practice' => $id])
            ->groupBy(['id_question'])
            ->all();

        $questions = [];

        $pract = Practice::findOne($id);

        foreach ($quest as $val){

            $answerQ = [ "labels" => [], "procent" => [] ];

            $ans = Result::find()
                ->joinWith('participant')
                ->joinWith('answerContent')
                ->select('result.*, COUNT(result.id_answer) as countAnswer, answer_content.* ')
                ->where(['participant.id_practice' => $id, 'result.id_question' => $val->id_question ])
                ->groupBy(['id_answer'])
                ->all();

            foreach ($ans as $it){
                $answerQ["labels"][] = $it->answerContent["name"];
                $answerQ["procent"][] = round( ($it->countAnswer / $val->countQuestion) * 100, 0);
            }

            $quer = Question::findOne($val->id_question);

            if($quer->answers){
                $questions[strval($val->id_question)] = [
                    "content" => $val->question->content,
                    "countAll" => $val->countQuestion,
                    "answer" => $answerQ ];
            }else{

                $descrQ = [];

                $descr = Result::find()
                    ->joinWith('participant')
                    ->joinWith('answerContent')
                    ->select('result.*, COUNT(result.id_answer) as countAnswer, answer_content.* ')
                    ->where(['participant.id_practice' => $id, 'result.id_question' => $val->id_question ])
                    ->groupBy(['id_answer'])
                    ->orderBy(['participant.date' => SORT_DESC])
                    ->limit(5)
                    ->all();

                foreach ($descr as $itemD){
                    $descrQ[] = $itemD->desccription;
                }

                $questions[strval($val->id_question)] = [
                    "content" => $val->question->content,
                    "countAll" => $val->countQuestion,
                    "description" => $descrQ ];
            }

        }

        return $this->render('report', [
            'reportAnswer' => JSON::encode($questions),
            'pract' => $pract
        ]);
    }


    public function actionSuccess()
    {
        return $this->render('success');
    }

    public function actionQuestion($id)
    {
        if(Yii::$app->request->post()){
            $ans = Yii::$app->request->post('question');
            $dist = Yii::$app->request->post('dist');

            $part =  new  Participant();
            $part->id_practice = $id;
            $part->date = date('Y-m-d');
            $part->save();

            if($ans){
                foreach ($ans as $key => $value ){
                    if($value){
                        foreach ($value as $item){
                            $res = new Result();
                            $res->id_answer = $item;
                            $res->id_participant = $part->id;
                            $res->id_question = $key;
                            $res->save();
                        }
                    }
                }
            }
            if($dist){
                foreach ($dist as $key => $value ){
                    if($value != ''){
                        $res = new Result();
                        $res->desccription = $value;
                        $res->id_participant = $part->id;
                        $res->id_question = $key;
                        $res->save(false);
                    }
                }
            }
            return $this->redirect(['site/success']);
        }
        $questions = Test::find()->where(['id_practice' => $id])->all();
        return $this->render('questions', ['questions' => $questions]);
    }
}
