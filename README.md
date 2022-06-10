### В данном примере реализованно:
1. [Разграничение прав доступа к методам](#Разграничение-прав-доступа-к-методам)


### Разграничение прав доступа к методам

```
public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index', 'create', 'update', 'delete', 'onoff', 'exportk', 'export-excel'],
                        'allow' => true,
                        'roles' => ['admin', 'admin_organizations'],
                        'denyCallback' => function () {
                            Yii::$app->session->setFlash("error", "У Вас нет доступа к этой страницы, пожалуйста, обратитесь к администратору!");
                            return $this->redirect(Yii::$app->request->referrer);
                        }
                        //'roles' => ['@'], все зарегестрированные
                    ],
                    [
                        'actions' => ['index', 'view'],
                        'allow' => true,
                        'roles' => ['user_organizations'],
                        'denyCallback' => function () {
                            Yii::$app->session->setFlash("error", "У Вас нет доступа к этой страницы, пожалуйста, обратитесь к администратору!");
                            return $this->redirect(Yii::$app->request->referrer);
                        }
                    ],
                    [
                        'actions' => ['view', 'search', 'search-municipality', 'view-madal'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
                'denyCallback' => function ($rule, $action) {
                    Yii::$app->session->setFlash("error", "У Вас нет доступа к этой страницы, пожалуйста, обратитесь к администратору!");
                    return $this->redirect(Yii::$app->request->referrer);
                }
            ],
        ];
    }
```

____
[:arrow_up:В данном примере реализованно](#В-данном-примере-реализованно)
___

## Скрины
>__Личный кабинет:__
>![Пример работы](image/main1.png)
>![Пример работы](image/main2.png)
>__Работа с организацией:__
>![Пример работы](image/organization1.png)
>![Пример работы](image/organization2.png)
>![Пример работы](image/organization3.png)

____
[:arrow_up:В данном примере реализованно](#В-данном-примере-реализованно)
___