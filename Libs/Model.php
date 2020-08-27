<?php
/**
 * Created by PhpStorm.
 * User: InkedCake
 * Date: 18.08.2020
 * Time: 23:14
 */

class Model
{
    public function __construct() {
        $this->db = new Database();
    }
}