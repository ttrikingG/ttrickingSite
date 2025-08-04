<?php

namespace app\models;

use app\classes\Bind;
use app\traits\Paginate;
use app\traits\PersistDb;

abstract class Model
{
  use PersistDb;
  use Paginate;

  protected $connection;
  protected $table;
  protected $fields = '*';

  public function __construct() {
    $this->connection = Bind::get('connection');
  }

  public function all()
  {
    $sql = "select * from {$this->table} ORDER BY  created_at desc";
    
    $list = $this->connection->prepare($sql);
    $list->execute();
    
    return $list->fetchAll();
  }

  public function find($field, $value)
  {
    $sql = "select * from {$this->table} where {$field} = :{$field}";
    $list = $this->connection->prepare($sql);
    $list->bindValue($field, $value);
    $list->execute();
    
    return $list->fetch();
  }

  public function findBy($field, $value)
  {
      $sql = "SELECT * FROM {$this->table} WHERE {$field} = :value AND hide = 1";
      $list = $this->connection->prepare($sql);
      $list->bindValue(':value', $value);
      $list->execute();
      
      return $list->fetchAll();
  }
  


  public function delete($field, $value)
  {
    $sql = "delete  from {$this->table} where {$field} = ?";
    $delete = $this->connection->prepare($sql);
    $delete->bindValue(1, $value);
    $delete->execute();

    return $delete->rowCount();
  }

  //other querys
}