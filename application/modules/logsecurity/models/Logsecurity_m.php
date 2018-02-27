<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Logsecurity_m extends CI_Model {

    var $table = 'logsecurity';
    var $column_order = array('lsAction', 'lsDescription', 'lsIp', 'u.first_name', 'createdDate'); //set column field database for datatable orderable
    var $column_search = array('lsAction', 'lsDescription', 'lsIp', 'u.first_name', 'createdDate'); //set column field database for datatable searchable 
    var $order = array('createdDate' => 'desc');

    function __construct() {       
            parent::__construct();
    }

    private function _get_datatables_query()
    {
        $this->db->select('*');
        $this->db->from("$this->table ls");
        $this->db->join("users u", "u.id = ls.createdUserID", "left");
        $i = 0;

        foreach ($this->column_search as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
        
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    
    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    /*Kode Dasar*/
    function get_table() {
        $table = "logsecurity";
        return $table;
    }

    function get($order_by){
        $table = $this->get_table();
        $this->db->order_by($order_by);
        $query=$this->db->get($table);
        return $query;
    }

    function get_with_limit($limit, $offset, $order_by) {
        $table = $this->get_table();
        $this->db->limit($limit, $offset);
        $this->db->order_by($order_by);
        $query=$this->db->get($table);
        return $query;
    }

    function get_where($id){
        $table = $this->get_table();
        $this->db->where('lsID', $id);
        $query=$this->db->get($table);
        return $query;
    }

    function get_where_custom($col, $value, $order_by) {
        $table = $this->get_table();
        $this->db->order_by($order_by);
        $this->db->where($col, $value);
        $query=$this->db->get($table);
        return $query;
    }

    function get_where_double_custom($col1, $val1, $col2, $val2, $order_by){
        $table = $this->get_table();
        $this->db->order_by($order_by);
        $this->db->where($col1, $val1);
        $this->db->where($col2, $val2);
        $query=$this->db->get($table);
        return $query;
    }
    
    function _insert($data){
        $table = $this->get_table();
        $this->db->insert($table, $data);
    }

    function _update($id, $data){
        $table = $this->get_table();
        $this->db->where('lsID', $id);
        $this->db->update($table, $data);
    }

    function _delete($id){
        $table = $this->get_table();
        $this->db->where('lsID', $id);
        $this->db->delete($table);
    }

    function count_where($column, $value) {
        $table = $this->get_table();
        $this->db->where($column, $value);
        $query=$this->db->get($table);
        $num_rows = $query->num_rows();
        return $num_rows;
    }

    function count_all() {
        $table = $this->get_table();
        $query=$this->db->get($table);
        $num_rows = $query->num_rows();
        return $num_rows;
    }

    function get_max() {
        $table = $this->get_table();
        $this->db->select_max('lsID');
        $query = $this->db->get($table);
        $row=$query->row();
        $id=$row->id;
        return $id;
    }

    function _custom_query($mysql_query) {
        $query = $this->db->query($mysql_query);
        return $query;
    }

}
