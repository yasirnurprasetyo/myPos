<section class="content-header">
    <h1>Item</h1>
    <ol class="breadcrumb">
        <li><a href="<?= site_url("dashboard") ?>"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Item</li>
    </ol>
</section>
<section class="content">
    <?php $this->view('message') ?>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Barcode Generator</h3>
            <div class="pull-right"><a href="<?= site_url('item') ?>" class="btn btn-info btn-flat">
                    <i class="fa fa-reply"></i> Back
                </a>
            </div>
        </div>
        <div class="box-body">
            <?php
            $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
            echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($row->barcode, $generator::TYPE_CODE_128)) . '">';
            ?>
            <br><br>
            <a href="<?= site_url('item/barcodePrint/' . $row->item_id) ?>" target="_blank" class="btn btn-success">
                <i class="fa fa-print"></i> Print
            </a>
        </div>
    </div>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">QR Code Generator</h3>
        </div>
        <div class="box-body">
            <?php
            $qrCode = new Endroid\QrCode\QrCode($row->barcode);
            $qrCode->writeFile('uploads/qr-code/item-' . $row->item_id . '.png');
            ?>
            <img src="<?= base_url('uploads/qr-code/item-' . $row->item_id . '.png') ?>" style="width:200px">
            <br><br>
            <a href="<?= site_url('item/qrCodePrint/' . $row->item_id) ?>" target="_blank" class="btn btn-success">
                <i class="fa fa-print"></i> Print
            </a>
        </div>
    </div>
</section>