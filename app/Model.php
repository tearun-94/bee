<?php
namespace App;
class Model {

    public $connect;

    public function __construct()
    {
        $this->connect = new \mysqli("localhost", "root", "", "mvc");
    }

    function get($data) {
        while ($row = $data->fetch_assoc())
            $result[] = (object)$row;
        return $result;
    }

    function table() {
        return array_pop(explode(DIRECTORY_SEPARATOR,get_class($this)));
    }

    public function all($where = null, $limit = null, $offset = null, $order = null) {

        if (!empty($limit))
            $limit = " limit $limit ";
        if (!empty($order))
            $order = " order by ". ($order[0] == '-' ? substr($order, 1).' desc' : $order.' asc').", id asc" ;
        if (!empty($offset))
            $offset = " offset $offset ";
        if (!empty($where))
            $where = " where $where ";

        return $this->get($this->connect->query("SELECT * from ".$this->table().$where.$order.$limit.$offset));
    }

    public function count () {
        return ((array)$this->get(($this->connect->query("SELECT COUNT(*) from ".$this->table())))[0])['COUNT(*)'];
    }

    public function insert() {
        $columns = "";
        $data = "";

        $colNames= get_class_vars(get_class($this));
        array_pop($colNames);

        foreach ($colNames as $col => $val):
            $columns .= ", $col";
            $data .= ", '". $this->$col."'";
        endforeach;

        $columns = substr($columns, 1);
        $data = substr($data, 1);

        return $this->connect->query("insert into ".$this->table()." ($columns) values ($data)");
    }

    public function update($where = null) {

        if (!empty($where))
            $where = " where $where ";

        $data = "";

        $colNames= get_class_vars(get_class($this));
        array_pop($colNames);

        foreach ($colNames as $col => $val):
                $data .= ", $col = '" . $this->$col . "'";

        endforeach;

        $data = substr($data, 1);
        
       return $this->connect->query("update ".$this->table()." set $data $where");
    }

}
