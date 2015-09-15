<?php

$query = $this->subscribe_model->get_imp();

        foreach ($query as $row) {

            echo $row['email'].' - '.$row['password'].' - '.$row['custid'].'<br/>';
        }

?>