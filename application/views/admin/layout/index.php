<style>
    .no_kursi{
        border: 1px solid black;
        border-radius: 2px;
        margin-bottom: 7px;
        margin-left: 7px;
        margin-right: 7px;
        padding: 2px;
        align:center;
    }
    .supir{
        border: 1px solid black;
        border-radius: 2px;
        margin-bottom: 7px;
        padding: 2px;
        /* margin-left: 3px;
        margin-right: 3px; */
        align:center;
    }
</style>
<div class="row">
    <?php foreach ($cars as $value) { ?>
    <div class="col-md-3 pb-3">
        <div class="card">
            <div class="card-header bg-green-custom text-white mobil" id="<?= $value->id_mobil?>"><?= $value->nama_mobil?></div>
            <div class="card-body">
                <div class="row d-flex" id="tata_letak">
                    <!-- <div class="supir d-flex justify-content-center col-sm-6"><p style="margin-bottom:0;">Supir</p></div> -->
                    <?php for ($i=1; $i <= $value->kapasitas ; $i++) { ?>
                        <div class="d-flex justify-content-center col-sm-5 no_kursi" id="<?= $value->id_mobil?><?=$i?>"><?=$i?>.</div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
</div>

<script>
    $(document).ready(function(){
        getListKursi();
    });

    function getListKursi(){
        $.ajax({
            url: "<?= site_url('admin/getPenumpangList')?>",
            dataType: "JSON",
            success: function(data){
                console.log(data)
                // var html = '';
			    // var no = 1;
                // get id mobil multiple
                $('.mobil').each(function() {
                    id = $(this).attr('id');
                    for(let i = 0; i < data.length; i++){
                        const id_mobil = data[i].id_mobil;
                        if(id_mobil == id){
                            $('#mobil_id').addClass('bg-success');
                            console.log(id);
                            const id_mobil = data[i].id_mobil;
                            const nama_mobil = data[i].nama_mobil;
                            const nama_pemesan = data[i].nama;
                            const kursi = data[i].kursi;
                            const merge = id_mobil + kursi;
                            
                            console.log(nama_pemesan)
                            $('.no_kursi').each(function() {
                                idmobil = $(this).attr('id');
                                
                                if(idmobil == merge){
                                    // console.log(nama_pemesan)
                                    $(`#${idmobil}`).addClass('bg-primary text-white');
                                    $(`#${idmobil}`).css('font-size','10pt');
                                    $(`#${idmobil}`).append(nama_pemesan);
                                }
                            });
                        }
                        
                    }
                });

            }

        })
    }
</script>