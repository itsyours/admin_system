<?php
include('config.php');

$per_page = 3;

if ($_GET) {
    $page = $_GET['page'];
}



//get table contents
$start = ($page - 1) * $per_page;
$sql = "select * from users order by id limit $start,$per_page";
$rsd = mysql_query($sql);
?>

<article class="container_12">
    <section class="grid_12">
        <div class="block-border">
            <form class="block-content form" id="table_form" method="post" action="">
                        <h1>Table</h1>
            <table width="800px">
                <script type="text/javascript">
                    $(function() {
                        $(":checkbox").change(function() {
                            $(this).closest("tr").toggleClass("diffColor", this.checked)
                        })
                    })


                </script><?php
//Print the contents

                while ($row = mysql_fetch_array($rsd)) {

                    $id = $row['ID'];
                    $username = $row['username'];
                    ?>
                    <tr>
                        <th scope="row" class="table-check-cell"><input type="checkbox" id="table-selected-1" /></th>
                        <td style="color:#B2b2b2; padding-left:4px" width="30px"><?php echo $id; ?></td><td><?php echo $username; ?></td></tr>
                            <?php
                        } //while
                        ?>
            </table>
        </form></div>
    </section>
</article>