<?php

if ($logged_in) {
    $email = $this->session->userdata('email');
    $admin_type = $this->session->userdata('admin_type');
    $name = $this->session->userdata('name');

} else {

}
?>


<?php

if (isset($email)) {
    if ($admin_type === "document_verifier") {

        $this->load->view('admin/template/header');
        $this->load->view('admin/documents');
//        echo $admin_type;

    } elseif ($admin_type === "bank_verifier") {

        $this->load->view('admin/template/header');
        $this->load->view('admin/bank');
    }elseif ($admin_type === "bank_verifier2") {

        $this->load->view('admin/template/header');
        $this->load->view('admin/bank_final');
    }
}
?>
