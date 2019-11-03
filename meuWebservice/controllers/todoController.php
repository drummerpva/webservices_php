<?php
class todoController extends controller{
    public function index(){}
    public function listar(){
        $array = array();
        $t = new Tarefas();
        $array = $t->listar();
        header("Content-Type: application/json");
        echo json_encode($array);
    }
    public function add(){
        if(!empty($_POST['titulo'])){
            $titulo = addslashes($_POST['titulo']);
            $t = new Tarefas();
            $t->addTarefa($titulo);
        }
    }
    public function del(){
        if(!empty($_POST['id'])){
            $id = addslashes($_POST['id']);
            $t = new Tarefas();
            $t->delTarefa($id);
        }
    }
    public function update(){
        if(!empty($_POST['status']) && !empty($_POST['id'])){
            $status = addslashes($_POST['status']);
            $id = addslashes($_POST['id']);
            $t = new Tarefas();
            $t->updateStatus($status, $id);
        }
    }
}