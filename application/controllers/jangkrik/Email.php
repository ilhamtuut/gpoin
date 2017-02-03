<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Email extends CI_Controller {
	
	public function __construct() {
		parent::__construct();

	}

	function sendMail() {
        $ci = get_instance();
        $ci->load->library('email');
        $config['protocol'] = "smtp";
        $config['smtp_host'] = "ssl://smtp.gmail.com";
        $config['smtp_port'] = "465";
        $config['smtp_user'] = "gagastuber@gmail.com";
        $config['smtp_pass'] = "tuberpraka";
        $config['charset'] = "utf-8";
        $config['mailtype'] = "html";
        $config['newline'] = "\r\n";
        $message='<!DOCTYPE html><html lang="en"><head><meta charset="utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="viewport" content="width=device-width, initial-scale=1"><meta name="description" content=""><meta name="author" content=""></head>';
        $message.='<p>Bapak/Ibu .... Poin Anda telah bertambah sebanyak ... Silahkan cek saldo Poin Anda. Terima kasih</p>';
        $message.='<p>Salam Sukses</p>';
        $message.='<p>GPoin2u</p>';
        $message.='</body></html>';
        
        $ci->email->initialize($config);
 
        $ci->email->from('gagastuber@gmail.com', 'Gpoin');
         //$list = array('recipient_email@domain.com');
        $ci->email->to('iam.jamilo18@gmail.com');//email penerima
        $ci->email->subject('Konfirmasi');
        $ci->email->message($message);
        if ($this->email->send()) {
            echo 'Email sent.';
        } else {
            show_error($this->email->print_debugger());
        }
    }
}