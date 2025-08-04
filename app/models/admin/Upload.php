<?php

namespace app\models\admin;

use app\models\Model;

class Upload extends Model
{
    protected $table = 'uploads';

    public function findByForeignKey($key, $value)
    {
        $allowedKeys = ['product_id', 'post_id',]; // adicione aqui as colunas válidas
        if (!in_array($key, $allowedKeys)) {
            throw new \InvalidArgumentException("Chave de busca inválida: $key");
        }

        $sql = "SELECT * FROM {$this->table} WHERE {$key} = :value";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute(['value' => $value]);
        return $stmt->fetch();
    }

    public $session = 'user_logged';
    public $user_id = 'user_id';
}
