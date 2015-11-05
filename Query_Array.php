<?php
/**
 * @author Evin Weissenberg
 */

class Query_Array {

    public  $query;
    public $data;

    function setQuery($query) {

        $this->query = $query;
        return $this;

    }

    function __get($property) {

        return $this->$property;

    }

    function run() {

        $result = E::$connection->query($this->query);
        $this->data = $result->fetch_assoc();
        return $this->data;
    }
}
//$q = new Query_Array();
//$q->setQuery('This is the query')->run();