<?php
//load the database configuration file
include 'connect.php';

if(isset($_POST['importSubmit'])){
    
    //validate whether uploaded file is a csv file
    $csvMimes = array('application/vnd.ms-excel','text/plain','text/csv','text/tsv');
    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'],$csvMimes)){
        if(is_uploaded_file($_FILES['file']['tmp_name'])){
            
            //open uploaded csv file with read only mode
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
            
            //skip first line
            fgetcsv($csvFile);
            
            //parse data from csv file line by line
            while(($line = fgetcsv($csvFile)) !== FALSE){
                //check whether member already exists in database with same email
                // $prevQuery = "SELECT id FROM members WHERE email = '".$line[1]."'";
                // $prevResult = $db->query($prevQuery);
                // if($prevResult->num_rows > 0){
                //     //update member data
                //     $db->query("UPDATE members SET name = '".$line[0]."', phone = '".$line[2]."', created = '".$line[3]."', modified = '".$line[3]."', status = '".$line[4]."' WHERE email = '".$line[1]."'");
                // }else{
                
                //ganti kelas ke kelas yang baru
                $nis = "$line[0]";
                $id_kelas = "$line[1]";
                mysqli_query($connect,"UPDATE siswa SET id_kelas = '$id_kelas' WHERE nis = '$nis'");
             //   echo $nis." ".$id_kelas." ";
                //insert member data into database
               // mysqli_query($connect, "INSERT INTO siswa(nama_siswa, tahun_masuk, nis, password,id_kelas) VALUES ('".$line[0]."','".$line[1]."','".$line[2]."','".$line[3]."','".$line[4]."')");
                // }
            }
            
            //close opened csv file
            fclose($csvFile);

            $qstring = '?status=succ';
        }else{
            $qstring = '?status=err';
        }
    }else{
        $qstring = '?status=invalid_file';
    }
}

//redirect to the listing page
