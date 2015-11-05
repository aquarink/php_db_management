<?php
/**
 * @author Evin Weissenberg
 * @todo: Add usage example.
 */
class Insert {

    private $table;
    private $key = array();
    private $value = array();
    private $query;

    //private $exception_message = 'Insert failed.';


    /**
     * @param $table
     * @return Insert
     */
    function setTable($table) {

        $this->table = (string)$table;
        return $this;

    }

    /**
     * @param $key
     * @return Insert
     */
    function setKey($key) {

        $this->key = (array)$key;
        return $this;

    }

    /**
     * @param $value
     * @return Insert
     */
    function setValue($value) {

        $this->value = (array)$value;
        return $this;

    }

//    public function setExceptionMessage($exception_message) {
//
//        $this->exception_message = (string)$exception_message;
//        return $this;
//
//    }


    /**
     * @param $property
     * @return mixed
     */
    function __get($property) {

        return $this->$property;

    }

    /**
     * @return bool
     */
    function insert() {

        $key_explode = implode(',', $this->key);
        $value_explode = implode(',', $this->value);
        $this->query = "INSERT INTO $this->table ($key_explode) VALUES ($value_explode)";
        mysql_query($this->query) or mysql_error();
        return true;
    }
}