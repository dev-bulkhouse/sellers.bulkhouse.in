<?php
$result = $this->model_test->select_data();
$qup = $result->result_array();
foreach ($qup as $row){
echo $row['name']."<br/>";
}
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

