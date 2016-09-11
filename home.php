<?php  

class Home extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('pengumuman_model');
	}

	function index(){
		$data = array(
			'title'		=> 'Fasilkom Sports Championship',
			'content'	=> 'download_formulir'
		);
		$this->load->view('includes/template', $data);
	}

	function views(){
		$id = $this->uri->segment(3);

		if(!isset($id)){
			redirect('home');
			exit;
		}

		$data = array(
			'dt'		=> $this->pengumuman_model->get_data_byid($id),
			'title'		=> 'Fasilkom Sports Championship',
			'content'	=> 'pengumuman'
		);
		$this->load->view('includes/template', $data);
	}

	public function futsal() {
        $html = $this->load->view('futsal', $data, true);
 
        $pdfFilePath = "Formulir Futsal.pdf";
 
        $this->load->library('m_pdf');
 
        $this->m_pdf->pdf->WriteHTML($html);
 
        $this->m_pdf->pdf->Output($pdfFilePath, "D");        
    }

    public function catur() {
        $html = $this->load->view('catur', $data, true);
 
        $pdfFilePath = "Formulir Catur.pdf";
 
        $this->load->library('m_pdf');
 
        $this->m_pdf->pdf->WriteHTML($html);
 
        $this->m_pdf->pdf->Output($pdfFilePath, "D");        
    }
	
    public function badminton() {
        $html = $this->load->view('badminton', $data, true);
 
        $pdfFilePath = "Formulir Badminton.pdf";
 
        $this->load->library('m_pdf');
 
        $this->m_pdf->pdf->WriteHTML($html);
 
        $this->m_pdf->pdf->Output($pdfFilePath, "D");        
    }

    public function basket() {
        $html = $this->load->view('basket', $data, true);
 
        $pdfFilePath = "Formulir Basket.pdf";
 
        $this->load->library('m_pdf');
 
        $this->m_pdf->pdf->WriteHTML($html);
 
        $this->m_pdf->pdf->Output($pdfFilePath, "D");        
    }
}

?>