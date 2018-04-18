<?php

class Chat_model extends CI_Model {
  
  function __construct(){
    parent::__construct();
  //  $this->load->model('admin_model');
     date_default_timezone_set('Asia/Ho_Chi_Minh');
  }


  function get_last_item()
  {
    $this->db->order_by('id', 'DESC');
    $query = $this->db->get('Chats', 1);
    return $query->result();
  }
  
  
  function insert_message($message)
  {
    $timenow = standard_date('DATE_ATOM', time());
    $this->message = $message;
    $this->time = time();  
    $this->sDatetime = $timenow ;
    $this->db->insert('Chats', $this);
  }

  function get_chat_after($time)
  {
    $this->db->where('time >', $time)->order_by('time', 'DESC')->limit(10); 
    $query = $this->db->get('Chats');
    
    $results = array();
    
    foreach ($query->result() as $row)
    {
      $results[] = array($row->message,$row->sDatetime,$row->time);
    }
    
    return array_reverse($results);
  }

  function create_table()
  { 
    /* Load db_forge - used to create databases and tables */
    $this->load->dbforge();
    
    /* Specify the table schema */
    $fields = array(
                    'id' => array(
                                  'type' => 'INT',
                                  'constraint' => 5,
                                  'unsigned' => TRUE,
                                  'auto_increment' => TRUE
                              ),
                    'message' => array(
                                  'type' => 'TEXT'
                              ),
                    'time' => array(
                        'type' => 'INT'
                      )
              );
    
    /* Add the field before creating the table */
    $this->dbforge->add_field($fields);
    
    
    /* Specify the primary key to the 'id' field */
    $this->dbforge->add_key('id', TRUE);
    
    
    /* Create the table (if it doesn't already exist) */
    $this->dbforge->create_table('Chats', TRUE);
  }


}