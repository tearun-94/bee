<?php


namespace App;


class Helper
{
    public static function sort($col) {

        $order = $_GET['order'];
        if (!empty($order)) {
            if ($col == $order || $col == substr($order, 1))
                $order = $order[0] == '-' ? substr($order, 1) : '-' . $col;
            else
                $order = $col;
        }
        else
            $order = $col;

        return $order;
    }
}