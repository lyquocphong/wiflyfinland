<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class MY_Controller extends CI_Controller
{
  protected $data = array();

  protected $view = array(
      'template' => 'default',
      'data' => [
          'title' => 'My CodeIgniter App'
      ]
  );
  
  function __construct()
  {
    parent::__construct();
    $this->data['title'] = 'My CodeIgniter App';
  }
 
  protected function render($the_view = NULL, $data = array(), $template = 'default')
  {
    $pass_data = array_merge($this->data, $data);
    
    if($template == 'json' || $this->input->is_ajax_request())
    {
      header('Content-Type: application/json');
      echo json_encode($this->data);
    }
    elseif(is_null($template))
    {
      $this->load->view($the_view,$this->data);
    }
    else
    {
      $pass_data['content'] = (is_null($the_view)) ? '' : $this->load->view($the_view,$pass_data, TRUE);
      $this->load->view('templates/'.$template, $pass_data);
    }
  }
}