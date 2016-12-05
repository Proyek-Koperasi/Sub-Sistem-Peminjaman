<table class="table table-striped">
    <thead>
        <tr>
            <td>Faktur Peminjaman</td>
            <td>Tgl. Peminjaman</td>
            <td>Jumlah Pinjaman</td>
            <td></td>
        </tr>
    </thead>
    <?php foreach($pencarian as $row):?>
    <tr>
        <td><?php echo $row->id_pinjaman;?></td>
		<td><?php echo $row->tgl_pinjaman;?></td>
        <td><?php echo $row->jml_pinjaman;?></td>
        <td><a href="#" class="tambahkan" no="<?php echo $row->id_pinjaman;?>">
            <i class="glyphicon glyphicon-plus"></i>
        </a></td>
    </tr>
    <?php endforeach;?>
</table>