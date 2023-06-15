<?php

header('Content-Type: application/json; charset=utf8');

$koneksi = mysqli_connect("localhost", "root", "", "appicrud");

if($_SERVER['REQUEST_METHOD'] === 'GET'){
    $sql = "SELECT * FROM barang";
    $query = mysqli_query($koneksi, $sql);
    $array_data = array();
while($data = mysqli_fetch_assoc($query)){
    $array_data[] = $data;

}
echo json_encode($array_data);
} else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_barang = $_POST['nama_barang'];
    $jenis = $_POST['jenis'];
    $berat = $_POST['berat'];
    $sql = "INSERT INTO barang (nama_barang, jenis, berat) VALUES('$nama_barang','$jenis','$berat')";
    $cek = mysqli_query($koneksi, $sql);

  if($cek){
    $data = [
        'status' => "berhasil"
    ];
    echo json_encode([$data]);
       }else{
    $data = [
        'status' => "gagal"
    ];
    echo json_encode([$data]);
    }
}else if($_SERVER['REQUEST_METHOD'] === 'DELETE'){
    $id_b = $_GET['id_b'];
    $sql = "DELETE FROM barang WHERE id='$id'";
    $cek = mysqli_query($koneksi, $sql);

    if($cek){
        $data = [
            'status' => "berhasil"
        ];
        echo json_encode([$data]);
      }else{
        $data = [
            'status' => "gagal"
        ];
        echo json_encode([$data]);
    }
}else if($_SERVER['REQUEST_METHOD'] === 'PUT'){
      $id_b = $_GET['id_b'];
      $nama_barang = $_GET['nama_barang'];
      $jenis = $_GET['jenis'];
      $berat = $_GET['berat'];
      
      $sql = "UPDATE barang SET nama_barang='$nama_barang', jenis='jenis', berat='$berat' WHERE id_b='$id_b'";
      $cek = mysqli_query($koneksi, $sql);
      
      if($cek){
        $data = [
            'status' => "berhasil"
        ];
        echo json_encode([$data]);
      }else{
        $data = [
            'status' => "gagal"
        ];
        echo json_encode([$data]);
   }

}