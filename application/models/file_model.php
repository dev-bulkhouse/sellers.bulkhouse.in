<?php
 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class File_Model extends CI_Model {
      
    //table name
    private $file = 'files';   // files   
    
    function save_files_info($files) {
        //start db traction
       
        //file data
        $file_data = array();
        foreach ($files as $file) {
            $file_data[] = array(
                'file_name' => $file['file_name'],
                'file_orig_name' => $file['orig_name'],
                'file_path' => $file['full_path'],
                'upload_date' => date('Y-m-d H:i:s'),
                );
        }
         $this->db->insert_batch($this->file, $file_data);
            function doc()
            {
            $data= array(
               
                'companyname' => $this->input->post('companyname'),
                'pan' => $this->input->post('pan'),
                'tan' => $this->input->post('tan'),
                'notan'=>$this->input->post('notan'),
                'tin' => $this->input->post('tin'),
                'upload_date' => date('Y-m-d H:i:s'),
            );      
        } 
        
        //insert file data
       
        $insert= $this->db->insert('docnum', $data);
        return $insert;
      
       
        //complete the transaction
        $this->db->trans_complete();
        //check transaction status
        if ($this->db->trans_status() === FALSE) {
            foreach ($files as $file) {
                $file_path = $file['full_path'];
                //delete the file from destination
                if (file_exists($file_path)) {
                    unlink($file_path);
                }
            }
            //rollback transaction
            $this->db->trans_rollback();
            return FALSE;
        } else {
            //commit the transaction
            $this->db->trans_commit();
            return TRUE;
        }
    }
 
}