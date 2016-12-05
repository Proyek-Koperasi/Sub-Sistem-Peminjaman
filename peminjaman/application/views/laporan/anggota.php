<script>
    $(function(){
        $("#tampilkan").click(function(){
            var id_anggota=$("#id_anggota").val();
            
            
            $.ajax({
                url:"<?php echo site_url('laporan/cari_anggota');?>",
                type:"POST",
                data:"id_anggota="+id_anggota,
                cache:false,
                success:function(html){
                    $("#tampil").html(html);
                }
            })
        })
    })
</script>

<legend><?php echo $title;?></legend>
<div class="form-horizontal">
    <div class="form-group">
        <label class="col-lg-3">ID Anggota</label>
        <div class="col-lg-5">
            <input type="text" id="id_anggota" class="form-control">
        </div>
    </div>
        
        <div class="col-lg-4">
            <button id="tampilkan" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i> Tampilkan</button>
        </div>
 
</div>

<div id="tampil"></div>