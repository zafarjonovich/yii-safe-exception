<?php


namespace zafarjonovich\YiiSafeException\saver;


use zafarjonovich\YiiSafeException\base\Saver;
use \zafarjonovich\PHPSafeException\saver\TelegramBotSaver as PHPTelegramBotSaver;

class TelegramBotSaver extends Saver
{
    public $token;

    public $chat_ids;

    public function save($convertedException)
    {
        $saver = new PHPTelegramBotSaver(
            $this->token,
            $this->chat_ids
        );

        $saver->save($convertedException);
    }
}