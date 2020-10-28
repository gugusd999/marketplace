<?php

$location_created = "application/modules/";


if(!isset($argument[3]) || $argument[3] == "--default"){
    
    // make foleder template 
    mkdir($location_created.$argument[2]);
    print "create ".$argument[2]." \n";
    mkdir($location_created.$argument[2]."/controllers");
        $myfile = "templating/default/controller.template";
        $mytemplate = fopen($myfile, "r");
        $data = fread($mytemplate, filesize($myfile));
        $data = str_replace("{{ className_controller }}", ucfirst($argument[2]), $data);
        $data = str_replace("{{ className }}", $argument[2], $data);
        fclose($mytemplate);
        $filecreate = $location_created.$argument[2]."/controllers/".ucfirst($argument[2]).".php";
        $create = fopen($filecreate, "w");
        fwrite($create, $data);
        fclose($create);
    print "create ".$argument[2]." controllers \n";
    mkdir($location_created.$argument[2]."/models");
       
        // createtable models
        $myfile = "templating/datatable/Createtable.template";
        $mytemplate = fopen($myfile, "r");
        $data = fread($mytemplate, filesize($myfile));
        fclose($mytemplate);
        $filecreate = $location_created.$argument[2]."/models/Createtable.php";
        $create = fopen($filecreate, "w");
        fwrite($create, $data);
        fclose($create);
        
        // Datatable_gugus models
        $myfile = "templating/datatable/Datatable_gugus.template";
        $mytemplate = fopen($myfile, "r");
        $data = fread($mytemplate, filesize($myfile));
        fclose($mytemplate);
        $filecreate = $location_created.$argument[2]."/models/Datatable_gugus.php";
        $create = fopen($filecreate, "w");
        fwrite($create, $data);
        fclose($create);
        
        print "create ".$argument[2]." Models \n";
    
        // view area --------------------------------------------------------------------------//
        
        mkdir($location_created.$argument[2]."/views");
        
        // Datatable_gugus models
        $myfile = "templating/default/view.template";
        $mytemplate = fopen($myfile, "r");
        $data = fread($mytemplate, filesize($myfile));
        fclose($mytemplate);
        $filecreate = $location_created.$argument[2]."/views/view.php";
        $create = fopen($filecreate, "w");
        fwrite($create, $data);
        fclose($create);
    
    print "create ".$argument[2]." views ";
}
elseif( $argument[3] == "--crud"){
    
    // make foleder template 
    mkdir($location_created.$argument[2]);
    print "create ".$argument[2]." \n";
    mkdir($location_created.$argument[2]."/controllers");

        $total_row = $db->total_row_table($argument[4]);
        
        $table_head = $db->dapatkan_nama_column($argument[4], [0 => "no"], [($total_row - 1) => ['action']]);
        $data_show = $db->dapatkan_nama_column($argument[4], [0 => "no"], [], 'show');
        $data_order = $db->dapatkan_nama_column($argument[4], [0 => "no"], [], 'order');


        $myfile = "templating/datatable/controller.template";
        $mytemplate = fopen($myfile, "r");
        $data = fread($mytemplate, filesize($myfile));
        $data = str_replace("{{ className_controller }}", ucfirst($argument[2]), $data);
        $data = str_replace("{{ className }}", $argument[2], $data);
        
        $data = str_replace("{{ total_row }}", $total_row, $data);
        $data = str_replace("{{ simpan_control }}", $db->create_form_save($argument[4]), $data);
        $data = str_replace("{{ update_control }}", $db->create_form_update($argument[4], $db->get_primary_key($argument[4])), $data);

        $data = str_replace("{{ table_name }}", $argument[4], $data);
        $data = str_replace("{{ table_head }}", str_replace("_"," ",$table_head), $data);
        $data = str_replace("{{ search }}", $data_show, $data);
        $data = str_replace("{{ order }}", $data_order, $data);
        $data = str_replace("{{ keys }}", $db->get_primary_key($argument[4]), $data);

        if(isset($argument[4])){
            $cariKata = '--table:';
            if(preg_match("/$cariKata/i", $argument[4])) {
                $nama_table = str_replace("--table:", "", $argument[4]);
                print $nama_table." \n";
            }
        }

        fclose($mytemplate);
        $filecreate = $location_created.$argument[2]."/controllers/".ucfirst($argument[2]).".php";
        $create = fopen($filecreate, "w");
        fwrite($create, $data);
        fclose($create);
    print "create ".$argument[2]." controllers \n";
    mkdir($location_created.$argument[2]."/models");
       
        // createtable models
        $myfile = "templating/datatable/Createtable.template";
        $mytemplate = fopen($myfile, "r");
        $data = fread($mytemplate, filesize($myfile));
        fclose($mytemplate);
        $filecreate = $location_created.$argument[2]."/models/Createtable.php";
        $create = fopen($filecreate, "w");
        fwrite($create, $data);
        fclose($create);
        
        // Datatable_gugus models
        $myfile = "templating/datatable/Datatable_gugus.template";
        $mytemplate = fopen($myfile, "r");
        $data = fread($mytemplate, filesize($myfile));
        fclose($mytemplate);
        $filecreate = $location_created.$argument[2]."/models/Datatable_gugus.php";
        $create = fopen($filecreate, "w");
        fwrite($create, $data);
        fclose($create);
        
        print "create ".$argument[2]." Models \n";
    
        // view area --------------------------------------------------------------------------//
        
        mkdir($location_created.$argument[2]."/views");
        
        // Datatable_gugus view
        $myfile = "templating/datatable/view.template";
        $mytemplate = fopen($myfile, "r");
        $data = fread($mytemplate, filesize($myfile));
        $data = str_replace("{{ className }}", $argument[2], $data);
        fclose($mytemplate);
        $filecreate = $location_created.$argument[2]."/views/view.php";
        $create = fopen($filecreate, "w"); 
        fwrite($create, $data);
        fclose($create);
        
        // Datatable_gugus tambah
        $myfile = "templating/datatable/tambah.template";
        $mytemplate = fopen($myfile, "r");
        $data = fread($mytemplate, filesize($myfile));
        $data = str_replace("{{ form }}", $db->create_form_default($argument[4]), $data);
        $data = str_replace("{{ className }}", $argument[2], $data);
        fclose($mytemplate);
        $filecreate = $location_created.$argument[2]."/views/tambah.php";
        $create = fopen($filecreate, "w");
        fwrite($create, $data);
        fclose($create);
        
        // Datatable_gugus edit
        $myfile = "templating/datatable/edit.template";
        $mytemplate = fopen($myfile, "r");
        $data = fread($mytemplate, filesize($myfile));
        $data = str_replace("{{ form }}", $db->create_form_edit($argument[4]), $data);
        $data = str_replace("{{ className }}", $argument[2], $data);
        fclose($mytemplate);
        $filecreate = $location_created.$argument[2]."/views/edit.php";
        $create = fopen($filecreate, "w");
        fwrite($create, $data);
        fclose($create);
    
    print "create ".$argument[2]." views ";
}
