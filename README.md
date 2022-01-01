# PHP safe exception

Assalomu aleykum. These components will help you hide your exception and save it in your application.

-----
## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
composer require zafarjonovich/php-safe-exception
```

or add

```
"zafarjonovich/php-safe-exception": "*"
```

to the require section of your `composer.json` file.

------
## Usage

```php

<?php

require_once 'vendor/autoload.php';

use \zafarjonovich\PHPSafeException\saver\FileSaver;
use zafarjonovich\PHPSafeException\StringGenerator\JsonStringGenerator;

try {
    throw new \Exception('My awesome exception');
} catch (\Exception $exception) {
    
    $saver = new FileSaver('exceptions/'.time().'.txt');
    $saver->save(new JsonStringGenerator($exception));
    
}

?>

```

Also you can use multiple savers


```php

<?php

require_once 'vendor/autoload.php';

use zafarjonovich\PHPSafeException\saver\FileSaver;
use zafarjonovich\PHPSafeException\saver\TelegramBotSaver;
use zafarjonovich\PHPSafeException\components\MultipleSaver;
use zafarjonovich\PHPSafeException\StringGenerator\TextStringGenerator;

try {
    throw new \Exception('My awesome exception');
} catch (\Exception $exception) {
    
    $saver = new MultipleSaver();
    
    $saver->addSaver(new FileSaver('exceptions/'.time().'.txt'));
    $saver->addSaver(new TelegramBotSaver('BOT_TOKEN',['chat_id1','chat_id2','chat_id3']));
    
    $saver->save(new TextStringGenerator($exception));
    
}

?>

```
