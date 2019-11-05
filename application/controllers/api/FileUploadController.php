<?php
class FileUploadingController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('add_model');
		$this->load->helper('text');
	}
	public function upload_img()
	{
		$image = base64_decode($this->input->post("img_front"));
		$image_name = md5(uniqid(rand(), true));
		$filename = $image_name . '.' . 'png';
		//rename file name with random number
		$path = "vehicle_image_upload/" . $filename;
		//image uploading folder path
		file_put_contents($path . $filename, $image);
		// image is bind and upload to respective folde

		$data_insert = array('front_img' => $filename);

		$success = $this->add_model->insert_img($data_insert);
		if ($success) {
			$b = "User Registered Successfully..";
		} else {
			$b = "Some Error Occured. Please Try Again..";
		}
		echo json_encode($b);
	}
}
