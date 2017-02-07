<?php 
    include 'connect.php';
    $q = intval($_GET['q']);
?>
<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>



<select name="id_ambil_guru">
<?php
$sql="SELECT * FROM ambil_guru WHERE id_mapel = '".$q."'";
$result = mysqli_query($connect,$sql);
while($row = mysqli_fetch_array($result)) {
$id_guru = $row['id_guru'];
$query = mysqli_query($connect,"SELECT * FROM guru WHERE id_guru = '$id_guru'");
$data=mysqli_fetch_array($query);
?>
    <option value="<?php echo $row['id_ambil_guru'];?>"><?php $data['nama_guru'];?> </option>   
<?php
}
?>
</select>
</body>
</html>