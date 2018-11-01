<?php
class Livros extends Model{

	public function listar($offset, $pagina){
        $array= array();
              
        $sql = "SELECT * FROM livros ";
        $sql = $this->db->query($sql);

        if($sql->rowCount()>0){
            
            $quantLivros = $sql->rowCount(); 
            $quantPaginas = ceil($sql->rowCount()/5);

            $sql = "SELECT * FROM livros LIMIT $offset, 5 ";
            $sql = $this->db->query($sql);
            $array = $sql->fetchAll();
        }
        $array['quantLivros'] = $quantLivros;
        $array['quantPaginas'] = $quantPaginas;
        $array['pagina'] = $pagina;
        return $array;
    }

    public function addLivro($codigo_interno, $isbn, $titulo, $ano_edicao, $tipo_suporte, $num_paginas, $editora, $participacoes ){

        $sql = " INSERT INTO livros SET codigo_interno = '$codigo_interno', isbn = '$isbn', titulo = '$titulo', ano_edicao = '$ano_edicao', tipo_suporte = '$tipo_suporte', num_paginas = '$num_paginas', editora = '$editora', participacoes = '$participacoes', data_cadastro = NOW() ";

        $sql = $this->db->query($sql);

    }

    public function deletar($id){
        $sql = "EELETE FROM livros WHERE id = '$id' ";

        $sql = $this->db->query($sql);
    }

    public function updateLivro($id,  $isbn='', $titulo='', $ano_edicao='', $tipo_suporte='', $num_paginas='', $editora='', $participacoes='' ){
        
        $array = array();

        if($isbn!=''){
            $array[] = " isbn = '$isbn' "; 
        }
        if($titulo!=''){
            $array[] = " titulo = '$titulo' "; 
        }

        if($ano_edicao!=''){
            $array[] = " ano_edicao = '$ano_edicao' "; 
        }
        if($tipo_suporte=''){
            $array[] = " tipo_suporte = '$tipo_suporte' "; 
        }
        if($num_paginas!=''){
            $array[] = " num_paginas = '$num_paginas' "; 
        }
        if($editora!=''){
            $array[] = " editora = '$editora' "; 
        }
        if($participacoes!=''){
            $array[] = " participacoes = '$participacoes' "; 
        }
        //print_r($array);exit;
        $sql = '';
        if(sizeof($array)==1){
            
            $sql = implode('',$array);
            $sql = " UPDATE livros SET ".$sql." WHERE id = '$id' ";
        }elseif(sizeof($array)>1){
            $sql = implode(',',$array);
            $sql = " UPDATE livros SET ".$sql." WHERE id = '$id' ";
        }

        

        $sql = $this->db->query($sql);

    }
}