<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Upload extends CI_Controller {

    private $error;
    private $success;

    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('file_model', 'file');
    }
    public function index()
    {
        $this->load->view('main', array('error' => ''));
    }

public function pan(){

    if(is_array($_FILES)) {
                if(is_uploaded_file($_FILES['upload_file1']['tmp_name'])) {
                    $sourcePath = $_FILES['upload_file1']['tmp_name'];

                    $email = $this->input->post('email');
                    $this->db->select('id');
                        $this->db->from('vendor_details');
                        $this->db->where(array('vendor_details.email' => $email));
                        $query = $this->db->get();

                        foreach ($query->result_array() as $row)
                            {
                               $comp_id = $row['id'];
                            }

                    $dir = "files/".$comp_id;
                    $temp_filename = explode(".", $_FILES['upload_file1']['name']);
                    $newfilename = 'pan_card' . '.' .end($temp_filename);
                    $targetPath = $dir."/".$newfilename;

                    if (!file_exists($dir)) {
                        mkdir($dir,0777);
                    if(move_uploaded_file($sourcePath,$targetPath))
                {
                    

                $pan=$this->input->post('pan');
                echo 'Uploaded!!!';
                echo $comp_id;

        $data2 = array(
            'compid' => $comp_id,
            'pan' => $pan,
            'upload_date' => date('Y-m-d'),
            'lock' => 1,

                      );

        $this->db->insert('pan', $data2);

            }
        } else {
            if(move_uploaded_file($sourcePath,$targetPath))
                {


                $pan=$this->input->post('pan');
                echo 'Uploaded!!!';

        $data2 = array(
            'compid' => $comp_id,
            'pan' => $pan,
            'upload_date' => date('Y-m-d'),
            'lock' => 1,

                      );

        $this->db->insert('pan', $data2);

            }
        }
    }
    }
    }

public function tin(){


    if(is_array($_FILES)) {
                if(is_uploaded_file($_FILES['upload_file2']['tmp_name'])) {
                    $sourcePath = $_FILES['upload_file2']['tmp_name'];

                    $email = $this->input->post('email');
                    $this->db->select('id');
                        $this->db->from('vendor_details');
                        $this->db->where(array('vendor_details.email' => $email));
                        $query2 = $this->db->get();

                        foreach ($query2->result_array() as $row2)
                            {
                               $comp_id = $row2['id'];
                            }

                    $dir = "files/".$comp_id;
                    $temp_filename = explode(".", $_FILES['upload_file2']['name']);
                    $newfilename = 'tin_document' . '.' .end($temp_filename);
                    $targetPath = $dir."/".$newfilename;


                    if (!file_exists($dir)) {
                        mkdir($dir,0777);
                    if(move_uploaded_file($sourcePath,$targetPath))
                {


                $tin=$this->input->post('tin');
                echo 'Uploaded!!!';
               echo $email;

        $data2 = array(
            'compid' => $comp_id,
            'tin' => $tin,
            'upload_date' => date('Y-m-d'),
            'lock' => 1,

                      );

        $this->db->insert('tin', $data2);

            }

        } else {
           if(move_uploaded_file($sourcePath,$targetPath))
                {


                $tin=$this->input->post('tin');
                echo 'Uploaded!!!';

        $data2 = array(
            'compid' => $comp_id,
            'tin' => $tin,
            'upload_date' => date('Y-m-d'),
            'lock' => 1,

                      );

        $this->db->insert('tin', $data2);

            }
        }
    }
    }
    }

public function tan(){
  if(is_array($_FILES)) {
                if(is_uploaded_file($_FILES['upload_file3']['tmp_name'])) {
                    $sourcePath = $_FILES['upload_file3']['tmp_name'];

                    $email = $this->input->post('email');
                    $this->db->select('id');
                        $this->db->from('vendor_details');
                        $this->db->where(array('vendor_details.email' => $email));
                        $query = $this->db->get();

                        foreach ($query->result_array() as $row)
                            {
                               $comp_id = $row['id'];
                            }

                    $dir = "files/".$comp_id;
                    $temp_filename = explode(".", $_FILES['upload_file3']['name']);
                    $newfilename = 'tan_document' . '.' .end($temp_filename);
                    $targetPath = $dir."/".$newfilename;


                    if (!file_exists($dir)) {
                        mkdir($dir,0777);
                    if(move_uploaded_file($sourcePath,$targetPath))
                {


                $tan=$this->input->post('tan');
                echo 'Uploaded!!!';

        $data2 = array(
            'compid' => $comp_id,
            'tan' => $tan,
            'upload_date' => date('Y-m-d'),
            'lock' => 1,

                      );

        $this->db->insert('tan', $data2);

            }

        } else {
           if(move_uploaded_file($sourcePath,$targetPath))
                {


                $tan=$this->input->post('tan');
                echo 'Uploaded!!!';

        $data2 = array(
            'compid' => $comp_id,
            'tan' => $tan,
            'upload_date' => date('Y-m-d'),
            'lock' => 1,

                      );

        $this->db->insert('tan', $data2);

            }
        }
    }
    }
    }

public function addrid(){
    if(is_array($_FILES)) {
                if(is_uploaded_file($_FILES['upload_file4']['tmp_name'])) {
                    $sourcePath = $_FILES['upload_file4']['tmp_name'];

                    $email = $this->input->post('email');
                    $this->db->select('id');
                        $this->db->from('vendor_details');
                        $this->db->where(array('vendor_details.email' => $email));
                        $query = $this->db->get();

                        foreach ($query->result_array() as $row)
                            {
                               $comp_id = $row['id'];
                            }
                    $dir = "files/".$comp_id;
                    $temp_filename = explode(".", $_FILES['upload_file4']['name']);
                    $newfilename = 'Address_Proof' . '.' .end($temp_filename);
                    $targetPath = $dir."/".$newfilename;

                    if (!file_exists($dir)) {
                   
                        mkdir($dir,0777);
                        
                    if(move_uploaded_file($sourcePath,$targetPath))
                { 
                echo 'Uploaded!!!';
                }
        }else {
           if(move_uploaded_file($sourcePath,$targetPath))
                {
                echo 'Uploaded!!!';
                }
        }
    }
    }
    }

public function idproof(){
    if(is_array($_FILES)) {
                if(is_uploaded_file($_FILES['upload_file5']['tmp_name'])) {
                    $sourcePath = $_FILES['upload_file5']['tmp_name'];

                    $email = $this->input->post('email');
                    $this->db->select('id');
                        $this->db->from('vendor_details');
                        $this->db->where(array('vendor_details.email' => $email));
                        $query = $this->db->get();

                        foreach ($query->result_array() as $row)
                            {
                               $comp_id = $row['id'];
                            }

                    $dir = "files/".$comp_id;
                    $temp_filename = explode(".", $_FILES['upload_file5']['name']);
                    $newfilename = 'ID_Proof' . '.' .end($temp_filename);
                    $targetPath = $dir."/".$newfilename;


                    if (!file_exists($dir)) {
                        mkdir($dir,0777);
                    if(move_uploaded_file($sourcePath,$targetPath))
                {
                     
                echo 'Uploaded!!!';
            }

        } else {
           if(move_uploaded_file($sourcePath,$targetPath))
                {
                echo 'Uploaded!!!';
                }
        }
    }
    }

   }
}
