<script>
    $(function(){
        
        function loadData(args) {
            //code
            $("#tampil").load("<?php echo site_url('peminjaman/tampil');?>");
        }
        loadData();
        
        function kosong(args) {
            //code
            $("#kode").val('');
            $("#judul").val('');
            $("#pengarang").val('');
        }
        
        $("#nis").click(function(){
            var nis=$("#nis").val();
            
            $.ajax({
                url:"<?php echo site_url('peminjaman/cariAnggota');?>",
                type:"POST",
                data:"nis="+nis,
                cache:false,
                success:function(html){
                    $("#nama").val(html);
                }
            })
        })
        
        $("#kode").keypress(function(){
            var keycode = (event.keyCode ? event.keyCode : event.which);
            
            if(keycode == '13'){
                var kode=$("#kode").val();
            
                $.ajax({
                    url:"<?php echo site_url('peminjaman/cariBuku');?>",
                    type:"POST",
                    data:"kode="+kode,
                    cache:false,
                    success:function(msg){
                        data=msg.split("|");
                        if (data==0) {
                            alert("data tidak ditemukan");
                            $("#judul").val('');
                            $("#pengarang").val('');
                        }else{
                            $("#judul").val(data[0]);
                            $("#pengarang").val(data[1]);
                            $("#tambah").focus();
                        }
                    }
                })
            }
        })
        
        $("#check").click(function(){
            var kode=$("#kode").val();
            var judul=$("#judul").val();
            var pengarang=$("#pengarang").val();
            
            if (kode=="") {
                //code
                alert("Kode Buku Masih Kosong");
                return false;
            }else if (judul=="") {
                //code
                alert("Data tidak ditemukan");
                return false
            }else{
                $.ajax({
                    url:"<?php echo site_url('peminjaman/tambah');?>",
                    type:"POST",
                    data:"kode="+kode+"&judul="+judul+"&pengarang="+pengarang,
                    cache:false,
                    success:function(html){
                        loadData();
                        kosong();
                    }
                })    
            }
            
        })
        
        
        $("#simpan").click(function(){
            var nomer=$("#no").val();
            var pinjam=$("#pinjam").val();
            var kembali=$("#kembali").val();
            var nis=$("#nis").val();
            var jumlah=parseInt($("#jumlahTmp").val(),10);
            
            if (nis=="") {
                alert("Pilih Nis Siswa");
                return false;
            }else if (jumlah==0) {
                alert("pilih buku yang akan dipinjam");
                return false;
            }else{
                $.ajax({
                    url:"<?php echo site_url('peminjaman/sukses');?>",
                    type:"POST",
                    data:"nomer="+nomer+"&pinjam="+pinjam+"&kembali="+kembali+"&nis="+nis+"&jumlah="+jumlah,
                    cache:false,
                    success:function(html){
                        alert("Transaksi Peminjaman berhasil");
                        location.reload();
                    }
                })
            }
            
        })
        
        $(".hapus").live("click",function(){
            var kode=$(this).attr("kode");
            
            $.ajax({
                url:"<?php echo site_url('peminjaman/hapus');?>",
                type:"POST",
                data:"kode="+kode,
                cache:false,
                success:function(html){
                    loadData();
                }
            });
        });
        
        $("#cari").click(function(){
            $("#myModal2").modal("show");
        })
        
        $("#caribuku").keyup(function(){
            var caribuku=$("#caribuku").val();
            
            $.ajax({
                url:"<?php echo site_url('peminjaman/pencarianbuku');?>",
                type:"POST",
                data:"caribuku="+caribuku,
                cache:false,
                success:function(html){
                    $("#tampilbuku").html(html);
                }
            })
        })
        
        $(".tambah").live("click",function(){
            var kode=$(this).attr("kode");
            var judul=$(this).attr("judul");
            var pengarang=$(this).attr("pengarang");
            
            $("#kode").val(kode);
            $("#judul").val(judul);
            $("#pengarang").val(pengarang);
            
            $("#myModal2").modal("hide");
        })
        
    })
</script>

<legend><?php echo $title;?></legend>
<form class="form-horizontal" action="<?php echo site_url('admin_peminjaman/setuju');?>" method="post">
<div class="panel panel-default">
    <div class="panel-body">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-lg-4 control-label">No. Transaksi</label>
                    <div class="col-lg-7">
                        <input type="text" id="no" name="no" class="form-control" value="<?php echo $pinjaman['id_pinjaman'];?>" readonly="readonly">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-lg-4 control-label">Tgl Pinjam</label>
                    <div class="col-lg-7">
                        <input type="text" id="tglpinjam" name="tglpinjam" class="form-control" value="<?php echo $pinjaman['tgl_pinjaman'];?>" readonly="readonly">
                    </div>
                </div>
                
            </div>
            <div class="col-md-6">
                
                <div class="form-group">
                    <label class="col-lg-4 control-label">ID Anggota</label>
                    <div class="col-lg-7">
                        <input type="text" id="nama" name="nama" class="form-control" value="<?php echo $pinjaman['id_anggota'];?>" readonly="readonly">
                    </div>
                </div>
            </div>
    </div>
</div>

<div class="panel panel-success">
    <div class="panel-heading">
        Detail Pinjaman
    </div>
    <div class="panel-body">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-lg-4 control-label">Jumlah Pinjaman</label>
                    <div class="col-lg-7">
                        <input type="text" id="jumlahpinjaman" name="jumlahpinjaman" class="form-control" value="<?php echo $pinjaman['jml_pinjaman'];?>" readonly="readonly">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-lg-4 control-label">Bunga %</label>
                    <div class="col-lg-7">
                        <input type="text" id="bunga" name="bunga" class="form-control" style="width:50px;" value="<?php echo $pinjaman['bunga'];?>" readonly="readonly">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-lg-4 control-label">Cicilan X</label>
                    <div class="col-lg-7">
                        <input type="text" id="cicilan" name="cicilan" class="form-control" style="width:50px;" value="<?php echo $pinjaman['kali_angsur'];?>" readonly="readonly">
                    </div>
                </div>
            </div>

			<div class="col-md-6">
                <div class="form-group">
                    <label class="col-lg-4 control-label">Jumlah Angsuran</label>
                    <div class="col-lg-7">
                        <input type="text" id="jumlahangsuran" name="jumlahangsuran" class="form-control" value="<?php echo $pinjaman['jml_angsur'];?>" readonly="readonly">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-lg-4 control-label">Total Angsuran</label>
                    <div class="col-lg-7">
                        <input type="text" id="totalangsuran" name="totalangsuran" class="form-control" value="<?php echo $pinjaman['total_angsur'];?>" readonly="readonly">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-lg-4 control-label">Keterangan</label>
                    <div class="col-lg-7">
                        <input type="text" id="keterangan" name="keterangan" class="form-control" value="<?php echo $pinjaman['Keterangan'];?>" readonly="readonly">
                    </div>
                </div>
				
            </div> 			
    </div>
</div>

    
    
    <div class="panel-footer">
		<input type="button" value="Go Back" class="btn btn-primary" onclick="history.back(-1)" />
        <button id="simpan" class="btn btn-primary"><i class="glyphicon glyphicon-hdd"></i> Setuju</button>
    </div>
	</form>
</div>





 <!-- Modal -->
            <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Cari Buku</h4>
                  </div>
                  <div class="modal-body">
                        <div class="form-horizontal">
                            <label class="col-lg-3 control-label">Cari Nama Buku</label>
                            <div class="col-lg-5">
                                <input type="text" name="caribuku" id="caribuku" class="form-control">
                            </div>
                        </div>
                        
                        <div id="tampilbuku"></div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="konfirmasi">Hapus</button>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
