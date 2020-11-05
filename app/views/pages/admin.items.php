<div class="wrapper pull-left m listing">

    <div class="page-title auto">
        <a href="<?= SITE ?>/admin/add_item" class="pull-right btn">Add Item</a>
        <div class="pull-left">
            <h1>Items</h1>
            <p><?= $total ?> Items terdaftar</p>
        </div>
    </div>

    <?php
    if ($total != 0) {
    ?>

        <form action="<?= SITE ?>/admin/bulk_delete_item" method="post">
            <table class="list m" border="0" cellspacing="1">
                <thead class="blue">
                    <th width="30"></th>
                    <th>No</th>
                    <th>Item Name</th>
                    <th>Picture</th>
                    <th>Action</th>
                </thead>
                <?php
                $no = $offset + 1;
                foreach ($data as $d) {
                ?>
                    <tr>
                        <td><input type="checkbox" name="box[<?= $d['id_item'] ?>]" value="<?= $d['id_item'] ?>" /></td>
                        <td><?= $no ?></td>
                        <td><?= ucwords($d['nama_item']) ?></td>
                        <td> <img src="<?= SITE ?>/public/images/items/<?= ucwords($d['foto']) ?>" width="50px" height="50px"> </td>
                        <td>
                            <a href="<?= SITE ?>/admin/edit_item/<?= $d['id_item'] ?>">Edit</a> /
                            <a href="<?= SITE ?>/admin/delete_item/<?= $d['id_item'] ?>">Delete</a>
                        </td>
                    </tr>
                <?php
                    $no++;
                }
                ?>
            </table>

            <button type="submit" name="submit" class="btn pull-left">Delete Selected</button>

        </form>
    <?php

        echo $pagination;
    } else {
    ?>

        <a href="<?= SITE ?>/admin" class="btn pull-left">Back to Home</a>

    <?php
    }
    ?>


</div>