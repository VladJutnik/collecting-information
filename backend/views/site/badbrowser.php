<!doctype html>
<html lang="ru">
<head>
    <!-- Обязательные метатеги -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Браузер не поддерживается</title>
</head>

<style>
    body {
        background: #edeef0;
    }

    a {
        text-decoration: none;
    }

    img {
        width: 50%;
        margin: 15% 25% 0 25%;
    }

    .text-browser {
        font-size: 10px;
        color: #0b72b8;
        text-align: center;
        font-weight: bold;
    }
    .sadasdasd:hover {
        border: black 1px solid;
        border-radius: 5px;
    }

    #test2 {
        margin: 7% 22% 0 22%;
        padding: 1% 1% 1% 1%;
        width: 50%;
        border: black 1px double;

        border-radius: 25px;
        background: #ffffff;
        display: inline-block;
        -webkit-box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
        box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
    }
</style>

<body>

<div id="test2">
    <div class="col-11 mx-auto">
        <h5 class="text-center font-weight-bold">Ваш браузер устарел</h5>
        <p class="text-center" style="font-size: 12px">Из-за этого сайт может работать медленно и с ошибками. Для
            быстрой и стабильной работы рекомендуем установить последнюю версию одного из этих браузеров:</p>
        <div class="row">
            <div class="col-3 sadasdasd"><a href="https://www.microsoft.com/ru-ru/edge?r=1">
                    <img src="../images/edge.jpg" alt="альтернативный текст" width="50">
                    <p class="text-browser">Microsoft Edge</p>
                </a>
            </div>

            <div class="col-3 sadasdasd"><a href="https://www.google.ru/intl/ru/chrome/">
                    <img src="../images/chrome.jpg" alt="альтернативный текст" width="50">
                    <p class="text-browser">Google Chrome</p>
                </a>
            </div>

            <div class="col-3 sadasdasd"><a href="https://browser.yandex.ru/">
                    <img src="../images/ya.jpg" alt="альтернативный текст" width="50">
                    <p class="text-browser">Яндекс.Браузер</p>
                </a>
            </div>

            <div class="col-3 sadasdasd"><a href="https://www.mozilla.org/ru/firefox/">
                    <img src="../images/mozila.jpg" alt="альтернативный текст" width="50">
                    <p class="text-browser">Mozilla Firefox</p>
                </a>
            </div>

        </div>
    </div>
</div>

</body>
</html>