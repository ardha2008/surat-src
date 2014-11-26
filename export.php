<?php

/**
 *Ext. v1 
 * @author Ardha Herdianto
 * @copyright 2013
 */
 

  
if(isset($_GET['as'])){
    
    if($_GET['as']=='sql'){
        //ENTER THE RELEVANT INFO BELOW
            $date=date('d/M/Y/H:i:s');
            
            $mysqlDatabaseName ='surat';
            $mysqlUserName ='root';
            $mysqlPassword ='';
            $mysqlExportPath ="db-backup-$date.sql";
            
            //DO NOT EDIT BELOW THIS LINE
            $mysqlHostName ='localhost';
            //Export the database and output the status to the page
            $command='mysqldump -u' .$mysqlUserName .' -S ./tmp/mysql5.sock -p' .$mysqlPassword .' ' .$mysqlDatabaseName .' > ~/' .$mysqlExportPath;
            exec($command,$output=array(),$worked);
            switch($worked){
                case 0:
                    echo 'Database <b>' .$mysqlDatabaseName .'</b> successfully exported to <b>~/' .$mysqlExportPath .'</b>';
                    break;
                case 1:
                    echo 'There was a warning during the export of <b>' .$mysqlDatabaseName .'</b> to <b>~/' .$mysqlExportPath .'</b>';
                    break;
                case 2:
                    echo 'There was an error during export. Please check your values:<br/><br/><table><tr><td>MySQL Database Name:</td><td><b>' .$mysqlDatabaseName .'</b></td></tr><tr><td>MySQL User Name:</td><td><b>' .$mysqlUserName .'</b></td></tr><tr><td>MySQL Password:</td><td><b>NOTSHOWN</b></td></tr><tr><td>MySQL Host Name:</td><td><b>' .$mysqlHostName .'</b></td></tr></table>';
                    break;
            }
    }
    
    if($_GET['as']=='excel'){
        //$mydate=getdate(date("U"));
        $date=date('d M Y H:i:s');
        
        // koneksi ke mysql
        
            $DB_Server = "localhost"; // MySQL Server
            $DB_Username = "root"; // MySQL Username
            $DB_Password = ""; // MySQL Password
            $DB_DBName = "surat"; // MySQL Database Name
            $DB_TBLName = "surat"; // MySQL Table Name
            $xls_filename = 'export_'.$date.'.xls'; // Define Excel (.xls) file name
             
            /***** DO NOT EDIT BELOW LINES *****/
            // Create MySQL connection
            $sql = "Select * from $DB_TBLName";
            $Connect = @mysql_connect($DB_Server, $DB_Username, $DB_Password) or die("Failed to connect to MySQL:<br />" . mysql_error() . "<br />" . mysql_errno());
            // Select database
            $Db = @mysql_select_db($DB_DBName, $Connect) or die("Failed to select database:<br />" . mysql_error(). "<br />" . mysql_errno());
            // Execute query
            $result = @mysql_query($sql,$Connect) or die("Failed to execute query:<br />" . mysql_error(). "<br />" . mysql_errno());
             
            // Header info settings
            header("Content-Type: application/xls");
            header("Content-Disposition: attachment; filename=$xls_filename");
            header("Pragma: no-cache");
            header("Expires: 0");
             
            /***** Start of Formatting for Excel *****/
            // Define separator (defines columns in excel &amp; tabs in word)
            $sep = "\t"; // tabbed character
             
            // Start of printing column names as names of MySQL fields
            for ($i = 0; $i<mysql_num_fields($result); $i++) {
              echo mysql_field_name($result, $i) . "\t";
            }
            print("\n");
            // End of printing column names
             
            // Start while loop to get data
            while($row = mysql_fetch_row($result))
            {
              $schema_insert = "";
              for($j=0; $j<mysql_num_fields($result); $j++)
              {
                if(!isset($row[$j])) {
                  $schema_insert .= "NULL".$sep;
                }
                elseif ($row[$j] != "") {
                  $schema_insert .= "$row[$j]".$sep;
                }
                else {
                  $schema_insert .= "".$sep;
                }
              }
              $schema_insert = str_replace($sep."$", "", $schema_insert);
              $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
              $schema_insert .= "\t";
              print(trim($schema_insert));
              print "\n";
            }
            

    }
    
    if($_GET['as']=='pdf'){
        require_once 'lib/fpdf.php';
        require_once 'config.php';
        
        class PDF extends FPDF {
            // Page header
            function Header()
            {
                // Logo
                $this->Image('lib/logo/upn.jpg',51,11,24);
                //$this->Image('lib/logo/upn.jpg',170,8,19);
                // Arial bold 15
                $this->SetFont('Arial','',14);
                // Move to the right
                $this->Cell(80);
                // Title
                $this->Cell(115,10,'KEMENTERIAN PENDIDIKAN DAN KEBUDAYAAN',0,0,'C');
                $this->SetFont('Arial','',11);
                $this->Cell(-120,20,'UNIVERSITAS PEMBANGUNAN NASIONAL “VETERAN” JAWA TIMUR',0,0,'C');
                $this->SetFont('Arial','',9);
                $this->Cell(120,30,'Jl. Raya Rungkut Madya Gunung Anyar Surabaya 60294',0,0,'C');
                $this->Cell(-120,40,'Telp. (031) 8706369, 8782086  Fax. (031) 8782086  web : www.upnjatim.ac.id',0,0,'C');
                
                $this->SetLineWidth(1,5);
                $this->Line(40,40,260,40);
                
                // Line break
                $this->Ln(40);
                
            }

            // Page footer
            function Footer()
            {
                // Position at 1.5 cm from bottom
                $this->SetY(-15);
                // Arial italic 8
                $this->SetFont('Arial','I',8);
                // Page number
                $this->Cell(0,10,'Halaman '.$this->PageNo().'/{nb}',0,0,'C');
                $this->Ln();
                $this->Cell(10,1,'©2014 Biro Kerjasama Dan Kemahasiswaan UPN "Veteran" Jatim',0,0,'L');
            }
        }
        
                if(isset($_GET['dari']) && isset($_GET['sampai'])){
                    $dari=$_GET['dari'];
                    $sampai=$_GET['sampai'];
                    
                    $dari_x=$dari;
                    $sampai_x=$sampai;
                    
                    $query=mysql_query("select * from surat a,kategori b where a.jenis_surat='masuk' and a.idkategori=b.idkategori and tanggal_surat between '$dari' and '$sampai' and `delete`='0'");
                    $dari=date('d-m-Y',strtotime($dari));
                    $sampai=date('d-m-Y',strtotime($sampai));
                    
                    $hasil=mysql_fetch_array(mysql_query("select count(*) as jumlah from surat where jenis_surat='masuk' and tanggal_surat between '$dari_x' and '$sampai_x' and `delete`='0'"));
                    
                }else{
                    $query=mysql_query("select * from surat a,kategori b where a.idkategori=b.idkategori and `delete`=0 and a.jenis_surat='masuk' order by tanggal_surat DESC, jenis_surat ASC");    
                    $hasil=mysql_fetch_array(mysql_query("select count(*) as jumlah from surat where jenis_surat='masuk' and `delete`=0"));
                }
        
        

            // Instanciation of inherited class
            $pdf = new PDF('L');
            $pdf->AliasNbPages();
            $pdf->AddPage();
            $pdf->SetFont('Times','',11);
            $pdf->Cell(250,25,'Surabaya, '.date('d F Y'),0,0,'R');
            $pdf->Ln(0);
            $pdf->SetFont('Times','bu',12);
            
            if(isset($dari) && isset($sampai)){
                $pdf->Cell(290,45,"Laporan Keseluruhan Surat Masuk per $dari hingga $sampai",0,0,'C');    
            }else{
                $pdf->Cell(270,45,'Laporan Keseluruhan Surat Masuk',0,0,'C');    
            }
            
            
            $pdf->SetFont('Times','',10);
            $pdf->Ln(30);
            #$label=array(1=>'#','Nomer Surat','Perihal');
            $kolom=array(
            5,
            60,
            50,
            45,
            20,
            50,
            38);
            
            
            $pdf->Cell($kolom[0],10,'#',1,0,'C');   
            $pdf->Cell($kolom[4],10,'Tanggal',1,0,'C');
            $pdf->Cell($kolom[1],10,'No Surat',1,0,'C');
            $pdf->Cell($kolom[2],10,'Perihal',1,0,'C');
            $pdf->Cell($kolom[3],10,'Asal',1,0,'C');
            $pdf->Cell($kolom[6],10,'Tujuan',1,0,'C');
            $pdf->Cell($kolom[5],10,'Jenis Surat',1,0,'C');
            //$pdf->Cell($kolom[5],10,'Asal',1,0,'C');            

            $pdf->Ln();
            
            for($i=1;$i<=3;$i++){
                $j=1;while($result=mysql_fetch_array($query)){
                    
                    $pdf->Cell($kolom[0],10,$j,'TLBR',0,'C');
                    $pdf->Cell($kolom[4],10,date('d-m-Y',strtotime($result['tanggal_surat'])),'TBR');
                    $pdf->Cell($kolom[1],10,$result['idsurat'],'TB');
                    $pdf->Cell($kolom[2],10,$result['perihal'],'TB');
                    $pdf->Cell($kolom[3],10,$result['asal_surat'],'TB');
                    $pdf->Cell($kolom[6],10,$result['tujuan'],'TB');
                    $pdf->Cell($kolom[5],10,$result['keterangan_kategori'],'TBR');
                    $pdf->Ln();
                    $j++;       
                }
            }
            
            $pdf->Cell(20,10,'Jumlah : '.$hasil['jumlah'],0,0,'R');
            //$pdf->Ln(5);
            

//=========================================================INI SURAT KELUAR=================================
        
        
        if(isset($_GET['dari']) && isset($_GET['sampai'])){
            $dari=$_GET['dari'];
            $sampai=$_GET['sampai'];
            
            $query=mysql_query("select * from surat a,kategori b where a.idkategori=b.idkategori and a.jenis_surat='keluar' and tanggal_surat between '$dari' and '$sampai' and `delete`='0'");
            $hasil=mysql_fetch_array(mysql_query("select count(*) as jumlah from surat where jenis_surat='keluar' and tanggal_surat between '$dari_x' and '$sampai_x' and `delete`='0'"));
            
            //echo "select * from surat a,kategori b where a.idkategori=b.idkategori and tanggal_surat between '$dari' and '$sampai' and `delete`='0'";
            //exit();
            
            $dari=date('d-m-Y',strtotime($dari));
            $sampai=date('d-m-Y',strtotime($sampai));
        }else{
            $query=mysql_query("select * from surat a,kategori b where a.idkategori=b.idkategori and `delete`=0 and a.jenis_surat='keluar' order by tanggal_surat DESC, jenis_surat ASC");    
            $hasil=mysql_fetch_array(mysql_query("select jenis_surat, count(*) as jumlah from surat where jenis_surat='keluar' and `delete`=0"));
        }
        
            $pdf->SetFont('Times','bu',12);
            
            if(isset($dari) && isset($sampai)){
                $pdf->Cell(250,45,"Laporan Keseluruhan Surat Keluar per $dari hingga $sampai",0,0,'C');    
            }else{
                $pdf->Cell(270,45,'Laporan Keseluruhan Surat Keluar',0,0,'C');    
            }
            
            $pdf->SetFont('Times','',10);
            $pdf->Ln(30);
            
            #$label=array(1=>'#','Nomer Surat','Perihal');
          //  $kolom=array(8,60,75,45,20,50);
            
            $pdf->Cell($kolom[0],10,'#',1,0,'C');   
            $pdf->Cell($kolom[4],10,'Tanggal',1,0,'C');
            $pdf->Cell($kolom[1],10,'No Surat',1,0,'C');
            $pdf->Cell($kolom[2],10,'Perihal',1,0,'C');
            $pdf->Cell($kolom[3],10,'Asal',1,0,'C');
            $pdf->Cell($kolom[6],10,'Tujuan',1,0,'C');
            $pdf->Cell($kolom[5],10,'Jenis Surat',1,0,'C');
            //$pdf->Cell($kolom[5],10,'Asal',1,0,'C');            

            $pdf->Ln();
            
            for($i=1;$i<=3;$i++){
                $j=1;while($result=mysql_fetch_array($query)){
                    
                    $pdf->Cell($kolom[0],10,$j,'TLBR',0,'C');
                    $pdf->Cell($kolom[4],10,date('d-m-Y',strtotime($result['tanggal_surat'])),'TBR');
                    $pdf->Cell($kolom[1],10,$result['idsurat'],'TB');
                    $pdf->Cell($kolom[2],10,$result['perihal'],'TB');
                    $pdf->Cell($kolom[3],10,$result['asal_surat'],'TB');
                    $pdf->Cell($kolom[6],10,$result['tujuan'],'TB');
                    $pdf->Cell($kolom[5],10,$result['keterangan_kategori'],'TBR');
                    $pdf->Ln();
                    $j++;       
                }
            }
            
            $pdf->Cell(20,10,'Jumlah : '.$hasil['jumlah'],0,0,'R');
            
            //================================LAPORAN KARYAWAN=========================================
            
            if(isset($_GET['dari']) && isset($_GET['sampai'])){
            $dari=$_GET['dari'];
            $sampai=$_GET['sampai'];
            
            $query=mysql_query("select b.nama, count(*) as jumlah from surat a, pegawai b where a.posting = b.idpegawai and tanggal_surat between '$dari' and '$sampai' and a.`delete`='0' group by a.posting");
            
            $dari=date('d-m-Y',strtotime($dari));
            $sampai=date('d-m-Y',strtotime($sampai));
        }else{
            $query=mysql_query("select b.nama, count(*) as jumlah from surat a, pegawai b where a.posting = b.idpegawai and a.`delete`='0' group by a.posting");    
           
        }
        
            $pdf->SetFont('Times','bu',12);
            
            if(isset($dari) && isset($sampai)){
                $pdf->Cell(290,45,"Laporan per $dari hingga $sampai",0,0,'C');    
            }else{
                $pdf->Cell(270,45,'Laporan Keseluruhan',0,0,'C');    
            }
            
            $pdf->SetFont('Times','',10);
            $pdf->Ln(30);
            
            #$label=array(1=>'#','Nomer Surat','Perihal');
            $kolom=array(8,40,20);
            
            $pdf->Cell($kolom[0],10,'#',1,0,'C');   
            $pdf->Cell($kolom[1],10,'Nama',1,0,'C');
            $pdf->Cell($kolom[2],10,'Jumlah',1,0,'C');
            
            //$pdf->Cell($kolom[5],10,'Asal',1,0,'C');            

            $pdf->Ln();
            
            //for($i=1;$i<=3;$i++){
            $j=1;while($result=mysql_fetch_array($query)){
                    
                $pdf->Cell($kolom[0],10,$j,'TLBR',0,'C');
                $pdf->Cell($kolom[1],10,$result['nama'],'TBR');
                $pdf->Cell($kolom[2],10,$result['jumlah'],'TBR',0,'C');
                $pdf->Ln();
                $j++;       
            }
                
            //}
            
            $pdf->Output();
    }
}           

?>