<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Upload_new extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('file_model', 'file');
        $this->load->model('register_model');
        $this->load->model('vendor_update');
    }

    public function index() {
        $this->load->view('main', array('error' => ''));

    }

    public function convert($b){
        $type = explode('/',$b);
                    if ($type[1] == 'jpeg') {
                        $type[1] = 'jpg';
                    }
                        elseif($type[1] == 'jpg')
                          {
                    $type[1] = 'jpg';

                             }
                    else {
                          $type[1] = 'pdf';
                  }

                  return $type[1];
    }

    public function insert_and_upload($a) {

        if ($a == "pan_prop") {
            if (is_array($_FILES)) {
                $file = "upload_file1";
                $file_type = $_FILES[$file]['type'];
                if(($file_type != "application/pdf") && ($file_type != "image/jpeg") && ($file_type != "image/jpg"))
                    {
                    $message = 'Invalid file type. Only PDF, JPG and JPEG types are accepted.';
                      echo '<script type="text/javascript">alert("'.$message.'");</script>';
                    }
                 else
                 {
                if (is_uploaded_file($_FILES[$file]['tmp_name'])) {
                    $sourcePath = $_FILES[$file]['tmp_name'];
                    $email = $this->input->post('email');
                    $document_info = $this->input->post('pan');
                    $comp_id = $this->register_model->get_compid($email);
                    $dir = "files/" . $comp_id;
                    $temp_filename = explode(".", $_FILES[$file]['name']);
                     $final_type = $this->convert($file_type);
                    $newfilename = 'pan_card' . '.' . $final_type;
                    $targetPath = $dir . "/" . $newfilename;
                    $data = $a;
                    echo $this->vendor_update->add_document($document_info,$file_type, $sourcePath, $targetPath, $dir, $comp_id, $data);
                }
            }
        }
        } elseif ($a == "vat_cst") {
            if (is_array($_FILES)) {
                $file = "upload_file2";
                $file_type = $_FILES[$file]['type'];

                if(($file_type != "application/pdf") && ($file_type != "image/jpeg") && ($file_type != "image/jpg"))
                    {
                    $message = 'Invalid file type. Only PDF, JPG and JPEG types are accepted.';
                      echo '<script type="text/javascript">alert("'.$message.'");</script>';
                    }
                 else
                 {
                if (is_uploaded_file($_FILES[$file]['tmp_name'])) {
                    $sourcePath = $_FILES[$file]['tmp_name'];
                    $email = $this->input->post('email');
                    $document_info = $this->input->post('vat_cst');
                    $comp_id = $this->register_model->get_compid($email);
                    $dir = "files/" . $comp_id;
                    $temp_filename = explode(".", $_FILES[$file]['name']);
                    $final_type = $this->convert($file_type);
                    $newfilename = 'vat' . '.'.$final_type;
                    $targetPath = $dir . "/" . $newfilename;
                    $data = $a;
                    echo $this->vendor_update->add_document($document_info,$file_type, $sourcePath, $targetPath, $dir, $comp_id, $data);
                }
            }
        }
        }elseif ($a == "cst") {
            if (is_array($_FILES)) {
                $file = "upload_file8";
                $file_type = $_FILES[$file]['type'];

                if(($file_type != "application/pdf") && ($file_type != "image/jpeg") && ($file_type != "image/jpg"))
                    {
                    $message = 'Invalid file type. Only PDF, JPG and JPEG types are accepted.';
                      echo '<script type="text/javascript">alert("'.$message.'");</script>';
                    }
                 else
                 {
                if (is_uploaded_file($_FILES[$file]['tmp_name'])) {
                    $sourcePath = $_FILES[$file]['tmp_name'];
                    $email = $this->input->post('email');
                    $document_info = $this->input->post('cst');
                    $comp_id = $this->register_model->get_compid($email);
                    $dir = "files/" . $comp_id;
                    $temp_filename = explode(".", $_FILES[$file]['name']);
                    $final_type = $this->convert($file_type);
                    $newfilename = 'cst' . '.'.$final_type;
                    $targetPath = $dir . "/" . $newfilename;
                    $data = $a;
                    echo $this->vendor_update->add_document($document_info,$file_type, $sourcePath, $targetPath, $dir, $comp_id, $data);
                }
            }
        }
        } elseif ($a == "pan_comp") {
            if (is_array($_FILES)) {
                $file = "upload_file3";
                $file_type = $_FILES[$file]['type'];
                if(($file_type != "application/pdf") && ($file_type != "image/jpeg") && ($file_type != "image/jpg"))
                    {
                    $message = 'Invalid file type. Only PDF, JPG and JPEG types are accepted.';
                      echo '<script type="text/javascript">alert("'.$message.'");</script>';
                    }
                 else
                 {
                if (is_uploaded_file($_FILES[$file]['tmp_name'])) {
                    $sourcePath = $_FILES[$file]['tmp_name'];
                    $email = $this->input->post('email');
                    $document_info = $this->input->post('pan_comp');
                    $comp_id = $this->register_model->get_compid($email);
                    $dir = "files/" . $comp_id;
                    $temp_filename = explode(".", $_FILES[$file]['name']);
                    $final_type = $this->convert($file_type);
                    $newfilename = 'pan_company' . '.' . $final_type;
                    $targetPath = $dir . "/" . $newfilename;
                    $data = $a;
                    echo $this->vendor_update->add_document($document_info,$file_type, $sourcePath, $targetPath, $dir, $comp_id, $data);
                }
            }
            }
        } elseif ($a == "part_deed") {

            if (is_array($_FILES)) {
                $file = "upload_file4";
                $file_type = $_FILES[$file]['type'];

                if(($file_type != "application/pdf") && ($file_type != "image/jpeg") && ($file_type != "image/jpg"))
                    {
                    $message = 'Invalid file type. Only PDF, JPG and JPEG types are accepted.';
                      echo '<script type="text/javascript">alert("'.$message.'");</script>';
                    }
                 else
                 {
                if (is_uploaded_file($_FILES[$file]['tmp_name'])) {
                    $sourcePath = $_FILES[$file]['tmp_name'];
                    $email = $this->input->post('email');
                    $document_info = "No Need";
                    $comp_id = $this->register_model->get_compid($email);
                    $dir = "files/" . $comp_id;
                    $temp_filename = explode(".", $_FILES[$file]['name']);
                     $final_type = $this->convert($file_type);
                    $newfilename = 'partnership_deed' . '.' . $final_type;
                    $targetPath = $dir . "/" . $newfilename;
                    $data = $a;
                    echo $this->vendor_update->add_document($document_info,$file_type, $sourcePath, $targetPath, $dir, $comp_id, $data);
                }
               }
            }
    } elseif ($a == "sign") {
        if (is_array($_FILES)) {
               $file = "upload_file5";
                $file_type = $_FILES[$file]['type'];
                if(($file_type != "application/pdf") && ($file_type != "image/jpeg") && ($file_type != "image/jpg"))
                    {
                    $message = 'Invalid file type. Only PDF, JPG and JPEG types are accepted.';
                      echo '<script type="text/javascript">alert("'.$message.'");</script>';
                    }
                 else
                 {
                if (is_uploaded_file($_FILES[$file]['tmp_name'])) {
                    $sourcePath = $_FILES[$file]['tmp_name'];
                    $email = $this->input->post('email');
                    $document_info = "No Need";
                    $comp_id = $this->register_model->get_compid($email);
                    $dir = "files/" . $comp_id;
                    $temp_filename = explode(".", $_FILES[$file]['name']);
                    $final_type = $this->convert($file_type);
                    $newfilename = 'authorised_sign' . '.' . $final_type;
                    $targetPath = $dir . "/" . $newfilename;
                    $data = $a;
                    echo $this->vendor_update->add_document($document_info,$file_type, $sourcePath, $targetPath, $dir, $comp_id, $data);
                }
            }
        }

    } elseif ($a == "cert_of_incorp") {
         if (is_array($_FILES)) {
                $file = "upload_file6";
                $file_type = $_FILES[$file]['type'];
                if(($file_type != "application/pdf") && ($file_type != "image/jpeg") && ($file_type != "image/jpg"))
                    {
                    $message = 'Invalid file type. Only PDF, JPG and JPEG types are accepted.';
                      echo '<script type="text/javascript">alert("'.$message.'");</script>';
                    }
                 else
                 {
                 if(is_uploaded_file($_FILES[$file]['tmp_name'])) {
                    $sourcePath = $_FILES[$file]['tmp_name'];
                    $email = $this->input->post('email');
                    $document_info = "No Need";
                    $comp_id = $this->register_model->get_compid($email);
                    $dir = "files/" . $comp_id;
                    $temp_filename = explode(".", $_FILES[$file]['name']);
                    $final_type = $this->convert($file_type);
                    $newfilename = 'certification_of_incorporation' . '.' . $final_type;
                    $targetPath = $dir . "/" . $newfilename;
                    $data = $a;
                    echo $this->vendor_update->add_document($document_info,$file_type, $sourcePath, $targetPath, $dir, $comp_id, $data);
                }
                }

            }
    } elseif ($a == "moa_aoa") {
        if (is_array($_FILES)) {
                $file = "upload_file7";
                $file_type = $_FILES[$file]['type'];
                if(($file_type != "application/pdf") && ($file_type != "image/jpeg") && ($file_type != "image/jpg"))
                    {
                    $message = 'Invalid file type. Only PDF, JPG and JPEG types are accepted.';
                      echo '<script type="text/javascript">alert("'.$message.'");</script>';
                    }
                 else
                 {
                 if (is_uploaded_file($_FILES[$file]['tmp_name'])) {
                    $sourcePath = $_FILES[$file]['tmp_name'];
                    $email = $this->input->post('email');
                    $document_info = "No Need";
                    $comp_id = $this->register_model->get_compid($email);
                    $dir = "files/" . $comp_id;
                    $temp_filename = explode(".", $_FILES[$file]['name']);
                    $final_type = $this->convert($file_type);
                    $newfilename = 'MOA' . '.' . $final_type;
                    $targetPath = $dir . "/" . $newfilename;
                    $data = $a;
                    echo $this->vendor_update->add_document($document_info, $file_type, $sourcePath, $targetPath, $dir, $comp_id, $data);
                }
            }
        }

    }elseif ($a == "aoa") {
        if (is_array($_FILES)) {
                $file = "upload_file9";
                $file_type = $_FILES[$file]['type'];
                if(($file_type != "application/pdf") && ($file_type != "image/jpeg") && ($file_type != "image/jpg"))
                    {
                    $message = 'Invalid file type. Only PDF, JPG and JPEG types are accepted.';
                      echo '<script type="text/javascript">alert("'.$message.'");</script>';
                    }
                 else
                 {
                 if (is_uploaded_file($_FILES[$file]['tmp_name'])) {
                    $sourcePath = $_FILES[$file]['tmp_name'];
                    $email = $this->input->post('email');
                    $document_info = "No Need";
                    $comp_id = $this->register_model->get_compid($email);
                    $dir = "files/" . $comp_id;
                    $temp_filename = explode(".", $_FILES[$file]['name']);
                    $final_type = $this->convert($file_type);
                    $newfilename = 'AOA' . '.' . $final_type;
                    $targetPath = $dir . "/" . $newfilename;
                    $data = $a;
                    echo $this->vendor_update->add_document($document_info, $file_type, $sourcePath, $targetPath, $dir, $comp_id, $data);
                }
            }
        }

    }elseif ($a == "shop_establish_trade") {
        if (is_array($_FILES)) {
                $file = "upload_file10";
                $file_type = $_FILES[$file]['type'];
                if(($file_type != "application/pdf") && ($file_type != "image/jpeg") && ($file_type != "image/jpg"))
                    {
                    $message = 'Invalid file type. Only PDF, JPG and JPEG types are accepted.';
                      echo '<script type="text/javascript">alert("'.$message.'");</script>';
                    }
                 else
                 {
                 if (is_uploaded_file($_FILES[$file]['tmp_name'])) {
                    $sourcePath = $_FILES[$file]['tmp_name'];
                    $email = $this->input->post('email');
                    $document_info = "No Need";
                    $comp_id = $this->register_model->get_compid($email);
                    $dir = "files/" . $comp_id;
                    $temp_filename = explode(".", $_FILES[$file]['name']);
                    $final_type = $this->convert($file_type);
                    $newfilename = 'shop_establish_trade' . '.' . $final_type;
                    $targetPath = $dir . "/" . $newfilename;
                    $data = $a;
                    echo $this->vendor_update->add_document($document_info, $file_type, $sourcePath, $targetPath, $dir, $comp_id, $data);
                }
            }
        }

    }elseif ($a == "cenvat") {
        if (is_array($_FILES)) {
                $file = "upload_file11";
                $file_type = $_FILES[$file]['type'];
                if(($file_type != "application/pdf") && ($file_type != "image/jpeg") && ($file_type != "image/jpg"))
                    {
                    $message = 'Invalid file type. Only PDF, JPG and JPEG types are accepted.';
                      echo '<script type="text/javascript">alert("'.$message.'");</script>';
                    }
                 else
                 {
                 if (is_uploaded_file($_FILES[$file]['tmp_name'])) {
                    $sourcePath = $_FILES[$file]['tmp_name'];
                    $email = $this->input->post('email');
                    $document_info = $this->input->post('cenvat');
                    $comp_id = $this->register_model->get_compid($email);
                    $dir = "files/" . $comp_id;
                    $temp_filename = explode(".", $_FILES[$file]['name']);
                    $final_type = $this->convert($file_type);
                    $newfilename = 'cenvat' . '.' . $final_type;
                    $targetPath = $dir . "/" . $newfilename;
                    $data = $a;
                    echo $this->vendor_update->add_document($document_info, $file_type, $sourcePath, $targetPath, $dir, $comp_id, $data);
                }
            }
        }

    }elseif ($a == "servicetax") {
        if (is_array($_FILES)) {
                $file = "upload_file12";
                $file_type = $_FILES[$file]['type'];
                if(($file_type != "application/pdf") && ($file_type != "image/jpeg") && ($file_type != "image/jpg"))
                    {
                    $message = 'Invalid file type. Only PDF, JPG and JPEG types are accepted.';
                      echo '<script type="text/javascript">alert("'.$message.'");</script>';
                    }
                 else
                 {
                 if (is_uploaded_file($_FILES[$file]['tmp_name'])) {
                    $sourcePath = $_FILES[$file]['tmp_name'];
                    $email = $this->input->post('email');
                    $document_info = $this->input->post('servicetax');
                    $comp_id = $this->register_model->get_compid($email);
                    $dir = "files/" . $comp_id;
                    $temp_filename = explode(".", $_FILES[$file]['name']);
                    $final_type = $this->convert($file_type);
                    $newfilename = 'servicetax' . '.' . $final_type;
                    $targetPath = $dir . "/" . $newfilename;
                    $data = $a;
                    echo $this->vendor_update->add_document($document_info, $file_type, $sourcePath, $targetPath, $dir, $comp_id, $data);
                }
            }
        }

    }elseif ($a == "photoid") {
        if (is_array($_FILES)) {
                $file = "upload_file13";
                $file_type = $_FILES[$file]['type'];
                if(($file_type != "application/pdf") && ($file_type != "image/jpeg") && ($file_type != "image/jpg"))
                    {
                    $message = 'Invalid file type. Only PDF, JPG and JPEG types are accepted.';
                      echo '<script type="text/javascript">alert("'.$message.'");</script>';
                    }
                 else
                 {
                 if (is_uploaded_file($_FILES[$file]['tmp_name'])) {
                    $sourcePath = $_FILES[$file]['tmp_name'];
                    $email = $this->input->post('email');
                    $document_info = $this->input->post('photoid');
                    $comp_id = $this->register_model->get_compid($email);
                    $dir = "files/" . $comp_id;
                    $temp_filename = explode(".", $_FILES[$file]['name']);
                    $final_type = $this->convert($file_type);
                    $newfilename = 'photoid' . '.' . $final_type;
                    $targetPath = $dir . "/" . $newfilename;
                    $data = $a;
                    echo $this->vendor_update->add_document($document_info, $file_type, $sourcePath, $targetPath, $dir, $comp_id, $data);
                }
            }
        }

    }elseif ($a == "addressid") {
        if (is_array($_FILES)) {
                $file = "upload_file14";
                $file_type = $_FILES[$file]['type'];
                if(($file_type != "application/pdf") && ($file_type != "image/jpeg") && ($file_type != "image/jpg"))
                    {
                    $message = 'Invalid file type. Only PDF, JPG and JPEG types are accepted.';
                      echo '<script type="text/javascript">alert("'.$message.'");</script>';
                    }
                 else
                 {
                 if (is_uploaded_file($_FILES[$file]['tmp_name'])) {
                    $sourcePath = $_FILES[$file]['tmp_name'];
                    $email = $this->input->post('email');
                    $document_info = "No Need";
                    $comp_id = $this->register_model->get_compid($email);
                    $dir = "files/" . $comp_id;
                    $temp_filename = explode(".", $_FILES[$file]['name']);
                    $final_type = $this->convert($file_type);
                    $newfilename = 'addressid' . '.' . $final_type;
                    $targetPath = $dir . "/" . $newfilename;
                    $data = $a;
                    echo $this->vendor_update->add_document($document_info, $file_type, $sourcePath, $targetPath, $dir, $comp_id, $data);
                }
            }
        }

    }elseif ($a == "businessid") {
        if (is_array($_FILES)) {
                $file = "upload_file15";
                $file_type = $_FILES[$file]['type'];
                if(($file_type != "application/pdf") && ($file_type != "image/jpeg") && ($file_type != "image/jpg"))
                    {
                    $message = 'Invalid file type. Only PDF, JPG and JPEG types are accepted.';
                      echo '<script type="text/javascript">alert("'.$message.'");</script>';
                    }
                 else
                 {
                 if (is_uploaded_file($_FILES[$file]['tmp_name'])) {
                    $sourcePath = $_FILES[$file]['tmp_name'];
                    $email = $this->input->post('email');
                    $document_info = "No Need";
                    $comp_id = $this->register_model->get_compid($email);
                    $dir = "files/" . $comp_id;
                    $temp_filename = explode(".", $_FILES[$file]['name']);
                    $final_type = $this->convert($file_type);
                    $newfilename = 'businessid' . '.' . $final_type;
                    $targetPath = $dir . "/" . $newfilename;
                    $data = $a;
                    echo $this->vendor_update->add_document($document_info, $file_type, $sourcePath, $targetPath, $dir, $comp_id, $data);
                }
            }
        }

    }elseif ($a == "canceled_check") {
        if (is_array($_FILES)) {
                $file = "canceled_check";
                $file_type = $_FILES[$file]['type'];
                if(($file_type != "application/pdf") && ($file_type != "image/jpeg") && ($file_type != "image/jpg"))
                    {
                    $message = 'Invalid file type. Only PDF, JPG and JPEG types are accepted.';
                      echo '<script type="text/javascript">alert("'.$message.'");</script>';
                    }
                 else
                 {
                 if (is_uploaded_file($_FILES[$file]['tmp_name'])) {
                    $sourcePath = $_FILES[$file]['tmp_name'];
                    $email = $this->input->post('email');
                    $document_info = "No Need";
                    $comp_id = $this->register_model->get_compid($email);
                    $dir = "files/" . $comp_id;
                    $temp_filename = explode(".", $_FILES[$file]['name']);
                    $final_type = $this->convert($file_type);
                    $newfilename = 'canceled_check' . '.' . $final_type;
                    $targetPath = $dir . "/" . $newfilename;
                    $data = $a;
                    echo $this->vendor_update->add_document($document_info, $file_type, $sourcePath, $targetPath, $dir, $comp_id, $data);
                }
            }
        }

    }elseif ($a == "comp_file") {
        if (is_array($_FILES)) {
                $file = "comp_file";
                $file_type = $_FILES[$file]['type'];
                if(($file_type != "application/pdf") && ($file_type != "image/jpeg") && ($file_type != "image/jpg"))
                    {
                    $message = 'Invalid file type. Only PDF, JPG and JPEG types are accepted.';
                      echo '<script type="text/javascript">alert("'.$message.'");</script>';
                    }
                 else
                 {
                 if (is_uploaded_file($_FILES[$file]['tmp_name'])) {
                    $sourcePath = $_FILES[$file]['tmp_name'];
                    $email = $this->input->post('email');
                    $document_info = "No Need";
                    $comp_id = $this->register_model->get_compid($email);
                    $dir = "files/" . $comp_id;
                    $temp_filename = explode(".", $_FILES[$file]['name']);
                    $final_type = $this->convert($file_type);
                    $newfilename = 'comp_file' . '.' . $final_type;
                    $targetPath = $dir . "/" . $newfilename;
                    $data = $a;
                    echo $this->vendor_update->add_document($document_info, $file_type, $sourcePath, $targetPath, $dir, $comp_id, $data);
                }
            }
        }

    }

    }

    public function banking() {
                $email = $this->input->post('email');
                $comp_id = $this->register_model->get_compid($email);
                $result = $this->vendor_update->add_bank($comp_id);
            if ($result) {
                $this->session->set_flashdata('success_message', 'You have Successfully! Submitted');
                redirect(base_url().'main/bank','location');

            } else {
                echo 'please contact site administrator';


            }

    }
    public function max_credit_limit() {
                $email = $this->input->post('email');
                $comp_id = $this->register_model->get_compid($email);
                $result = $this->vendor_update->credit($comp_id);
            if ($result) {
                $this->session->set_flashdata('success_message', 'You have Successfully! Submitted');
                redirect(base_url().'main/view_data','location');

            } else {
                echo 'please contact site administrator';

            }
    }



}