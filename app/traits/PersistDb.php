<?php

namespace app\traits;

use app\models\querybuilder\Insert;
use app\models\querybuilder\Update;

trait PersistDb
{
    public function insert($attributes)
    {
        $attributes = (array) $attributes;

        $sql = Insert::sql($this->table, $attributes);

        $insert = $this->connection->prepare($sql);

        if ($insert->execute($attributes)) {
            // Retorna o ID do último registro inserido
            return $this->connection->lastInsertId();
        }

        return false;
    }

    public function update($attributes, $where)
    {
        $attributes = (array) $attributes;

        $sql = (new Update)->where($where)->sql($this->table, $attributes);

        $update = $this->connection->prepare($sql);

        $update->execute($attributes);

        return $update->rowCount(); 
    }
}
