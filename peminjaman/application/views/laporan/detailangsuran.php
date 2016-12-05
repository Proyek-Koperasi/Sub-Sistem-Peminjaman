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
<h3>Riwayat Peminjaman</h3>
<table class="table table-striped">
    <thead>
        <tr>
            <td>No.</td>
            <td>FK Angsuran</td>
            <td>Tgl Bayar</td>
			<td>Angsuran Ke-</td>
			
        </tr>
    </thead>
    <?php $no=0; foreach($ang as $row): $no++;?>
    <tr>
        <td><?php echo $no;?></td>
        <td><?php echo $row->id_angsuran;?></a></td>
        <td><?php echo $row->tgl_angsuran;?></td>
        <td><?php echo $row->angsuranke;?></td>
    </tr>
    <?php endforeach;?>
</table>
</div>