public function prosesImportSup(){
		 $fileName = time().$_FILES['file']['name'];
         
        $config['upload_path'] = './assets/'; //buat folder dengan nama assets di root folder
        $config['file_name'] = $fileName;
        $config['allowed_types'] = 'xls|xlsx|csv';
        $config['max_size'] = 10000000;
         
        $this->load->library('upload');
        $this->upload->initialize($config);
         
        if(! $this->upload->do_upload('file') )
        $this->upload->display_errors();
             
        $media = $this->upload->data('file_name');

        $inputFileName = './assets/'.$media;
   
         
        try {
                $inputFileType = IOFactory::identify($inputFileName);
                $objReader = IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($inputFileName);
            } catch(Exception $e) {
                die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
            }
 
            $sheet = $objPHPExcel->getSheet(0);
            $highestRow = $sheet->getHighestRow();
            $highestColumn = $sheet->getHighestColumn();
             
            for ($row = 2; $row <= $highestRow; $row++){                  //  Read a row of data into an array                 
                $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
                                                NULL,
                                                TRUE,
                                                FALSE);
                                                 
                //Sesuaikan sama nama kolom tabel di database                                
                 $data = array(
                    
  //                 'nama_supplier' => $row[0][1],
		// 		'alamat' => $row[0][2],
		// 		'kota' => $row[0][3],
		// 		'no_telp' => $row[0][4],
		// 		'no_fax' => $row[0][5],
		// 		'attention' => $row[0][6],
		// 		'no_hp' => $row[0][7],
		// 		'tgl_input' => $row[0][8],
		// 		'terms' => $row[0][9],
		// 'ppn' => $row[0][10],
		// 	'supply' => $row[0][11],
		// 'status' => $row[0][12],
		// 'perjanjian' => $row[0][13],
		// 'remarks' => $row[0][14],
                 	'nama' => $row[0][1],
                 	'no_telp' => $row[0][2]
                );

                 echo $row[1][1];
                 die();
                 
                //sesuaikan nama dengan nama tabel
                $insert = $this->db->insert("coba",$data);
                delete_files($media['file_path']);
                     
            }
        redirect('Admin','refresh');

}


		// if (isset($_POST['import'])){
		// 	$file = $_FILES['dataSupplier']['tmp_name'];
		// 	$ekstensi = explode('.', $_FILES['dataSupplier']['name']);

		// 	if(empty($file)){
		// 		echo 'file tidak boleh kosong';
		// 	}
		// 	else{
		// 		if(strtolower(end($ekstensi))=='csv' && $_FILES['dataSupplier']['size']>0){
		// 			$i =0;
		// 			$handle =fopen($file, "r");
		// 			while(($row = fgetcsv($handle,2048))){
		// 				$i++;
		// 				if($i ==1) continue;

		// 				$data =[
		// 					'nama_supplier' => $row[1],
		// 					'alamat' => $row[2],
		// 					'kota' => $row[3],
		// 					'no_telp' => $row[4],
		// 					'no_fax' => $row[5],
		// 					'attention' => $row[6],
		// 					'no_hp' => $row[7],
		// 					'tgl_input' => $row[8],
		// 					'terms' => $row[9],
		// 					'ppn' => $row[10],
		// 					'supply' => $row[11],
		// 					'status' => $row[12],
		// 					'perjanjian' => $row[13],
		// 					'remarks' => $row[14],
		// 				];
					

		// 				$this->AdminModel->importSupplier($data);
		// 			}
		// 			fclose($handle);

		// 			redirect('Admin','refresh');
		// 		}else{
		// 			echo('format tidak valid');
		// 		}
		// 	}
		// }