<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Quote_model extends CI_Model
{
    public $table = 'gtg_quotes';
    public $column_order = array(null, 'tid', 'name', 'invoicedate', 'total', 'status', null);
    public $column_search = array('tid', 'name', 'invoicedate', 'total');
    public $order = array('tid' => 'desc');

    public function __construct()
    {
        parent::__construct();
    }

    public function lastquote()
    {
        $this->db->select('tid');
        $this->db->from($this->table);
        $this->db->order_by('tid', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row()->tid;
        } else {
            return 1000;
        }
    }

    public function warehouses()
    {
        $this->db->select('*');
        $this->db->from('gtg_warehouse');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function quote_details($id)
    {
        $this->db->select('gtg_quotes.*,gtg_quotes.id AS iid,gtg_customers.*,gtg_customers.id AS cid,gtg_terms.id AS termid,gtg_terms.title AS termtit,gtg_terms.terms AS terms');
        $this->db->from($this->table);
        $this->db->where('gtg_quotes.id', $id);
        $this->db->where('gtg_quotes.csd', $this->session->userdata('user_details')[0]->cid);
        $this->db->join('gtg_customers', 'gtg_quotes.csd = gtg_customers.id', 'left');
        $this->db->join('gtg_terms', 'gtg_terms.id = gtg_quotes.term', 'left');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function quote_products($id)
    {
        $this->db->select('*');
        $this->db->from('gtg_quotes_items');
        $this->db->where('tid', $id);
        $query = $this->db->get();
        return $query->result_array();
    }





    private function _get_datatables_query()
    {
        $this->db->select('gtg_quotes.*,gtg_customers.name');
        $this->db->from($this->table);
        $this->db->where('gtg_quotes.csd', $this->session->userdata('user_details')[0]->cid);
        $this->db->join('gtg_customers', 'gtg_quotes.csd=gtg_customers.id', 'left');

        $i = 0;

        foreach ($this->column_search as $item) { // loop column
            if ($_POST['search']['value']) { // if datatable send POST for search
                
                if ($i === 0) { // first loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i) { //last loop
                    $this->db->group_end();
                } //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) { // here order processing
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } elseif (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function get_datatables()
    {
        $this->_get_datatables_query();
        $this->db->where('gtg_quotes.csd', $this->session->userdata('user_details')[0]->cid);
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered()
    {
        $this->_get_datatables_query();
        $this->db->where('gtg_quotes.csd', $this->session->userdata('user_details')[0]->cid);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        $this->db->where('gtg_quotes.csd', $this->session->userdata('user_details')[0]->cid);
        return $this->db->count_all_results();
    }

    public function update_status($id)
    {
        $this->db->set('status', 'customer_approved');
        $this->db->where('id', $id);
        return $this->db->update('gtg_quotes');
    }


    public function billingterms()
    {
        $this->db->select('id,title');
        $this->db->from('gtg_terms');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function employee($id)
    {
        $this->db->select('gtg_employees.name,gtg_employees.sign,gtg_users.roleid');
        $this->db->from('gtg_employees');
        $this->db->where('gtg_employees.id', $id);
        $this->db->join('gtg_users', 'gtg_employees.id = gtg_users.id', 'left');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function convert($id)
    {
        $invoice = $this->quote_details($id);
        $products = $this->quote_products($id);
        $this->db->trans_start();

        $this->db->select('tid');
        $this->db->from('gtg_invoices');
        $this->db->order_by('tid', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $iid = $query->row()->tid + 1;
        } else {
            $iid = 1000;
        }
        $productlist = array();
        $prodindex = 0;

        foreach ($products as $row) {
            $amt = $row['qty'];

            $data = array(
                'tid' => $iid,
                'pid' => $row['pid'],
                'product' => $row['product'],
                'qty' => $amt,
                'price' => $row['price'],
                'tax' => $row['tax'],
                'discount' => $row['discount'],
                'subtotal' => $row['subtotal'],
                'totaltax' => $row['totaltax'],
                'totaldiscount' => $row['totaldiscount']
            );

            $productlist[$prodindex] = $data;
            $prodindex++;

            $this->db->set('qty', "qty-$amt", false);
            $this->db->where('pid', $row['pid']);
            $this->db->update('gtg_products');
        }


        $this->db->insert_batch('gtg_invoice_items', $productlist);


        $data = array('tid' => $iid, 'invoicedate' => $invoice['invoicedate'], 'invoiceduedate' => $invoice['invoicedate'], 'subtotal' => $invoice['invoicedate'], 'shipping' => $invoice['shipping'], 'discount' => $invoice['discount'], 'tax' => $invoice['tax'], 'total' => $invoice['total'], 'notes' => $invoice['notes'], 'csd' => $invoice['csd'], 'eid' => $invoice['eid'], 'items' => $invoice['items'], 'taxstatus' => $invoice['taxstatus'], 'discstatus' => $invoice['discstatus'], 'format_discount' => $invoice['format_discount'], 'refer' => $invoice['refer'], 'term' => $invoice['term']);

        $this->db->insert('gtg_invoices', $data);

        if ($this->db->trans_complete()) {
            return true;
        } else {
            return false;
        }
    }
}
