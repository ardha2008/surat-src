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
}           

?>