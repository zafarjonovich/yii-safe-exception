# Yii safe exception

Assalomu aleykum. These components will help you hide your exception and save it in your Yii application.

-----
## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
composer require zafarjonovich/yii-safe-exception
```

or add

```
"zafarjonovich/yii-safe-exception": "*"
```

to the require section of your `composer.json` file.

------

## Package structure
<br>


Every exception will converts other specific type. Now this types have:
- Json: \zafarjonovich\PHPSafeException\converter\JsonConverter::class
- Xml: \zafarjonovich\PHPSafeException\converter\XMLConverter::class
- Array: \zafarjonovich\PHPSafeException\converter\ArrayConverter::class
- Text: \zafarjonovich\PHPSafeException\converter\TextConverter::class

<br>


Every converted exception will saves specific places. Now this places have:
- Database: \zafarjonovich\YiiSafeException\saver\DBSaver::class
- File: \zafarjonovich\YiiSafeException\saver\FileSaver::class
- Telegram bot: \zafarjonovich\YiiSafeException\saver\TelegramBotSaver::class

Each saver has a personal configuration, if they are not confugurated, Exception will not be saved

### Configurations

- TelegramBotSaver: token and chat_ids
- FileSaver: filePath or pathGenerator

## Usage

Add your app/config.php this component

```php
<?php

$config = [
 ...
 'components' => [
 ...
	  'errorHandler' => [
            'class' => 'zafarjonovich\YiiSafeException\application\Web',
            'savers' => [
                [
                    'class' => \zafarjonovich\YiiSafeException\saver\FileSaver::class,
                    'pathGenerator' => function() {
                        return Yii::getAlias('@app/web/exception-'.time().'.txt');
                    }
                ],
                [
                    'class' => \zafarjonovich\YiiSafeException\saver\TelegramBotSaver::class,
                    'token' => 'TELEGRAM_BOT_TOKEN',
                    'chat_ids' => ['telegram_chat_id']
                ]
            ],
            'stringGeneratorClass' => \zafarjonovich\PHPSafeException\converter\TextConverter::class,
            'traceLevel' => 2,
            'prettyException' => true
        ],

];

?>

```

If you need multiple exception savers you must add other saver component to `savers` property

### If you need DBSaver
You must run this command
<br>
`php yii migrate --migrationPath="@vendor/zafarjonovich/yii-safe-exception/src/migrations`
<br>
<br>

And add `savers` this `\zafarjonovich\YiiSafeException\saver\DBSaver::class`