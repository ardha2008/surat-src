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
        
        $query=mysql_query("select * from surat where `delete`=0 order by tanggal_surat DESC, jenis_surat ASC");
        
        class PDF extends FPDF {
            // Page header
            function Header()
            {
                // Logo
                $this->Image('lib/logo/ykpp.png',18,8,19);
                $this->Image('lib/logo/upn.jpg',170,8,19);
                // Arial bold 15
                $this->SetFont('Arial','',12);
                // Move to the right
                $this->Cell(80);
                // Title
                $this->Cell(30,10,'YAYASAN KESEJAHTERAAN PENDIDIKAN DAN PERUMAHAN',0,0,'C');
                $this->Cell(-30,20,'UNIVERSITAS PEMBANGUNAN NASIONAL "VETERAN"',0,0,'C');
                $this->Cell(30,30,'JAWA TIMUR',0,0,'C');
                
                // Line break
                $this->Ln(20);
                
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
                $this->Cell(10,1,'©2014 Biro Kerjasama Dan Kemahasiswaan UPN Jatim',0,0,'L');
            }
        }

            // Instanciation of inherited class
            $pdf = new PDF();
            $pdf->AliasNbPages();
            $pdf->AddPage();
            $pdf->SetFont('Times','',11);
            $pdf->Cell(180,25,'Surabaya, '.date('d F Y'),0,0,'R');
            $pdf->Ln(1);
            $pdf->SetFont('Times','bu',12);
            $pdf->Cell(118,45,'Laporan Surat Keluar Masuk',0,0,'R');
            $pdf->SetFont('Times','',10);
            $pdf->Ln(30);
            
            #$label=array(1=>'#','Nomer Surat','Perihal');
            $kolom=array(8,60,80,20,25);
            
            $pdf->Cell($kolom[0],10,'#',1,0,'C');   
            $pdf->Cell($kolom[1],10,'No Surat',1,0,'C');
            $pdf->Cell($kolom[2],10,'Perihal',1,0,'C');
            $pdf->Cell($kolom[3],10,'Jenis',1,0,'C');
            $pdf->Cell($kolom[4],10,'Tanggal',1,0,'C');

            $pdf->Ln();
            
            for($i=1;$i<=3;$i++){
                $j=1;while($result=mysql_fetch_array($query)){
                    if($result['jenis_surat']=='masuk'){
                        $hasil='S.MASUK';
                    }else{
                        $hasil='S.KELUAR';
                    }
                    $pdf->Cell($kolom[0],10,$j,'TLB',0,'C');
                    $pdf->Cell($kolom[1],10,$result['idsurat'],'TB');
                    $pdf->Cell($kolom[2],10,$result['perihal'],'TB');
                    $pdf->Cell($kolom[3],10,$hasil,'TB');
                    $pdf->Cell($kolom[4],10,date('d-m-Y',strtotime($result['tanggal_surat'])),'TBR');
                    $pdf->Ln();
                    $j++;       
                }
            }
            
            $pdf->Output();
    }
}           

?>