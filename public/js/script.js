// var tinggi = window.innerHeight;
// var tanpanav = tinggi - 56;
// $('.carousel-item-with-nav').css('height',tanpanav);
// ajax berfungsi teknologi website yang menjadikan interaktif 
// membauat data disebagian element sehingga tidak perlu reload satu halaman

$(function() {

    $('.tombolTambahData').on('click' , function (){
        $('#formModalLabel').html('Tambah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Tambah Data') ; // css selector
    });

    $('.tampilModalUbah').on('click' , function() {
        
        $('#formModalLabel').html('Ubah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Ubah Data') ; // css selector
        

        const id = $(this).data('id');
        
        $.ajax({
            url : 'http//localhost/PBO/ProjekCrud/public/mahasiswa/getubah',
            data: {id : id},
            method: 'post',
            dataType: 'json',
            success: function(data) {
                $('#nama').val(data.nama); 
                $('#nim').val(data.nim); 
                $('#email').val(data.email); 
                $('#jurusan').val(data.jurusan); 
            }
        }); 
    });
});