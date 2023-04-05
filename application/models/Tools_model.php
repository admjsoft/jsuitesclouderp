<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Tools_model extends CI_Model
{
    public $column_order = array('status', 'name', 'duedate', 'tdate', null, null);
    public $column_search = array('name', 'duedate', 'tdate');
    public $notecolumn_order = array(null, 'title', 'cdate', null);
    public $notecolumn_search = array('id', 'title', 'cdate');
    public $order = array('id' => 'asc');

    private function _task_datatables_query($cday = '')
    {
        $this->db->from('gtg_todolist');
        if ($cday) {
            $this->db->where('DATE(duedate)=', $cday);
        }


        $i = 0;

        foreach ($this->column_search as $item) { // loop column
            $search = $this->input->post('search');

            if ($search) {
                $value = $search['value'];

                if ($i === 0) {
                    $this->db->group_start();
                    $this->db->like($item, $value);
                } else {
                    $this->db->or_like($item, $value);
                }

                if (count($this->column_search) - 1 == $i) { //last loop
                    $this->db->group_end();
                } //close bracket
            }
            $i++;
        }
        $search = $this->input->post('order');
        if ($search) {
            $this->db->order_by($this->column_order[$search['0']['column']], $search['0']['dir']);
        } elseif (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function task_datatables($cday = '')
    {
        $this->_task_datatables_query($cday);

        if ($this->input->post('length') != -1) {
            $this->db->limit($this->input->post('length'), $this->input->post('start'));
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function task_count_filtered($cday = '')
    {
        $this->_task_datatables_query($cday);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function task_count_all($cday = '')
    {
        $this->_task_datatables_query($cday);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function addtask($name, $status, $priority, $stdate, $tdate, $employee, $assign, $content)
    {
        $data = array('tdate' => date('Y-m-d H:i:s'), 'name' => $name, 'status' => $status, 'start' => $stdate, 'duedate' => $tdate, 'description' => $content, 'eid' => $employee, 'aid' => $assign, 'related' => 0, 'priority' => $priority, 'rid' => 0);
        return $this->db->insert('gtg_todolist', $data);
    }

    public function edittask($id, $name, $status, $priority, $stdate, $tdate, $employee, $content)
    {
        $data = array('tdate' => date('Y-m-d H:i:s'), 'name' => $name, 'status' => $status, 'start' => $stdate, 'duedate' => $tdate, 'description' => $content, 'eid' => $employee, 'related' => 0, 'priority' => $priority, 'rid' => 0);
        $this->db->set($data);
        $this->db->where('id', $id);
        return $this->db->update('gtg_todolist');
        //return $this->db->insert('gtg_todolist', $data);
    }

    public function settask($id, $stat)
    {
        $data = array('status' => $stat);
        $this->db->set($data);
        $this->db->where('id', $id);
        return $this->db->update('gtg_todolist');
    }

    public function deletetask($id)
    {
        return $this->db->delete('gtg_todolist', array('id' => $id));
    }

    public function viewtask($id)
    {
        $this->db->select('gtg_todolist.*,gtg_employees.name AS emp, assi.name AS assign');
        $this->db->from('gtg_todolist');
        $this->db->where('gtg_todolist.id', $id);
        $this->db->join('gtg_employees', 'gtg_employees.id = gtg_todolist.eid', 'left');
        $this->db->join('gtg_employees AS assi', 'assi.id = gtg_todolist.aid', 'left');
        $query = $this->db->get();
        return $query->row_array();
    }


    public function task_stats()
    {
        $query = $this->db->query("SELECT
				COUNT(IF( status = 'Due', id, NULL)) AS Due,
				COUNT(IF( status = 'Progress', id, NULL)) AS Progress,
				COUNT(IF( status = 'Done', id, NULL)) AS Done
				FROM gtg_todolist ");

        echo json_encode($query->result_array());
    }

    //goals

    public function goals($id)
    {
        $this->db->select('*');
        $this->db->from('gtg_goals');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function setgoals($income, $expense, $sales, $netincome)
    {
        $data = array('income' => $income, 'expense' => $expense, 'sales' => $sales, 'netincome' => $netincome);
        $this->db->set($data);
        $this->db->where('id', 1);
        return $this->db->update('gtg_goals');
    }

    //notes

    private function _notes_datatables_query()
    {
        $this->db->from('gtg_notes');
        $this->db->where('ntype', 0);
        $i = 0;

        foreach ($this->notecolumn_search as $item) { // loop column
            $search = $this->input->post('search');
            $value = $search['value'];
            if ($value) {
                if ($i === 0) {
                    $this->db->group_start();
                    $this->db->like($item, $value);
                } else {
                    $this->db->or_like($item, $value);
                }

                if (count($this->column_search) - 1 == $i) { //last loop
                    $this->db->group_end();
                } //close bracket
            }
            $i++;
        }
        $search = $this->input->post('order');
        if ($search) {
            $this->db->order_by($this->notecolumn_order[$search['0']['column']], $search['0']['dir']);
        } elseif (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function notes_datatables()
    {
        $this->_notes_datatables_query();
        if ($this->input->post('length') != -1) {
            $this->db->limit($this->input->post('length'), $this->input->post('start'));
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function notes_count_filtered()
    {
        $this->_notes_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function notes_count_all()
    {
        $this->_notes_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }


    public function addnote($title, $content)
    {
        $data = array('title' => $title, 'content' => $content, 'cdate' => date('Y-m-d'), 'last_edit' => date('Y-m-d H:i:s'), 'cid' => $this->aauth->get_user()->id, 'fid' => $this->aauth->get_user()->id, 'ntype' => 0);
        return $this->db->insert('gtg_notes', $data);
    }

    public function note_v($id)
    {
        $this->db->select('*');
        $this->db->from('gtg_notes');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function deletenote($id)
    {
        return $this->db->delete('gtg_notes', array('id' => $id));
    }


    //documents list

    public $doccolumn_order = array(null, 'title', 'cdate', null);
    public $doccolumn_search = array('title', 'cdate');

    public function documentlist()
    {
        $this->db->select('*');
        $this->db->from('gtg_documents');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function adddocument($title, $filename)
    {
        $data = array('title' => $title, 'filename' => $filename, 'cdate' => date('Y-m-d'));
        return $this->db->insert('gtg_documents', $data);
    }

    public function deletedocument($id)
    {
        $this->db->select('filename');
        $this->db->from('gtg_documents');
        $this->db->where('id', $id);
        $query = $this->db->get();
        $result = $query->row_array();
        if ($this->db->delete('gtg_documents', array('id' => $id))) {
            unlink(FCPATH . 'userfiles/documents/' . $result['filename']);
            return true;
        } else {
            return false;
        }
    }


    public function document_datatables()
    {
        $this->document_datatables_query();
        if ($this->input->post('length') != -1) {
            $this->db->limit($this->input->post('length'), $this->input->post('start'));
        }
        $query = $this->db->get();
        return $query->result();
    }

    private function document_datatables_query()
    {
        $this->db->from('gtg_documents');

        $i = 0;

        foreach ($this->doccolumn_search as $item) { // loop column
            $search = $this->input->post('search');
            $value = $search['value'];
            if ($value) {
                if ($i === 0) {
                    $this->db->group_start();
                    $this->db->like($item, $value);
                } else {
                    $this->db->or_like($item, $value);
                }

                if (count($this->doccolumn_search) - 1 == $i) { //last loop
                    $this->db->group_end();
                } //close bracket
            }
            $i++;
        }
        $search = $this->input->post('order');
        if ($search) {
            $this->db->order_by($this->doccolumn_order[$search['0']['column']], $search['0']['dir']);
        } elseif (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function document_count_filtered()
    {
        $this->document_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function document_count_all()
    {
        $this->document_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function pending_tasks()
    {
        $this->db->select('*');
        $this->db->from('gtg_todolist');
        $this->db->where('status', 'Due');
        $this->db->order_by('DATE(duedate)', 'ASC');
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    public function pending_tasks_user($id)
    {
        $this->db->select('*');
        $this->db->from('gtg_todolist');
        $this->db->where('status', 'Due');
        $this->db->where('eid', $id);
        $this->db->order_by('DATE(duedate)', 'ASC');
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }


    public function editnote($id, $title, $content)
    {
        $data = array(
            'title' => $title,
            'content' => $content

        );

        $data = array('title' => $title, 'content' => $content, 'last_edit' => date('Y-m-d H:i:s'), 'fid' => $this->aauth->get_user()->id);


        $this->db->set($data);
        $this->db->where('id', $id);

        if ($this->db->update('gtg_notes')) {
            return true;
        } else {
            return false;
        }
    }
}
