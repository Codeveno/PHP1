<?php
// Dependency injection example using MovieRentalDB

class Database {
    private $host;
    private $user;
    private $password;
    private $dbname;

    public function __construct($host, $user, $password, $dbname) {
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->dbname = $dbname;
    }

    public function connect() {
        try {
            return new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->user, $this->password);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }
}

class User {
    private $db;

    public function getDbConnection() {
        return $this->db;
    }

    public function __construct(Database $db) {
        $this->db = $db->connect();
    }

    public function getUser($id) {
        $stmt = $this->db->prepare("SELECT * FROM User WHERE UserID = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

// Instantiate Database and User
$database = new Database('localhost', 'root', '430AMclub!', 'MovieRentalDB');
$user = new User($database);

// Now it's safe to call getDbConnection
$stmt = $user->getDbConnection()->query("SELECT * FROM User LIMIT 6");
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($users) {
    foreach ($users as $userData) {
        echo "User ID: " . $userData['UserID'] . "<br>";
        echo "First Name: " . $userData['FirstName'] . "<br>";
        echo "Last Name: " . $userData['LastName'] . "<br>";
        echo "Email: " . $userData['Email'] . "<br>";
        echo "Phone Number: " . $userData['PhoneNumber'] . "<br>";
        echo "<hr>";
    }
} else {
    echo "No users found.";
}
?>
