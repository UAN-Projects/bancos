<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Db extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('migration');
    }

    public function index() 
    {
        if ($this->migration->latest() === FALSE) show_error($this->migration->error_string());
    }
    public function migrate() 
    {
        if ($this->migration->latest() === FALSE) show_error($this->migration->error_string());
    }

    public function version($version) 
    {
        if ($this->migration->version($version) === FALSE) show_error($this->migration->error_string()); 
    }
    
    public function restart() 
    {
        ($this->migration->version(0) === FALSE)? show_error($this->migration->error_string()) : $this->index();
    }
    
    public function drop() 
    {
        if ($this->migration->version(0) === FALSE) show_error($this->migration->error_string());
    }

}