<?php

class Database {
  private string $host;
  private string $user;
  private string $password;
  private string $database;

  public function __construct(string $host, string $user, string $password, string $database) {
    $this->host = $host;
    $this->user = $user;
    $this->password = $password;
    $this->database = $database;
  }

  public function connect() {
    try {
      $dsn = "mysql:host=$this->host;dbname=$this->database;charset=utf8mb4";
      $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      ];
      return new PDO($dsn, $this->user, $this->password, $options);
    } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
      exit();
    }
  }
}