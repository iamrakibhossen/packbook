<?php

class PBWB
{

    private $info = array();

    private $connection;

    private $table;

    private $select = '*';

    private $where;

    private $order;

    private $limit;

    public $table_prefix;

    public function __construct($host, $user, $password, $name)
    {
        global $table_prefix;

        $this->info = array('host' => $host, 'user' => $user, 'password' => $password, 'name' => $name);

       
        $this->table_prefix = $table_prefix;
    }

    private function connection()
    {

        if (!is_resource($this->connection) || empty($this->connection)) {

            $mysqli = new mysqli($this->info['host'], $this->info['user'], $this->info['password'], $this->info['name']);

            if ($mysqli->connect_errno) {

                die("Connection failed: " . $mysqli->connect_error);
            } else {

                $this->connection = $mysqli;

                $mysqli->set_charset('utf8mb4');
            }
        }

        return $this->connection;
    }

    public function escape_string($string = '')
    {

        $mysql = $this->connection();
        return mysqli_real_escape_string($mysql, $string);
    }

    public function table($table)
    {
        $this->table = $table;

        return $this;
    }

    public function select($select = '*')
    {

        if (is_array($select)) {
            $cols = '';
            foreach ($select as $col) {
                $cols .= "`{$col}`,";
            }
            $select = substr($cols, 0, -1);
        }

        $this->select = $select;

        return $this;
    }

    private function __where($info, $type = 'AND')
    {
        $mysql = $this->connection;
        $where = $this->where;
        foreach ($info as $row => $value) {
            if (empty($where)) {
                $where = sprintf("WHERE `%s`='%s'", $row, $this->escape_string($value));
            } else {
                $where .= sprintf(" %s `%s`='%s'", $type, $row, $this->escape_string($value));
            }
        }
        $this->where = $where;
    }

    public function where($field, $equal = null)
    {

        if (is_array($field)) {
            $this->__where($field);
        } else {
            $this->__where(array($field => $equal));
        }

        return $this;
    }

    public function and_where($field, $equal = null)
    {
        return $this->where($field, $equal);
    }

    public function or_where($field, $equal = null)
    {
        if (is_array($field)) {
            $this->__where($field, 'OR');
        } else {
            $this->__where(array($field => $equal), 'OR');
        }
        return $this;
    }

    public function limit($limit)
    {
        $this->limit = 'LIMIT ' . $limit;
        return $this;
    }

    public function orderby($by, $order_type = 'DESC')
    {

        $order = $this->order;

        if (is_array($by)) {

            foreach ($by as $field => $type) {
                if (is_int($field) && !preg_match('/(DESC|desc|ASC|asc)/', $type)) {
                    $field = $type;
                    $type = $order_type;
                }
                if (empty($order)) {
                    $order = sprintf("ORDER BY `%s` %s", $field, $type);
                } else {
                    $order .= sprintf(", `%s` %s", $field, $type);
                }
            }
        } else {

            if (empty($order)) {
                $order = sprintf("ORDER BY `%s` %s", $by, $order_type);
            } else {
                $order .= sprintf(", `%s` %s", $by, $order_type);
            }
        }
        $this->order = $order;
        return $this;
    }

    private function extra()
    {
        $extra = '';
        if (!empty($this->where)) $extra .= ' ' . $this->where;
        if (!empty($this->order)) $extra .= ' ' . $this->order;
        if (!empty($this->limit)) $extra .= ' ' . $this->limit;
        // cleanup
        $this->where = null;
        $this->order = null;
        $this->limit = null;
        return $extra;
    }


    public function query($query, $return = false)
    {

        $mysql = $this->connection();

        $result = mysqli_query($mysql, $query);

        if (is_resource($result)) {
            $result = mysqli_num_rows($result);
        }

        if ($return) {

            $data = array();

            if (!$result === false) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $data[] = $row;
                }
                mysqli_free_result($result);
            }

            return to_array($data);
        }

        return true;

        mysqli_close($mysql);
    }

    public function get($table = '')
    {

        if ($table == '') {
            $table = $this->table;
        }

        $table = $this->table_prefix . $table;

        $sql = $sql = sprintf("SELECT %s FROM %s%s", $this->select, $table, $this->extra());

        $mysql = $this->connection;

        $result = $mysql->query($sql);

        if ($result === false) {
            return array();
        }

        if ($result->num_rows > 0) {
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        } else {
            $data = array();
        }

        if (count($data) >= 1) {
            return to_array($data);
        }

        return array();
    }

    public function insert($table, $data)
    {

        $mysql = $this->connection();

        $fields = '';
        $values = '';

        foreach ($data as $col => $value) {
            $fields .= sprintf("`%s`,", $col);
            $values .= sprintf("'%s',", $this->escape_string($value));
        }

        $fields = substr($fields, 0, -1);
        $values = substr($values, 0, -1);

        $sql = sprintf("INSERT INTO %s (%s) VALUES (%s)", $table, $fields, $values);

        $result = mysqli_query($mysql, $sql);

        if ($result === TRUE) {

            return mysqli_insert_id($mysql);
        } else {

            return false;
        }

        mysqli_close($mysql);
    }

    public function update($table, $info)
    {
        if (empty($this->where)) {
            die("Where is not set. Can't update whole table.");
        } else {
            $mysql = $this->connection();
            $update = '';
            foreach ($info as $col => $value) {
                $update .= sprintf("`%s`='%s', ", $col, $this->escape_string($value));
            }
            $update = substr($update, 0, -2);
            $sql = sprintf("UPDATE %s SET %s%s", $table, $update, $this->extra());
            if (!$mysql->query($sql)) {
                //die('Error executing MySQL query: '.$sql.'. MySQL error '.$mysql->errno.': '.$mysql->error);
            } else {
                return true;
            }
        }
    }

    public function delete($table)
    {
        if (empty($this->where)) {
            die("Where is not set. Can't delete whole table.");
        } else {
            $mysql = $this->connection();
            $sql = sprintf("DELETE FROM %s%s", $table, $this->extra());

            if (!$mysql->query($sql)) {
                //die('Error executing MySQL query: '.$sql.'. MySQL error '.$mysql->errno.': '.$mysql->error);
            } else {
                return true;
            }
        }
    }

    public function __destruct()
    {

        $mysql = $this->connection();

        $close = mysqli_close($mysql);

        if ($close === false) {
            die("Could not close MySQL connection.");
        }

        return true;
    }
}

$pbdb = new PBWB(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
