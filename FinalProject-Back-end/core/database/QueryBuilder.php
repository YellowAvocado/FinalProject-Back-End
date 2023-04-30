<?php

class QueryBuilder
{
    protected $pdo;

    function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function selectAll($table)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM $table");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function selectOne($table,$id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM $table WHERE id = $id");
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function selectOneByField($table,$params)
    {
        $str = "";

        foreach($params as $key=>$param){
            $str = $str . "$key = '$param' AND ";
        }

        $str = trim($str,' AND');

        $stmt = $this->pdo->prepare("SELECT * FROM $table WHERE $str");
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function insert($table,$parameters)
    {
        $sql = sprintf(
            'INSERT INTO %s (%s) VALUES (%s)',
            $table,
            implode(', ',array_keys($parameters)),
            ":" . implode(', :',array_keys($parameters))
        );

        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute($parameters);
        } catch(Exception $e){
            echo $e;
        }
    }

    public function update($table,$data)
    {
       $id = $data['id'];
       unset($data['id']);

       $preparedParams = array_map(function($key){
            return $key . "=:" . $key;
        },array_keys($data));

       $sql = sprintf(
           "UPDATE %s SET %s WHERE id = %s",
            $table,
           implode(', ',$preparedParams),
           $id
       );

       try {
            $statement = $this->pdo->prepare($sql);
            return $statement->execute($data);
       } catch(Exception $e){
            echo $e;
       }
    }

    public function delete($table,$id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM $table WHERE id = $id");
        return $stmt->execute();
    }

    /*public function leftJoin($table1,$table2, $field1,$field2)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM {$table1} LEFT JOIN {$table2} ON {$field1} = {$field2}");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }*/
}