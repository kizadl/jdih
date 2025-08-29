<?PHP
header("Content-Type: application/json");
$servername = "localhost";//diisi nama server
$username = "";//diisi nama user db
$password = "";//diisi password db
$dbname = "";//diisi nama database

$varjson = array();
$row_array = (object)array();
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql=""; //query sql yang disesuaikan
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $row_array->idData=$row[""]; //berisi id dokumen
        $row_array->tahun_pengundangan=$row[""]; //berisi tahun penetapan atau tahun terbit ex. 2019
        $row_array->tanggal_pengundangan=$row[""]; //berisi tahun bulan tanggal (YYYY-MM-DD) ex. 2019-04-22
        $row_array->jenis=$row[""]; //berisi jenis peraturan ex. Peraturan Daerah
        $row_array->noPeraturan=$row[""]; //berisi no peraturan ex. 24
        $row_array->judul=$row[""]; //berisi judul ex. Peraturan Pemerintah No 1 Tahun 2019 Tentang Peraturan
        $row_array->noPanggil=$row[""]; //khusus untuk monografi/buku bila PUU bisa dikosongkan atau diisi '-'
        $row_array->singkatanJenis=$row[""]; //berisi singkatan dari jenis ex. PERMEN/KEPMEN
        $row_array->tempatTerbit=$row[""]; //berisi tempat terbit
        $row_array->penerbit=$row[""]; //khusus untuk monografi/buku bila PUU bisa dikosongkan atau diisi '-'
        $row_array->deskripsiFisik=$row[""]; //khusus untuk monografi/buku bila PUU bisa dikosongkan atau diisi '-'
        $row_array->sumber=$row[""]; //berisi sumber dokumen hukum, contoh PUU bersumber dari Berita Negara Tahun .... Nomor .....
        $row_array->subjek=$row[""]; //berisi kata kunci dari dokumen hukum
        $row_array->isbn=$row[""]; //khusus untuk monografi/buku bila PUU bisa dikosongkan atau diisi '-'
        $row_array->status=$row[""]; //berisi status PUU ex.berlaku/tidak berlaku
        $row_array->bahasa=$row[""]; //berisi bahasa dari dokumen hukum tersebut
        $row_array->bidangHukum=$row[""]; //berisi pembidangan/pengkategorian isi dokumen hukum(opsional menyesuaikan kebutuhan instansi)
        $row_array->teuBadan=$row[""];//nama instansi terkait
        $row_array->nomorIndukBuku=$row[""];//khusus untuk monografi/buku bila PUU bisa dikosongkan atau diisi '-'
        $row_array->fileDownload=$row[""]; //berisi nama file ex. peraturan.pdf, peraturan.docx
        $row_array->urlDownload=$row[""];//berisi url dan nama file ex. domain.com/peraturan.pdf atau menyesuaikan
        $row_array->abstrak=$row[""]; 
        $row_array->urlabstrak=$row[""];
        $row_array->urlDetailPeraturan=$row[""]; //berisi url halaman detail peraturan
        $row_array->operasi="4"; //wajib ada
        $row_array->display="1"; //wajib ada
        array_push($varjson,json_decode(json_encode($row_array)));
    }
    echo json_encode($varjson);
} else {
    echo "0 results";
}
$conn->close();
            
?>
