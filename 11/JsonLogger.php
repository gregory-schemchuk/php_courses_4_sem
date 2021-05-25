<?php

/**
 * Пространство имен для объектов логирования
 */
namespace Logger;

/**
 * Стандартный интерфейс для класса лога
 */
include "LoggerInterface.php";

use Psr\Log\LoggerInterface as LoggerInterface;


/**
 * Class JsonLogger
 *
 * Класс для ведения лога в JSON файле
 *
 * @author Gregory
 * @package Logger
 * @version 1.0.0
 */
class JsonLogger implements LoggerInterface {

    /**
     * @var string путь к файлу лога
     */
    private $file = './log.json';


    /**
     * JsonLogger constructor. если JSON файла лога не существует, создает его
     */
    public function __construct() {
        if (!file_exists($this -> file)) {
            $fp = fopen($this -> file, "w");
            fwrite($fp, "[]");
            fclose($fp);
        }
    }

    /**
     *
     * лог экстренного сообщения
     *
     * @param string $message сообщение
     * @param array $context данные для форматирования сообщения
     * @api
     */
    public function emergency($message, array $context = array()) {
        $this -> doLog('emergency', $message, $context);
    }

    /**
     *
     * лог уведомления
     *
     * @param string $message сообщение
     * @param array $context данные для форматирования сообщения
     * @api
     */
    public function alert($message, array $context = []) {
        $this -> doLog('alert', $message, $context);
    }

    /**
     *
     * лог критического сообщения
     *
     * @param string $message сообщение
     * @param array $context данные для форматирования сообщения
     * @api
     */
    public function critical($message, array $context = []) {
        $this -> doLog('critical', $message, $context);
    }

    /**
     *
     * лог сообщения об ошибке
     *
     * @param string $message сообщение
     * @param array $context данные для форматирования сообщения
     * @api
     */
    public function error($message, array $context = []) {
        $this -> doLog('error', $message, $context);
    }

    /**
     *
     * лог предупреждения
     *
     * @param string $message сообщение
     * @param array $context данные для форматирования сообщения
     * @api
     */
    public function warning($message, array $context = []) {
        $this -> doLog('warning', $message, $context);
    }

    /**
     *
     * лог сообщения-заметки
     *
     * @param string $message сообщение
     * @param array $context данные для форматирования сообщения
     * @api
     */
    public function notice($message, array $context = []) {
        $this -> doLog('notice', $message, $context);
    }

    /**
     *
     * лог информационного сообщения
     *
     * @param string $message сообщение
     * @param array $context данные для форматирования сообщения
     * @api
     */
    public function info($message, array $context = []) {
        $this -> doLog('info', $message, $context);
    }

    /**
     *
     * лог сообщения отладки
     *
     * @param string $message сообщение
     * @param array $context данные для форматирования сообщения
     * @api
     */
    public function debug($message, array $context = []) {
        $this -> doLog('debug', $message, $context);
    }

    /**
     *
     * лог обычного сообщения для логирования
     *
     * @param $level string задание уровня лога
     * @param string $message сообщение
     * @param array $context данные для форматирования сообщения
     * @api
     */
    public function log($level, $message, array $context = []) {
        $this -> doLog('log', $message, $context);
    }

    /**
     *
     * метод записи сообщения в файл лога
     *
     * @param $type string тип логируемого сообщения
     * @param $message string тело сообщения для лога
     * @param array $context данные для форматирования сообщения
     * @todo вынести формирование тела объекта в новый метод
     * @since 1.0.0
     */
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
