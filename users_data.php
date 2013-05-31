<?php
include('config.php');

$per_page = 3;

if ($_GET) {
    $page = $_GET['page'];
}



//get table contents
$start = ($page - 1) * $per_page;
$sql = "select * from users order by id";
$rsd = mysql_query($sql);
?>

<script type="text/javascript">
    $(function() {
        $(":checkbox").change(function() {
            $(this).closest("tr").toggleClass("diffColor", this.checked);
        });
    });

    $('#select-all:checkbox').click(function() {
        var checkedStatus = this.checked;
        $('#content tr input:checkbox').each(function() {
            $(this).attr('checked', checkedStatus);
            $(this).closest("tr").toggleClass("diffColor", this.checked);



        });
    });

    
    

    
   






</script>
<script type="text/javascript" charset="utf-8">
			$(document).ready( function() {
		       $('#example').dataTable( {
		         "iDisplayLength": 2,
		         "aLengthMenu": [[2, 3, 100, -1], [2, 3, 100, "All"]]
		       } );
		     } );
		</script>


<table class="table" id="example" width="100%">
    <thead>
        <tr>
            <th class="black-cell"><input type="checkbox" name="select-all" id="select-all" /></th>
            <th scope="col">
                <span class="column-sort">
                    <a href="#" title="Sort up" class="sort-up active"></a>
                    <a href="#" title="Sort down" class="sort-down"></a>
                </span>
                Title
            </th>
            <th scope="col">Keywords</th>
            <th scope="col">Preview</th>
            <th scope="col">
                <span class="column-sort">
                    <a href="#" title="Sort up" class="sort-up"></a>
                    <a href="#" title="Sort down" class="sort-down"></a>
                </span>
                Date
            </th>
            <th scope="col">
                <span class="column-sort">
                    <a href="#" title="Sort up" class="sort-up"></a>
                    <a href="#" title="Sort down" class="sort-down"></a>
                </span>
                Size
            </th>
            <th scope="col" class="table-actions">Actions</th>
        </tr>
    </thead>


    <?php
//Print the contents
    // echo $rsd;
    while ($row = mysql_fetch_array($rsd)) {

        $id = $row['ID'];
        $username = $row['username'];
        ?>

        <tr>
            <td style="padding: 10px"><input type="checkbox" id="table-selected-1" name="formID[]" value="<?php echo $id; ?>" /></td>
            <td><?php echo $id; ?></td>
            <td><?php echo $username; ?></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>



        </tr>
        <?php
    } //while
    ?>

</table>
