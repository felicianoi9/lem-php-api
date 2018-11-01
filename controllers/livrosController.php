<?php
class livrosController extends Controller{

	public function index(){}
    
    public function add(){

        if(isset($_POST['titulo']) && !empty($_POST['titulo']) ){
            $isbn = addslashes($_POST['isbn']);
            $titulo = addslashes($_POST['titulo']); 
            $codigo_interno = md5($isbn.$titulo);
            $ano_edicao = addslashes($_POST['ano_edicao']);
            $tipo_suporte = addslashes($_POST['tipo_suporte']);
            $num_paginas = addslashes($_POST['num_paginas']);
            $editora = addslashes($_POST['editora']);
            $participacoes = addslashes($_POST['participacoes']);

            $livro = new Livros();
            $livro->addLivro($codigo_interno, $isbn, $titulo, $ano_edicao, $tipo_suporte, $num_paginas, $editora, $participacoes );
        }

    }
    public function listar(){
        $array = array();
        $data = array();

        $offset = 0; 
        $data['p'] = 1;
        if(isset($_GET['page']) && !empty($_GET['page'])){
            $data['p'] = intVal($_GET['page']);
            if($data['p']==0 || $data['p']<0 ){
                $data['p']==1; 
            }else{

            }
        }

        $offset = (($data['p']-1)*5);      

        $livros = new Livros();
        $array = $livros->listar($offset, $data['p']);
        
        header("Content-Type: application/json");
        echo json_encode($array);
    }
    public function update(){
        $id = addslashes($_POST['id']);
        $isbn = addslashes($_POST['isbn']);
        $titulo = addslashes($_POST['titulo']); 
        $ano_edicao = addslashes($_POST['ano_edicao']);
        $tipo_suporte = addslashes($_POST['tipo_suporte']);
        $num_paginas = addslashes($_POST['num_paginas']);
        $editora = addslashes($_POST['editora']);
        $participacoes = addslashes($_POST['participacoes']);

        $livro = new Livros();
        $livro->updateLivro($id, $isbn, $titulo, $ano_edicao, $tipo_suporte, $num_paginas, $editora, $participacoes );
            
        
    }
    public function del(){

        if(isset($_POST['id']) && !empty($_POST['id'])){
            $id = addslashes($_POST['id']);
            $livro = new Livros();
            $livro->deletar($id);
        }
        
    }



}