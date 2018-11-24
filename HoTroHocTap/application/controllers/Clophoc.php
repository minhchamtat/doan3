<?php 
/**
 * 
 */
class Clophoc extends CI_Controller
{	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Mlophoc');
		$this->load->model('Mthicu');
		$this->load->model('Mbailam');
		if($this->session->userdata('masinhvien') == '')
		{
			$this->session->set_flashdata('message','Bạn chưa đăng nhập');
			redirect(base_url());
		}
		$this->load->model('Mtintuc');
	}

	public function index($malop='')
	{
		$ds3dethi = $this->Mlophoc->getLimitDethi($malop,3);
		
		$data['ds3dethi']= $ds3dethi;
		$data['malop'] = $malop;
		$data['content'] = 'sinhvien/lophoc/vlophoc';
		$data['slide'] = 'sinhvien/lophoc/lophoc_title';

		$data['malop'] = $malop;
		$data['ds3ThongBaos'] = $this->Mtintuc->getLimitDanhSachThongBao($malop,3);
		$data['ds3CauHois'] = $this->Mtintuc->getLimitDanhSachCauHoi($malop,3);

// 		print("<pre>".print_r($data['ds3CauHois'],true)."</pre>");
// die();
		$this->load->view('sinhvien/view_layout_sv', $data);
	}


	public function dethi($madethi='')
	{
		$where = array('madethi' => $madethi, 
			'masinhvien' => $this->session->userdata('masinhvien'));
		
		if($this->Mbailam->kiemtra($where))
		{
			$dethi = $this->Mthicu->getChitietdethi($madethi);
			$data['dethi'] = $dethi;
			$data['bailam'] = $this->Mbailam->xembailam($where);
			$data['content'] = 'sinhvien/dethi/vlambairoi';
			$this->load->view('sinhvien/view_layout_sv', $data);
		}
		else
		{
			$dethi = $this->Mthicu->getChitietdethi($madethi);
			$data['dethi'] = $dethi;
			$data['content'] = 'sinhvien/lophoc/vdethi';
			$this->load->view('sinhvien/view_layout_sv', $data);
		}
	}

	public function dsdethi($malophoc="")
	{
		$dsdethi = $this->Mlophoc->getDanhsachDethi($malophoc);
		$data['dsdethi'] = $dsdethi;
		$data['content'] = 'sinhvien/lophoc/vdsdethi';
		$this->load->view('sinhvien/view_layout_sv', $data);
	}

}
?>
