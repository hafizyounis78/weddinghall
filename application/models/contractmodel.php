<?php
class Contractmodel extends CI_Model
{
public function get_contract()
{
	 $query = $this->db->get('contract_type');
		return $query->result();
}

}

?>