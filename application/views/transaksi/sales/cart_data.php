<?php $no = 1;
if ($cart->num_rows() > 0) {
    foreach ($cart->result() as $c => $data) { ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $data->barcode ?></td>
            <td><?= $data->item_nama ?></td>
            <td class="text-right"><?= $data->cart_harga ?></td>
            <td class="text-center"><?= $data->qty ?></td>
            <td class="text-right"><?= $data->diskon_item ?></td>
            <td class="text-right" id="total"><?= $data->total ?></td>
            <td class="text_center" width="160px">
                <button id="update_cart" data-toggle="modal" data-target="#modal-item-edit" data-cartid="<?= $data->cart_id ?>" data-barcode="<?= $data->barcode ?>" data-produk="<?= $data->item_nama ?>" data-harga="<?= $data->harga ?>" data-qty="<?= $data->qty ?>" data-diskon="<?= $data->diskon_item ?>" data-total="<?= $data->total ?>" class="btn btn-xs btn-primary">
                    <i class="fa fa-pencil"></i> Update
                </button>
                <button id="del_cart" data-cartid="<?= $data->cart_id ?>" class="btn btn-xs btn-danger">
                    <i class="fa fa-trash"></i> Delete
                </button>
            </td>
        </tr>
    <?php
    }
} else {
    echo '<tr>
            <td colspan="8" class="text-center">Tidak ada data item</td>
    </tr>';
}
?>