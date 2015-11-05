<?php

/**
 * @author Evin Weissenberg
 */

class Query {

    public $query;
    public $data;
    public $error;

    /**
     * @param $query
     * @return Query
     */
    function setQuery($query) {

        $this->query = (string)$query;

        return $this;
    }

    /**
     * @param $property
     * @return mixed
     */
    function __get($property) {

        return $this->$property;

    }

    /**
     * @return bool|object|stdClass
     */
    function run() {

        if ($result = E::$connection->query($this->query)) {

            $this->data = $result->fetch_object();

            /* free result set */
            $result->close();

        } else {

            $this->error = E::$connection->error;
            return False;

        }

        return $this->data;

    }

    /**
     * @return bool
     */
    function execute() {

        if ($result = E::$connection->query($this->query)) {

            $this->data = $result->fetch_object();

            /* free result set */
            $result->close();

        } else {

            $this->error = E::$connection->error;
            return False;

        }

        return True;

    }
}