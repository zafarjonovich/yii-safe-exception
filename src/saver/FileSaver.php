<?php


namespace zafarjonovich\YiiSafeException\saver;


use zafarjonovich\PHPSafeException\saver\FileSaver as PHPFileSaver;
use zafarjonovich\YiiSafeException\base\Saver;

class FileSaver extends Saver
{
    public $filePath;

    /**
     * @var \Closure $pathGenerator
     */
    public $pathGenerator;

    private $saver;

    public function save($convertedException)
    {
        if ($this->pathGenerator instanceof \Closure) {
            $generator = $this->pathGenerator;
            $this->filePath = $generator();
        }

        $saver = new PHPFileSaver($this->filePath);
        $saver->save($convertedException);
    }
}