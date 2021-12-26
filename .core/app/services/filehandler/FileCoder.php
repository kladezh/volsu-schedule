<?php

abstract class FileCoder
{
    abstract public function decode(string $content): array;
    abstract public function encode(array $data): string;
}

class JsonFileCoder extends FileCoder
{
    public function decode(string $content): array
    {
        return json_decode($content, true);
    }

    public function encode(array $data): string
    {
        return json_encode($data);
    }
}