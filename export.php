<?php

/**
 *Ext. v1 
 * @author Ardha Herdianto
 * @copyright 2013
 */
  
if(isset($_GET['as'])){
    
    if($_GET['as']=='excel'){
        //$mydate=getdate(date("U"));
        $date=date('d M Y H:i:s');
        
        // koneksi ke mysql
        
        require_once 'config.php';
        
        // nama file
        $namaFile = "report-$date.xls";
        
        function xlsBOF() {
        echo pack("ssssss", 0x809, 0x8, 0x0, 0x10, 0x0, 0x0);
        return;
        }
        
        function xlsEOF() {
        echo pack("ss", 0x0A, 0x00);
        return;
        }
        
        function xlsWriteNumber($Row, $Col, $Value) {
        echo pack("sssss", 0x203, 14, $Row, $Col, 0x0);
        echo pack("d", $Value);
        return;
        }
        
        function xlsWriteLabel($Row, $Col, $Value ) {
        $L = strlen($Value);
        echo pack("ssssss", 0x204, 8 + $L, $Row, $Col, 0x0, $L);
        echo $Value;
        return;
        }
        
        
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,
                pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        
        // header untuk nama file
        header("Content-Disposition: attachment;
                filename=".$namaFile."");
        
        header("Content-Transfer-Encoding: binary ");
        
        // memanggil function penanda awal file excel
        xlsBOF();
        
        // ------ membuat kolom pada excel --- //
        
        // mengisi pada cell A1 (baris ke-0, kolom ke-0)
        xlsWriteLabel(0,0,"idsurat");               
        
        // mengisi pada cell A2 (baris ke-0, kolom ke-1)
        xlsWriteLabel(0,1,"jenis_surat");              
        
        // mengisi pada cell A3 (baris ke-0, kolom ke-2)
        xlsWriteLabel(0,2,"tanggal_surat");
        
        // mengisi pada cell A4 (baris ke-0, kolom ke-3)
        xlsWriteLabel(0,3,"perihal");   
        
        // mengisi pada cell A5 (baris ke-0, kolom ke-4)
        xlsWriteLabel(0,4,"catatan");
         
        // mengisi pada cell A6 (baris ke-0, kolom ke-5)
        xlsWriteLabel(0,5,"asal_surat");
        
        // mengisi pada cell A7 (baris ke-0, kolom ke-6)
        xlsWriteLabel(0,6,"disposisi");
        
        // mengisi pada cell A8 (baris ke-0, kolom ke-7)
        xlsWriteLabel(0,7,"kata_kunci");   
        
        xlsWriteLabel(0,8,"delete");
        
        xlsWriteLabel(0,9,"posting");
        
        xlsWriteLabel(0,10,"public");
        
        xlsWriteLabel(0,11,"lampiran");
        
        xlsWriteLabel(0,12,"created_at");
        // -------- menampilkan data --------- //
        
        
        // query menampilkan semua data
        
        $query = "SELECT * FROM surat order by created_at DESC";
        $hasil = mysql_query($query);
        
        // nilai awal untuk baris cell
        $noBarisCell = 1;
        
        // nilai awal untuk nomor urut data
        $noData = 1;
        
        while ($data = mysql_fetch_array($hasil))
        {
        
        // menampilkan data id
           xlsWriteLabel($noBarisCell,0,$data['idsurat']);
        
        // menampilkan data nama mahasiswa
           xlsWriteLabel($noBarisCell,1,$data['jenis_surat']);
        
        // menampilkan data nilai
           xlsWriteLabel($noBarisCell,2,$data['tanggal_surat']);
        
        // menampilkan data nilai
           xlsWriteLabel($noBarisCell,3,$data['perihal']);
        
        // menampilkan data nilai
           xlsWriteLabel($noBarisCell,4,$data['catatan']);
        
        // menampilkan data nilai
           xlsWriteLabel($noBarisCell,5,$data['asal_surat']);
        
        // menampilkan data nilai
           xlsWriteLabel($noBarisCell,6,$data['disposisi']);
        
        // menampilkan data nilai
           xlsWriteLabel($noBarisCell,7,$data['kata_kunci']);
        
        // menampilkan data nilai
           xlsWriteLabel($noBarisCell,8,$data['delete']);

            // menampilkan data nilai
           xlsWriteLabel($noBarisCell,9,$data['posting']);

        // menampilkan data nilai
           xlsWriteLabel($noBarisCell,10,$data['public']);
           
                   // menampilkan data nilai
           xlsWriteLabel($noBarisCell,11,$data['lampiran']);
           
                   // menampilkan data nilai
           xlsWriteLabel($noBarisCell,12,$data['created_at']);




           // increment untuk no. baris cell dan no. urut data
           $noBarisCell++;
           $noData++;
        }
        
        // memanggil function penanda akhir file excel
        xlsEOF();
        exit();

    }
            
}
?>