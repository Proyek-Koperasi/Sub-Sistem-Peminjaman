<div class="nav navbar-nav navbar-right">
    
</div>

<hr>
<h2>Daftar Permohonan Pinjaman</h2>
<?php echo $message;?>
<Table class="table table-striped">
    <thead>
        <tr>
            <td>No.</td>
            <td>FK Pinjam</td>
			<td>ID Anggota</td>
			<td>Tgl Pinjam</td>
            <td>Jumlah Pinjamanan</td>
            <td>Jumlah Angsuran</td>
            <td>Kali Angsuran</td>
            <td colspan="2"></td>
        </tr>
    </thead>
    <?php $no=0; foreach($angsuran as $row ): $no++;?>
    <tr>
        <td><?php echo $no;?></td>
        <td><?php echo $row->id_pinjaman;?></td>
		<td><?php echo $row->id_anggota;?></td>
		<td><?php echo $row->tgl_pinjaman;?></td>
        <td><?php echo $row->jml_pinjaman;?></td>
        <td><?php echo $row->jml_angsur;?></td>
        <td><?php echo $row->kali_angsur;?></td>
        <td><a href="<?php echo site_url('admin_peminjaman/edit/'.$row->id_pinjaman);?>"><i class="glyphicon glyphicon-check"></i> Detail</a></td>
        
    <?php endforeach;?>
</Table>
<?php echo $pagination;?>

<script>
    $(function(){
        $(".hapus").click(function(){
            var kode=$(this).attr("kode");
            
            $("#idhapus").val(kode);
            $("#myModal").modal("show");
        });
        
        $("#konfirmasi").click(function(){
            var kode=$("#idhapus").val();
            
            $.ajax({
                url:"<?php echo site_url('anggota/hapus');?>",
                type:"POST",
                data:"kode="+kode,
                cache:false,
                success:function(html){
                    location.href="<?php echo site_url('anggota/index/delete_success');?>";
                }
            });
        });
    });
</script>
