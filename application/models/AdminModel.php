<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<?php
class AdminModel extends CI_Model
{

	// $returnmessage can be num_rows, result_array, result
	public function isRowExist($tableName, $data, $returnmessage, $user_id = NULL)
	{
		$this->db->where($data);
		if ($user_id !== NULL) {
			$this->db->where('userId', $user_id);
		}
		if ($returnmessage == 'num_rows') {
			return $this->db->get($tableName)->num_rows();
		} else if ($returnmessage == 'result_array') {
			return $this->db->get($tableName)->result_array();
		} else {
			return $this->db->get($tableName)->result();
		}
	}
	// saveDataInTable table name , array, and return type is null or last inserted ID.
	public function saveDataInTable($tableName, $data, $returnInsertId = 'false')
	{

		$this->db->insert($tableName, $data);
		if ($returnInsertId == 'true') {
			return $this->db->insert_id();
		} else {
			return -1;
		}
	}

	public function check_campaign_ambigus($start_date, $end_date)
	{

		if (date_format(date_create($start_date), "Y-m-d") > date_format(date_create($end_date), "Y-m-d")) {
			return -2;
		}

		$this->db->limit(1);
		$this->db->where('end_date >=', $start_date);
		$this->db->where('available_status', 1);
		$query = $this->db->get('create_campaign')->num_rows();
		if ($query > 0) {
			return -1;
		}
		return 1;
	}

	public function end_date_extends($end_date, $id)
	{

		$this->db->limit(1);
		$this->db->where('start_date >=', $end_date);
		$this->db->where('id', $id);
		$this->db->where('available_status', 1);
		$query = $this->db->get('create_campaign')->num_rows();
		if ($query > 0) {
			return -1;
		}
		$this->db->limit(1);
		$this->db->where('end_date >=', $end_date);
		$this->db->where('id !=', $id);
		$this->db->where('available_status', 1);
		$query2 = $this->db->get('create_campaign')->num_rows();
		if ($query2 > 0) {
			return -1;
		}
		return 1;
	}
	public function fetch_data_pageination($limit, $start, $table, $search = NULL, $approveStatus = NULL, $user_id = NULL)
	{

		$this->db->limit($limit, $start);

		if ($approveStatus !== NULL) {
			$this->db->where('approveStatus', $approveStatus);
		}

		if ($user_id !== NULL) {
			$this->db->where('userId', $user_id);
		}

		if ($search !== NULL) {
			$this->db->like('title', $search);
			$this->db->or_like('body', $search);
			$this->db->or_like('date', $search);
		}

		$this->db->order_by('date', 'desc');
		$query = $this->db->get($table);

		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		return false;
	}
	public function fetch_images($limit = 18, $start = 0, $table, $search = NULL, $where_data = NULL)
	{

		$this->db->limit($limit, $start);

		if ($search !== NULL) {
			$this->db->like('date', $search);
			$this->db->or_like('photoCaption', $search);
		}
		if ($where_data !== NULL) {
			$this->db->where($where_data);
		}
		$this->db->group_by('photo');
		$this->db->order_by('date', 'desc');
		$query = $this->db->get($table);

		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		return false;
	}

	public function usersCategory($userId)
	{

		$this->db->select('category.*');
		$this->db->join('category', 'category_user.categoryId = category.id', 'left');
		$this->db->where('category_user.userId', $userId);
		return $this->db->get('category_user')->result_array();
	}


	public function get_user($user_id)
	{
		$query = $this->db->select('user.*,tbl_upozilla.*')
			->where('user.id', $user_id)
			->from('user')
			->join('tbl_upozilla', 'user.address = tbl_upozilla.id', 'left')
			->get();

		return $query->row();
	}

	public function update_pro_info($update_data, $user_id)
	{
		return $this->db->where('id', $user_id)->update('user', $update_data);
	}

	public function update_testimonials($update_testimonials, $param2)
	{
		if (isset($update_testimonials['photo']) && file_exists($update_testimonials['photo'])) {

			$result = $this->db->select('photo')
				->from('tbl_testimonial')
				->where('id', $param2)
				->get()
				->row()->photo;

			if (file_exists($result)) {
				unlink($result);
			}
		}

		return $this->db->where('id', $param2)->update('tbl_testimonial', $update_testimonials);
	}

	public function delete_testimonials($param2)
	{
		$result = $this->db->select('photo')
			->from('tbl_testimonial')
			->where('id', $param2)
			->get()
			->row()->photo;

		if (file_exists($result)) {
			unlink($result);
		}

		return $this->db->where('id', $param2)->delete('tbl_testimonial');
	}

	public function theme_text_update($name_index, $value)
	{

		if ($name_index == 'logo') {
			$result = $this->db->select('value')->where(array('id' => 6))->get('tbl_backend_theme')->row()->value;

			if (file_exists($result)) {
				unlink($result);
			}
		} elseif ($name_index == 'share_banner') {
			$result = $this->db->select('value')->where(array('id' => 7))->get('tbl_backend_theme')->row()->value;

			if (file_exists($result)) {
				unlink($result);
			}
		}

		$update_theme['value'] = $value;
		$this->db->where('name', $name_index)->update('tbl_backend_theme', $update_theme);
		return true;
	}

	//Member Registration Update

	public function member_registratrion_update($update_member_registration, $param2)
	{
		if (isset($update_member_registration['photo']) && file_exists($update_member_registration['photo'])) {

			$result = $this->db->select('photo')
				->from('tbl_member_registration')
				->where('id', $param2)
				->get()
				->row()->photo;

			if (file_exists($result)) {
				unlink($result);
			}
		}

		return $this->db->where('id', $param2)->update('tbl_member_registration', $update_member_registration);
	}

	//Member Registration List
	public function get_member_registration_list($limit = 10, $start = 0)
	{
		$results = array();

		$this->db->select('id, name_bn, name_en, father_name,phone,	email,photo');
		$this->db->limit($limit, $start);
		$this->db->order_by('id', "desc");
		$results = $this->db->get('tbl_member_registration')->result();

		return $results;
	}

	//Member Registration Delete

	public function member_registration_delete($param2)
	{

		return $this->db->where('id', $param2)->delete('tbl_member_registration');
	}

	//Member Registration List
	public function get_member_registraion_category_list($limit = 10, $start = 0)
	{
		$results = array();

		$this->db->select('tbl_member_registration_category.id, tbl_member_registration_category.category_values, tbl_member_registration.name_bn, tbl_member_category.name');
		$this->db->join('tbl_member_registration', 'tbl_member_registration.id = tbl_member_registration_category.membership_registration_id', 'left');
		$this->db->join('tbl_member_category', 'tbl_member_category.id = tbl_member_registration_category.member_category_id', 'left');

		$this->db->limit($limit, $start);
		$this->db->order_by('id', "desc");

		$results = $this->db->get('tbl_member_registration_category')->result();

		return $results;
	}

	//Member Registraion Category Delete
	public function member_registraion_category_delete($param2)
	{

		return $this->db->where('id', $param2)->delete('tbl_member_registration_category');
	}

	//Slider Update
	public function slider_update($update_slider)
	{

		if (isset($update_slider['photo1']) && file_exists($update_slider['photo1'])) {

			$result = $this->db->select('photo1')->from('tbl_slider')->where('id', 1)->get()->row()->photo1;

			if (file_exists($result)) {
				unlink($result);
			}
		}

		if (isset($update_slider['photo2']) && file_exists($update_slider['photo2'])) {

			$result = $this->db->select('photo2')->from('tbl_slider')->where('id', 1)->get()->row()->photo2;

			if (file_exists($result)) {
				unlink($result);
			}
		}

		if (isset($update_slider['photo3']) && file_exists($update_slider['photo3'])) {

			$result = $this->db->select('photo3')->from('tbl_slider')->where('id', 1)->get()->row()->photo3;

			if (file_exists($result)) {
				unlink($result);
			}
		}

		if (isset($update_slider['photo4']) && file_exists($update_slider['photo4'])) {

			$result = $this->db->select('photo4')->from('tbl_slider')->where('id', 1)->get()->row()->photo4;

			if (file_exists($result)) {
				unlink($result);
			}
		}

		return $this->db->where('id', 1)->update('tbl_slider', $update_slider);
	}

	// team_zoon_type_update Update
	public function team_zoon_type_update($update_team_zoon_type, $param2)
	{
		return $this->db->where('id', $param2)->update('tbl_team_zoon_type', $update_team_zoon_type);
	}

	//team_zoon_type Delete
	public function delete_team_zoon_type($param2)
	{
		return $this->db->where('id', $param2)->delete('tbl_team_zoon_type');
	}
	public function team_registratrion_update($update_team_registered_members, $param2)
	{
		if (isset($update_team_registered_members['photo']) && file_exists($update_team_registered_members['photo'])) {

			$result = $this->db->select('photo')
				->from('tbl_team_registered_members')
				->where('id', $param2)
				->get()
				->row()->photo;

			if (file_exists($result)) {
				unlink($result);
			}
		}

		return $this->db->where('id', $param2)->update('tbl_team_registered_members', $update_team_registered_members);
	}

	//Team Registration List
	public function get_team_registration_list($limit = 10, $start = 0)
	{
		$results = array();

		$this->db->select('id, team_name, registration_number, team_gender,mobile_number');
		$this->db->limit($limit, $start);
		$this->db->order_by('id', "desc");
		$results = $this->db->get('tbl_team_registration')->result();

		return $results;
	}

	//Team Registration Delete

	public function team_registration_delete($param2)
	{

		return $this->db->where('id', $param2)->delete('tbl_team_registration');
	}

	// team single member update
	public function update_team_registared_members($update_team_registared_member_details, $team_member_id)
	{

		$check_row = $this->db->where('id', $team_member_id)->get('tbl_team_registered_members');

		if ($check_row->num_rows() > 0) {

			if (isset($update_team_registared_member_details['photo']) && strlen($update_team_registared_member_details['photo']) > 5) {
				if (file_exists($check_row->row()->photo)) {
					unlink($check_row->row()->photo);
				}
			}
		}

		$this->db->where('id', $team_member_id);
		$this->db->update('tbl_team_registered_members', $update_team_registared_member_details);

		return true;
	}

	//Game Registration Update
	public function game_registration_update($update_game_data, $param2)
	{
		if (isset($update_game_data['game_banner']) && file_exists($update_game_data['game_banner'])) {
			$result = $this->db->select('game_banner')
				->from('tbl_game_registration')
				->where('id', $param2)
				->get()
				->row()->game_banner;
			if (file_exists($result)) {
				unlink($result);
			}
		}
		return $this->db->where('id', $param2)->update('tbl_game_registration', $update_game_data);
	}
	//Game Registration List
	public function get_game_registration_list($limit = 10, $start = 0)
	{
		$results = array();
		$this->db->select('id, game_banner, game_name, opening_date, upozilla_id, zilla_id, division_id, full_address, contact_person_name, contact_person_phone, contact_person_mail');
		$this->db->limit($limit, $start);
		$this->db->order_by('id', "desc");

		$results = $this->db->get('tbl_game_registration')->result();
		return $results;
	}
	//Game Registration Delete
	public function game_registration_delete($param2)
	{
		$result = $this->db->select('game_banner')
			->from('tbl_game_registration')
			->where('id', $param2)
			->get()
			->row()->game_banner;

		if (file_exists($result)) {
			unlink($result);
		}
		return $this->db->where('id', $param2)->delete('tbl_game_registration');
	}

	// Game Assign Update
	public function game_assign_update($update_game_assign_data,$param2)
	{ 

		
		
		return $this->db->where('id', $param2)->update('tbl_game_assign', $update_game_assign_data);
	}
	// Game Assign delete
	public function game_assign_delete($param2)
	{
		return $this->db->where('id', $param2)->delete('tbl_game_assign');
	}


	// game_assign_list TODO: 
	public function game_assign_list()
	{
		$result = array();

		$this->db->select('tbl_game_assign.id, tbl_game_assign.game_registration_id, tbl_game_assign.team_registration_id, tbl_game_assign.enroll_date, tbl_game_assign.approved, 
    tbl_game_registration.game_name as game_name, tbl_team_registration.team_name as team_name');

		$this->db->join('tbl_team_registration', 'tbl_team_registration.id = tbl_game_assign.game_registration_id', 'left');
    
		$this->db->join('tbl_game_registration', 'tbl_game_registration.id  = tbl_game_assign.game_registration_id', 'left');

		$this->db->order_by('id', "desc");

		$result = $this->db->get('tbl_game_assign')->result();
		return $result;
	}
}

?>

