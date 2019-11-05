<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Model extends CI_Model {

	//Tên table
	var $table = '';

	//Key Chính của Table
	var $key = 'id';

	// Order mặc định (VD: $order = array('id', 'desc'))
	var $order = '';

	// Lấy các dòng khi get_list (VD: $select = 'id, name')
	var $select = '';

	/**
	* Thêm mới row
	* $data : du lieu can them vao
	*/
	function create($data = array())
	{
		if ($this->db->insert($this->table, $data)) {
			return TRUE;
		}else {
			return FALSE;
		}
	}

	/**
	 * Lay thong tin cua row tu id
	 * $id : id can lay thong tin
	 * $field : cot du lieu ma can lay
	 */

	function get_info($id, $field='') 
	{
		if (!$id) {
			return FALSE;
		}
		$where = array();
		$where[$this->key] = $id;
		return $this->get_info_rule($where, $field);
	}

	/**
	 * Lay thong tin cua row tu dieu kien
	 * $where: Mảng điều kiện
	 * $field: Cột muốn lấy dữ liệu
	 */

	function get_info_rule($where = array(), $field = '') {
		if ($field) {
			$this->db->select($field);
		}
		$this->db->where($where);
		$query = $this->db->get($this->table);
		if ($query->num_rows()) {
			return $query->row();
		}
		return FALSE;
	}

	/**
	* Update row tu id
	* $id : khoa chinh cua bang can sua
	* $data : mang du lieu can sua
	*/
	function update($id, $data) {
		if (!$id) {
			return FALSE;
		}
		$where = array();
		$where[$this->key] = $id;
		$this->update_rule($where, $data);

		return TRUE;
	}
	/**
	* Update row tu dieu kien
	* $where : dieu kien
	* $data : mang du lieu can cap nhat
	*/
	function update_rule($where, $data) {
		if (!$where) {
			return FALSE;
		}
		$this->db->where($where);
		$this->db->update($this->table, $data);
	}
	/**
	* Delete row tu id
	* $id: gia tri cua khoa chinh
	*/
	function delete($id) {
		if (!$id) {
			return FALSE;
		}
		// Nếu là một số
		if (is_numeric($id)) {
			$where = array($this->key => $id);
		}
		// Nếu là một dãy số
		else {
			//$id = 1,2,3,...
			$where = $this->key . " IN (".$id.") ";
		}
		$this->del_rule($where);
		return TRUE;
	}

	/**
	* Delete row tu dieu kien
	* $where: dieu kien de xoa
	*/
	function del_rule($where) {
		if (!$where) {
			return FALSE;
		}
		$this->db->where($where);
		$this->db->delete($this->table);
		return TRUE;
	}

	/**
	* Lay 1 row
	*/
	function get_row($input = array()) {
		$this->get_list_set_input($input);
		$query = $this->db->get($this->table);
		return $query->row();
	}
	/**
	* Lay 1 row
	* $input : mang du lieu dau vao
	*/
	function get_list($input = array()) {
		//Xu ly du lieu dau vao
		$this->get_list_set_input($input);

		//Thuc hien truy van du lieu
		$query = $this->db->get($this->table);
		return $query->result();
	}

	/**
	* Gan cac thuoc tinh trong input khi lay danh sach
	* $input : mang du lieu dau vao
	*/
	protected function get_list_set_input($input = array()) {
		//Thêm điều kiện cho câu truy vấn truyền qua biến $input['where']
		//(VD: $input['where'] = array('email' => 'web502@gmail.com'))
		if ((isset($input['where'])) && $input['where'])
		{
			$this->db->where($input['where']);
		}
		//Tìm kiếm theo like
		// $input['like'] = array('name', 'abc');
		 if ((isset($input['like'])) && $input['like'])
		{
			$this->db->like($input['like'][0], $input['like'][1]); 
		}

		//Thêm sắp xếp dữ liệu thông qua biến $input['order']
		//VD: $input['order'] = array('id', 'DESC')
		if (isset($input['order'][0]) && isset($input['order'][1]))
		{
			$this->db->order_by($input['order'][0], $input['order'][1]);
		}
		else
		{
			//mặc định sẽ sắp xếp theo id giảm dần 
			$order = ($this->order == '') ? array($this->table.'.'.$this->key, 'desc') : $this->order;
			$this->db->order_by($order[0], $order[1]);
		}

		//Thêm điều kiện limit cho câu truy vấn thông qua biến $input['limit']
		//VD: $input['limit'] = array('10', '0');
		if ((isset($input['limit'][0])) && $input['limit'][1]) {
			$this->db->limit($input['limit'][0], $input['limit'][10]);
		}
	}

	function get_total($input = array()) {
		$this->get_list_set_input($input);
		$query = $this->db->get($this->table);
		return $query->num_rows();
	}

	/**
	* Kiểm tra sự tồn tại của dữ liệu theo 1 điều kiện nào đó
	* $input : mang du lieu dau vao
	*/
	function check_exists($where = array()) {
		$this->db->where($where);
		//Thuc hien truy van lay du lieu
		$query = $this->db->get($this->table);

		if ($query->num_rows() > 0) {
			return TRUE;
		}else {
			return FALSE;
		}
	}
}
?>