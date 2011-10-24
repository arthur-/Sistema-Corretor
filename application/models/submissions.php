<?php

class Submissions extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
    
    function create($problem_id=0, $login='', $language='', $src='', $compile='')
    {
    	if (!$problem_id || !$login || !$language || !$src)
    		return FALSE;
    	$data = array(
    		'data_submissao' => date("Y-m-d H:i:s"),
    		'id_questao' => $problem_id,
    		'login' => $login,
    		'codigo_fonte' => $src,
    		'linguagem' => $language,
    		'compilacao_erro' => $compile,
    		'submissao_zerada' => 0
    		);
    	$this->db->insert('Submissao', $data);
    	return TRUE;
    }
    
    function last_submission($problem_id=0, $login='') {
    	$query = $this->db->query("SELECT * FROM Submissao WHERE login='$login' ORDER BY data_submissao DESC LIMIT 1");
    	return $query->num_rows() > 0 ? $query->row_array() : array();
    }
    
}
