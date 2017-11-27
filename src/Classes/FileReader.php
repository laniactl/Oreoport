<?php

//namespace Src\Classes;

class FileReader extends Thread{
    public $file;
    public $pause;

    public function __construct($file) {
        $this->file = $file;
        $this->pause = false;
    }

    public function run() {
        if (($handle = fopen($this->file, "rb"))) {
            $len = 0;
            do {
                $this->synchronized(function(){
                    if ($this->paused) {
                        printf(
                            "\npausing %lu ...\n", $this->getThreadId());
                        $this->wait();
                    }
                });

                $data = fread($handle, 1024);
                $len += strlen($data);

                if (($len % 2) == 0) {
                    printf(
                        "\r\rread %lu", $len);
                }
            } while (!feof($handle));

            fclose($handle);
        }
    }

    public function pause() {
        return $this->synchronized(function(){
            return ($this->paused = true);
        });
    }

    public function unpause() {
        return $this->synchronized(function(){
            $this->paused = false;
            if ($this->isWaiting()) {
                return $this->notify();
            }
        });
    }
}

function do_something($time) {
    $start = time();

    while (($now = time()) < ($start + $time)) {
        usleep(2000);
        if (($now % 2) == 0) {
            echo ".";
        }
    }

    echo "\n";
}

?>