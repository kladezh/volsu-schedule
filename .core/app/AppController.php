<?php

class AppController
{
    private function __construct()
    {
    }

    public static function run()
    {
        // получить спарсенный запрос
        $request = HttpRequest::getInstance();

        // определить нужный контроллер
        $controller = self::getPageController($request->getController());
        $controller->setParameters($request->getParameters());

        // вызвать главный метод контроллера
        $controller->process();
    }

    private static function getPageController(string $name) : PageController
    {
        $controller = ucfirst($name) . ucfirst('page') . ucfirst('controller');
        return new $controller();
    }
}