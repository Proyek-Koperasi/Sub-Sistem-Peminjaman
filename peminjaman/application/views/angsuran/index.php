<div class="nav navbar-nav navbar-right">

</div>
<h2>Data Angsuran</h2>
<hr>
<?php echo $message;?>
<Table class="table table-striped">
    <thead>
        <tr>
            <td>No.</td>
            <td>Id Pinjam</td>
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
		<td><?php echo $row->tgl_pinjaman;?></td>
        <td><?php echo $row->jml_pinjaman;?></td>
        <td><?php echo $row->jml_angsur;?></td>
        <td><?php echo $row->kali_angsur;?></td>
        <td><a href="<?php echo site_url('angsuran/edit/'.$row->id_pinjaman);?>"><i class="glyphicon glyphicon-check"></i> Bayar</a></td>
        
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
