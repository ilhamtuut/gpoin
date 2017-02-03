<?php
class Template{
	protected $_ci;
	function __construct()
	{
		$this->_ci=&get_instance();
	}

	function display($Template,$data=null)
	{
		$data['_content']=$this->_ci->load->view($Template,$data,true);
		$data['_header']=$this->_ci->load->view('jangkrik/Template/header',$data,true);
		$data['_menu']=$this->_ci->load->view('jangkrik/Template/menu',$data,true);
		$this->_ci->load->view('jangkrik//Template.php',$data);
	}
}