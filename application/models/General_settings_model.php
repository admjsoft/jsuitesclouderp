<?php


defined('BASEPATH') or exit('No direct script access allowed');

class General_settings_model extends CI_Model
{
    public function get_settings($moduleCode)
    {
        $this->db->select('*');
        $this->db->from('general_settings');
        $this->db->where('module_code', $moduleCode);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function update_settings($moduleCode, array $data)
    {
        $this->db->set('data_json', json_encode($data));
        $this->db->where('module_code', $moduleCode);
        if ($this->db->update('general_settings')) {
            echo json_encode(array('status' => 'Success', 'message' =>
            $this->lang->line('UPDATED')));
        } else {
            echo json_encode(array('status' => 'Error', 'message' =>
            $this->lang->line('ERROR')));
        }
    }
}
