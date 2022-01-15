<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pegawai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        .container {
            max-width: 800;
            margin-top: 20px;
        
        }
    </style>
</head>

<body>
    <!-- CONTAINER --> 
    <div class="container">
        <!-- CARD -->
        <div class="card">
            <div class="card-header bg-secondary text-white">
                 Data Pegawai
            </div>
            <div class="card-body">
                <!-- Lokasi Text Pencarian -->
                <form action="" methode="get">
                <div class="input-group mb-3">
                     <input type="text" class="form-control" name= "katakunci"  placeholder="Masukan Kata Kunci" aria-label="Masukan Kata Kunci" aria-describedby="button-addon2">
                     <button class="btn btn-outline-secondary" type="button" id="button-addon2">Cari</button>
                     
                </div>
                </form>
                <!-- Modal -->
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    + Tambah Data Pegawai
                </button>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Form Pegawai</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Kalau Eror -->
                        <div class="alert alert-danger error" role="alert" style="display: none;">
                        </div>
                        <!-- Kalau Sukses -->
                        <div class="alert alert-danger sukses" role="alert" style="display: none;">
                        </div>
                        <!-- Form Input Data -->
                        <div class="mb-3 row">
                        <label for="inputNama" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputNama">
                            </div>
                        </div>
                        <div class="mb-3 row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputEmail">
                            </div>
                        </div>
                        <div class="mb-3 row">
                        <label for="inputBidang" class="col-sm-2 col-form-label">Bidang</label>
                            <div class="col-sm-10">
                                <select id="inputBidang" class="form-select">
                                    <option value="finance">Finance</option>
                                    <option value="marketing">Marketing</option>
                                    <option value="hr">HR</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                        <label for="inputAlamat" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputAlamat">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="button" class="btn btn-primary" id="tombolSimpan">Simpan</button>
                    </div>
                    </div>
                </div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Bidang</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Nama</td>
                            <td>Email</td>
                            <td>Bidang</td>
                            <td>Alamat</td>
                            <td>
                                <button type="button" class="btn btn-warning btn sm">Edit</button>
                                <button type="button" class="btn btn-danger btn sm">Delet</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                            </div>
                        </div>
                    </div>
    <!-- SCRIPT JAVASCRIPT -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script>
        $('#tombolSimpan').on('click',function(){
            var $nama = $('#inputNama').val();
            var $email = $('#inputEmail').val();
            var $bidang = $('#inputBidang').val();
            var $alamat = $('#inputAlamat').val();

            $.ajax({
                url: "<?php echo site_url("pegawai/simpan") ?>",
                type:"POST",
                data:{
                    nama: $nama,
                    email: $email,
                    bidang: $bidang,
                    alamat: $alamat
                },
                success: function(hasil) {
                    var $obj = $.parseJSON(hasil);
                    if($obj.sukses == false) {
                        $('.sukses').hide();
                        $('.error').show();
                        $('.error').html($obj.error);
                    } else {
                        $('.error').hide();
                        $('.sukses').show();
                        $('.sukses').html($obj.sukses);
                    }
                }
            });

        });
    </script> 
</body>

</html>