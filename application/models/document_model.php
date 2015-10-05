<?php
function insert_images($image_data = array())
{
    $data = array(
    'filename' => $image_data['file_name'],
    'fullpath' => $image_data['full_path']
    );

    $this->db->insert('vendor_docs', $data);
}