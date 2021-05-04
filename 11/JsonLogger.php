<?php
namespace Logger;

include "LoggerInterface.php";

use Psr\Log\LoggerInterface as LoggerInterface;


class JsonLogger implements LoggerInterface {

    private $file = './log.json';


    public function __construct() {
        if (!file_exists($this -> file)) {
            $fp = fopen($this -> file, "w");
            fwrite($fp, "[]");
            fclose($fp);
        }
    }

    public function emergency($message, array $context = array()) {
        $this -> doLog('emergency', $message, $context);
    }

    public function alert($message, array $context = []) {
        $this -> doLog('alert', $message, $context);
    }

    public function critical($message, array $context = []) {
        $this -> doLog('critical', $message, $context);
    }

    public function error($message, array $context = []) {
        $this -> doLog('error', $message, $context);
    }

    public function warning($message, array $context = []) {
        $this -> doLog('warning', $message, $context);
    }

    public function notice($message, array $context = []) {
        $this -> doLog('notice', $message, $context);
    }

    public function info($message, array $context = []) {
        $this -> doLog('info', $message, $context);
    }

    public function debug($message, array $context = []) {
        $this -> doLog('debug', $message, $context);
    }

    public function log($level, $message, array $context = []) {
        $this -> doLog('log', $message, $context);
    }

    private function doLog($type, $message, array $context = array()) {
        if (file_get_contents($this -> file) && file_get_contents($this -> file) == "[]") {
            file_put_contents($this -> file, "[");
            foreach ($context as $key => $value) {
                $message = str_replace("{" . $key . "}", $context[$key], $message);
            }
            $time = date('m/d/Y h:i:s a', time());
            $str = "{type:\"" . $type . "\", time:\"" . $time . "\", content:\"" . $message . "\"  }]";
            file_put_contents($this -> file, $str, FILE_APPEND);
        } else {
            $fileTo = file_get_contents($this -> file);
            $exploded = explode('  ', $fileTo);
            unset($exploded[count($exploded) - 1]);
            $fileTo = implode('  ', $exploded);
            file_put_contents($this -> file, $fileTo);

            file_put_contents($this -> file, "},\n", FILE_APPEND);
            foreach ($context as $key => $value) {
                $message = str_replace("{" . $key . "}", $context[$key], $message);
            }
            $time = date('m/d/Y h:i:s a', time());
            $str = "{type:\"" . $type . "\", time:\"" . $time . "\", content:\"" . $message . "\"  }]";
            file_put_contents($this -> file, $str, FILE_APPEND);
        }
    }

}
