<?php

class FileManager {
    public static $dir = 'text';

    public static function readFile($filename) {
        $path = self::$dir . '/' . $filename;
        return file_exists($path) ? file_get_contents($path) : 'Файл не знайдено.';
    }

    public static function writeFile($filename, $content) {
        $path = self::$dir . '/' . $filename;
        file_put_contents($path, $content . PHP_EOL, FILE_APPEND);
    }

    public static function clearFile($filename) {
        $path = self::$dir . '/' . $filename;
        file_put_contents($path, '');
    }
}
