<script>
$(document).ready(function() {
			$( ".datepicker" ).datepicker();
	});

 	function printdiv(divID){
		  //Get the HTML of div
            var divElements = document.getElementById(divID).innerHTML;
            //Get the HTML of whole page
            var oldPage = document.body.innerHTML;

            //Reset the page's HTML with div's HTML only
            document.body.innerHTML = 
              "<html><head><title></title></head><body>" + 
              divElements + "</body>";

            //Print Page
            window.print();

            //Restore orignal HTML
            document.body.innerHTML = oldPage;

		}
		</script>
		<a style="float:right;margin:5px;width:100px;"    onclick="return printdiv('span6')"  href="#" 
                                            class="btn-primary btn"><i class="fa fa-print"></i></a>
<div id="span6">
<h3>Laporan Pinjaman</h3>
<table class="table table-striped">
    <thead>
        <tr>
            <td>No.</td>
            <td>FK Pinjam</td>
            <td>ID Anggota</td>
            <td>Jumlah Pinjam</td>
            <td>Tgl Pinjam</td>
			<td>Bunga</td>
			<td>Banyak Angsuran</td>
			
        </tr>
    </thead>
    <?php $no=0; foreach($lap as $row): $no++;?>
    <tr>
        <td><?php echo $no;?></td>
        <td><?php echo $row->id_pinjaman;?></td>
        <td><?php echo $row->id_anggota;?></td>
        <td><?php echo $row->jml_pinjaman;?></td>
		<td><?php echo $row->tgl_pinjaman;?></td>
		<td><?php echo $row->bunga;?></td>
		<td><?php echo $row->kali_angsur;?></td>
    </tr>
    <?php endforeach;?>
</table>
</div>