<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form_db extends MX_controller
{



    public function getfile($data, $path, $name, $id, $table, $datapath = "")
    {

        if (!file_exists($path)) {
            mkdir($path);
        }
        
        $gambar = $this->db->query("SELECT * FROM $table WHERE id = '$id'")->row()->$data;

        $data = $_FILES[$data];
        if ($data['name'] != "") {
            unlink($path.$datapath.'/'.$name.$gambar);
            // cek if file exist
            if(file_exists($path.'/'.$name.$data['name'])){

                unlink($path.'/'.$name.$data['name']);
                move_uploaded_file($data['tmp_name'], $path.'/'.$name.$data['name']);

            }else{
                move_uploaded_file($data['tmp_name'], $path.'/'.$name.$data['name']);
            }
            return $data['name'];
        }else{
            return $gambar;
        }
    }
    public function select_db($data = "")
    {

        $dataNama = $data['data'];

        $getData = $this->db->query("SELECT DISTINCT(".$dataNama.") as ".$dataNama."  FROM ".$data['db'])->result();

        $createOption = '<option selected value="">--pilih data--</option>';
        
        foreach ($getData as $key => $value) {
            if (isset($data['selected'])) {
                if ($data['selected'] == $value->$dataNama) {
                    $createOption .= '<option selected value="'.$value->$dataNama.'">'.$value->$dataNama.'</option>';
                }else{
                    $createOption .= '<option value="'.$value->$dataNama.'">'.$value->$dataNama.'</option>';
                }
            }else{
                $createOption .= '<option value="'.$value->$dataNama.'">'.$value->$dataNama.'</option>';
            }
        }

        $html = "
        <div class='form-group'>
            <label for='".$data['fc']."'>".$data['title']."</label>
            <select id='".$data['fc']."' name='".$data['fc']."' class='form-control'>
                $createOption
            </select>
        </div> 
        ";
        return $html;
    }
}