<?php
header("Access-Control-Allow-Origin: *");
//
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Inicio extends CI_Controller {
    
     function __construct() {
        parent::__construct();

        //models
        $this->load->model('m_pagamento', 'pagamento', true);

        //libers
        $this->load->helper(array('url','directory'));
    }
    
    function index() {     
        //$cd_usuario_resp = '51338220225';
        $Context = $this->input->get_post("Context");
        $Context_Arr = explode(";", $Context);
        $arrN = array();

        foreach($Context_Arr as $Item):
            $Valor = explode('=',$Item);
            $arrN[$Valor[0]] = $Valor[1];
        endforeach;

        $cd_usuario_resp = $arrN["CodUsuario"]; 

        if(!empty($cd_usuario_resp)):
            $data = array(
                'titulo_header_1' =>  'Pagamento - Compra de Crédito',
                'titulo_header_2' =>  'Saldo Atual por Aluno',
                'titulo_header_3' =>  'Realizar Compra',
                'listar_aluno'    => $this->pagamento->sp_portal_info(array('p_operacao' => 'LA', 'p_cd_usuario_resp' => $cd_usuario_resp)),
                'listar_produto'  => $this->pagamento->sp_portal_info(array('p_operacao' => 'LP')),
                'cpf_responsavel' => $cd_usuario_resp
            );

            $this->load->view('pagamento/index', $data);
        else:
            redrect("erro","refresh");
        endif;
    }




    function lockfild_select(){
        $cd_usuario_alu = $this->input->get_post('cd_usuario_alu');

        $params = array('p_operacao' => 'LP', 
                        'p_cd_usuario_alu' => $cd_usuario_alu);

        $listar_produto = $this->pagamento->sp_portal_info($params); 
            echo "<option value=''>Selecione a opção...</option>";
        foreach($listar_produto as $row_produto){
            echo "<option value=".$row_produto['IDPRD']." data-preco=".$row_produto['PRECO'].">".$row_produto['NOMEFANTASIA']."</option>";
        }

    }




    function lancar_limite(){
        $vl_credito = $this->input->get_post("vl_credito");
        $cd_aluno   = $this->input->get_post("cd_aluno");
        
        $params_1 = array(
            'p_operacao'        => 'AC',
            'p_valor'           => $vl_credito,
            'p_cd_usuario_alu'  => $cd_aluno
        );

        return $this->pagamento->sp_portal_info($params_1);

    }

  
}