<?php
class Tarefas extends model{
    public function listar(){
        $array = array();
        $sql = $this->db->query("SELECT * FROM tarefas");
        if($sql->rowCount()>0){
            $array = $sql->fetchAll();
        }
        return $array;
    }
    public function addTarefa($titulo){
        $this->db->query("INSERT INTO tarefas SET titulo = '$titulo'");
    }
    public function delTarefa($id){
        $this->db->query("DELETE FROM tarefas WHERE id = $id");
    }
    public function updateStatus($status, $id){
        $this->db->query("UPDATE tarefas SET status = '$status' WHERE id = $id");
    }
}