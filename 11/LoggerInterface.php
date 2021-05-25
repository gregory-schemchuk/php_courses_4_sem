<?php

/**
 * пространство имен для описания функционала логировния
 */
namespace Psr\Log;


/**
 * Interface LoggerInterface
 *
 * стандартный интейрфес лога
 *
 * @package Psr\Log
 * @version 1.0.0
 */
interface LoggerInterface {
    /**
     *
     * метод записи сообщения в лог
     *
     * @param $message string сообщение лога
     * @param array $context данные для форматирования сообщения
     * @return void
     */
    public function emergency($message, array $context = []);

    /**
     *
     * метод записи сообщения в лог
     *
     * @param $message string сообщение лога
     * @param array $context данные для форматирования сообщения
     * @return void
     */
    public function alert($message, array $context = []);

    /**
     *
     * метод записи сообщения в лог
     *
     * @param $message string сообщение лога
     * @param array $context данные для форматирования сообщения
     * @return void
     */
    public function critical($message, array $context = []);

    /**
     *
     * метод записи сообщения в лог
     *
     * @param $message string сообщение лога
     * @param array $context данные для форматирования сообщения
     * @return void
     */
    public function error($message, array $context = []);

    /**
     *
     * метод записи сообщения в лог
     *
     * @param $message string сообщение лога
     * @param array $context данные для форматирования сообщения
     * @return void
     */
    public function warning($message, array $context = []);

    /**
     *
     * метод записи сообщения в лог
     *
     * @param $message string сообщение лога
     * @param array $context данные для форматирования сообщения
     * @return void
     */
    public function notice($message, array $context = []);

    /**
     *
     * метод записи сообщения в лог
     *
     * @param $message string сообщение лога
     * @param array $context данные для форматирования сообщения
     * @return void
     */
    public function info($message, array $context = []);

    /**
     *
     * метод записи сообщения в лог
     *
     * @param $message string сообщение лога
     * @param array $context данные для форматирования сообщения
     * @return void
     */
    public function debug($message, array $context = []);

    /**
     *
     * метод записи сообщения в лог
     *
     * @param $level string задание уровня лога
     * @param $message string сообщение лога
     * @param array $context данные для форматирования сообщения
     * @return void
     */
    public function log($level, $message, array $context = []);
}
