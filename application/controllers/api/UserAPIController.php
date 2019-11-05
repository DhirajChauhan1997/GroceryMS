<?php

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class UserApiController extends REST_Controller
{

	/**
	 * Get All Data from this method.
	 *
	 * @return Response
	 */
	public function __construct()
	{
		parent::__construct();
		//$this->load->database();
	}

	/**
	 * Get All Data from this method.
	 *
	 * @return Response
	 */
	public function index_get($userid = 0)
	{
		if (!empty($userid)) {
			$data = $this->db->get_where("gms_users", ['userid' => $userid])->row_array();
		} else {
			$data = $this->db->get("gms_users")->result();
		}

		$this->response($data, REST_Controller::HTTP_OK);
	}

	/**
	 * Get All Data from this method.
	 *
	 * @return Response
	 */
	public function index_post()
	{
		$input = $this->input->post();
		$this->db->insert('gms_users', $input);

		$this->response(['User created successfully.'], REST_Controller::HTTP_OK);
	}

	/**
	 * Get All Data from this method.
	 *
	 * @return Response
	 */
	public function index_put($userid)
	{
		$input = $this->put();
		$this->db->update('gms_users', $input, array('userid' => $userid));

		$this->response(['gms_users updated successfully.'], REST_Controller::HTTP_OK);
	}

	/**
	 * Get All Data from this method.
	 *
	 * @return Response
	 */
	public function index_delete($userid)
	{
		$this->db->delete('gms_users', array('userid' => $userid));

		$this->response(['gms_users deleted successfully.'], REST_Controller::HTTP_OK);
	}
}
