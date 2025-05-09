
<?php

//containers with/without reflection api autoring
// containers with reflection api autoring

class Container
{
    private $services = [];

    public function set($name, $service)
    {
        $this->services[$name] = $service;
    }

    public function get($name)
    {
        if (!isset($this->services[$name])) {
            throw new Exception("Service not found: " . $name);
        }
        return $this->services[$name];
    }
}

class Database
{
    private $host;
    private $user;
    private $password;
    private $dbname;

    public function __construct($host, $user, $password, $dbname)
    {
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->dbname = $dbname;
    }

    public function connect()
    {
        try {
            return new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->user, $this->password);
        } catch (PDOException $e) {
            throw new Exception("Connection failed: " . $e->getMessage());
        }
    }
}

class User
{
    private $db;

    public function __construct(Database $db)
    {
        $this->db = $db->connect();
    }

    public function getUser($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM `User` WHERE `UserID` = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

// Instantiate Container
$container = new Container();

// Register services
$container->set('database', new Database('localhost', 'root', '430AMclub!', 'MovieRentalDB'));

// Register User service
$container->set('user', new User($container->get('database')));

// Example usage
$user = $container->get('user');
print_r($user->getUser(1));





