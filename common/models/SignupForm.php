<?php

namespace common\models;

use Yii;
use yii\base\Model;
use common\models\User;
use yii\rbac\DbManager;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $federal_district_id;
    public $region_id;
    public $municipality_id;
    public $type; //Тип пользователя
    public $name_organization; //Краткое название Вашей организации
    public $login; //пока оставлю посмотрю потом
    public $password;//Пароль
    public $name;//ФИО (ответственный)
    public $work_position;//Должность ответственного
    public $email;//Ваш e-mail, он необходим для входа в ПС
    public $check;//Согласие
    public $check2;

    public function rules()
    {
        return [
            ['federal_district_id', 'required'],
            ['federal_district_id', 'integer'],
            [
                ['federal_district_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => FederalDistrict::className(),
                'targetAttribute' => ['federal_district_id' => 'id']
            ],

            ['region_id', 'required'],
            ['region_id', 'integer'],
            [
                ['region_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => Region::className(),
                'targetAttribute' => ['region_id' => 'id']
            ],

            ['municipality_id', 'required'],
            ['municipality_id', 'integer'],
            [
                ['municipality_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => Municipality::className(),
                'targetAttribute' => ['municipality_id' => 'id']
            ],

            //['organization_id', 'safe'],
            //['organization_id', 'integer'],
            //[['organization_id'], 'exist', 'skipOnError' => true, 'targetClass' => Organization::className(), 'targetAttribute' => ['organization_id' => 'id']],

            ['name_organization', 'required'],
            ['name_organization', 'trim'],
            ['name_organization', 'string', 'min' => 8, 'max' => 255],
            [
                'name_organization',
                'match',
                'pattern' => '/^[а-яА-ЯёЁ0-9\s]+$/u',
                'message' => 'Принимаются только символы кириллицы и цифры'
            ],

            ['email', 'required'],
            ['email', 'email'],
            [
                'email',
                'unique',
                'targetClass' => '\common\models\User',
                'message' => 'Электронная почта уже используется'
            ],
            ['email', 'trim'],
            ['email', 'string', 'min' => 8, 'max' => 255],

            ['password', 'required'],
            ['password', 'trim'],
            ['password', 'string', 'min' => Yii::$app->params['user.passwordMinLength']],

            ['name', 'required'],
            ['name', 'trim'],
            ['name', 'string', 'min' => 8, 'max' => 255],
            ['name', 'match', 'pattern' => '/^[а-яА-ЯёЁ\s]+$/u', 'message' => 'Принимаются только символы кириллицы'],

            ['work_position', 'required'],

            [
                'check',
                'compare',
                'compareValue' => 1,
                'message' => 'Необходимо Ваше согласие на обработку персональных данных'
            ],
            ['check2', 'compare', 'compareValue' => 1, 'message' => 'Необходимо проверить заполненные данные'],
        ];
    }

    public function signup($org_id)
    {
        $user = new User();
        $user->name = $this->name;
        $user->login = $this->email;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->federal_district_id = $this->federal_district_id;
        $user->region_id = $this->region_id;
        $user->municipality_id = $this->municipality_id;
        $user->organization_id = $org_id;
        $user->work_position = $this->work_position;
        $user->status = 10;
        $user->created_at = time();
        $user->generateEmailVerificationToken();
        $user->generateAuthKey();

        if ($user->save()){
            $r = new DbManager();
            $r->init();
            $assign = $r->createRole('food_organizer');
            $r->assign($assign, $user->id);
            Yii::$app->session->setFlash('success', 'Спасибо за регистрацию.');
            $this->sendConfirmEmail($user, $org_id, $this->password);
            return 'ok';
        } else {
            return  '';
        }
    }

    protected function sendConfirmEmail($user, $org_id, $password)
    {
            $message = Yii::$app->mailer->compose(
                ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
                ['user' => $user]
            )
                ->setTo([$this->email => $this->name])
                ->setFrom(Yii::$app->params['senderEmail'])
                ->setSubject('Вы зарегистрированы на сайте anket.demography.site')
                ->setHtmlBody(
                    '<p>Здравствуйте, ' . $user->name . '!</p>
                          <p>Вы были зарегистрированы в программе. 
                          <p><b>Ваш логин:</b> ' . $user->login . ' </p> 
                          <p><b>Ваш пароль:</b> ' . $password . ' </b>
                          <p>
                          <b>Ссылка для входа:</b> <a href="https://anket.demography.site/login">Перейти</a> или https://anket.demography.site/login</p>
                          <br>
                          <b>Видео уроки для оператора питания:</b>
                          <p>1. <a href="https://www.youtube.com/watch?v=uzONXZ3MJtg">Регистрация, вход, просмотр оперативной информации, запрос в техподдержку</a><br>
                           2. <a href="https://www.youtube.com/watch?v=cDaQQml0dDM">Прикрепление организации, внесение, редактирование данных по анкете</a></p>
                          <br>
                          <a href="https://www.niig.su/">ФБУН Новосибирский НИИ гигиены Роспотребнадзора</a>
                          '
                )
                ->send();
    }


    /*protected function sendConfirmEmail($user, $org_id, $password)
    {
        try {
            $message = Yii::$app->mailer->compose(
                ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
                ['user' => $user]
            )
                ->setTo([$this->email => $this->name])
                ->setFrom(Yii::$app->params['senderEmail'])
                ->setSubject('Вы зарегистрированы на сайте anket.demography.site')
                ->setHtmlBody(
                    '<p>Здравствуйте, ' . $user->name . '!</p>
                          <p>Вы были зарегистрированы в программе.
                          <p><b>Ваш логин:</b> ' . $user->login . ' </p>
                          <p><b>Ваш пароль:</b> ' . $password . ' </b>
                          <p>
                          <b>Ссылка для входа:</b> <a href="https://anket.demography.site/login">Перейти</a> или https://anket.demography.site/login</p>
                          <br>
                          <b>Видео уроки для оператора питания:</b>
                          <p>1. <a href="https://www.youtube.com/watch?v=uzONXZ3MJtg">Регистрация, вход, просмотр оперативной информации, запрос в техподдержку</a><br>
                           2. <a href="https://www.youtube.com/watch?v=cDaQQml0dDM">Прикрепление организации, внесение, редактирование данных по анкете</a></p>
                          <br>
                          <a href="https://www.niig.su/">ФБУН Новосибирский НИИ гигиены Роспотребнадзора</a>
                          '
                )
                ->send();
            if (!$message) {
                throw new \Swift_TransportException('Письмо недоставлено.');
            }

            $r = new DbManager();
            $r->init();
            $assign = $r->createRole('food_organizer');
            $r->assign($assign, $user->id);

            Yii::$app->session->setFlash('success', 'Спасибо за регистрацию.');
            //$this->login($user);
        } catch (\Swift_TransportException $error) {
            User::findOne($user->id)->delete();
            Organization::findOne($org_id)->delete();

            Yii::$app->session->setFlash('error', 'Введена несуществующая электронная почта');

            return false;
        }
    }*/

    protected function sendEmail($user)
    {
        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
            ->setTo($this->email)
            ->setSubject('Account registration at ' . Yii::$app->name)
            ->send();
    }

    public function attributeLabels()
    {
        return [
            'federal_district_id' => 'Федеральный округ',
            'region_id' => 'Субъект федерации',
            'municipality_id' => 'Муниципальное образование',
            'post' => 'Должность ответсвенного',
            'organization_id' => 'Наименование организации',
            'name' => 'ФИО (ответственного)',
            'email' => 'Ваш e-mail, он необходим для входа в ПС',
            'password' => 'Пароль ',
        ];
    }

    public function getFederalDistrict()
    {
        return $this->hasOne(FederalDistrict::className(), ['id' => 'federal_district_id']);
    }

    public function getFoodOrganizers()
    {
        return $this->hasMany(FoodOrganizer::className(), ['user_id' => 'id']);
    }

    public function getMunicipality()
    {
        return $this->hasOne(Municipality::className(), ['id' => 'municipality_id']);
    }

    public function getOrganization()
    {
        return $this->hasOne(Organization::className(), ['id' => 'organization_id']);
    }

    public function getRegion()
    {
        return $this->hasOne(Region::className(), ['id' => 'region_id']);
    }
}
