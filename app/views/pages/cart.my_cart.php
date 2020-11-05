<div class="listing">
    <div class="page-title auto">
        <div class="pull-left">
            <h1>My Cart</h1>
            <p><?= $total ?> Dalam keranjang</p>
        </div>
    </div>
</div>

<?php
if ($total != 0) {
?>

<form action="<?= SITE ?>/cart/action" method="post">
    <table class="list m" border="0" cellspacing="1">
        <thead class="blue">
            <th>No</th>
            <th>Item Name</th>
            <th>Harga</th>
            <th>Qty</th>
            <th>Total</th>
            <th>Action</th>
        </thead>
        <?php
            $no = 1;
            $subtotal = '';
            foreach ($data as $d) {
                $diskon = $d['harga'] * $d['diskon'] / 100;
                $harga = $d['harga'] - $diskon;
                $qty = $_SESSION[SESS]['member']['cart'][$d['id_item']]['qty'];
                $total = $harga * $qty;
                $subtotal = $total;
            ?>
        <tr>
            <td><?= $no ?></td>
            <td><?= ucwords($d['nama_item']) ?></td>
            <td>Rp.<?= number_format($harga, "0", ".", ".") ?></td>
            <td><input type="number" name="qty[<?= $d['id_item'] ?>]" class="form-control" style="width:30px;"
                    value="<?= $qty ?>" max="<?= $d['qty'] ?>" /></td>
            <td>Rp.<?= number_format($total, "0", ".", ".") ?></td>
            <td>
                <a href="<?= SITE ?>/cart/delete/<?= $d['id_item'] ?>" class="btn">Delete</a>
            </td>
        </tr>
        <?php
                $no++;
            }
            ?>
        <tr style="background:#fff">
            <td colspan="4" style="text-align:right; padding-right:20px;"><b>Total Bayar</b></td>
            <td>Rp.<?= number_format($subtotal, "0", ".", ".") ?></td>
            <td><a href="<?= SITE ?>/cart/empty_cart" style="color:#fff" class="btn pull-left">Empty Cart</a></td>
        </tr>
    </table>
    <div style="padding-top:20px; margin-top:20px; border-top:1px solid #ccc;">
        <input type="hidden" name="total_bayar" value="<?= $subtotal ?>" />
        <button type="submit" name="submit" value="checkout" class="btn btn-large pull-right"
            style="margin-left:10px;">Checkout</button>
        <button type="submit" name="submit" value="update" class="btn btn-large pull-right">Update</button>
    </div>

</form>
<?php
} else {
?>
<a href="<?= SITE ?>" class="btn btn-large pull-left" style="margin-bottom:55px;">Back to Home</a>
<?php
}
?>