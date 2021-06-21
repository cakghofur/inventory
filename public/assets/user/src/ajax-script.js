$(document).ready(function(){


    // get Harga Ajax
    $('#prosesData').click(function(){
        
        let id=$('#ukuran').val();
        let jumlah=$('#jumlah').val();
        let Url=window.location.origin;
        let warna3;
        if($('#warna1').is(':checked')){
            warna3=1;
        }
        else if($('#warna2').is(':checked')){
            warna3=0;
        }
        if(jumlah==''){
            alert('Jumlah Harus diisi');
        }
        $.ajax({
            type:'GET',
            data:'',
            url:Url+'/getharga/'+id+'/'+jumlah+'/'+warna3,
            success:function(obj1){
                // let obj1=JSON.parse(result);
                $('#harga').text('Rp. '+parseFloat(obj1.harga));
                $('#subharga').val(obj1.harga);
                $('#jumlah2').text(jumlah);
                $('#total').text('Rp. '+parseFloat(obj1.total));
                $('#kirim').removeAttr('disabled');
            }
        });
        
    });
});