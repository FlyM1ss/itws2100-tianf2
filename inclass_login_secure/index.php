<?php
session_start();

$host = 'localhost';
$db   = 'login';
$user = 'root';
$pass = 'TeamSixteen16';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
  PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
  PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
  $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
  throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $username = $_POST['username'];
  $password = $_POST['password']; //shuld be hashed

  $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
  $stmt->execute([$username, $password]);
  $user = $stmt->fetch();

  if ($user) {
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    header("Location: login.php");
    exit;
  } else {
    echo "Incorrect login info.";
  }
}

if (isset($_SESSION['username'])) {
  echo "Welcome " . htmlspecialchars($_SESSION['username']) . "! Your user ID is: " . htmlspecialchars($_SESSION['user_id']);
  echo "<form method='post' action='logout.php'><button type='submit'>Logout</button></form>";
} else {
  echo "<form method='post' action='index.php'>
            Username: <input type='text' name='username'>
            Password: <input type='password' name='password'>
            <button type='submit'>Login</button>
          </form>";
}

