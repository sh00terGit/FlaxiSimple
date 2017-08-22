<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Engine\Core\Database;

/**
 * Description of Connection
 *
 * @author ivc_shipul
 */
use PDO;
/**
 * Description of DB
 *
 * @author ivc_shipul
 */
class Connection {
    
  protected $dbname;
  protected $user;
  protected $password;
  protected $host;
  protected $port;
  protected $charset;
  protected $connection;
  protected $statement;
  protected $queries = array();

  public function __construct($dbname, $user = 'root', $password = '', $host = 'localhost', $port = 3306, $charset = 'utf8') {
    $this->dbname = $dbname;
    $this->user = $user;
    $this->password = $password;
    $this->host = $host;
    $this->port = $port;
    $this->charset = $charset;
  }  

  public function connect() {
    if ($this->connection) {
      return;
    }
    $dsn = sprintf(
      'mysql:dbname=%s;host=%s;port=%d;charset=%s',
      $this->dbname,
      $this->host,
      $this->port,
      $this->charset
    );
    try {
      $this->connection = new PDO($dsn, $this->user, $this->password, array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
      ) );
    } catch (PDOException $e) {
      throw new RuntimeException($e->getMessage());
    }
  }

  public function disconnect() {
    $this->connection = null;
  }

  public function query($sql, $bind = array()) {
    // Подключаемся при первом запросе
    $this->connect();
    try {
      $t = -microtime(1);
      $this->statement = $this->connection->prepare($sql);
      $this->statement->execute($bind);
      $t += microtime(1);
      $this->queries[$sql] = $t;
      return $this;
    } catch (PDOException $e) {
      throw new RuntimeException($e->getMessage());
    }
  }

  function select($table,$conditions = array(),$columns = array() , $sort = array(), $limit = 0, $offset = 0) {
    $bind = array_values($conditions);
    $where = array();
    foreach (array_keys($conditions) as $column) {
      $where[] = $this->quoteIdentifier($column) . ' = ?';
    }
    $order_by = array();
    foreach ($sort as $column => $order) {
      $order = trim($order);
     
      $order = ($order === 'ASC') ?'ASC': 'DESC';     
      $order_by[] = sprintf('%s %s', $this->quoteIdentifier($column), $order);
    }
    $select = array();
    if(count($columns) != null) {        
        foreach (array_values($columns) as $selcolumn) {            
          $select[] = $this->quoteIdentifier($selcolumn);
        } 
            
    } else {    $select = '*';    }
    
    $sql = sprintf(
      'SELECT %s FROM %s%s%s%s;',
      ($select=='*') ? '*' :implode(', ', $select),      
      $this->quoteIdentifier($table),
      $where ? ' WHERE ' . implode(' AND ', $where) : '',
      $order_by ? ' ORDER BY ' . implode(', ', $order_by) : '',
      $limit ? sprintf(' LIMIT %d, %d', $offset, $limit) : ''
    );
    $this->query($sql, $bind);    
    return $this;
  }

  public function insert($table, $data) {
    $sql = sprintf(
      'INSERT INTO %s (%s) VALUES (%s);',
      $this->quoteIdentifier($table),
      implode(', ', array_map(array($this, 'quoteIdentifier'), array_keys($data))),
      substr(str_repeat('?, ', count($data)), 0, -2)
    );
    $this->query($sql, array_values($data));
    return $this->lastInsertId();
  }

  public function update($table, $data, $conditions) {
    $bind = array_values($data);
    $set = array();
    foreach (array_keys($data) as $column) {
      $set[] = $this->quoteIdentifier($column) . ' = ?';
    }
    $where = array();
    foreach ($conditions as $column => $value) {
      $where[] = $this->quoteIdentifier($column) . ' = ?';
      $bind[] = $value;
    }
    $sql = sprintf(
      'UPDATE %s SET %s WHERE %s;',
      $this->quoteIdentifier($table),
      implode(', ', $set),
      implode(' AND ', $where)
    );
    return $this->query($sql, $bind)->affectedRows();
  }

  public function delete($table, $conditions) {
    $bind = array_values($conditions);
    $where = array();
    foreach (array_keys($conditions) as $column) {
      $where[] = $this->quoteIdentifier($column) . ' = ?';
    }
    $sql = sprintf(
      'DELETE FROM %s WHERE %s;',
      $this->quoteIdentifier($table),
      implode(' AND ', $where)
    );
    return $this->query($sql, $bind)->affectedRows();
  }

  public function fetch() {
    try {
      return $this->statement->fetch();
    } catch (PDOException $e) {
      throw new RuntimeException($e->getMessage());
    }
  }

  public function fetchOne() {
    try {     
      return $this->statement->fetchColumn();
    } catch (PDOException $e) {
      throw new RuntimeException($e->getMessage());
    }
  }

  public function fetchAll() {
    try {
      return $this->statement->fetchAll();
    } catch (PDOException $e) {
      throw new RuntimeException($e->getMessage());
    }
  }

  public function affectedRows() {
    try {
      return $this->statement->rowCount();
     } catch (PDOException $e) {
      throw new RuntimeException($e->getMessage());
    }
  }

  public function lastInsertId() {
    try {
      return $this->connection->lastInsertId();
    } catch (PDOException $e) {
      throw new RuntimeException($e->getMessage());
    }
  }

  public function beginTransaction() {
    try {
      return $this->connection->beginTransaction();
    } catch (PDOException $e) {
      throw new RuntimeException($e->getMessage());
    }
  }

  public function commit() {
    try {
      return $this->connection->commit();
    } catch (PDOException $e) {
      throw new RuntimeException($e->getMessage());
    }
  }

  public function rollBack() {
    try {
      return $this->connection->rollBack();
    } catch (PDOException $e) {
      throw new RuntimeException($e->getMessage());
    }
  }

  public function quoteIdentifier($name) {
    return '`' . str_replace('`', '``', $name) . '`';
  }

  public function getQueries() {
    return $this->queries;
  }

  public function __destruct() {
    $this->disconnect();
  }
}