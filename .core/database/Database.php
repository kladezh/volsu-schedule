<?php

class Database
{
    private static $instance = null;

    private $service;

    private function __construct()
    {
        $this->init();
    }

    public static function getInstance(): self
    {
        if (self::$instance == null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    private function init()
    {
        $config = Config::getInstance();

        // определяем сервис
        $service = $this->resolveService($config->get('app')['database']);
        $this->service = new $service;

        // читаем конфиги сервиса
        $db_config = $config->get('database');
        $this->service->init($db_config);
    }

    private function resolveService(string $name): string
    {
        return ucfirst(trim($name)) . 'Service';
    }

    public function getDatabase(): mixed
    {
        return $this->service->getDatabase();
    }
}

interface DatabaseService
{
    public function init(array $config);
    public function getDatabase(): mixed;
}

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class FirebaseService implements DatabaseService
{
    private Factory $factory;

    public function init(array $config)
    {
        $this->factory = (new Factory)->withServiceAccount(ServiceAccount::fromValue($config));
    }

    public function getDatabase(): \Kreait\Firebase\Contract\Database
    {
        return $this->factory->createDatabase();;
    }
}

class PDOService implements DatabaseService
{
    private PDO $pdo;

    public function init(array $config)
    {
        // хардкод драйвера MySQL
        $this->pdo = new PDO(
            "mysql:dbname={$config['name']};host={$config['host']}",
            $config['user'],
            $config['password'],
            [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::MYSQL_ATTR_LOCAL_INFILE => true
            ]
        );
    }

    public function getDatabase(): PDO
    {
        return $this->pdo;
    }
}
