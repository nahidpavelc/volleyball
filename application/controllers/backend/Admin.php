<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	function __construct()
	{

		parent::__construct();

		$this->lang->load('content', $_SESSION['lang']);

		if (!isset($_SESSION['user_auth']) || $_SESSION['user_auth'] != true) {
			redirect('login', 'refresh');
		}
		if ($_SESSION['userType'] != 'admin')
			redirect('login', 'refresh');
		//Model Loading
		$this->load->model('AdminModel');
		$this->load->library("pagination");
		$this->load->helper("url");
		$this->load->helper("text");

		date_default_timezone_set("Asia/Dhaka");
	}

	public function index()
	{
		$data['title']      = 'Admin Panel • HRSOFTBD News Portal Admin Panel';
		$data['page']       = 'backEnd/dashboard_view';
		$data['activeMenu'] = 'dashboard_view';

		$this->load->view('backEnd/master_page', $data);
	}

	//Theme setting
	public function theme_setting($param1 = '', $param2 = '', $param3 = '')
	{



		$theme_data_temp    = $this->db->get('tbl_backend_theme')->result();
		$data['theme_data'] = array();
		foreach ($theme_data_temp as $value) {
			$data['theme_data'][$value->name]	= $value->value;
		}

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			$long_title = $this->input->post('long_title', true);
			$this->AdminModel->theme_text_update('long_title', $long_title);

			$short_title = $this->input->post('short_title', true);
			$this->AdminModel->theme_text_update('short_title', $short_title);

			$tagline = $this->input->post('tagline', true);
			$this->AdminModel->theme_text_update('tagline', $tagline);

			$share_title = $this->input->post('share_title', true);
			$this->AdminModel->theme_text_update('share_title', $share_title);

			$share_title = $this->input->post('version', true);
			$this->AdminModel->theme_text_update('version', $share_title);

			$share_title = $this->input->post('organization', true);
			$this->AdminModel->theme_text_update('organization', $share_title);


			if (!empty($_FILES['logo']['name'])) {

				$path_parts                 = pathinfo($_FILES["logo"]['name']);
				$newfile_name               = preg_replace('/[^A-Za-z]/', "", $path_parts['filename']);
				$dir                        = date("YmdHis", time());
				$config_c['file_name']      = $newfile_name . '_' . $dir;
				$config_c['remove_spaces']  = TRUE;
				$config_c['upload_path']    = 'assets/themeLogo/';
				$config_c['max_size']       = '20000'; //  less than 20 MB
				$config_c['allowed_types']  = 'jpg|png|jpeg|jpg|JPG|JPG|PNG|JPEG';

				$this->load->library('upload', $config_c);
				$this->upload->initialize($config_c);
				if (!$this->upload->do_upload('logo')) {
				} else {

					$upload_c = $this->upload->data();
					$logo['logo'] = $config_c['upload_path'] . $upload_c['file_name'];
					$this->image_size_fix($logo['logo'], 300, 300);
				}
				$this->AdminModel->theme_text_update('logo', $logo['logo']);
			}



			if (!empty($_FILES['share_banner']['name'])) {

				$path_parts                 = pathinfo($_FILES["share_banner"]['name']);
				$newfile_name               = preg_replace('/[^A-Za-z]/', "", $path_parts['filename']);
				$dir                        = date("YmdHis", time());
				$config['file_name']      = $newfile_name . '_' . $dir;
				$config['remove_spaces']  = TRUE;
				$config['upload_path']    = 'assets/themeBanner/';
				$config['max_size']       = '20000'; //  less than 20 MB
				$config['allowed_types']  = 'jpg|png|jpeg|jpg|JPG|JPG|PNG|JPEG';

				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				if (!$this->upload->do_upload('share_banner')) {
				} else {

					$upload = $this->upload->data();
					$share_banner['share_banner'] = $config['upload_path'] . $upload['file_name'];
					$this->image_size_fix($share_banner['share_banner'], 600, 315);
				}
				$this->AdminModel->theme_text_update('share_banner', $share_banner['share_banner']);
			}



			$this->session->set_flashdata('message', 'Theme Info Updated Successfully!');
			redirect('admin/theme-setting', 'refresh');
		}

		$data['page']       = 'backEnd/admin/theme_setting';
		$data['activeMenu'] = 'theme_setting';

		$this->load->view('backEnd/master_page', $data);
	}

	//Add User
	public function add_user($param1 = '')
	{
		$messagePage['divissions'] = $this->db->get('tbl_divission')->result_array();
		$messagePage['userType']   = $this->db->get('user_type')->result();

		$messagePage['title']      = 'Add User Admin Panel • HRSOFTBD News Portal Admin Panel';
		$messagePage['page']       = 'backEnd/admin/add_user';
		$messagePage['activeMenu'] = 'add_user';

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			$saveData['firstname'] = $this->input->post('first_name', true);
			$saveData['lastname']  = $this->input->post('last_name', true);
			$saveData['username']  = $this->input->post('user_name', true);
			$saveData['email']     = $this->input->post('email', true);
			$saveData['phone']     = $this->input->post('phone', true);
			$saveData['password']  = sha1($this->input->post('password', true));
			$saveData['address']   = $this->input->post('address', true);
			$saveData['roadHouse'] = $this->input->post('road_house', true);
			$saveData['userType']  = $this->input->post('user_type', true);
			$saveData['photo']     = 'assets/userPhoto/defaultUser.jpg';

			if (!empty($_FILES['photo']['name'])) {

				$path_parts                 = pathinfo($_FILES["photo"]['name']);
				$newfile_name               = preg_replace('/[^A-Za-z]/', "", $path_parts['filename']);
				$dir                        = date("YmdHis", time());
				$config_c['file_name']      = $newfile_name . '_' . $dir;
				$config_c['remove_spaces']  = TRUE;
				$config_c['upload_path']    = 'assets/userPhoto/';
				$config_c['max_size']       = '20000'; //  less than 20 MB
				$config_c['allowed_types']  = 'jpg|png|jpeg|jpg|JPG|JPG|PNG|JPEG';

				$this->load->library('upload', $config_c);
				$this->upload->initialize($config_c);
				if (!$this->upload->do_upload('photo')) {
				} else {

					$upload_c = $this->upload->data();
					$saveData['photo'] = $config_c['upload_path'] . $upload_c['file_name'];
					$this->image_size_fix($saveData['photo'], 400, 400);
				}
			}

			//This will returns as third parameter num_rows, result_array, result
			$username_check = $this->AdminModel->isRowExist('user', array('username' => $saveData['username']), 'num_rows');
			$email_check = $this->AdminModel->isRowExist('user', array('email' => $saveData['email']), 'num_rows');

			if ($username_check > 0 || $email_check > 0) {
				//Invalid message
				$messagePage['page'] = 'backEnd/admin/insertFailed';
				$messagePage['noteMessage'] = "<hr> UserName: " . $saveData['username'] . " can not be create.";
				if ($username_check > 0) {

					$messagePage['noteMessage'] .= '<br> Cause this username is already exist.';
				} else if ($email_check > 0) {

					$messagePage['noteMessage'] .= '<br> Cause this email is already exist.';
				}
			} else {
				//success
				$insertId = $this->AdminModel->saveDataInTable('user', $saveData, 'true');

				$messagePage['page'] = 'backEnd/admin/insertSuccessfull';
				$messagePage['noteMessage'] = "<hr> UserName: " . $saveData['username'] . " has been created successfully.";

				// Category allocate for users
				if (!empty($this->input->post('selectCategory', true))) {

					foreach ($this->input->post('selectCategory', true) as $cat_value) {

						$this->db->insert('category_user', array('userId' => $insertId, 'categoryId' => $cat_value));
					}
				}
			}
		}


		$this->load->view('backEnd/master_page', $messagePage);
	}

	//Edit User
	public function edit_user($param1 = '')
	{
		// Update using post method 
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			if (strlen($this->input->post('password', true)) > 3) {
				$saveData['password']  = sha1($this->input->post('password', true));
			}

			$saveData['firstname'] = $this->input->post('first_name', true);
			$saveData['lastname']  = $this->input->post('last_name', true);
			$saveData['phone']     = $this->input->post('phone', true);
			$saveData['address']   = $this->input->post('address', true);
			$saveData['roadHouse'] = $this->input->post('road_house', true);
			$saveData['userType']  = $this->input->post('user_type', true);
			$user_id               = $param1;

			if (!empty($_FILES['photo']['name'])) {

				$path_parts                 = pathinfo($_FILES["photo"]['name']);
				$newfile_name               = preg_replace('/[^A-Za-z]/', "", $path_parts['filename']);
				$dir                        = date("YmdHis", time());
				$config_c['file_name']      = $newfile_name . '_' . $dir;
				$config_c['remove_spaces']  = TRUE;
				$config_c['upload_path']    = 'assets/userPhoto/';
				$config_c['max_size']       = '20000'; //  less than 20 MB
				$config_c['allowed_types']  = 'jpg|png|jpeg|jpg|JPG|JPG|PNG|JPEG';

				$this->load->library('upload', $config_c);
				$this->upload->initialize($config_c);
				if (!$this->upload->do_upload('photo')) {
				} else {

					$upload_c = $this->upload->data();
					$saveData['photo'] = $config_c['upload_path'] . $upload_c['file_name'];
					$this->image_size_fix($saveData['photo'], 400, 400);
				}
			}

			if (isset($saveData['photo']) && file_exists($saveData['photo'])) {

				$result = $this->db->select('photo')->from('user')->where('id', $user_id)->get()->row()->photo;

				if (file_exists($result)) {
					unlink($result);
				}
			}


			$this->db->where('id', $user_id);
			$this->db->update('user', $saveData);

			$data['page']        = 'backEnd/admin/insertSuccessfull';
			$data['noteMessage'] = "<hr> Data has been Updated successfully.";
		} else if ($this->AdminModel->isRowExist('user', array('id' => $param1), 'num_rows') > 0) {

			$data['userDetails']   = $this->AdminModel->isRowExist('user', array('id' => $param1), 'result_array');

			$myupozilla_id         = $this->db->get_where('tbl_upozilla', array("id" => $data['userDetails'][0]['address']))->row();

			$data['myzilla_id']    = $myupozilla_id->zilla_id;
			$data['mydivision_id'] = $myupozilla_id->division_id;

			$data['divissions']    = $this->db->get('tbl_divission')->result();

			$data['distrcts']      = $this->db->get_where('tbl_zilla', array('divission_id' => $data['mydivision_id']))->result();
			$data['upozilla']      = $this->db->get_where('tbl_upozilla', array('zilla_id' => $data['myzilla_id']))->result();

			$data['userType'] = $this->db->get('user_type')->result_array();
			$data['user_id']  = $param1;
			$data['page']     = 'backEnd/admin/edit_user';
		} else {

			$data['page']        = 'errors/invalidInformationPage';
			$data['noteMessage'] = $this->lang->line('wrong_info_search');
		}

		$data['user_type'] 	= $this->db->select('id, value, name')->get('user_type')->result();
		$data['title']      = 'Users List Admin Panel • HRSOFTBD News Portal Admin Panel';
		$data['activeMenu'] = 'user_list';
		$this->load->view('backEnd/master_page', $data);
	}

	//Suspend User
	public function suspend_user($id, $setvalue)
	{
		$this->db->where('id', $id);
		$this->db->update('user', array('status' => $setvalue));
		$this->session->set_flashdata('message', 'Data Saved Successfully.');

		redirect('admin/user_list', 'refresh');
	}

	//Delete User
	public function delete_user($id)
	{
		$old_image_url = $this->db->where('id', $id)->get('user')->row();
		$this->db->where('id', $id)->delete('user');
		if (isset($old_image_url->photo)) {
			unlink($old_image_url->photo);
		}

		$this->session->set_flashdata('message', 'Data Deleted.');
		redirect('admin/user_list', 'refresh');
	}

	//User List
	public function user_list()
	{
		$this->db->where('userType !=', 'admin');
		$data['myUsers']    = $this->db->get('user')->result_array();
    
		$data['title']      = 'Users List Admin Panel • HRSOFTBD News Portal Admin Panel';
		$data['page']       = 'backEnd/admin/user_list';
		$data['activeMenu'] = 'user_list';
		$this->load->view('backEnd/master_page', $data);
	}

	public function image_size_fix($filename, $width = 600, $height = 400, $destination = '')
	{

		// Content type
		// header('Content-Type: image/jpeg');
		// Get new dimensions
		list($width_orig, $height_orig) = getimagesize($filename);

		// Output 20 May, 2018 updated below part
		if ($destination == '' || $destination == null)
			$destination = $filename;

		$extention = pathinfo($destination, PATHINFO_EXTENSION);
		if ($extention != "png" && $extention != "PNG" && $extention != "JPEG" && $extention != "jpeg" && $extention != "jpg" && $extention != "JPG") {

			return true;
		}
		// Resample
		$image_p = imagecreatetruecolor($width, $height);
		$image   = imagecreatefromstring(file_get_contents($filename));
		imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);



		if ($extention == "png" || $extention == "PNG") {
			imagepng($image_p, $destination, 9);
		} else if ($extention == "jpg" || $extention == "JPG" || $extention == "jpeg" || $extention == "JPEG") {
			imagejpeg($image_p, $destination, 70);
		} else {
			imagepng($image_p, $destination);
		}
		return true;
	}

	public function get_division()
	{

		$result = $this->db->select('id, name')->get('tbl_divission')->result();
		echo json_encode($result, JSON_UNESCAPED_UNICODE);
	}

	public function get_zilla_from_division($division_id = 1)
	{

		$result = $this->db->select('id, name')->where('divission_id', $division_id)->get('tbl_zilla')->result();
		echo json_encode($result, JSON_UNESCAPED_UNICODE);
	}

	public function get_upozilla_from_division_zilla($zilla_id = 1)
	{

		$result = $this->db->select('id, name')->where('zilla_id', $zilla_id)->get('tbl_upozilla')->result();
		echo json_encode($result, JSON_UNESCAPED_UNICODE);
	}

	public function download_file($file_name = '', $fullpath = '')
	{

		$this->load->helper('download');

		$filePath = $file_name;

		if ($file_name == 'full' && ($fullpath != '' || $fullpath != null)) $filePath = $fullpath;

		if ($_GET['file_path']) $filePath = $_GET['file_path'];

		if (file_exists($filePath)) {

			force_download($filePath, NULL);
		} else {

			die('The provided file path is not valid.');
		}
	}

	public function profile($param1 = '')
	{

		$user_id            = $this->session->userdata('userid');
		$data['user_info']  = $this->AdminModel->get_user($user_id);


		$myzilla_id         = $data['user_info']->zilla_id;
		$mydivision_id      = $data['user_info']->division_id;

		$data['divissions'] = $this->db->get('tbl_divission')->result();

		$data['distrcts']   = $this->db->get_where('tbl_zilla', array('divission_id' => $mydivision_id))->result();
		$data['upozilla']   = $this->db->get_where('tbl_upozilla', array('zilla_id'  => $myzilla_id))->result();

		if ($param1 == 'update_photo') {

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {


				//exta work
				$path_parts               = pathinfo($_FILES["photo"]['name']);
				$newfile_name             = preg_replace('/[^A-Za-z]/', "", $path_parts['filename']);
				$dir                      = date("YmdHis", time());
				$config['file_name']      = $newfile_name . '_' . $dir;
				$config['remove_spaces']  = TRUE;
				//exta work
				$config['upload_path']    = 'assets/userPhoto/';
				$config['max_size']       = '20000'; //  less than 20 MB
				$config['allowed_types']  = 'jpg|png|jpeg|jpg|JPG|JPG|PNG|JPEG';

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('photo')) {

					// case - failure
					$upload_error = array('error' => $this->upload->display_errors());
					$this->session->set_flashdata('message', "Failed to update image.");
				} else {

					$upload                 = $this->upload->data();
					$newphotoadd['photo']   = $config['upload_path'] . $upload['file_name'];

					$old_photo              = $this->db->where('id', $user_id)->get('user')->row()->photo;

					if (file_exists($old_photo)) unlink($old_photo);

					$this->image_size_fix($newphotoadd['photo'], 200, 200);

					$this->db->where('id', $user_id)->update('user', $newphotoadd);

					$this->session->set_userdata('userPhoto', $newphotoadd['photo']);
					$this->session->set_flashdata('message', 'User Photo Updated Successfully!');

					redirect('admin/profile', 'refresh');
				}
			}
		} else if ($param1 == 'update_pass') {

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {

				$old_pass    = sha1($this->input->post('old_pass', true));
				$new_pass    = sha1($this->input->post('new_pass', true));
				$user_id     = $this->session->userdata('userid');

				$get_user    = $this->db->get_where('user', array('id' => $user_id, 'password' => $old_pass));
				$user_exist  = $get_user->row();

				if ($user_exist) {

					$this->db->where('id', $user_id)
						->update('user', array('password' => $new_pass));
					$this->session->set_flashdata('message', 'Password Updated Successfully');
					redirect('admin/profile', 'refresh');
				} else {

					$this->session->set_flashdata('message', 'Password Update Failed');
					redirect('admin/profile', 'refresh');
				}
			}
		} else if ($param1 == 'update_info') {

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {

				$update_data['firstname']   = $this->input->post('firstname', true);
				$update_data['lastname']    = $this->input->post('lastname', true);
				$update_data['roadHouse']   = $this->input->post('roadHouse', true);
				$update_data['address']     = $this->input->post('address', true);


				$db_email     = $this->db->where('id!=', $user_id)->where('email', $this->input->post('email', true))->get('user')->num_rows();
				$db_username  = $this->db->where('id!=', $user_id)->where('username', $this->input->post('username', true))->get('user')->num_rows();


				if ($db_username == 0) {

					$update_data['username']    = $this->input->post('username', true);
				}
				if ($db_email == 0) {

					$update_data['email']       = $this->input->post('email', true);
				}


				$current_password = sha1($this->input->post('password', true));

				$db_password      = $data['user_info']->password;

				if ($current_password == $db_password) {

					if ($this->AdminModel->update_pro_info($update_data, $user_id)) {

						$this->session->set_userdata('username_first', $update_data['firstname']);
						$this->session->set_userdata('username_last', $update_data['lastname']);
						$this->session->set_userdata('username', $update_data['username']);

						$this->session->set_flashdata('message', 'Information Updated Successfully!');
						redirect('admin/profile', 'refresh');
					} else {

						$this->session->set_flashdata('message', 'Information Update Failed!');
						redirect('admin/profile', 'refresh');
					}
				} else {

					$this->session->set_flashdata('message', 'Current Password Does Not Match!');
					redirect('admin/profile', 'refresh');
				}
			}
		}

		$data['title']      = 'Profile Admin Panel • HRSOFTBD News Portal Admin Panel';
		$data['activeMenu'] = 'Profile';
		$data['page']       = 'backEnd/admin/profile';

		$this->load->view('backEnd/master_page', $data);
	}
	// Member Registration
	public function member_registration($param1 = 'add', $param2 = '', $param3 = '')
	{
		if ($param1 == 'add') {

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {

				$insert_member_registration['name_bn']         		= $this->input->post('name_bn', true);
				$insert_member_registration['name_en']    			= $this->input->post('name_en', true);
				$insert_member_registration['father_name']     		= $this->input->post('father_name', true);
				$insert_member_registration['phone'] 	       		= $this->input->post('phone', true);
				$insert_member_registration['birth_date'] 	   		= $this->input->post('birth_date');
				$insert_member_registration['facebook_url']    		= $this->input->post('facebook_url', true);
				$insert_member_registration['email'] 	       		= $this->input->post('email', true);
				$insert_member_registration['pre_division_id'] 		= $this->input->post('pre_division_id', true);
				$insert_member_registration['pre_zilla_id'] 		= $this->input->post('pre_zilla_id', true);
				$insert_member_registration['pre_upozilla_id'] 		= $this->input->post('pre_upozilla_id', true);
				$insert_member_registration['pre_village_road'] 	= $this->input->post('pre_village_road', true);
				$insert_member_registration['par_division_id'] 		= $this->input->post('par_division_id', true);
				$insert_member_registration['par_zilla_id'] 		= $this->input->post('par_zilla_id', true);
				$insert_member_registration['par_upozilla_id'] 		= $this->input->post('par_upozilla_id', true);
				$insert_member_registration['par_village_road'] 	= $this->input->post('par_village_road', true);
				$insert_member_registration['live_interview_link'] 	= $this->input->post('live_interview_link', true);
				$insert_member_registration['nid_card'] 			= $this->input->post('nid_card', true);
				$insert_member_registration['insert_by']   			= $_SESSION['userid'];
				$insert_member_registration['insert_time'] 			= date('Y-m-d H:i:s');

				if (!empty($_FILES["photo"]['name'])) {

					//exta work
					$path_parts               = pathinfo($_FILES["photo"]['name']);
					$newfile_name             = preg_replace('/[^A-Za-z]/', "", $path_parts['filename']);
					$dir                      = date("YmdHis", time());
					$config['file_name']      = $newfile_name . '_' . $dir;
					$config['remove_spaces']  = TRUE;
					$config['upload_path']    = 'assets/volleyball/';
					$config['max_size']       = '20000'; //  less than 20 MB
					$config['allowed_types']  = 'jpg|png|jpeg|jpg|JPG|JPG|PNG|JPEG|pdf|docx';

					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					if (!$this->upload->do_upload('photo')) {
					} else {

						$upload = $this->upload->data();
						$insert_member_registration['photo']   = $config['upload_path'] . $upload['file_name'];

						$file_parts = pathinfo($insert_member_registration['photo']);
						if ($file_parts['extension'] != "pdf") {
							$this->image_size_fix($insert_member_registration['photo'], $width = 440, $height = 320);
						}
					}
				}

				$add_member_registration = $this->db->insert('tbl_member_registration', $insert_member_registration);

				if ($add_member_registration) {

					$this->session->set_flashdata('message', 'Data Added Successfully!');
					redirect('admin/member-registration/list', 'refresh');
				} else {

					$this->session->set_flashdata('message', 'Data Add Failed!');
					redirect('admin/member-registration/list', 'refresh');
				}
			}

			$data['divissions'] = $this->db->get('tbl_divission')->result();
			$data['zilla'] 		= $this->db->get('tbl_zilla')->result();
			$data['upozilla'] 	= $this->db->get('tbl_upozilla')->result();


			$data['member_categories'] = $this->db->get('tbl_member_category')->result();

			$data['title']             = 'Member Registration Add';
			$data['activeMenu']        = 'member_registration_add';
			$data['page']              = 'backEnd/admin/member_registration_add';
		} elseif ($param1 == 'edit' && $param2 > 0) {

			$check_table_row = $this->db->where('id', $param2)->get('tbl_member_registration');

			if ($check_table_row->num_rows() > 0) {

				$data['member_registration_list'] = $check_table_row->row();

				$data['divissions'] = $this->db->get('tbl_divission')->result();
				$data['zilla'] 		= $this->db->get('tbl_zilla')->result();
				$data['upozilla'] 	= $this->db->get('tbl_upozilla')->result();



				if ($_SERVER['REQUEST_METHOD'] == 'POST') {

					$update_member_registration['name_bn']         		= $this->input->post('name_bn', true);
					$update_member_registration['name_en']    			= $this->input->post('name_en', true);
					$update_member_registration['father_name']     		= $this->input->post('father_name', true);
					$update_member_registration['phone'] 	       		= $this->input->post('phone', true);
					$update_member_registration['birth_date'] 	   		= $this->input->post('birth_date');
					$update_member_registration['facebook_url']    		= $this->input->post('facebook_url', true);
					$update_member_registration['email'] 	       		= $this->input->post('email', true);
					$update_member_registration['pre_division_id'] 		= $this->input->post('pre_division_id', true);
					$update_member_registration['pre_zilla_id'] 		= $this->input->post('pre_zilla_id', true);
					$update_member_registration['pre_upozilla_id'] 		= $this->input->post('pre_upozilla_id', true);
					$update_member_registration['pre_village_road'] 	= $this->input->post('pre_village_road', true);
					$update_member_registration['par_division_id'] 		= $this->input->post('par_division_id', true);
					$update_member_registration['par_zilla_id'] 		= $this->input->post('par_zilla_id', true);
					$update_member_registration['par_upozilla_id'] 		= $this->input->post('par_upozilla_id', true);
					$update_member_registration['par_village_road'] 	= $this->input->post('par_village_road', true);
					$update_member_registration['live_interview_link'] 	= $this->input->post('live_interview_link', true);
					$update_member_registration['nid_card'] 			= $this->input->post('nid_card', true);

					if (!empty($_FILES["photo"]['name'])) {

						//exta work
						$path_parts               = pathinfo($_FILES["photo"]['name']);
						$newfile_name             = preg_replace('/[^A-Za-z]/', "", $path_parts['filename']);
						$dir                      = date("YmdHis", time());
						$config['file_name']      = $newfile_name . '_' . $dir;
						$config['remove_spaces']  = TRUE;
						$config['upload_path']    = 'assets/volleyball/';
						$config['max_size']       = '20000'; //  less than 20 MB
						$config['allowed_types']  = 'jpg|png|jpeg|jpg|JPG|JPG|PNG|JPEG|pdf|docx';

						$this->load->library('upload', $config);
						$this->upload->initialize($config);
						if (!$this->upload->do_upload('photo')) {
						} else {

							$upload = $this->upload->data();
							$update_member_registration['photo']   = $config['upload_path'] . $upload['file_name'];

							$file_parts = pathinfo($update_member_registration['photo']);
							if ($file_parts['extension'] != "pdf") {
								$this->image_size_fix($update_member_registration['photo'], $width = 440, $height = 320);
							}
						}
					}

					if ($this->AdminModel->member_registratrion_update($update_member_registration, $param2)) {

						$this->session->set_flashdata('message', 'Data Updated Successfully!');
						redirect('admin/member-registration/list', 'refresh');
					} else {

						$this->session->set_flashdata('message', 'Data Update Failed!');
						redirect('admin/member-registration/list', 'refresh');
					}
				}
			} else {

				$this->session->set_flashdata('message', 'Wrong Attempt!');
				redirect('admin/member-registration/list', 'refresh');
			}

			$data['title']      = 'Member Registration Edit';
			$data['activeMenu'] = 'member_registration_edit';
			$data['page']       = 'backEnd/admin/member_registration_edit';
		} elseif ($param1 == 'list') {

			$config = array();
			$config["base_url"] = base_url() . "admin/member-registration/list";
			$config["total_rows"] = $this->db->get('tbl_member_registration')->num_rows();
			$config["per_page"] = 10;
			$config["uri_segment"] = 4;

			//custom
			$config['full_tag_open'] = '<ul class="pagination">';
			$config['full_tag_close'] = '</ul>';

			$config['first_link'] = "First";
			$config['last_link'] = "Last";

			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';

			$config['prev_link'] = '«';
			$config['prev_tag_open'] = '<li class="prev">';
			$config['prev_tag_close'] = '</li>';

			$config['next_link'] = '»';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';

			$config['last_tag_open'] = '<li>';
			$config['last_tag_close'] = '</li>';

			$config['cur_tag_open'] = '<li class="active"><a href="#">';
			$config['cur_tag_close'] = '</a></li>';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';

			$this->pagination->initialize($config);

			$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

			$data["links"] = $this->pagination->create_links();

			$data['member_registration_list'] = $this->AdminModel->get_member_registration_list($config["per_page"], $page);

			$data['new_serial'] = $page;

			$data['title']      = 'Member Registration List';
			$data['page']       = 'backEnd/admin/member_registration_list';
			$data['activeMenu'] = 'member_registration_list';
		} elseif ($param1 == 'delete' && $param2 > 0) {

			if ($this->AdminModel->member_registration_delete($param2)) {

				$this->session->set_flashdata('message', 'Data Deleted Successfully!');
				redirect('admin/member-registration/list', 'refresh');
			} else {

				$this->session->set_flashdata('message', 'Data Deleted Failed!');
				redirect('admin/member-registration/list', 'refresh');
			}
		} else {

			$this->session->set_flashdata('message', 'Wrong Attempt!');
			redirect('admin/member-registration/list', 'refresh');
		}

		$this->load->view('backEnd/master_page', $data);
	}

	// category ajax load 
	public function load_member_category_ajax()
	{
		$data = array();

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			$data['category_id'] = $this->input->post('category_id', true);

			$data['category_details'] = $this->db->where('id', $data['category_id'])->get('tbl_member_category')->row();

			$this->load->view('backEnd/admin/member_category_load_ajax', $data);
		}
	}

	//Member Registraion Category
	public function member_registration_category($param1 = 'add', $param2 = '', $param3 = '')
	{

		if ($param1 == 'add') {

			$data['member_registraion_list'] = $this->db->get('tbl_member_registration')->result();
			$data['member_category_list'] = $this->db->get('tbl_member_category')->result();

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {

				$insert_member_registration_category_data['membership_registration_id'] = $this->input->post('membership_registration_id', true);
				$insert_member_registration_category_data['member_category_id']      	= $this->input->post('member_category_id', true);
				$insert_member_registration_category_data['category_values']       		= $this->input->post('category_values', true);
				$insert_member_registration_category_data['insert_by']   				= $_SESSION['userid'];
				$insert_member_registration_category_data['insert_time'] 				= date('Y-m-d H:i:s');


				$member_registraion_category_data = $this->db->insert('tbl_member_registration_category', $insert_member_registration_category_data);

				if ($member_registraion_category_data) {

					$this->session->set_flashdata('message', 'Data Created Successfully!');
					redirect('admin/member-registration-category/list', 'refresh');
				} else {

					$this->session->set_flashdata('message', 'Data Created Failed!');
					redirect('admin/member-registration-category/list', 'refresh');
				}
			}

			$data['title']         = 'Add Member Registraion Category Data';
			$data['page']          = 'backEnd/admin/member_registraion_category_add';
			$data['activeMenu']    = 'member_registraion_category_add';
		} elseif ($param1 == 'edit' && (int) $param2 > 0) {

			$check_table_row = $this->db->where('id', $param2)->get('tbl_member_registration_category');

			if ($check_table_row->num_rows() > 0) {

				$data['member_registraion_category_list'] = $check_table_row->row();
				$data['member_registraion_list'] = $this->db->get('tbl_member_registration')->result();
				$data['member_category_list'] = $this->db->get('tbl_member_category')->result();

				if ($_SERVER['REQUEST_METHOD'] == 'POST') {

					$update_member_registration_category_data['membership_registration_id'] = $this->input->post('membership_registration_id', true);
					$update_member_registration_category_data['member_category_id']      	= $this->input->post('member_category_id', true);
					$update_member_registration_category_data['category_values']       		= $this->input->post('category_values', true);

					$this->db->where('id', $param2)->update('tbl_member_registration_category', $update_member_registration_category_data);

					$this->session->set_flashdata('message', 'Data Updated Successfully');
					redirect('admin/member-registration-category/list', 'refresh');
				}
			}

			$data['title']         = 'Member Registraion Category Update';
			$data['page']          = 'backEnd/admin/member_registraion_category_edit';
			$data['activeMenu']    = 'member_registraion_category_edit';
		} elseif ($param1 == 'list') {

			$config = array();
			$config["base_url"] = base_url() . "admin/member-registraion-category/list";
			$config["total_rows"] = $this->db->get('tbl_member_registration_category')->num_rows();
			$config["per_page"] = 10;
			$config["uri_segment"] = 4;

			//custom
			$config['full_tag_open'] = '<ul class="pagination">';
			$config['full_tag_close'] = '</ul>';

			$config['first_link'] = "First";
			$config['last_link'] = "Last";

			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';

			$config['prev_link'] = '«';
			$config['prev_tag_open'] = '<li class="prev">';
			$config['prev_tag_close'] = '</li>';

			$config['next_link'] = '»';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';

			$config['last_tag_open'] = '<li>';
			$config['last_tag_close'] = '</li>';

			$config['cur_tag_open'] = '<li class="active"><a href="#">';
			$config['cur_tag_close'] = '</a></li>';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';

			$this->pagination->initialize($config);

			$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

			$data["links"] = $this->pagination->create_links();

			$data['member_registraion_category_list'] = $this->AdminModel->get_member_registraion_category_list($config["per_page"], $page);

			$data['new_serial'] = $page;

			$data['title']      = 'Member Registraion list';
			$data['page']       = 'backEnd/admin/member_registraion_category_list';
			$data['activeMenu'] = 'member_registraion_category_list';
		} elseif ($param1 == 'delete' && $param2 > 0) {

			if ($this->AdminModel->member_registraion_category_delete($param2)) {

				$this->session->set_flashdata('message', 'Data Deleted Successfully!');
				redirect('admin/member-registration-category/list', 'refresh');
			} else {

				$this->session->set_flashdata('message', 'Data Deleted Failed!');
				redirect('admin/member-registration-category/list', 'refresh');
			}
		} else {

			$this->session->set_flashdata('message', 'Wrong Attempt!');
			redirect('admin/member-registration-category/list', 'refresh');
		}


		$this->load->view('backEnd/master_page', $data);
	}

	//Slider
	public function slider()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			$update_slider['title']         		= $this->input->post('title', true);
			$update_slider['sort_description']    	= $this->input->post('sort_description', true);
			$update_slider['insert_by']   			= $_SESSION['userid'];
			$update_slider['last_update'] 			= date('Y-m-d H:i:s');

			if (!empty($_FILES['photo1']['name'])) {

				$path_parts 					= pathinfo($_FILES["photo1"]['name']);
				$newfile_name   				= preg_replace('/[^A-Za-z]/', "", $path_parts['filename']);
				$dir							= date("YmdHis", time());
				$config_c['file_name']  		= $newfile_name . '_' . $dir;
				$config_c['remove_spaces']  	= TRUE;
				$config_c['upload_path']		= 'assets/SliderPhoto/';
				$config_c['max_size']   		= '20000'; //  less than 20 MB
				$config_c['allowed_types']  	= 'jpg|png|jpeg|jpg|JPG|JPG|PNG|JPEG';

				$this->load->library('upload', $config_c);
				$this->upload->initialize($config_c);

				if (!$this->upload->do_upload('photo1')) {
				} else {

					$upload_c 						= $this->upload->data();
					$update_slider['photo1'] 	= $config_c['upload_path'] . $upload_c['file_name'];
					$this->image_size_fix($update_slider['photo1'], 400, 400);
				}
			}
			if (!empty($_FILES['photo2']['name'])) {

				$path_parts 					= pathinfo($_FILES["photo2"]['name']);
				$newfile_name   				= preg_replace('/[^A-Za-z]/', "", $path_parts['filename']);
				$dir							= date("YmdHis", time());
				$config_c['file_name']  		= $newfile_name . '_' . $dir;
				$config_c['remove_spaces']  	= TRUE;
				$config_c['upload_path']		= 'assets/SliderPhoto/';
				$config_c['max_size']   		= '20000'; //  less than 20 MB
				$config_c['allowed_types']  	= 'jpg|png|jpeg|jpg|JPG|JPG|PNG|JPEG';

				$this->load->library('upload', $config_c);
				$this->upload->initialize($config_c);

				if (!$this->upload->do_upload('photo2')) {
				} else {

					$upload_c 						= $this->upload->data();
					$update_slider['photo2'] 	= $config_c['upload_path'] . $upload_c['file_name'];
					$this->image_size_fix($update_slider['photo2'], 400, 400);
				}
			}
			if (!empty($_FILES['photo3']['name'])) {

				$path_parts 					= pathinfo($_FILES["photo3"]['name']);
				$newfile_name   				= preg_replace('/[^A-Za-z]/', "", $path_parts['filename']);
				$dir							= date("YmdHis", time());
				$config_c['file_name']  		= $newfile_name . '_' . $dir;
				$config_c['remove_spaces']  	= TRUE;
				$config_c['upload_path']		= 'assets/SliderPhoto/';
				$config_c['max_size']   		= '20000'; //  less than 20 MB
				$config_c['allowed_types']  	= 'jpg|png|jpeg|jpg|JPG|JPG|PNG|JPEG';

				$this->load->library('upload', $config_c);
				$this->upload->initialize($config_c);

				if (!$this->upload->do_upload('photo3')) {
				} else {

					$upload_c 						= $this->upload->data();
					$update_slider['photo3'] 	= $config_c['upload_path'] . $upload_c['file_name'];
					$this->image_size_fix($update_slider['photo3'], 400, 400);
				}
			}
			if (!empty($_FILES['photo4']['name'])) {

				$path_parts 					= pathinfo($_FILES["photo4"]['name']);
				$newfile_name   				= preg_replace('/[^A-Za-z]/', "", $path_parts['filename']);
				$dir							= date("YmdHis", time());
				$config_c['file_name']  		= $newfile_name . '_' . $dir;
				$config_c['remove_spaces']  	= TRUE;
				$config_c['upload_path']		= 'assets/SliderPhoto/';
				$config_c['max_size']   		= '20000'; //  less than 20 MB
				$config_c['allowed_types']  	= 'jpg|png|jpeg|jpg|JPG|JPG|PNG|JPEG';

				$this->load->library('upload', $config_c);
				$this->upload->initialize($config_c);

				if (!$this->upload->do_upload('photo4')) {
				} else {

					$upload_c 						= $this->upload->data();
					$update_slider['photo4'] 	= $config_c['upload_path'] . $upload_c['file_name'];
					$this->image_size_fix($update_slider['photo4'], 400, 400);
				}
			}


			if ($this->AdminModel->slider_update($update_slider)) {

				$this->session->set_flashdata('message', 'Slider Updated Successfully!');
				redirect('admin/slider', 'refresh');
			} else {

				$this->session->set_flashdata('message', 'Slider Updated Failed!');
				redirect('admin/slider', 'refresh');
			}
		}


		$data['slider_edit'] = $this->db->where('id', 1)->get('tbl_slider')->row();


		$data['title']             = 'Slider';
		$data['activeMenu']        = 'slider';
		$data['page']              = 'backEnd/admin/slider';

		$this->load->view('backEnd/master_page', $data);
	}

	public function testimonial($param1 = 'add', $param2 = '', $param3 = '')
	{
		if ($param1 == 'add') {

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {

				$insert_testimonials['name']        = $this->input->post('name', true);
				$insert_testimonials['position']    = $this->input->post('position', true);
				$insert_testimonials['priority']    = $this->input->post('priority', true);
				$insert_testimonials['description'] = $this->input->post('description', true);
				$insert_testimonials['insert_by']   = $_SESSION['userid'];
				$insert_testimonials['insert_time'] = date('Y-m-d H:i:s');

				if (!empty($_FILES['photo']['name'])) {

					$path_parts                 = pathinfo($_FILES["photo"]['name']);
					$newfile_name               = preg_replace('/[^A-Za-z]/', "", $path_parts['filename']);
					$dir                        = date("YmdHis", time());
					$config_c['file_name']      = $newfile_name . '_' . $dir;
					$config_c['remove_spaces']  = TRUE;
					$config_c['upload_path']    = 'assets/testimonialsPhoto/';
					$config_c['max_size']       = '20000'; //  less than 20 MB
					$config_c['allowed_types']  = 'jpg|png|jpeg|jpg|JPG|JPG|PNG|JPEG';

					$this->load->library('upload', $config_c);
					$this->upload->initialize($config_c);
					if (!$this->upload->do_upload('photo')) {
					} else {

						$upload_c = $this->upload->data();
						$insert_testimonials['photo'] = $config_c['upload_path'] . $upload_c['file_name'];
						$this->image_size_fix($insert_testimonials['photo'], 400, 400);
					}
				}

				$add_testimonials = $this->db->insert('tbl_testimonial', $insert_testimonials);

				if ($add_testimonials) {

					$this->session->set_flashdata('message', 'Testimonials Added Successfully!');
					redirect('admin/testimonial/list', 'refresh');
				} else {

					$this->session->set_flashdata('message', 'Testimonials Add Failed!');
					redirect('admin/testimonial/list', 'refresh');
				}
			}

			$data['title']             = 'Testimonials Add';
			$data['activeMenu']        = 'testimonials_add';
			$data['page']              = 'backEnd/admin/testimonials_add';
		} elseif ($param1 == 'list') {

			$data['title']        = 'Testimonials List';
			$data['activeMenu']   = 'testimonials_list';
			$data['testimonials'] = $this->db->get('tbl_testimonial')->result();
			$data['page']         = 'backEnd/admin/testimonials_list';
		} elseif ($param1 == 'edit' && $param2 > 0) {

			$data['edit_info']   = $this->db->get_where('tbl_testimonial', array('id' => $param2));

			if ($data['edit_info']->num_rows() > 0) {

				$data['edit_info']    = $data['edit_info']->row();

				if ($_SERVER['REQUEST_METHOD'] == 'POST') {

					$update_testimonials['name']        = $this->input->post('name', true);
					$update_testimonials['position']    = $this->input->post('position', true);
					$update_testimonials['priority']    = $this->input->post('priority', true);
					$update_testimonials['description'] = $this->input->post('description', true);

					if (!empty($_FILES['photo']['name'])) {

						$path_parts                 = pathinfo($_FILES["photo"]['name']);
						$newfile_name               = preg_replace('/[^A-Za-z]/', "", $path_parts['filename']);
						$dir                        = date("YmdHis", time());
						$config_c['file_name']      = $newfile_name . '_' . $dir;
						$config_c['remove_spaces']  = TRUE;
						$config_c['upload_path']    = 'assets/testimonialsPhoto/';
						$config_c['max_size']       = '20000'; //  less than 20 MB
						$config_c['allowed_types']  = 'jpg|png|jpeg|jpg|JPG|JPG|PNG|JPEG';

						$this->load->library('upload', $config_c);
						$this->upload->initialize($config_c);
						if (!$this->upload->do_upload('photo')) {
						} else {

							$upload_c = $this->upload->data();
							$update_testimonials['photo'] = $config_c['upload_path'] . $upload_c['file_name'];
							$this->image_size_fix($update_testimonials['photo'], 400, 400);
						}
					}

					if ($this->AdminModel->update_testimonials($update_testimonials, $param2)) {

						$this->session->set_flashdata('message', 'Testimonials  Updated Successfully!');
						redirect('admin/testimonial/list', 'refresh');
					} else {

						$this->session->set_flashdata('message', 'Testimonials Update Failed!');
						redirect('admin/testimonial/list', 'refresh');
					}
				}
			} else {

				$this->session->set_flashdata('message', 'Wrong Attempt!');
				redirect('admin/testimonial/list', 'refresh');
			}

			$data['title']      = 'Testimonials Edit';
			$data['activeMenu'] = 'testimonials_edit';
			$data['page']       = 'backEnd/admin/testimonials_edit';
		} elseif ($param1 == 'delete' && $param2 > 0) {

			if ($this->AdminModel->delete_testimonials($param2)) {

				$this->session->set_flashdata('message', 'Testimonials  Deleted Successfully!');
				redirect('admin/testimonial/list', 'refresh');
			} else {

				$this->session->set_flashdata('message', 'Testimonials Deleted Failed!');
				redirect('admin/testimonial/list', 'refresh');
			}
		} else {

			$this->session->set_flashdata('message', 'Wrong Attempt!');
			redirect('admin/testimonial/list', 'refresh');
		}

		$this->load->view('backEnd/master_page', $data);
	}

	public function page_settings($param1 = 'add', $param2 = '', $param3 = '')
	{

		if ($param1 == 'add') {

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {

				$page_settings_data['name']           = $this->input->post('name', true);
				$page_settings_data['title']          = $this->input->post('title', true);
				$page_settings_data['body']           = $this->input->post('body');
				$page_settings_data['is_menu']        = $this->input->post('is_menu', true);
				$page_settings_data['priority']       = $this->input->post('priority', true);
				$page_settings_data['parent_page_id'] = $this->input->post('parent_page_id', true);

				if (!empty($_FILES["attatched"]['name'])) {

					//exta work
					$path_parts                 = pathinfo($_FILES["attatched"]['name']);
					$newfile_name               = preg_replace('/[^A-Za-z]/', "", $path_parts['filename']);
					$dir                        = date("YmdHis", time());
					$config['file_name']      = $newfile_name . '_' . $dir;
					$config['remove_spaces']  = TRUE;
					$config['upload_path']    = 'assets/pageSettings/';
					$config['max_size']       = '20000'; //  less than 20 MB
					$config['allowed_types']  = 'jpg|png|jpeg|jpg|JPG|JPG|PNG|JPEG|pdf|docx';

					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					if (!$this->upload->do_upload('attatched')) {
					} else {

						$upload = $this->upload->data();
						$page_settings_data['attatched']   = $config['upload_path'] . $upload['file_name'];

						$file_parts = pathinfo($page_settings_data['attatched']);
						if ($file_parts['extension'] != "pdf") {
							$this->image_size_fix($page_settings_data['attatched'], $width = 440, $height = 320);
						}
					}
				}

				$check_name_exist = $this->db->where('name', $page_settings_data['name'])->get('tbl_common_pages');
				if ($check_name_exist->num_rows() > 0) {

					$this->session->set_flashdata('message', 'This Page Already Exists!');
					redirect('admin/page_settings', 'refresh');
				} else {

					$page_settings = $this->db->insert('tbl_common_pages', $page_settings_data);

					if ($page_settings) {

						$this->session->set_flashdata('message', 'Page Created Successfully!');
						redirect('admin/page_settings', 'refresh');
					} else {

						$this->session->set_flashdata('message', 'Page Create Failed!');
						redirect('admin/page_settings', 'refresh');
					}
				}
			}

			$data['title']         = 'Page Setting Add';
			$data['page']          = 'backEnd/admin/page_settings_add';
			$data['activeMenu']    = 'page_settings_add';
			$data['page_settings'] = $this->db->select('id, name')->get('tbl_common_pages')->result();
		} elseif ($param1 == 'edit' && (int) $param2 > 0) {

			$data['table_info']    = $this->db->where('id', $param2)->get('tbl_common_pages')->row();
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {

				//exta work
				$path_parts                 	= pathinfo($_FILES["attatched"]['name']);
				$newfile_name               	= preg_replace('/[^A-Za-z]/', "", $path_parts['filename']);
				$dir                        	= date("YmdHis", time());
				$config['file_name']        	= $newfile_name . '_' . $dir;
				$config['remove_spaces']    	= TRUE;
				$config['max_size']         	= '20000'; //  less than 20 MB
				$config['allowed_types']    	= 'jpg|png|jpeg|jpg|JPG|JPG|PNG|JPEG|pdf|docx';
				$config['upload_path']      	= 'assets/pageSettings';

				$old_file_url                   = $data['table_info'];
				$update_data['title']           = $this->input->post('title', true);
				$update_data['body']            = $this->input->post('body');
				$update_data['is_menu']         = $this->input->post('is_menu', true);
				$update_data['priority']        = $this->input->post('priority', true);
				$update_data['parent_page_id']  = $this->input->post('parent_page_id', true);

				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('attatched')) {

					$this->session->set_flashdata('message', 'Data Updated Successfully');
					$this->db->where('id', $param2)->update('tbl_common_pages', $update_data);

					redirect('admin/page_settings/list', 'refresh');
				} else {

					$upload = $this->upload->data();

					$update_data['attatched'] = $config['upload_path'] . '/' . $upload['file_name'];
					$this->db->where('id', $param2)->update('tbl_common_pages', $update_data);
					$file_parts = pathinfo($update_data['attatched']);
					if ($file_parts['extension'] != "pdf") {
						$this->image_size_fix($update_data['attatched'], $width = 440, $height = 320);
					}
					if (file_exists($old_file_url->attatched)) unlink($old_file_url->attatched);
					$this->session->set_flashdata('message', 'Data Updated Successfully');
					redirect('admin/page_settings/list', 'refresh');
				}
			}



			$data['page_settings'] = $this->db->select('id, name')->where('id !=', $param2)->get('tbl_common_pages')->result();



			$data['title']         = 'Page Setting Update';
			$data['page']          = 'backEnd/admin/page_settings_edit';
			$data['activeMenu']    = 'page_settings_edit';
		} elseif ($param1 == 'list') {

			$data['title']      = 'Page Setting List';
			$data['page']       = 'backEnd/admin/page_settings_list';
			$data['activeMenu'] = 'page_settings_list';
			$data['table_info'] = $this->db->get('tbl_common_pages')->result_array();
		} elseif ($param1 == 'delete' && (int) $param2 > 0) {

			$attatched = $this->db->where('id', $param2)->get('tbl_common_pages')->row()->attatched;

			if (file_exists($attatched)) {

				unlink($attatched);
			}

			$page_settings_delete = $this->db->where('id', $param2)->delete('tbl_common_pages');



			if ($page_settings_delete) {

				$this->session->set_flashdata('message', 'Page Deleted Successfully!');
				redirect('admin/page_settings/list', 'refresh');
			} else {

				$this->session->set_flashdata('message', 'Page Delete Failed!');
				redirect('admin/page_settings/list', 'refresh');
			}
		} else {

			$this->session->set_flashdata('message', 'Wrong Attempt!');
			redirect('admin/page_settings/list', 'refresh');
		}

		$this->load->view('backEnd/master_page', $data);
	}

	public function sms_send($param1 = 'list', $param2 = '', $param3 = '')
	{
		if ($param1 == 'list') {

			$data['title']         = 'SMS Send';
			$data['activeMenu']    = 'sms_send';
			$data['page']          = 'backEnd/admin/sms_send_list';
			//$data['sms_send_list'] = $this->db->order_by('send_date_time','desc')->get('tbl_sms_send_list')->result();


		} elseif ($param1 == 'setting') {

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {

				$setting_data['username'] = $this->input->post('username', true);
				$setting_data['password'] = $this->input->post('password', true);

				$update_setting = $this->db->where('id', 1)->update('tbl_sms_send_setting', $setting_data);

				if ($update_setting) {

					$this->session->set_flashdata('message', 'SMS Setting Updated Successfully!');
					redirect('admin/sms_send/setting', 'refresh');
				} else {

					$this->session->set_flashdata('message', 'SMS Setting Update Failed!');
					redirect('admin/sms_send/setting', 'refresh');
				}
			}

			$data['title']        = 'SMS Send';
			$data['activeMenu']   = 'sms_send';
			$data['page']         = 'backEnd/admin/sms_send_setting';
			//$data['setting_info'] = $this->db->where('id',1)->get('tbl_sms_send_setting')->row();

		} elseif ($param1 == 'new_sms') {

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {

				$sms_send_data['send_date_time']   = date('Y-m-d H:i:s');
				$sms_send_data['message']          = $this->input->post('message', true);
				$sms_send_data['receiver_numbers'] = $this->input->post('receiver_numbers', true);
				$sms_send_data['insert_by']        = $_SESSION['userid'];

				$sms_send_add = $this->db->insert('tbl_sms_send_list', $sms_send_data);

				if ($sms_send_add) {

					$this->session->set_flashdata('message', 'Message Send Successfully!');
					redirect('admin/sms_send/new_sms', 'refresh');
				} else {

					$this->session->set_flashdata('message', 'Message Send Failed!');
					redirect('admin/sms_send/new_sms', 'refresh');
				}
			}

			$data['title']         = 'SMS Send';
			$data['activeMenu']    = 'sms_send';
			$data['page']          = 'backEnd/admin/sms_send_new';
		} else {

			$this->session->set_flashdata('message', 'Wrong Attempt!');
			redirect('admin/sms_send/list', 'refresh');
		}

		$this->load->view('backEnd/master_page', $data);
	}

	public function get_sms_number($sms_to)
	{
		if ($sms_to == 1) {

			$result = $this->db->select('mobile')->get('tbl_members')->result();

			$mobile = '';

			foreach ($result as $key => $value) {

				if ($mobile != '') if ($value->mobile != '') $mobile .= ',';
				$mobile .= $value->mobile;
			}

			echo json_encode($mobile, JSON_UNESCAPED_UNICODE);
		} else {

			$result = $this->db->select('phone as mobile')->get('tbl_committee')->result();

			$mobile = '';

			foreach ($result as $key => $value) {

				if ($mobile != '') if ($value->mobile != '') $mobile .= ',';
				$mobile .= $value->mobile;
			}
			echo json_encode($mobile, JSON_UNESCAPED_UNICODE);
		}
	}

	public function mail_setting()
	{

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			foreach ($this->input->post('mail_setting_id', true) as $key => $id_value) {

				$id    = $id_value;
				$value = $this->input->post('value', true)[$key];

				$this->db->where('id', $id)->update('tbl_mail_send_setting', array('value' => $value));
			}

			$this->session->set_flashdata('message', 'Mail Send Setting Updated Successfully!');
			redirect('admin/mail_setting', 'refresh');
		}

		$data['title']             = 'Mail Setting';
		$data['activeMenu']        = 'mail_setting';
		$data['page']              = 'backEnd/admin/mail_setting';
		$data['mail_setting_info'] = $this->db->get('tbl_mail_send_setting')->result();
		$this->load->view('backEnd/master_page', $data);
	}

	public function team_zoon_type($param1 = 'add', $param2 = '', $param3 = '')
	{
		if ($param1 == 'add') {

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {

				$insert_team_zoon_type['name']             = $this->input->post('name', true);

				$insert_team_zoon_type['priority']         = $this->input->post('priority', true);
				$insert_team_zoon_type['insert_time']      = $_SESSION['userid'];
				$insert_team_zoon_type['insert_by']   	    = date('Y-m-d H:i:s');


				$team_zoon_type_add = $this->db->insert('tbl_team_zoon_type', $insert_team_zoon_type);

				if ($team_zoon_type_add) {

					$this->session->set_flashdata('message', "Data Added Successfully.");
					redirect('admin/team_zoon_type/', 'refresh');
				} else {

					$this->session->set_flashdata('message', "Data Add Failed.");
					redirect('admin/team_zoon_type/', 'refresh');
				}
			}
		} else if ($param1 == 'edit' && $param2 > 0) {

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {

				$update_team_zoon_type['name']      = $this->input->post('name', true);
				$update_team_zoon_type['priority']         = $this->input->post('priority', true);


				if ($this->AdminModel->team_zoon_type_update($update_team_zoon_type, $param2)) {

					$this->session->set_flashdata('message', "Data Updated Successfully.");
					redirect('admin/team_zoon_type', 'refresh');
				} else {

					$this->session->set_flashdata('message', "Data Update Failed.");
					redirect('admin/team_zoon_type', 'refresh');
				}
			}

			$data['team_zoon_type_info'] = $this->db->get_where('tbl_team_zoon_type', array('id' => $param2));

			if ($data['team_zoon_type_info']->num_rows() > 0) {

				$data['team_zoon_type_info']    = $data['team_zoon_type_info']->row();
				$data['team_zoon_type_id'] = $param2;
			} else {

				$this->session->set_flashdata('message', "Wrong Attempt !");
				redirect('admin/team_zoon_type', 'refresh');
			}
		} elseif ($param1 == 'delete' && $param2 > 0) {

			if ($this->AdminModel->delete_team_zoon_type($param2)) {

				$this->session->set_flashdata('message', "Data Deleted Successfully.");
				redirect('admin/team_zoon_type   ', 'refresh');
			} else {

				$this->session->set_flashdata('message', "Data Delete Failed.");
				redirect('admin/team_zoon_type   ', 'refresh');
			}
		}
		$data['title']      = 'team_zoon_type';
		$data['activeMenu'] = 'team_zoon_type';
		$data['page']       = 'backEnd/admin/team_zoon_type';
		$data['team_zoon_type_list'] = $this->db->order_by('priority', 'desc')->get('tbl_team_zoon_type')->result();
		$this->load->view('backEnd/master_page', $data);
	}


	public function team_registration($param1 = 'add', $param2 = '', $param3 = '')
	{
		if ($param1 == 'add') {

			$data['member_registraion_list'] = $this->db->get('tbl_member_registration')->result();
			$data['member_category_list'] = $this->db->get('tbl_member_category')->result();
			$data['team_zoon_type_list'] = $this->db->get('tbl_team_zoon_type')->result();

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {

				$insert_team_registration['team_name']              = $this->input->post('team_name', true);
				$insert_team_registration['registration_number']    = $this->input->post('registration_number', true);
				$insert_team_registration['registration_year']      = $this->input->post('registration_year', true);
				$insert_team_registration['team_gender']     		= $this->input->post('team_gender', true);
				$insert_team_registration['team_zoon_type_id'] 	    = $this->input->post('team_zoon_type_id', true);
				$insert_team_registration['mobile_number'] 	   		= $this->input->post('mobile_number');
				$insert_team_registration['facebook_link']    		= $this->input->post('facebook_link', true);
				$insert_team_registration['youtube_link'] 	        = $this->input->post('youtube_link', true);

				$insert_team_registration['division_id']              = $this->input->post('division_id', true);
				$insert_team_registration['zilla_id']                = $this->input->post('zilla_id', true);
				$insert_team_registration['upozilla_id']             = $this->input->post('upozilla_id', true);
				$insert_team_registration['post_code'] 	            = $this->input->post('post_code', true);
				$insert_team_registration['road_house'] 		    = $this->input->post('road_house', true);
				$insert_team_registration['website_link'] 	        = $this->input->post('website_link', true);

				$insert_team_registration['insert_by']   			= $_SESSION['userid'];
				$insert_team_registration['insert_time'] 			= date('Y-m-d H:i:s');


				if (!empty($_FILES['club_logo']['name'])) {

					$path_parts                 = pathinfo($_FILES["club_logo"]['name']);
					$newfile_name               = preg_replace('/[^A-Za-z]/', "", $path_parts['filename']);
					$dir                        = date("YmdHis", time());
					$config_c['file_name']      = $newfile_name . '_' . $dir;
					$config_c['remove_spaces']  = TRUE;
					$config_c['upload_path']    = 'assets/themeLogo/';
					$config_c['max_size']       = '20000'; //  less than 20 MB
					$config_c['allowed_types']  = 'jpg|png|jpeg|jpg|JPG|JPG|PNG|JPEG';

					$this->load->library('upload', $config_c);
					$this->upload->initialize($config_c);
					if (!$this->upload->do_upload('club_logo')) {
					} else {

						$upload_c = $this->upload->data();
						$insert_team_registration['club_logo'] = $config_c['upload_path'] . $upload_c['file_name'];
						$this->image_size_fix($insert_team_registration['club_logo'], 300, 300);
					}
					$this->AdminModel->theme_text_update('club_logo', $insert_team_registration['club_logo']);
				}



				if (!empty($_FILES['group_banner']['name'])) {

					$path_parts                 = pathinfo($_FILES["group_banner"]['name']);
					$newfile_name               = preg_replace('/[^A-Za-z]/', "", $path_parts['filename']);
					$dir                        = date("YmdHis", time());
					$config['file_name']      = $newfile_name . '_' . $dir;
					$config['remove_spaces']  = TRUE;
					$config['upload_path']    = 'assets/themeBanner/';
					$config['max_size']       = '20000'; //  less than 20 MB
					$config['allowed_types']  = 'jpg|png|jpeg|jpg|JPG|JPG|PNG|JPEG';

					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					if (!$this->upload->do_upload('group_banner')) {
					} else {

						$upload = $this->upload->data();
						$insert_team_registration['group_banner'] = $config['upload_path'] . $upload['file_name'];
						$this->image_size_fix($insert_team_registration['group_banner'], 600, 315);
					}
					$this->AdminModel->theme_text_update('group_banner', $insert_team_registration['group_banner']);
				}



				$add_team_registration = $this->db->insert('tbl_team_registration', $insert_team_registration);

				$team_registration_id = $this->db->insert_id();

				if ($add_team_registration) {



					$insert_team_registered_members['team_registration_id'] = $team_registration_id;
					$insert_team_registered_members['insert_by']   			= $_SESSION['userid'];
					$insert_team_registered_members['insert_time'] 			= date('Y-m-d H:i:s');

					$name_list = $this->input->post('member_registration_id', true);


					foreach ($name_list as $key => $single_name_row) {

						if (strlen($single_name_row) < 1) continue;



						$insert_team_registered_members['member_registration_id']    			    = $single_name_row;
						$insert_team_registered_members['designation'] 	              = $this->input->post('designation', true)[$key];
						$insert_team_registered_members['member_category_id'] 	   	  = $this->input->post('member_category_id')[$key];
						$insert_team_registered_members['priority']    		          = $this->input->post('priority', true)[$key];


						$this->db->insert('tbl_team_registered_members', $insert_team_registered_members);
					}
				}



				if ($team_registration_id) {

					$this->session->set_flashdata('message', 'Data Added Successfully!');
					redirect('admin/team-registration/list', 'refresh');
				} else {

					$this->session->set_flashdata('message', 'Data Add Failed!');
					redirect('admin/team-registration/list', 'refresh');
				}
			}


			$data['divissions'] = $this->db->get('tbl_divission')->result_array();

			$data['divissions'] = $this->db->get('tbl_divission')->result();
			$data['zilla']     = $this->db->get('tbl_zilla')->result();
			$data['upozilla']   = $this->db->get('tbl_upozilla')->result();


			$data['title']             = 'Team Registration Add';
			$data['activeMenu']        = 'team_registration_add';
			$data['page']              = 'backEnd/admin/team_registration_add';
		} elseif ($param1 == 'edit' && $param2 > 0) {

			$check_table_row = $this->db->where('id', $param2)->get('tbl_team_registration');

			if ($check_table_row->num_rows() > 0) {

				$data['team_registration_details'] = $check_table_row->row();
				$data['member_registraion_list'] = $this->db->get('tbl_member_registration')->result();
				$data['member_category_list'] = $this->db->get('tbl_member_category')->result();
				$data['team_list'] = $this->db->get('tbl_team_zoon_type')->result();

				if ($_SERVER['REQUEST_METHOD'] == 'POST') {

					$update_team_registration['team_name']         		= $this->input->post('team_name', true);
					$update_team_registration['registration_number']    = $this->input->post('registration_number', true);
					$update_team_registration['registration_year']      = $this->input->post('registration_year', true);
					$update_team_registration['team_gender']     		= $this->input->post('team_gender', true);
					$update_team_registration['team_zoon_type_id'] 	    = $this->input->post('team_zoon_type_id', true);
					$update_team_registration['mobile_number'] 	   		= $this->input->post('mobile_number');
					$update_team_registration['facebook_link']    		= $this->input->post('facebook_link', true);
					$update_team_registration['youtube_link'] 	        = $this->input->post('youtube_link', true);
					$update_team_registration['division_id'] 		    = $this->input->post('division_id', true);
					$update_team_registration['zilla_id'] 		        = $this->input->post('zilla_id', true);
					$update_team_registration['upozilla_id'] 		    = $this->input->post('upozilla_id', true);
					$update_team_registration['post_code'] 	            = $this->input->post('post_code', true);
					$update_team_registration['road_house'] 		    = $this->input->post('road_house', true);
					$update_team_registration['website_link'] 	        = $this->input->post('website_link', true);
					$update_team_registration['insert_by']   			= $_SESSION['userid'];
					$update_team_registration['insert_time'] 			= date('Y-m-d H:i:s');

					if (!empty($_FILES['club_logo']['name'])) {

						$path_parts                 = pathinfo($_FILES["club_logo"]['name']);
						$newfile_name               = preg_replace('/[^A-Za-z]/', "", $path_parts['filename']);
						$dir                        = date("YmdHis", time());
						$config_c['file_name']      = $newfile_name . '_' . $dir;
						$config_c['remove_spaces']  = TRUE;
						$config_c['upload_path']    = 'assets/volleyball/';
						$config_c['max_size']       = '20000'; //  less than 20 MB
						$config_c['allowed_types']  = 'jpg|png|jpeg|jpg|JPG|JPG|PNG|JPEG';

						$this->load->library('upload', $config_c);
						$this->upload->initialize($config_c);
						if (!$this->upload->do_upload('club_logo')) {
						} else {

							$upload_c = $this->upload->data();
							$insert_team_registration['club_logo'] = $config_c['upload_path'] . $upload_c['file_name'];
							$this->image_size_fix($insert_team_registration['club_logo'], 300, 300);
						}
						$this->AdminModel->theme_text_update('club_logo', $insert_team_registration['club_logo']);
					}



					if (!empty($_FILES['group_banner']['name'])) {

						$path_parts                 = pathinfo($_FILES["group_banner"]['name']);
						$newfile_name               = preg_replace('/[^A-Za-z]/', "", $path_parts['filename']);
						$dir                        = date("YmdHis", time());
						$config['file_name']      = $newfile_name . '_' . $dir;
						$config['remove_spaces']  = TRUE;
						$config['upload_path']    = 'assets/volleyball/';
						$config['max_size']       = '20000'; //  less than 20 MB
						$config['allowed_types']  = 'jpg|png|jpeg|jpg|JPG|JPG|PNG|JPEG';

						$this->load->library('upload', $config);
						$this->upload->initialize($config);
						if (!$this->upload->do_upload('group_banner')) {
						} else {

							$upload = $this->upload->data();
							$insert_team_registration['group_banner'] = $config['upload_path'] . $upload['file_name'];
							$this->image_size_fix($insert_team_registration['group_banner'], 600, 315);
						}
						$this->AdminModel->theme_text_update('group_banner', $insert_team_registration['share_banner']);
					}


					$edit_team_registration = $this->db->where('id', $param2)->update('tbl_team_registration', $update_team_registration);


					if ($edit_team_registration) {

						$this->session->set_flashdata('message', 'Data Added Successfully!');
						redirect('admin/team-registration/edit/' . $param2, 'refresh');
					} else {

						$this->session->set_flashdata('message', 'Data Add Failed!');
						redirect('admin/team-registration/edit/' . $param2, 'refresh');
					}
				}

				$data['team_registration_member_lsit'] =  $this->db->where('team_registration_id', $data['team_registration_details']->id)->get('tbl_team_registered_members')->result();


				$data['divissions'] = $this->db->get('tbl_divission')->result();
				$data['zilla'] 		= $this->db->WHERE('divission_id', $data['team_registration_details']->division_id)->get('tbl_zilla')->result();
				$data['upozilla'] 	= $this->db->WHERE('zilla_id', $data['team_registration_details']->zilla_id)->get('tbl_upozilla')->result();
			} else {

				$this->session->set_flashdata('message', 'Wrong Attempt!');
				redirect('admin/member-registration/list', 'refresh');
			}


			$data['title']      = 'Team Registration Edit';
			$data['activeMenu'] = 'team_registration_edit';
			$data['page']       = 'backEnd/admin/team_registration_edit';
		} elseif ($param1 == 'list') {

			$config = array();
			$config["base_url"] = base_url() . "admin/team-registration/list";
			$config["total_rows"] = $this->db->get('tbl_team_registration')->num_rows();
			$config["per_page"] = 10;
			$config["uri_segment"] = 4;

			//custom
			$config['full_tag_open'] = '<ul class="pagination">';
			$config['full_tag_close'] = '</ul>';

			$config['first_link'] = "First";
			$config['last_link'] = "Last";

			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';

			$config['prev_link'] = '«';
			$config['prev_tag_open'] = '<li class="prev">';
			$config['prev_tag_close'] = '</li>';

			$config['next_link'] = '»';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';

			$config['last_tag_open'] = '<li>';
			$config['last_tag_close'] = '</li>';

			$config['cur_tag_open'] = '<li class="active"><a href="#">';
			$config['cur_tag_close'] = '</a></li>';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';

			$this->pagination->initialize($config);

			$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

			$data["links"] = $this->pagination->create_links();

			$data['team_registration_list'] = $this->AdminModel->get_team_registration_list($config["per_page"], $page);

			$data['new_serial'] = $page;

			$data['title']      = 'Team Registration List';
			$data['page']       = 'backEnd/admin/team_registration_list';
			$data['activeMenu'] = 'team_registration_list';
		} elseif ($param1 == 'delete' && $param2 > 0) {

			if ($this->AdminModel->team_registration_delete($param2)) {

				$this->session->set_flashdata('message', 'Data Deleted Successfully!');
				redirect('admin/team-registration/list', 'refresh');
			} else {

				$this->session->set_flashdata('message', 'Data Deleted Failed!');
				redirect('admin/team-registration/list', 'refresh');
			}
		} else {

			$this->session->set_flashdata('message', 'Wrong Attempt!');
			redirect('admin/team-registration/list', 'refresh');
		}

		$this->load->view('backEnd/master_page', $data);
	}

	public function team_registration_member_update($param1 = 0, $param2 = 0)
	{
	}

	public function update_single_team_member_update($id = '')
	{
		$response = array(
			"status" => 'FAILED',
			"data" => array(
				"message" => "Connection Error",
			)
		);



		if ($_SERVER['REQUEST_METHOD'] == 'POST') {


			$team_member_id = $this->input->post('team_member_id', true);


			$check_table_row = $this->db->where('id', $team_member_id)->get('tbl_team_registered_members');

			if ($check_table_row->num_rows() > 0) {


				$update_team_registared_member_details['member_registration_id']           = $this->input->post('member_registration_id', true);
				$update_team_registared_member_details['designation']                      = $this->input->post('designation', true);
				$update_team_registared_member_details['member_type']                      = $this->input->post('member_type', true);
				$update_team_registared_member_details['priority']                         = $this->input->post('priority', true);

				$update_team_registared_member_details['insert_by']                        = $_SESSION['userid'];


				if (!empty($_FILES['photo']['name'])) {

					$path_parts                 = pathinfo($_FILES["photo"]['name']);
					$newfile_name               = preg_replace('/[^A-Za-z]/', "", $path_parts['filename']);
					$dir                        = date("YmdHis", time());
					$config_c['file_name']      = $newfile_name . '_' . $dir;
					$config_c['remove_spaces']  = TRUE;
					$config_c['upload_path']    = 'assets/volleyball/';
					$config_c['max_size']       = '20000'; //  less than 20 MB
					$config_c['allowed_types']  = 'jpg|png|jpeg|jpg|JPG|JPG|PNG|JPEG';

					$this->load->library('upload', $config_c);
					$this->upload->initialize($config_c);
					if (!$this->upload->do_upload('photo')) {
					} else {

						$upload_c = $this->upload->data();
						$update_team_registared_member_details['photo'] = $config_c['upload_path'] . $upload_c['file_name'];
						$this->image_size_fix($update_team_registared_member_details['photo'], 300, 300);
					}
				}

				$this->AdminModel->update_team_registared_members($update_team_registared_member_details, $team_member_id);

				$response = array(
					"status" => 'SUCCESS',
					"data" => array(
						"message" => "DATA UPDATED SUCCESSFULLY.",
					)
				);
			}
		}

		echo json_encode($response, JSON_UNESCAPED_UNICODE);
	}



	public function member_registration_add_ajax($id = '')
	{

		$member_name = "";
		$last_insert_id = 0;

		$response = array(
			"status" => 'FAILED',
			"data" => array(
				"message" => "DATA UPDATED FAILED.",
				"last_insert_id" => $last_insert_id,
				"last_insert_name" => $member_name,
			)
		);



		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			$insert_member_registration['name_bn']         		= $this->input->post('name_bn', true);
			$insert_member_registration['name_en']    			= $this->input->post('name_en', true);
			$insert_member_registration['phone'] 	       		= $this->input->post('phone', true);
			$insert_member_registration['insert_by']   			= $_SESSION['userid'];
			$insert_member_registration['insert_time'] 			= date('Y-m-d H:i:s');

			$member_name = $insert_member_registration['name_en'];

			if (!empty($_FILES["photo"]['name'])) {

				//exta work
				$path_parts               = pathinfo($_FILES["photo"]['name']);
				$newfile_name             = preg_replace('/[^A-Za-z]/', "", $path_parts['filename']);
				$dir                      = date("YmdHis", time());
				$config['file_name']      = $newfile_name . '_' . $dir;
				$config['remove_spaces']  = TRUE;
				$config['upload_path']    = 'assets/volleyball/';
				$config['max_size']       = '20000'; //  less than 20 MB
				$config['allowed_types']  = 'jpg|png|jpeg|jpg|JPG|JPG|PNG|JPEG';

				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				if (!$this->upload->do_upload('photo')) {
				} else {

					$upload = $this->upload->data();
					$insert_member_registration['photo']   = $config['upload_path'] . $upload['file_name'];

					$file_parts = pathinfo($insert_member_registration['photo']);
					if ($file_parts['extension'] != "pdf") {
						$this->image_size_fix($insert_member_registration['photo'], $width = 440, $height = 320);
					}
				}
			}

			$add_member_registration = $this->db->insert('tbl_member_registration', $insert_member_registration);

			$last_insert_id = $this->db->insert_id();

			if ($add_member_registration) {

				$response = array(
					"status" => 'SUCCESS',
					"data" => array(
						"message" => "DATA UPDATED SUCCESSFULLY.",
						"last_insert_id" => $last_insert_id,
						"last_insert_name" => $member_name,
					)
				);
			} else {

				$response = array(
					"status" => 'FAILED',
					"data" => array(
						"message" => "DATA UPDATED FAILED.",
						"last_insert_id" => $last_insert_id,
						"last_insert_name" => $member_name,
					)
				);
			}
		}

		echo json_encode($response, JSON_UNESCAPED_UNICODE);
	}

	// Game Registration
	public function game_registration($param1 = 'add', $param2 = '', $param3 = '')
	{
		if ($param1 == 'add') {

			$data['team_zoon_type_list'] = $this->db->get('tbl_team_zoon_type')->result();

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				$insert_data['game_name'] = $this->input->post('game_name', true);

				$insert_data['opening_date'] = date('Y-m-d', strtotime($this->input->post('opening_date', true)));
				$insert_data['application_last_date'] = date('Y-m-d', strtotime($this->input->post('application_last_date', true)));

				$insert_data['team_gender'] = $this->input->post('team_gender', true);
				$insert_data['facebook_link'] = $this->input->post('facebook_link', true);
				$insert_data['youtube_link'] = $this->input->post('youtube_link', true);
				$insert_data['twitter_link'] = $this->input->post('twitter_link', true);

				$insert_data['division_id'] = $this->input->post('division_id', true);
				$insert_data['zilla_id'] = $this->input->post('zilla_id', true);
				$insert_data['upozilla_id'] = $this->input->post('upozilla_id', true);
				$insert_data['full_address'] = $this->input->post('full_address', true);

				$insert_data['contact_person_name'] = $this->input->post('contact_person_name', true);
				$insert_data['contact_person_phone'] = $this->input->post('contact_person_phone', true);
				$insert_data['contact_person_mail'] = $this->input->post('contact_person_mail', true);
				$insert_data['team_zoon_type_id'] = $this->input->post('team_zoon_type_id', true);

				$insert_data['insert_by'] = $_SESSION['userid'];
				$insert_data['insert_time'] = date('Y-m-d H:i:s');

				if (!empty($_FILES['game_banner']['name'])) {

					$path_parts                 = pathinfo($_FILES["game_banner"]['name']);
					$newfile_name               = preg_replace('/[^A-Za-z]/', "", $path_parts['filename']);
					$dir                        = date("YmdHis", time());
					$config['file_name']      = $newfile_name . '_' . $dir;
					$config['remove_spaces']  = TRUE;
					$config['upload_path']    = 'assets/themeBanner/';
					$config['max_size']       = '20000'; //  less than 20 MB
					$config['allowed_types']  = 'jpg|png|jpeg|jpg|JPG|JPG|PNG|JPEG';

					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					if (!$this->upload->do_upload('game_banner')) {
					} else {

						$upload = $this->upload->data();
						$insert_data['game_banner'] = $config['upload_path'] . $upload['file_name'];
						$this->image_size_fix($insert_data['game_banner'], 600, 315);
					}
					$this->AdminModel->theme_text_update('game_banner', $insert_data['game_banner']);
				}

				$add_game_registration = $this->db->insert('tbl_game_registration', $insert_data);

				if ($add_game_registration) {
					$this->session->set_flashdata('message', 'Data Added Successfully!');
					redirect('admin/game_registration/list', 'refresh');
				} else {
					$this->session->set_flashdata('message', 'Data Add Failed!');
					redirect('admin/game_registration/add', 'refresh');
				}
			}
			$data['divissions'] = $this->db->get('tbl_divission')->result();
			$data['zilla'] = $this->db->get('tbl_zilla')->result();
			$data['upozilla'] = $this->db->get('tbl_upozilla')->result();


			$data['Team_list'] = $this->db->order_by('id', 'desc')->get('tbl_team_registration')->result();

			$data['title'] = 'Game Registration Add';
			$data['activeMenu'] = 'game_registration_add';
			$data['page'] = 'backEnd/admin/game_registration_add';
		} elseif ($param1 == 'edit' && $param2 > 0) {

			$check_table_row = $this->db->where('id', $param2)->get('tbl_game_registration');
			if ($check_table_row->num_rows() > 0) {
				$data['get_game_list'] = $check_table_row->row();
				$data['team_zoon_type_list'] = $this->db->get('tbl_team_zoon_type')->result();

				// $data['team_list'] = $this->db->get('tbl_team_zoon_type')->result();

				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					$update_game_data['game_name'] = $this->input->post('game_name', true);

          $update_game_data['opening_date'] = date('Y-m-d', strtotime($this->input->post('opening_date', true)));
          $update_game_data['Application_last_date'] = date('Y-m-d', strtotime($this->input->post('application_last_date', true)));
          
					// $update_game_data['application_last_date'] = $this->input->post('application_last_date', true);
					$update_game_data['team_gender'] = $this->input->post('team_gender');
					$update_game_data['facebook_link'] = $this->input->post('facebook_link', true);
					$update_game_data['youtube_link'] = $this->input->post('youtube_link', true);
					$update_game_data['twitter_link'] = $this->input->post('twitter_link', true);
					$update_game_data['division_id'] = $this->input->post('division_id', true);
					$update_game_data['zilla_id'] = $this->input->post('zilla_id', true);
					$update_game_data['upozilla_id'] = $this->input->post('upozilla_id', true);
					$update_game_data['full_address'] = $this->input->post('full_address', true);
					$update_game_data['contact_person_name'] = $this->input->post('contact_person_name', true);
					$update_game_data['contact_person_phone'] = $this->input->post('contact_person_phone', true);
					$update_game_data['contact_person_mail'] = $this->input->post('contact_person_mail', true);
					$update_game_data['team_zoon_type_id'] = $this->input->post('team_zoon_type_id', true);
					$update_game_data['insert_by'] = $_SESSION['userid'];
					$update_game_data['insert_time'] = date('Y-m-d H:i:s');


					if (!empty($_FILES['game_banner']['name'])) {

						$path_parts                 = pathinfo($_FILES["game_banner"]['name']);
						$newfile_name               = preg_replace('/[^A-Za-z]/', "", $path_parts['filename']);
						$dir                        = date("YmdHis", time());
						$config['file_name']      = $newfile_name . '_' . $dir;
						$config['remove_spaces']  = TRUE;
						$config['upload_path']    = 'assets/volleyball/';
						$config['max_size']       = '20000'; //  less than 20 MB
						$config['allowed_types']  = 'jpg|png|jpeg|jpg|JPG|JPG|PNG|JPEG';

						$this->load->library('upload', $config);
						$this->upload->initialize($config);
						if (!$this->upload->do_upload('game_banner')) {
						} else {

							$upload = $this->upload->data();
							$update_game_data['game_banner'] = $config['upload_path'] . $upload['file_name'];
							$this->image_size_fix($update_game_data['game_banner'], 600, 315);
						}
						$this->AdminModel->theme_text_update('game_banner', $update_game_data['share_banner']);
					}
					
					if ($this->AdminModel->game_registration_update($update_game_data, $param2)) {
						$this->session->set_flashdata('message', 'Data Updated Successfully!');
						redirect('admin/game_registration/list', 'refresh');

						
					} else {
						$this->session->set_flashdata('message', 'Data Update Failed!');
						redirect('admin/game_registration/list', 'refresh');
					}

				}
			} else {

				$this->session->set_flashdata('message', 'Wrong Attempt!');
				redirect('admin/game_registration/list', 'refresh');
			}
			
		

			$data['get_Team_list'] = $this->db->order_by('id', 'desc')->get('tbl_team_registration')->result();
			//$data['zoon_list'] = $this->db->get('tbl_team_zoon_type')->result();	
			$data['divissions'] = $this->db->get('tbl_divission')->result();
				$data['zilla'] 		= $this->db->WHERE('divission_id', $data['get_game_list']->division_id)->get('tbl_zilla')->result();
				$data['upozilla'] 	= $this->db->WHERE('zilla_id', $data['get_game_list']->zilla_id)->get('tbl_upozilla')->result();


			$data['title'] = 'Game Registration Edit';
			$data['activeMenu'] = 'game_registration_edit';
			$data['page'] = 'backEnd/admin/game_registration_edit';
		} elseif ($param1 == 'list') {

			$config = array();
			$config["base_url"] = base_url() . "admin/game_registration/list";
			$config["total_rows"] = $this->db->get('tbl_game_registration')->num_rows();
			$config["per_page"] = 10;
			$config["uri_segment"] = 4;

			//custom
			$config['full_tag_open'] = '<ul class="pagination">';
			$config['full_tag_close'] = '</ul>';

			$config['first_link'] = "First";
			$config['last_link'] = "Last";

			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';

			$config['prev_link'] = '«';
			$config['prev_tag_open'] = '<li class="prev">';
			$config['prev_tag_close'] = '</li>';

			$config['next_link'] = '»';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';

			$config['last_tag_open'] = '<li>';
			$config['last_tag_close'] = '</li>';

			$config['cur_tag_open'] = '<li class="active"><a href="#">';
			$config['cur_tag_close'] = '</a></li>';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';

			$this->pagination->initialize($config);

			$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

			$data["links"] = $this->pagination->create_links();

			$data['game_registration_list'] = $this->AdminModel->get_game_registration_list($config["per_page"], $page);

			$data['new_serial'] = $page;

			$data['title'] = 'Game Registration List';
			$data['page'] = 'backEnd/admin/game_registration_list';
			$data['activeMenu'] = 'game_registration_list';
		} elseif ($param1 == 'delete' && $param2 > 0) {

			if ($this->AdminModel->game_registration_delete($param2)) {
				$this->session->set_flashdata('message', 'Data Deleted Successfully!');
				redirect('admin/game_registration/list', 'refresh');
			} else {
				$this->session->set_flashdata('message', 'Data Deleted Failed!');
				redirect('admin/game_registration/list', 'refresh');
			}
		} else {
			$this->session->set_flashdata('message', 'Data Updated Successfully!');
			redirect('admin/game_registration/list', 'refresh');
		}
		$this->load->view('backEnd/master_page', $data);
	}

	// Game Assign
	public function game_assign($param1 = 'add', $param2 = '', $param3 = '')
	{
		if ($param1 == 'add') {

			$data['game_registration_list'] = $this->db->get('tbl_game_registration')->result();
			$data['team_list'] = $this->db->get('tbl_team_registration')->result();

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				$insert_game_assign_data['enroll_date'] = $this->input->post('enroll_date', true);
				$insert_game_assign_data['game_registration_id'] = $this->input->post('game_registration_id', true);
				$insert_game_assign_data['team_registration_id'] = $this->input->post('team_registration_id', true);

				$insert_game_assign_data['approved'] = $this->input->post('approved', true);
				$insert_game_assign_data['insert_time'] = $this->input->post('insert_time', true);
				$insert_game_assign_data['insert_by'] = $_SESSION['userid'];
				$insert_game_assign_data['insert_time'] = date('Y-m-d H:i:s');

				$add_game_assign = $this->db->insert('tbl_game_assign', $insert_game_assign_data);

				if ($add_game_assign) {
					$this->session->set_flashdata('message', 'Data Added Successfully!');
					redirect('admin/game_assign', 'refresh');
				} else {
					$this->session->set_flashdata('message', 'Data Add Failed!');
					redirect('admin/game_assign', 'refresh');
				}
			}
		} else if ($param1 == 'edit' && $param2 > 0) {

			$data['game_registration_list'] = $this->db->get('tbl_game_registration')->result();
			$data['team_list'] = $this->db->get('tbl_team_registration')->result();

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				$update_game_assign_data['game_registration_id'] = $this->input->post('game_registration_id', true);
				$update_game_assign_data['team_registration_id'] = $this->input->post('team_registration_id', true);
				$update_game_assign_data['enroll_date'] = $this->input->post('enroll_date', true);
				$update_game_assign_data['approved'] = $this->input->post('approved', true);
				$update_game_assign_data['insert_time'] = $this->input->post('insert_time');
				$update_game_assign_data['insert_by'] = $_SESSION['userid'];
				$update_game_assign_data['insert_time'] = date('Y-m-d H:i:s');

				// $update_session['name'] = $this->input->post('name', true);

				if ($this->AdminModel->game_assign_update($update_game_assign_data, $param2)) {
					$this->session->set_flashdata('message', "Data Updated Successfully.");
					redirect('admin/game_assign', 'refresh');
				} else {
					$this->session->set_flashdata('message', "Data Update Failed.");
					redirect('admin/game_assign', 'refresh');
				}
			}
			$data['game_assign_info'] = $this->db->get_where('tbl_game_assign', array('id' => $param2));

			if ($data['game_assign_info']->num_rows() > 0) {
				$data['game_assign_info'] = $data['game_assign_info']->row();
				$data['game_assign_id'] = $param2;
			} else {
				$this->session->set_flashdata('message', "Wrong Attempt !");
				redirect('admin/game_assign', 'refresh');
			}
		} elseif ($param1 == 'delete' && $param2 > 0) {

			if ($this->AdminModel->game_assign_delete($param2)) {
				$this->session->set_flashdata('message', "Data Deleted Successfully.");
				redirect('admin/game_assign', 'refresh');
			} else {
				$this->session->set_flashdata('message', "Data Delete Failed.");
				redirect('admin/game_assign', 'refresh');
			}
		}
		$data['title'] = 'Game Assign';
		$data['activeMenu'] = 'game_assign';
		$data['page'] = 'backEnd/admin/game_assign';
		$data['game_assign_list'] = $this->AdminModel->game_assign_list();

		$this->load->view('backEnd/master_page', $data);
	}
}
