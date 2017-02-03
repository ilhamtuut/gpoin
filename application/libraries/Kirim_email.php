<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kirim_email {

    protected $ci;

    public function __construct() {
        $this->ci = & get_instance();
    }
    
    public function proses($to, $subject, $isi)
    {
       
        $email = 'cso@gpoin2u.com';
        $nama = 'gpoin2u';
        $this->ci->load->library('email');
        $config = array(
            'protocol' => 'sendmail',
            'smtp_host' => 'mail.gpoin2u.com',
            'smtp_port' => 25,
            'smpt_user' => 'cso@gpoin2u.com',
            'smtp_pass' => 'dlnzvxiyyys8',
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
            'wordwrap' => true
            );
        $this->ci->email->initialize($config);
        $this->ci->email->from($email,$nama);
        $this->ci->email->to($to);
        $this->ci->email->subject($subject);
        $konten['isi'] = $isi;
        
        
        $this->ci->email->message($isi);
        $this->ci->email->send();
    }

    


}
