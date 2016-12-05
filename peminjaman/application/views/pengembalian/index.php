<script>
    $(function(){
        $("#no").keypress(function(){
            var keycode = (event.keyCode ? event.keyCode : event.which);
            
            if(keycode == '13'){
                var kode=$("#no").val();
            
                $.ajax({
                    url:"<?php echo site_url('pengembalian/cariPinjaman');?>",
                    type:"POST",
                    data:"no="+no,
                    cache:false,
                    success:function(msg){
                        data=msg.split("|");
                        if (data==0) {
                            alert("data tidak ditemukan");
                            $("#nama").val('');

                        }else{
                            $("#nama").val(data(''));
                        }
                    }
                })
            }
        })
        
        
        $("#simpan").click(function(){
            var no=$("#no").val();
            var nis=$("#nis").val();
            var denda=$("#denda").val();
            var nominal=parseInt($("#nominal").val());
            var no=$("#no").val();
            
            if (no=="" || nis=="") {
                alert("Pilih ID Transaksi");
                $("#no").focus();
                return false;
            }
            else if (denda=="Y") {
                if (nominal=="") {
                    alert ("Masukkan Nominal Denda");
                    $("#nominal").focus();
                    return false;
                }else{
                    $.ajax({
                        url:"<?php echo site_url('pengembalian/simpan');?>",
                        type:"POST",
                        data:"no="+no+"&denda="+denda+"&nominal="+nominal,
                        cache:false,
                        success:function(html){
                            alert("Data Berhasil disimpan");
                            location.reload();
                        }
                    })
                }
            }else{
                $.ajax({
                    url:"<?php echo site_url('pengembalian/simpan');?>",
                    type:"POST",
                    data:"no="+no+"&denda="+denda+"&nominal="+nominal,
                    cache:false,
                    success:function(html){
                        alert("Data Berhasil disimpan");
                        location.reload();
                    }
                })
            }
        })
        
        $("#cari").click(function(){
            $("#myModal2").modal("show");
        })
        
        $("#caripinjamfk").keyup(function(){
            var id_pinjaman=$("#caripinjamfk").val();
            
            $.ajax({
                url:"<?php echo site_url('pengembalian/cari_by_id_pinjaman');?>",
                type:"POST",
                data:"id_pinjaman="+id_pinjaman,
                cache:false,
                success:function(html){
                    $("#tampilpinjam").html(html);
                }
            })
        })
        
        
        $(".tambahkan").live("click",function(){

			var no=$(this).attr("no");
            var tgl_pinjam=$(this).attr("pinjam");
			var nama=$(this).attr("nama");
            var jumlahpinjam=$(this).attr("jumlahpinjam");
			var jumlahangsuran=$(this).attr("jumlahangsuran");
            
            $("#no").val(no);
            $("#tgl_pinjam").val(tgl_pinjam);
            $("#nama").val(nama));
			$("#jumlahpinjam").val(jumlahpinjam));
			$("#jumlahangsuran").val(jumlahangsuran));
 
            
            $("#myModal2").modal("hide");
        })
    })
</script>

<form class="form-horizontal" action="" method="post">
<div class="panel panel-default">
    <div class="panel-heading">
        <?php echo $title;?>
    </div>
    <div class="panel-body">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-lg-4 control-label">Faktur Peminjaman</label>
                    <div class="col-lg-5">
                        <input type="text" name="no" id="no" class="form-control">
                    </div>
                    
                    <div class="col-lg-2">
                        <a href="#" class="btn btn-primary" id="cari"><i class="glyphicon glyphicon-search"></i></a>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-lg-4 control-label">Tgl. Pinjam</label>
                    <div class="col-lg-7">
                        <input type="text" name="tgl_pinjam" id="tgl_pinjam" class="form-control" readonly="readonly">
                    </div>
                </div>
                
				<div class="form-group">
                    <label class="col-lg-4 control-label">Nama</label>
                    <div class="col-lg-7">
                        <input type="text" id="nama" class="form-control">
                    </div>
                </div>
				
            </div>
            
            <div class="col-md-6">
				<div class="form-group">
                    <label class="col-lg-4 control-label">Faktur Angsuran</label>
                    <div class="col-lg-7">
                        <input type="text" name="angsurfk" id="angsurfk" class="form-control" value="<?php echo $noauto;?>" readonly="readonly">
                    </div>
				</div>
                <div class="form-group">
                    <label class="col-lg-4 control-label">Tanggal</label>
                    <div class="col-lg-7">
                        <input type="text" name="tanggal" id="tanggal" class="form-control" value="<?php echo $tanggal;?>"readonly="readonly">
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-lg-4 control-label">Jumlah Pinjam</label>
                    <div class="col-lg-7">
                        <input type="text" name="jml_pinjam" id="jml_pinjam" class="form-control" readonly="readonly">
                    </div>
                </div>
            </div>
    </div>
</div>

<div class="panel panel-success">
    <div class="panel-heading">
        <?php echo $title;?>
    </div>
    <div class="panel-body">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-lg-4 control-label">Jumlah Angsuran</label>
                    <div class="col-lg-5">
                        <input type="text" name="jml_angsur" id="jml_angsur" class="form-control" readonly="readonly">
                    </div>
                </div>
				
				<div class="form-group">
                    <label class="col-lg-4 control-label">Cicilan Ke-</label>
                    <div class="col-lg-5">
                        <input type="text" name="cicilanke" id="cicilanke" class="form-control" readonly="readonly">
                    </div>
                </div>
                
				
				
            </div>
    </div>
</div>

      <div class="panel panel-success">
       <div class="panel-heading">
      <h3 class="panel-title">Upload file Anda dengan melengkapi form di bawah ini. File yang bisa di Upload hanya file dengan ekstensi  <b>.jpg dan .png</b> dan besar file (file size) maksimal hanya 1 MB.</h3>
       </div>
            <?php
            include('config.php');
            error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
            if($_POST['upload']){
                $allowed_ext    = array('jpg','png');
                $file_name        = $_FILES['file']['name'];
                $file_ext        = strtolower(end(explode('.', $file_name)));
                $file_size        = $_FILES['file']['size'];
                $file_tmp        = $_FILES['file']['tmp_name'];

                $nama            = $_POST['nama'];
                $tgl            = date("Y-m-d");

                if(in_array($file_ext, $allowed_ext) === true){
                    if($file_size < 1044070){
                        $lokasi = 'asset/files/'.$nama.'.'.$file_ext;
                        move_uploaded_file($file_tmp, $lokasi);
                        $in = mysql_query("INSERT INTO download VALUES(NULL, '$tgl', '$nama', '$file_ext', '$file_size', '$lokasi')");
                        if($in){
       echo "<div class='alert alert-info' role='alert'>Data Berhasil Disimpan</div>" ;
                        }else{
       echo "Data gagal disimpan" ;
                        }
                    }else{
                        echo "<div class='alert alert-info' role='alert'>ERROR: Besar ukuran file (file size) maksimal 1 Mb!</div>";
                    }
                }else{
                    echo "<div class='alert alert-info' role='alert'>ERROR: Ekstensi file tidak di izinkan</div>";
                }
            }
            ?>

            <p>
 <div class="container">
		
		<div class="form-group">
			<label class="col-sm-2">Pilih File</label>
				<div class="col-sm-4"><input type="file" name="file" required /></div>
		</div>
            </p>
        </div>
    </div>
</form>
    
    <div class="panel-footer">
        <button id="simpan" class="btn btn-primary"><i class="glyphicon glyphicon-saved"></i> Simpan</button>
    </div>
</div>



 <!-- Modal -->
            <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Transaksi Angsuran</h4>
                  </div>
                  <div class="modal-body">
                        <div class="form-horizontal">
                            <div class="form-group">
                                <label class="col-lg-5">Cari Faktur Peminjaman</label>
                                <div class="col-lg-5">
                                    <input type="text" id="caripinjamfk" class="form-control">
                                </div>
                            </div>
                        </div>
                        
                        <div id="tampilpinjam"></div>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->