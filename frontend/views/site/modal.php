<?php

use yii\bootstrap\Modal;
$this->title = 'Indeks Kepuasan Masyarakat';

?>
<style>
.button {
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  width : 400px;
}

.button1 {background-color: #04AA6D;} /* Green */
.button2 {background-color: Orange;} /* Blue */
</style>
</br>
<div class="container" align="center">
<h3>Indeks Kepuasan Masyarakat</h3>
<h7>Mohon mengisi survey Indeks Kepuasan Masyarakat (IKM) sebagai masukan untuk penyajian website yang lebih baik</h7><br><br>
</div>
<div class="container">
	<div class="row">
	 <div class="col-lg-4">
          <form>
           <label for="fname">Nama :</label><br>
           <input type="text" id="fname" name="fname" placeholder="Ketik Nama Anda"><br><br>
           <label for="fname">Jenis Kelamin :</label><br>
           <select name="cars" id="cars">
	   <option value="volvo">- Pilih Jenis Kelamin -</option>
  	   <option value="volvo">Laki-Laki</option>
  	   <option value="saab">Perempuan</option>
          </select>
         </form>
         </div>
         <div class="col-lg-4">
         <form>
          <label for="fname">Usia :</label><br>
          <input type="number" id="fname" name="fname" placeholder="0">
	  <br><br>
          <label for="lname">Pendidikan :</label><br>
          <select name="cars" id="cars">
 	   <option value="volvo">- Pilih Pendidikan -</option>
  	   <option value="volvo">SD</option>
  	   <option value="saab">SMP</option>
  	   <option value="saab">SMA</option>
          </select>
         </form>
         </div>
         <div class="col-lg-4">
         <form>
	 <label for="lname">Jenis Pekerjaan :</label><br>
          <select name="cars" id="cars">
  	   <option value="volvo">- Pilih Pekerjaan -</option>
	   <option value="volvo">PNS</option>
  	   <option value="saab">Karyawan Swasta</option>
          </select>
         </form>
         </div>
	</div><br>
	<div class="row">
	  <div class="col-lg-12">
	  <form>
          <label>1. Bagaimana pendapat saudara tentang kesesuaian persyaratan pelayanan dengan jenis pelayanannya?</label><br>
  	  <input type="radio" id="age1" name="age" value="4">
          <label for="age1">Sangat Puas</label><br>
          <input type="radio" id="age2" name="age" value="3">
          <label for="age2">Puas</label><br>  
          <input type="radio" id="age3" name="age" value="2">
          <label for="age3">Cukup Puas</label><br>
          <input type="radio" id="age3" name="age" value="1">
          <label for="age3">Tidak Puas</label><br>
          <br>
	</form>
	</div>
<div class="col-lg-12">
	  <form>
          <label>2. Bagaimana pendapat saudara tentang kecepatan waktu dalam memberikan pelayanan?</label><br>
  	  <input type="radio" id="age1" name="age" value="4">
          <label for="age1">Sangat Puas</label><br>
          <input type="radio" id="age2" name="age" value="3">
          <label for="age2">Puas</label><br>  
          <input type="radio" id="age3" name="age" value="2">
          <label for="age3">Cukup Puas</label><br>
          <input type="radio" id="age3" name="age" value="1">
          <label for="age3">Tidak Puas</label><br>
          <br>
	</form>
	</div>
<div class="col-lg-12">
	  <form>
          <label>3. Bagaimana pendapat saudara tentang kewajaran biaya/tarif dalam pelayanan?</label><br>
  	  <input type="radio" id="age1" name="age" value="4">
          <label for="age1">Sangat Puas</label><br>
          <input type="radio" id="age2" name="age" value="3">
          <label for="age2">Puas</label><br>  
          <input type="radio" id="age3" name="age" value="2">
          <label for="age3">Cukup Puas</label><br>
          <input type="radio" id="age3" name="age" value="1">
          <label for="age3">Tidak Puas</label><br>
          <br>
	</form>
	</div>
<div class="col-lg-12">
	  <form>
          <label>4. Bagaimana pendapat saudara tentang kesesuaian produk pelayanan antara yang tercantum dalam standar pelayanan dengan hasil yang diberikan?</label><br>
  	  <input type="radio" id="age1" name="age" value="4">
          <label for="age1">Sangat Puas</label><br>
          <input type="radio" id="age2" name="age" value="3">
          <label for="age2">Puas</label><br>  
          <input type="radio" id="age3" name="age" value="2">
          <label for="age3">Cukup Puas</label><br>
          <input type="radio" id="age3" name="age" value="1">
          <label for="age3">Tidak Puas</label><br>
          <br>
	</form>
	</div>
<div class="col-lg-12">
	  <form>
          <label>5. Bagaimana pendapat Saudara tentang kompetensi/kemampuan petugas dalam pelayanan?</label><br>
  	  <input type="radio" id="age1" name="age" value="4">
          <label for="age1">Sangat Puas</label><br>
          <input type="radio" id="age2" name="age" value="3">
          <label for="age2">Puas</label><br>  
          <input type="radio" id="age3" name="age" value="2">
          <label for="age3">Cukup Puas</label><br>
          <input type="radio" id="age3" name="age" value="1">
          <label for="age3">Tidak Puas</label><br>
          <br>
	</form>
	</div>
<div class="col-lg-12" align="center">
	<button class="button button2">SIMPAN</button>
</div>
	</div>
</div>
<div class="container">
</br>


<?php


echo '<a href="" class="nav-link" style="color:red">|&nbsp<b>Isi Survey&nbsp|</a>';

// Modal::end();
?>
</br>
</div>

