<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_pagamento extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }


    /*
        LA - LISTA OS ALUNOS E SALDOS
        LP - LISTAR PRODUTOS
    */
        
    //informacoes de credito e debito
    function sp_portal_info($p) {
        $cursor = '';
        $dados = array(
            array('name' => ':P_OPERACAO',                  'value' => $p['p_operacao']),
            array('name' => ':P_CD_USUARIO_RESP',           'value' => $p['p_cd_usuario_resp']),
            array('name' => ':P_CD_USUARIO_ALU',            'value' => $p['p_cd_usuario_alu']),
            array('name' => ':P_VALOR',                     'value' => $p['p_valor']),
            array('name' => ':P_ID_VENDA',                  'value' => $p['p_id_venda']),
            array('name' => ':P_CURSOR',                    'value' => $cursor, 'type' => OCI_B_CURSOR)
        );

        $query = $this->db->procedure('BD_PDV','SP_PORTAL_INFO', $dados);
        return $query;   
    }

    //pagamento
    function sp_portal_venda_prod($p) {
        $cursor = '';
        $dados = array(
            array('name' => ':P_TID',                       'value' => $p['p_tid']),
            array('name' => ':P_CD_USUARIO_RESP',           'value' => $p['p_cd_usuario_resp']),
            array('name' => ':P_CD_USUARIO_CLI',            'value' => $p['p_cd_usuario_cli']),
            array('name' => ':P_IDPRD',                     'value' => $p['p_idprd']),
            array('name' => ':P_PROD_QTD',                  'value' => $p['p_prod_qtd']),
            array('name' => ':P_VALOR_UNIT',                'value' => $p['p_valor_unit']),
            array('name' => ':P_COMPRA_QT_PARC',            'value' => $p['p_compra_qt_parc']),
            array('name' => ':P_TIPO_PAGTO',                'value' => $p['p_tipo_pagto']),
            array('name' => ':P_CD_REDE_CARTAO',            'value' => $p['p_cd_rede_cartao']),
            array('name' => ':P_CARTAO_BADEIRA',            'value' => $p['p_cartao_bandeira']),
            array('name' => ':P_CARTAO_NUMERO',             'value' => $p['p_cartao_numero']),
            array('name' => ':P_CARTAO_VALIDADE',           'value' => $p['p_cartao_validade']),
            array('name' => ':P_CARTAO_NSU',                'value' => $p['p_cartao_nsu']),
            array('name' => ':P_CARTAO_NR_AUTORIZACAO',     'value' => $p['p_cartao_nr_autorizacao']),
            array('name' => ':P_STATUS',                    'value' => $p['p_status']),
            array('name' => ':P_CURSOR',                    'value' => $cursor, 'type' => OCI_B_CURSOR)
        );

        $query = $this->db->procedure('BD_PDV','SP_PORTAL_VENDA_PROD', $dados);   
        return $query;
    }

    //transferencia de credito e almoco
    function sp_portal_transferencia($p){
        $cursor = '';
        $dados = array(
            array('name' => ':P_OPERACAO',                  'value' => $p['p_operacao']),
            array('name' => ':P_CD_USUARIO_ORIGEM',         'value' => $p['p_cd_usuario_origem']),
            array('name' => ':P_CD_USUARIO_DESTINO',        'value' => $p['p_cd_usuario_destino']),
            array('name' => ':P_QTD_ALMOCO_TRANSF',         'value' => $p['p_qtd_almoco_transf']),
            array('name' => ':P_VLR_CRED_TRANSF',           'value' => $p['p_vlr_cred_transf']),
            array('name' => ':P_CURSOR',                    'value' => $cursor, 'type' => OCI_B_CURSOR)
        );

        $query = $this->db->procedure('BD_PDV','SP_PORTAL_TRANSFERENCIA', $dados);
        return $query;

    }

    function insert_ecom_vendas_produto_log($p){
        $data = array(
            'TID'                   => $p['p_tid'],
            'CD_USUARIO_RESP'       => $p['p_cd_usuario_resp'],
            'CD_USUARIO_CLI'        => $p['p_cd_usuario_cli'],
            'IDPRD'                 => $p['p_idprd'],
            'PROD_QTD'              => $p['p_prod_qtd'],
            'VALOR_UNIT'            => $p['p_valor_unit'],
            'COMPRA_QT_PARC'        => $p['p_compra_qt_parc'],
            'TIPO_PAGTO'            => $p['p_tipo_pagto'],
            'IDFORMAPAGTO'          => $p['p_cd_rede_cartao'],
            'CD_REDE_CARTAO'        => $p['p_cd_rede_cartao'],
            'CARTAO_BANDEIRA'       => $p['p_cartao_bandeira'],
            'CARTAO_NUMERO'         => $p['p_cartao_numero'],
            'CARTAO_VALIDADE'       => $p['p_cartao_validade'],
            'CARTAO_NSU'            => $p['p_cartao_nsu'],
            'CARTAO_NR_AUTORIZACAO' => $p['p_cartao_nr_autorizacao'],
            'STATUS'                => $p['p_status']
        );


        $query  =   $this->db->insert('BD_PDV.ECOM_VENDAS_PRODUTO_LOG', $data);
        return $query;
    }


    function insert_ecom_vendas_produto($p){
        $data = array(
            'TID'                   => $p['p_tid'],
            'CD_USUARIO_RESP'       => $p['p_cd_usuario_resp'],
            'CD_USUARIO_CLI'        => $p['p_cd_usuario_cli'],
            'IDPRD'                 => $p['p_idprd'],
            'PROD_QTD'              => $p['p_prod_qtd'],
            'VALOR_UNIT'            => $p['p_valor_unit'],
            'COMPRA_QT_PARC'        => $p['p_compra_qt_parc'],
            'TIPO_PAGTO'            => $p['p_tipo_pagto'],
            'IDFORMAPAGTO'          => $p['p_cd_rede_cartao'],
            'CD_REDE_CARTAO'        => $p['p_cd_rede_cartao'],
            'CARTAO_BANDEIRA'       => $p['p_cartao_bandeira'],
            'CARTAO_NUMERO'         => $p['p_cartao_numero'],
            'CARTAO_VALIDADE'       => $p['p_cartao_validade'],
            'CARTAO_NSU'            => $p['p_cartao_nsu'],
            'CARTAO_NR_AUTORIZACAO' => $p['p_cartao_nr_autorizacao'],
            'STATUS'                => $p['p_status']
        );


        $query  =   $this->db->insert('BD_PDV.ECOM_VENDAS_PRODUTO', $data);
        return $query;
    }




    function insert_teste($p){
        $data = array(
            'OBS' => $p['p_obs']
        );
        $query = $this->db->insert('BD_SICA.PAPOCO', $data);
       
        return $query;
    }





}
?>