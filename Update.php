<?php

/**
 * @author Evin Weissenberg
 */
class Update {

    private $table;
    private $key;
    private $new_value;
    private $old_value;
    private $exception_message = 'Update failed.';
    private $filter;
    private $filter_value;

    /**
     * @param $table
     * @return Update
     */
    function setTable($table) {

        $this->table = (string)$table;
        return $this;

    }

    /**
     * @param $key
     * @return Update
     */
    function setKey($key) {

        $this->key = (string)$key;
        return $this;

    }

    /**
     * @param $new_value
     * @return Update
     */
    function setNewValue($new_value) {

        $this->new_value = (string)$new_value;
        return $this;

    }

    /**
     * @param $old_value
     * @return Update
     */
    function setOldValue($old_value) {

        $this->old_value = (string)$old_value;
        return $this;

    }

    /**
     * @param $filter
     * @return Update
     */
    function setFilter($filter) {

        $this->filter = (string)$filter;
        return $this;

    }

    /**
     * @param $filter_value
     * @return Update
     */
    function setFilterValue($filter_value) {

        $this->filter_value = (string)$filter_value;
        return $this;

    }

    /**
     * @param $exception_message
     * @return Update
     */
    public function setExceptionMessage($exception_message) {

        $this->exception_message = (string)$exception_message;
        return $this;

    }

    function __get($property) {

        return $this->$property;

    }

    /**
     * @return bool
     * @throws Exception
     */
    function updateAll() {

        try {

            $update = E::$connection->query("UPDATE $this->table SET $this->key='$this->new_value' WHERE $this->key='$this->old_value'");

            if ($update <> 1) {

                throw new Exception($this->exception_message);

            } else {

                return true;

            }


        } catch (Exception $e) {

            echo $e->getMessage();

        }
        return true;
    }

    /**
     * @return bool
     * @throws Exception
     */
    function updateOne() {

        try {
            $update = E::$connection->query("UPDATE $this->table SET $this->key='$this->new_value' WHERE $this->filter='$this->filter_value'");

            if ($update <> 1) {

                throw new Exception($this->exception_message);

            } else {

                return true;

            }

        } catch (Exception $e) {

            echo $e->getMessage();

        }

        return true;
    }
}