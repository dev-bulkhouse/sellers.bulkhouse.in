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

    public function convert($b) {
        $type = explode('/', $b);
        if ($type[1] == 'jpeg') {
            $type[1] = 'jpg';
        } elseif ($type[1] == 'jpg') {
            $type[1] = 'jpg';
        } else {
            $type[1] = 'pdf';
        }

        return $type[1];
    }

    public function getExtension($str) {
        $i = strrpos($str, ".");
        if (!$i) {
            return "";
        }

        $l = strlen($str) - $i;
        $ext = substr($str, $i + 1, $l);
        return $ext;
    }


    public function insert_and_upload($a) {

        if ($a == "pan_prop") {
            if (is_array($_FILES)) {
                $file = "upload_file1";
                $name = $_FILES[$file]['name'];
                $size = $_FILES[$file]['size'];
                $tmp = $_FILES[$file]['tmp_name'];
                $email = $this->input->post('email');
                $ext = $this->getExtension($name);
                $document_info = $this->input->post('pan');
                $comp_id = $this->register_model->get_compid($email);
                $data = $a;
                $valid_formats = array("jpg","jpeg","JPG","JPEG","pdf","PDF");

                include (APPPATH . "third_party/s3_config.php");
                $msg = '';
                if (strlen($name) > 0) {

                    if (in_array($ext, $valid_formats)) {

                        if ($size < (2048 * 2048)) {
                            include (APPPATH . "third_party/s3_config.php");
//Rename image name.
                            $actual_image_name = $comp_id . '_' . 'pan_card' . "." . $ext;
                            if ($s3->putObjectFile($tmp, $bucket, $actual_image_name, S3::ACL_PUBLIC_READ)) {
                                $s3file = 'http://' . $bucket . '.s3.amazonaws.com/' . $actual_image_name;
                                "<img src='$s3file' style='max-width:400px'/><br/>";
                                '<b>S3 File URL:</b>' . $s3file;
                                echo $this->vendor_update->add_doc($document_info, $s3file, $comp_id, $data);
                                echo "Uploaded !!";
                            } else {
                                echo "Upload Fail !!";
                            }
                        } else {
                            echo "Image size was more than 2 MB";
                        }
                    } else {
                        echo "Invalid file, please upload image file.";
                    }
                } else {
                    echo "Please select only PDF and JPG files.";
                }


            }
        } elseif ($a == "vat_cst") {
            if (is_array($_FILES)) {
                $file = "upload_file2";
                $name = $_FILES[$file]['name'];
                $size = $_FILES[$file]['size'];
                $tmp = $_FILES[$file]['tmp_name'];
                $email = $this->input->post('email');
                $ext = $this->getExtension($name);
                $document_info = $this->input->post('vat_cst');
                $comp_id = $this->register_model->get_compid($email);
                $data = $a;
                $valid_formats = array("jpg","jpeg","JPG","JPEG","pdf","PDF");

                include (APPPATH . "third_party/s3_config.php");
                $msg = '';
                if (strlen($name) > 0) {

                    if (in_array($ext, $valid_formats)) {

                        if ($size < (2048 * 2048)) {
                            include (APPPATH . "third_party/s3_config.php");
//Rename image name.
                            $actual_image_name = $comp_id . '_' . 'vat' . "." . $ext;
                            if ($s3->putObjectFile($tmp, $bucket, $actual_image_name, S3::ACL_PUBLIC_READ)) {
                                $s3file = 'http://' . $bucket . '.s3.amazonaws.com/' . $actual_image_name;
                                "<img src='$s3file' style='max-width:400px'/><br/>";
                                '<b>S3 File URL:</b>' . $s3file;
                                echo $this->vendor_update->add_doc($document_info, $s3file, $comp_id, $data);
                                echo "Uploaded !!";
                            } else {
                                echo "Upload Fail !!";
                            }
                        } else {
                            echo "Image size was more than 2 MB";
                        }
                    } else {
                        echo "Invalid file, please upload image file.";
                    }
                } else {
                    echo "Please select only PDF and JPG files.";
                }
            }
        } elseif ($a == "cst") {
            if (is_array($_FILES)) {
                $file = "upload_file8";
                $name = $_FILES[$file]['name'];
                $size = $_FILES[$file]['size'];
                $tmp = $_FILES[$file]['tmp_name'];
                $email = $this->input->post('email');
                $ext = $this->getExtension($name);
                $document_info = $this->input->post('cst');
                $comp_id = $this->register_model->get_compid($email);
                $data = $a;
                $valid_formats = array("jpg","jpeg","JPG","JPEG","pdf","PDF");

                include (APPPATH . "third_party/s3_config.php");
                $msg = '';
                if (strlen($name) > 0) {

                    if (in_array($ext, $valid_formats)) {

                        if ($size < (2048 * 2048)) {
                            include (APPPATH . "third_party/s3_config.php");
//Rename image name.
                            $actual_image_name = $comp_id . '_' . 'cst' . "." . $ext;
                            if ($s3->putObjectFile($tmp, $bucket, $actual_image_name, S3::ACL_PUBLIC_READ)) {
                                $s3file = 'http://' . $bucket . '.s3.amazonaws.com/' . $actual_image_name;
                                "<img src='$s3file' style='max-width:400px'/><br/>";
                                '<b>S3 File URL:</b>' . $s3file;
                                echo $this->vendor_update->add_doc($document_info, $s3file, $comp_id, $data);
                                echo "Uploaded !!";
                            } else {
                                echo "Upload Fail !!";
                            }
                        } else {
                            echo "Image size was more than 2 MB";
                        }
                    } else {
                        echo "Invalid file, please upload image file.";
                    }
                } else {
                    echo "Please select only PDF and JPG files.";
                }
            }
        } elseif ($a == "pan_comp") {
            if (is_array($_FILES)) {
                $file = "upload_file3";
                $name = $_FILES[$file]['name'];
                $size = $_FILES[$file]['size'];
                $tmp = $_FILES[$file]['tmp_name'];
                $email = $this->input->post('email');
                $ext = $this->getExtension($name);
                $document_info = $this->input->post('pan_comp');
                $comp_id = $this->register_model->get_compid($email);
                $data = $a;
                $valid_formats = array("jpg","jpeg","JPG","JPEG","pdf","PDF");

                include (APPPATH . "third_party/s3_config.php");
                $msg = '';
                if (strlen($name) > 0) {

                    if (in_array($ext, $valid_formats)) {

                        if ($size < (2048 * 2048)) {
                            include (APPPATH . "third_party/s3_config.php");
//Rename image name.
                            $actual_image_name = $comp_id . '_' . 'pan_company' . "." . $ext;
                            if ($s3->putObjectFile($tmp, $bucket, $actual_image_name, S3::ACL_PUBLIC_READ)) {
                                $s3file = 'http://' . $bucket . '.s3.amazonaws.com/' . $actual_image_name;
                                "<img src='$s3file' style='max-width:400px'/><br/>";
                                '<b>S3 File URL:</b>' . $s3file;
                                echo $this->vendor_update->add_doc($document_info, $s3file, $comp_id, $data);
                                echo "Uploaded !!";
                            } else {
                                echo "Upload Fail !!";
                            }
                        } else {
                            echo "Image size was more than 2 MB";
                        }
                    } else {
                        echo "Invalid file, please upload image file.";
                    }
                } else {
                    echo "Please select only PDF and JPG files.";
                }
            }
        } elseif ($a == "part_deed") {

            if (is_array($_FILES)) {
                $file = "upload_file4";
                $name = $_FILES[$file]['name'];
                $size = $_FILES[$file]['size'];
                $tmp = $_FILES[$file]['tmp_name'];
                $email = $this->input->post('email');
                $ext = $this->getExtension($name);
                $document_info = "No Need";
                $comp_id = $this->register_model->get_compid($email);
                $data = $a;
                $valid_formats = array("pdf","PDF");

                include (APPPATH . "third_party/s3_config.php");
                $msg = '';
                if (strlen($name) > 0) {

                    if (in_array($ext, $valid_formats)) {

                        if ($size < (2048 * 2048)) {
                            include (APPPATH . "third_party/s3_config.php");
//Rename image name.
                            $actual_image_name = $comp_id . '_' . 'partnership_deed' . "." . $ext;
                            if ($s3->putObjectFile($tmp, $bucket, $actual_image_name, S3::ACL_PUBLIC_READ)) {
                                $s3file = 'http://' . $bucket . '.s3.amazonaws.com/' . $actual_image_name;
                                "<img src='$s3file' style='max-width:400px'/><br/>";
                                '<b>S3 File URL:</b>' . $s3file;
                                echo $this->vendor_update->add_doc($document_info, $s3file, $comp_id, $data);
                                echo "Uploaded !!";
                            } else {
                                echo "Upload Fail !!";
                            }
                        } else {
                            echo "Image size was more than 2 MB";
                        }
                    } else {
                        echo "Invalid file, Only PDF Allowed.";
                    }
                } else {
                    echo "Please select only PDF files.";
                }
            }
        } elseif ($a == "sign") {
            if (is_array($_FILES)) {
                $file = "upload_file5";
                $name = $_FILES[$file]['name'];
                $size = $_FILES[$file]['size'];
                $tmp = $_FILES[$file]['tmp_name'];
                $email = $this->input->post('email');
                $ext = $this->getExtension($name);
                $document_info = "No Need";
                $comp_id = $this->register_model->get_compid($email);
                $data = $a;
                $valid_formats = array("jpg","jpeg","JPG","JPEG","pdf","PDF");

                include (APPPATH . "third_party/s3_config.php");
                $msg = '';
                if (strlen($name) > 0) {

                    if (in_array($ext, $valid_formats)) {

                        if ($size < (2048 * 2048)) {
                            include (APPPATH . "third_party/s3_config.php");
//Rename image name.
                            $actual_image_name = $comp_id . '_' . 'authorised_sign' . "." . $ext;
                            if ($s3->putObjectFile($tmp, $bucket, $actual_image_name, S3::ACL_PUBLIC_READ)) {
                                $s3file = 'http://' . $bucket . '.s3.amazonaws.com/' . $actual_image_name;
                                "<img src='$s3file' style='max-width:400px'/><br/>";
                                '<b>S3 File URL:</b>' . $s3file;
                                echo $this->vendor_update->add_doc($document_info, $s3file, $comp_id, $data);
                                echo "Uploaded !!";
                            } else {
                                echo "Upload Fail !!";
                            }
                        } else {
                            echo "Image size was more than 2 MB";
                        }
                    } else {
                        echo "Invalid file, please upload image file.";
                    }
                } else {
                    echo "Please select only PDF and JPG files.";
                }
            }
        } elseif ($a == "cert_of_incorp") {
            if (is_array($_FILES)) {
                $file = "upload_file6";
                $name = $_FILES[$file]['name'];
                $size = $_FILES[$file]['size'];
                $tmp = $_FILES[$file]['tmp_name'];
                $email = $this->input->post('email');
                $ext = $this->getExtension($name);
                $document_info = "No Need";
                $comp_id = $this->register_model->get_compid($email);
                $data = $a;
                $valid_formats = array("jpg","jpeg","JPG","JPEG","pdf","PDF");

                include (APPPATH . "third_party/s3_config.php");
                $msg = '';
                if (strlen($name) > 0) {

                    if (in_array($ext, $valid_formats)) {

                        if ($size < (2048 * 2048)) {
                            include (APPPATH . "third_party/s3_config.php");
//Rename image name.
                            $actual_image_name = $comp_id . '_' . 'certificate_of_incorporation' . "." . $ext;
                            if ($s3->putObjectFile($tmp, $bucket, $actual_image_name, S3::ACL_PUBLIC_READ)) {
                                $s3file = 'http://' . $bucket . '.s3.amazonaws.com/' . $actual_image_name;
                                "<img src='$s3file' style='max-width:400px'/><br/>";
                                '<b>S3 File URL:</b>' . $s3file;
                                echo $this->vendor_update->add_doc($document_info, $s3file, $comp_id, $data);
                                echo "Uploaded !!";
                            } else {
                                echo "Upload Fail !!";
                            }
                        } else {
                            echo "Image size was more than 2 MB";
                        }
                    } else {
                        echo "Invalid file, please upload only jpg and pdf files.";
                    }
                } else {
                    echo "Please select only PDF and JPG files.";
                }
            }
        } elseif ($a == "moa_aoa") {
            if (is_array($_FILES)) {
                $file = "upload_file7";
                $name = $_FILES[$file]['name'];
                $size = $_FILES[$file]['size'];
                $tmp = $_FILES[$file]['tmp_name'];
                $email = $this->input->post('email');
                $ext = $this->getExtension($name);
                $document_info = "No Need";
                $comp_id = $this->register_model->get_compid($email);
                $data = $a;
                $valid_formats = array("pdf","PDF");

                include (APPPATH . "third_party/s3_config.php");
                $msg = '';
                if (strlen($name) > 0) {

                    if (in_array($ext, $valid_formats)) {

                        if ($size < (2000 * 2000)) {
                            include (APPPATH . "third_party/s3_config.php");
//Rename image name.
                            $actual_image_name = $comp_id . '_' . 'moa_aoa' . "." . $ext;
                            if ($s3->putObjectFile($tmp, $bucket, $actual_image_name, S3::ACL_PUBLIC_READ)) {
                                $s3file = 'http://' . $bucket . '.s3.amazonaws.com/' . $actual_image_name;
                                "<img src='$s3file' style='max-width:400px'/><br/>";
                                '<b>S3 File URL:</b>' . $s3file;
                                echo $this->vendor_update->add_doc($document_info, $s3file, $comp_id, $data);
                                echo "Uploaded !!";
                            } else {
                                echo "Upload Fail !!";
                            }
                        } else {
                            echo "Image size was more than 8 MB";
                        }
                    } else {
                        echo "Invalid file, Invalid file, Only PDF Allowed.";
                    }
                } else {
                    echo "Please select only PDF files.";
                }
            }
        } elseif ($a == "aoa") {
            if (is_array($_FILES)) {
                $file = "upload_file9";
                $name = $_FILES[$file]['name'];
                $size = $_FILES[$file]['size'];
                $tmp = $_FILES[$file]['tmp_name'];
                $email = $this->input->post('email');
                $ext = $this->getExtension($name);
                $document_info = "No Need";
                $comp_id = $this->register_model->get_compid($email);
                $data = $a;
                $valid_formats = array("pdf","PDF");

                include (APPPATH . "third_party/s3_config.php");
                $msg = '';
                if (strlen($name) > 0) {

                    if (in_array($ext, $valid_formats)) {

                        if ($size < (2000 * 2000)) {
                            include (APPPATH . "third_party/s3_config.php");
//Rename image name.
                            $actual_image_name = $comp_id . '_' . 'aoa' . "." . $ext;
                            if ($s3->putObjectFile($tmp, $bucket, $actual_image_name, S3::ACL_PUBLIC_READ)) {
                                $s3file = 'http://' . $bucket . '.s3.amazonaws.com/' . $actual_image_name;
                                "<img src='$s3file' style='max-width:400px'/><br/>";
                                '<b>S3 File URL:</b>' . $s3file;
                                echo $this->vendor_update->add_doc($document_info, $s3file, $comp_id, $data);
                                echo "Uploaded !!";
                            } else {
                                echo "Upload Fail !!";
                            }
                        } else {
                            echo "Image size was more than 8 MB";
                        }
                    } else {
                        echo "Invalid file, Invalid file, Only PDF Allowed.";
                    }
                } else {
                    echo "Please select only PDF.";
                }
            }
        } elseif ($a == "shop_establish_trade") {
            if (is_array($_FILES)) {
                $file = "upload_file10";
                $name = $_FILES[$file]['name'];
                $size = $_FILES[$file]['size'];
                $tmp = $_FILES[$file]['tmp_name'];
                $email = $this->input->post('email');
                $ext = $this->getExtension($name);
                $document_info = "No Need";
                $comp_id = $this->register_model->get_compid($email);
                $data = $a;
                $valid_formats = array("jpg","jpeg","JPG","JPEG","pdf","PDF");

                include (APPPATH . "third_party/s3_config.php");
                $msg = '';
                if (strlen($name) > 0) {

                    if (in_array($ext, $valid_formats)) {

                        if ($size < (2000 * 2000)) {
                            include (APPPATH . "third_party/s3_config.php");
//Rename image name.
                            $actual_image_name = $comp_id . '_' . 'shop_establish_trade' . "." . $ext;
                            if ($s3->putObjectFile($tmp, $bucket, $actual_image_name, S3::ACL_PUBLIC_READ)) {
                                $s3file = 'http://' . $bucket . '.s3.amazonaws.com/' . $actual_image_name;
                                "<img src='$s3file' style='max-width:400px'/><br/>";
                                '<b>S3 File URL:</b>' . $s3file;
                                echo $this->vendor_update->add_doc($document_info, $s3file, $comp_id, $data);
                                echo "Uploaded !!";
                            } else {
                                echo "Upload Fail !!";
                            }
                        } else {
                            echo "Image size was more than 2 MB";
                        }
                    } else {
                        echo "Invalid file, please upload only jpg and pdf files.";
                    }
                } else {
                    echo "Please select only PDF and JPG files.";
                }
            }
        } elseif ($a == "cenvat") {
            if (is_array($_FILES)) {
                $file = "upload_file11";
                $name = $_FILES[$file]['name'];
                $size = $_FILES[$file]['size'];
                $tmp = $_FILES[$file]['tmp_name'];
                $email = $this->input->post('email');
                $ext = $this->getExtension($name);
                $document_info = $this->input->post('cenvat');
                $comp_id = $this->register_model->get_compid($email);
                $data = $a;
                $valid_formats = array("jpg","jpeg","JPG","JPEG","pdf","PDF");

                include (APPPATH . "third_party/s3_config.php");
                $msg = '';
                if (strlen($name) > 0) {

                    if (in_array($ext, $valid_formats)) {

                        if ($size < (2000 * 2000)) {
                            include (APPPATH . "third_party/s3_config.php");
//Rename image name.
                            $actual_image_name = $comp_id . '_' . 'cenvat' . "." . $ext;
                            if ($s3->putObjectFile($tmp, $bucket, $actual_image_name, S3::ACL_PUBLIC_READ)) {
                                $s3file = 'http://' . $bucket . '.s3.amazonaws.com/' . $actual_image_name;
                                "<img src='$s3file' style='max-width:400px'/><br/>";
                                '<b>S3 File URL:</b>' . $s3file;
                                echo $this->vendor_update->add_doc($document_info, $s3file, $comp_id, $data);
                                echo "Uploaded !!";
                            } else {
                                echo "Upload Fail !!";
                            }
                        } else {
                            echo "Image size was more than 2 MB";
                        }
                    } else {
                        echo "Invalid file, please upload only jpg and pdf files..";
                    }
                } else {
                    echo "Please select only PDF and JPG files.";
                }
            }
        } elseif ($a == "servicetax") {
            if (is_array($_FILES)) {
                $file = "upload_file12";
                $name = $_FILES[$file]['name'];
                $size = $_FILES[$file]['size'];
                $tmp = $_FILES[$file]['tmp_name'];
                $email = $this->input->post('email');
                $ext = $this->getExtension($name);
                $document_info = $this->input->post('servicetax');
                $comp_id = $this->register_model->get_compid($email);
                $data = $a;
                $valid_formats = array("jpg","jpeg","JPG","JPEG","pdf","PDF");

                include (APPPATH . "third_party/s3_config.php");
                $msg = '';
                if (strlen($name) > 0) {

                    if (in_array($ext, $valid_formats)) {

                        if ($size < (2048 * 2048)) {
                            include (APPPATH . "third_party/s3_config.php");
//Rename image name.
                            $actual_image_name = $comp_id . '_' . 'servicetax' . "." . $ext;
                            if ($s3->putObjectFile($tmp, $bucket, $actual_image_name, S3::ACL_PUBLIC_READ)) {
                                $s3file = 'http://' . $bucket . '.s3.amazonaws.com/' . $actual_image_name;
                                "<img src='$s3file' style='max-width:400px'/><br/>";
                                '<b>S3 File URL:</b>' . $s3file;
                                echo $this->vendor_update->add_doc($document_info, $s3file, $comp_id, $data);
                                echo "Uploaded !!";
                            } else {
                                echo "Upload Fail !!";
                            }
                        } else {
                            echo "Image size was more than 2 MB";
                        }
                    } else {
                        echo "Invalid file, please upload only jpg and pdf files..";
                    }
                } else {
                    echo "Please select only PDF and JPG files.";
                }
            }
        } elseif ($a == "photoid") {
            if (is_array($_FILES)) {
                $file = "upload_file13";
                $name = $_FILES[$file]['name'];
                $size = $_FILES[$file]['size'];
                $tmp = $_FILES[$file]['tmp_name'];
                $email = $this->input->post('email');
                $ext = $this->getExtension($name);
                $document_info = $this->input->post('photoid');
                $comp_id = $this->register_model->get_compid($email);
                $data = $a;
                $valid_formats = array("jpg","jpeg","JPG","JPEG","pdf","PDF");

                include (APPPATH . "third_party/s3_config.php");
                $msg = '';
                if (strlen($name) > 0) {

                    if (in_array($ext, $valid_formats)) {

                        if ($size < (2048 * 2048)) {
                            include (APPPATH . "third_party/s3_config.php");
//Rename image name.
                            $actual_image_name = $comp_id . '_' . 'photoid' . "." . $ext;
                            if ($s3->putObjectFile($tmp, $bucket, $actual_image_name, S3::ACL_PUBLIC_READ)) {
                                $s3file = 'http://' . $bucket . '.s3.amazonaws.com/' . $actual_image_name;
                                "<img src='$s3file' style='max-width:400px'/><br/>";
                                '<b>S3 File URL:</b>' . $s3file;
                                echo $this->vendor_update->add_doc($document_info, $s3file, $comp_id, $data);
                                echo "Uploaded !!";
                            } else {
                                echo "Upload Fail !!";
                            }
                        } else {
                            echo "Image size was more than 2 MB";
                        }
                    } else {
                        echo "Invalid file, please upload only jpg and pdf files..";
                    }
                } else {
                    echo "Please select only PDF and JPG files.";
                }
            }
        } elseif ($a == "addressid") {
            if (is_array($_FILES)) {
                $file = "upload_file14";
                $name = $_FILES[$file]['name'];
                $size = $_FILES[$file]['size'];
                $tmp = $_FILES[$file]['tmp_name'];
                $email = $this->input->post('email');
                $ext = $this->getExtension($name);
                $document_info = "No Need";
                $comp_id = $this->register_model->get_compid($email);
                $data = $a;
                $valid_formats = array("jpg","jpeg","JPG","JPEG","pdf","PDF");

                include (APPPATH . "third_party/s3_config.php");
                $msg = '';
                if (strlen($name) > 0) {

                    if (in_array($ext, $valid_formats)) {

                        if ($size < (2048 * 2048)) {
                            include (APPPATH . "third_party/s3_config.php");
//Rename image name.
                            $actual_image_name = $comp_id . '_' . 'addressid' . "." . $ext;
                            if ($s3->putObjectFile($tmp, $bucket, $actual_image_name, S3::ACL_PUBLIC_READ)) {
                                $s3file = 'http://' . $bucket . '.s3.amazonaws.com/' . $actual_image_name;
                                "<img src='$s3file' style='max-width:400px'/><br/>";
                                '<b>S3 File URL:</b>' . $s3file;
                                echo $this->vendor_update->add_doc($document_info, $s3file, $comp_id, $data);
                                echo "Uploaded !!";
                            } else {
                                echo "Upload Fail !!";
                            }
                        } else {
                            echo "Image size was more than 2 MB";
                        }
                    } else {
                        echo "Invalid file, please upload only jpg and pdf files..";
                    }
                } else {
                    echo "Please select only PDF and JPG files.";
                }
            }
        } elseif ($a == "businessid") {
            if (is_array($_FILES)) {
                $file = "upload_file15";
                $name = $_FILES[$file]['name'];
                $size = $_FILES[$file]['size'];
                $tmp = $_FILES[$file]['tmp_name'];
                $email = $this->input->post('email');
                $ext = $this->getExtension($name);
                $document_info = "No Need";
                $comp_id = $this->register_model->get_compid($email);
                $data = $a;
                $valid_formats = array("jpg","jpeg","JPG","JPEG","pdf","PDF");

                include (APPPATH . "third_party/s3_config.php");
                $msg = '';
                if (strlen($name) > 0) {

                    if (in_array($ext, $valid_formats)) {

                        if ($size < (2048 * 2048)) {
                            include (APPPATH . "third_party/s3_config.php");
//Rename image name.
                            $actual_image_name = $comp_id . '_' . 'businessid' . "." . $ext;
                            if ($s3->putObjectFile($tmp, $bucket, $actual_image_name, S3::ACL_PUBLIC_READ)) {
                                $s3file = 'http://' . $bucket . '.s3.amazonaws.com/' . $actual_image_name;
                                "<img src='$s3file' style='max-width:400px'/><br/>";
                                '<b>S3 File URL:</b>' . $s3file;
                                echo $this->vendor_update->add_doc($document_info, $s3file, $comp_id, $data);
                                echo "Uploaded !!";
                            } else {
                                echo "Upload Fail !!";
                            }
                        } else {
                            echo "Image size was more than 2 MB";
                        }
                    } else {
                        echo "Invalid file, please upload only jpg and pdf files..";
                    }
                } else {
                    echo "Please select only PDF and JPG files.";
                }
            }
        } elseif ($a == "canceled_check") {
            if (is_array($_FILES)) {
                $file = "canceled_check";
                $name = $_FILES[$file]['name'];
                $size = $_FILES[$file]['size'];
                $tmp = $_FILES[$file]['tmp_name'];
                $email = $this->input->post('email');
                $ext = $this->getExtension($name);
                $document_info = "No Need";
                $comp_id = $this->register_model->get_compid($email);
                $data = $a;
                $valid_formats = array("jpg","jpeg","JPG","JPEG","pdf","PDF");

                include (APPPATH . "third_party/s3_config.php");
                $msg = '';
                if (strlen($name) > 0) {

                    if (in_array($ext, $valid_formats)) {

                        if ($size < (2048 * 2048)) {
                            include (APPPATH . "third_party/s3_config.php");
//Rename image name.
                            $actual_image_name = $comp_id . '_' . 'canceled_check' . "." . $ext;
                            if ($s3->putObjectFile($tmp, $bucket, $actual_image_name, S3::ACL_PUBLIC_READ)) {
                                $s3file = 'http://' . $bucket . '.s3.amazonaws.com/' . $actual_image_name;
                                "<img src='$s3file' style='max-width:400px'/><br/>";
                                '<b>S3 File URL:</b>' . $s3file;
                                echo $this->vendor_update->add_doc($document_info, $s3file, $comp_id, $data);
                                echo "Uploaded !!";
                            } else {
                                echo "Upload Fail !!";
                            }
                        } else {
                            echo "Image size was more than 2 MB";
                        }
                    } else {
                        echo "Invalid file, please upload only jpg and pdf files..";
                    }
                } else {
                    echo "Please select only PDF and JPG files.";
                }
            }
        } elseif ($a == "comp_file") {
            if (is_array($_FILES)) {
                $file = "comp_file";
                $name = $_FILES[$file]['name'];
                $size = $_FILES[$file]['size'];
                $tmp = $_FILES[$file]['tmp_name'];
                $email = $this->input->post('email');
                $ext = $this->getExtension($name);
                $document_info = "No Need";
                $comp_id = $this->register_model->get_compid($email);
                $data = $a;
                $valid_formats = array("pdf","PDF");

                include (APPPATH . "third_party/s3_config.php");
                $msg = '';
                if (strlen($name) > 0) {

                    if (in_array($ext, $valid_formats)) {

                        if ($size < (2048 * 2048)) {
                            include (APPPATH . "third_party/s3_config.php");
//Rename image name.
                            $actual_image_name = $comp_id . '_' . 'comp_file' . "." . $ext;
                            if ($s3->putObjectFile($tmp, $bucket, $actual_image_name, S3::ACL_PUBLIC_READ)) {
                                $s3file = 'http://' . $bucket . '.s3.amazonaws.com/' . $actual_image_name;
                                "<img src='$s3file' style='max-width:400px'/><br/>";
                                '<b>S3 File URL:</b>' . $s3file;
                                echo $this->vendor_update->add_doc($document_info, $s3file, $comp_id, $data);
                                echo "Uploaded !!";
                            } else {
                                echo "Upload Fail !!";
                            }
                        } else {
                            echo "Image size was more than 2 MB";
                        }
                    } else {
                        echo "Invalid file, Invalid file, Only PDF Allowed.";
                    }
                } else {
                    echo "Please select only PDF.";
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
            redirect(base_url() . 'view/bank', 'location');
        } else {
            echo 'please contact site administrator';
        }
    }

    public function update_banking() {
        $email = $this->input->post('email');
        $comp_id = $this->register_model->get_compid($email);
        $result = $this->vendor_update->vendor_bank($comp_id);
         if($result == true )
        {
        redirect(base_url() . 'main/', 'location');
        }
       
    }
    
    public function max_credit_limit() {
        $email = $this->input->post('email');
        $comp_id = $this->register_model->get_compid($email);
        $result = $this->vendor_update->credit($comp_id);
        if ($result) {
            $this->session->set_flashdata('success_message', 'You have Successfully! Submitted');
            redirect(base_url() . 'view/view_data', 'location');
        } else {
            echo 'please contact site administrator';
        }
    }

}
