<?php

class FileHandler
{
    private $coder;

    public function __construct(FileCoder $object = null)
    {
        $this->coder = $object;
    }

    public function read(string $filename): string|false
    {
        $filename = $this->resolveRequestedFilePath($filename);

        if(($handle = fopen($filename, 'r')) === false){
            return false;
        }

        if(($content = fread($handle, filesize($filename))) === false ){
            return false;
        }

        fclose($handle);

        return $content;
    }

    public function readUrl(string $url): array|false
    {
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_TIMEOUT, 50);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $result = null;
        if(($content = curl_exec($curl)) === false){
            $result = false;
        } else {
            $result = [
                'content' => $content,
                'type' => curl_getinfo($curl, CURLINFO_CONTENT_TYPE),
            ];
        }

        curl_close($curl);
        return $result;
    }

    public function write(string $filename, string $content) : bool
    {
        $filename = $this->resolveRequestedFilePath($filename);
        if(($handle = fopen($filename, 'w')) === false){
            return false;
        }

        if(fwrite($handle, $content) === false){
            return false;
        }

        fclose($handle);

        return true;
    }

    public function delete(string $filename) : bool
    {
        $filename = $this->resolveRequestedFilePath($filename);

        return unlink($filename);
    }

    private function resolveRequestedFilePath(string $file) : string
    {
        $backtrace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 2)[1];

        if(preg_match("/^.*:\/\//", $file)){
            return $file;
        }

        return dirname($backtrace['file']) . '/' . $file;
    }

    public function move(string $from, string $to) : bool
    {
        return move_uploaded_file($from, $to);
    }

    public static function extension(string $filename) : string
    {
        return pathinfo($filename, PATHINFO_EXTENSION);
    }
    public static function mimeType(string $filename) : string|false
    {
        return mime_content_type($filename);
    }

    public function setCoder(FileCoder $object)
    {
        $this->coder = $object;
    }

    // принимает закодированную строку и воврзащает PHP массив
    public function decode(string $content): array
    {
        return $this->coder->decode($content);
    }

    // принимает PHP массив и возвращает закодированную строку
    public function encode(array $data): string
    {
        return $this->coder->encode($data);
    }
}