<?php
declare(strict_types = 1);

class DbTable extends DataBase {

    /**
     * Добавляет строку в таблицу.
     * $data = ['колонка' => значение, ...]
     * @return string id вставленной строки
     */
    public function insertRow (string $table, array $data):string {
        $columns = array_keys($data);
        $this->checkIdentifier($table);
        array_map([$this, 'checkIdentifier'], $columns);

        $sql = "INSERT INTO `$table` (`".implode('`, `', $columns)."`)
                VALUES (:".implode(', :', $columns).")";
        $prep = $this->prepare($sql);
        foreach ($data as $column => $value) {
            $prep->bindValue(':'.$column, $value);
        }
        $prep->execute();
        return $this->lastInsertId();
    }

    /**
     * Обновляет строки таблицы.
     * $data — новые значения, $where = ['колонка' => значение] (условия через AND)
     * @return int количество изменённых строк
     */
    public function updateRows (string $table, array $data, array $where):int {
        $this->checkIdentifier($table);
        array_map([$this, 'checkIdentifier'], array_keys($data));
        array_map([$this, 'checkIdentifier'], array_keys($where));

        $set = [];
        foreach (array_keys($data) as $column) {
            $set[] = "`$column` = :set_$column";
        }
        $sql = "UPDATE `$table` SET ".implode(', ', $set).$this->buildWhere($where);
        $prep = $this->prepare($sql);
        foreach ($data as $column => $value) {
            $prep->bindValue(':set_'.$column, $value);
        }
        $this->bindWhere($prep, $where);
        $prep->execute();
        return $prep->rowCount();
    }

    /**
     * Удаляет строки таблицы по условию $where (через AND).
     * @return int количество удалённых строк
     */
    public function deleteRows (string $table, array $where):int {
        $this->checkIdentifier($table);
        array_map([$this, 'checkIdentifier'], array_keys($where));

        $sql = "DELETE FROM `$table`".$this->buildWhere($where);
        $prep = $this->prepare($sql);
        $this->bindWhere($prep, $where);
        $prep->execute();
        return $prep->rowCount();
    }

    /**
     * Выбирает строки таблицы. $where пустой — вся таблица.
     * @return array массив строк (ассоциативные массивы)
     */
    public function selectRows (string $table, array $where = []):array {
        $this->checkIdentifier($table);
        array_map([$this, 'checkIdentifier'], array_keys($where));

        $sql = "SELECT * FROM `$table`".$this->buildWhere($where);
        $prep = $this->prepare($sql);
        $this->bindWhere($prep, $where);
        $prep->execute();
        return $prep->fetchAll();
    }

    private function buildWhere (array $where):string {
        if ($where === []) {
            return '';
        }
        $conditions = [];
        foreach (array_keys($where) as $column) {
            $conditions[] = "`$column` = :w_$column";
        }
        return ' WHERE '.implode(' AND ', $conditions);
    }

    private function bindWhere (PDOStatement $prep, array $where):void {
        foreach ($where as $column => $value) {
            $prep->bindValue(':w_'.$column, $value);
        }
    }

    /** Разрешает в именах таблиц/колонок только буквы, цифры и _ (защита от инъекций). */
    private function checkIdentifier (string $name):void {
        if (!preg_match('/^[A-Za-z0-9_]+$/', $name)) {
            throw new InvalidArgumentException("недопустимое имя таблицы или колонки: $name");
        }
    }
}
