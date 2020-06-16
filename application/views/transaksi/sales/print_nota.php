<html moznomarginboxes mozdisallowselectionprint>

<head>
    <title>myPOS - Print Nota</title>
    <style type="text/css">
        html {
            font-family: "Verdana, Arial"
        }

        .content {
            width: 80mm;
            font-size: 12px;
            padding: 5px
        }

        .title {
            text-align: center;
            font-size: 13px;
            padding-bottom: 5px;
            border-buttom: 1px dashed;
        }

        .head {
            margin-top: 5px;
            margin-bottom: 10px;
            padding-bottom: 10px;
            border-buttom: 1px solid;
        }

        table {
            width: 100%;
            font-size: 12px;
        }

        .thanks {
            margin-top: 10px;
            padding-top: 10px;
            text-align: center;
            border-top: 1px dashed;
        }

        @media print {
            @page {
                width: 80mm;
                margin: 0mm;
            }
        }
    </style>
</head>

<body onload="window.print()">
    <div class="content">
        <div class="title">
            <b>myPos</b>
        </div>
        <div class="head">
            <table cellspacing="0" cellpadding="0">
                <tr>
                    <td style="width: 200px">
                        <?php
                        echo Date("d/m/Y", strtotime($sales->tanggal)) . " " . Date("H:i", strtotime($sales->sales_created));
                        ?>
                    </td>
                    <td>Kasir</td>
                    <td style="text-align: center; width:10px">:</td>
                    <td style="text-align: right">
                        <?= ucfirst($sales->user_nama) ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?= $sales->invoice ?>
                    </td>
                    <td>Customer</td>
                    <td style="text-align: center;">:</td>
                    <td style="text-align: right">
                        <?= $sales->customer_id == null ? "Umum" : $sales->customer_nama ?>
                    </td>
                </tr>
            </table>
        </div>
        <div class="transaction">
            <table class="transaction-table" cellspacing="0" cellpadding="0">
                <?php
                $arr_diskon = array();
                foreach ($sales_detail as $sd => $value) { ?>
                    <tr>
                        <td style="width: 165px"><?= $value->nama ?></td>
                        <td><?= $value->qty ?></td>
                        <td style="text-align: right; width: 60px"><?= formatRupiah($value->harga) ?></td>
                        <td style="text-align: right; width: 60px">
                            <?= formatRupiah(($value->harga - $value->diskon_item) * $value->qty) ?>
                        </td>
                    </tr>
                    <?php
                    if ($value->diskon_item > 0) {
                        $arr_diskon[] = $value->diskon_item;
                    }
                }

                foreach ($arr_diskon as $ad => $value) { ?>
                    <tr>
                        <td></td>
                        <td colspan="2" style="text-align: right">Diskon <?= ($ad + 1) ?></td>
                        <td style="text-align: right"><?= formatRupiah($value) ?></td>
                    </tr>
                <?php
                } ?>

                <tr>
                    <td colspan="4" style="border-buttom:1px dashed; padding-top:5px"></td>
                </tr>
                <tr>
                    <td colspan="2"></td>
                    <td style="text-align: right; padding-top:5px">Sub Total</td>
                    <td style="text-align: right; padding-top:5px">
                        <?= formatRupiah($sales->total_harga) ?>
                    </td>
                </tr>
                <?php if ($sales->diskon > 0) { ?>
                    <td colspan="2"></td>
                    <td style="text-align: right; padding-top:5px">Diskon Penjualan</td>
                    <td style="text-align: right; padding-top:5px"><?= formatRupiah($sales->diskon) ?></td>
                <?php } ?>
                <tr>
                    <td colspan="2"></td>
                    <td style="border-top:1px dashed; text-align: right; padding-top:5px 0">Grand Total</td>
                    <td style="border-top:1px dashed; text-align: right; padding-top:5px 0">
                        <?= $sales->grand_total ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"></td>
                    <td style="border-top:1px dashed; text-align: right; padding-top:5px 0">Bayar</td>
                    <td style="border-top:1px dashed; text-align: right; padding-top:5px 0">
                        <?= $sales->bayar ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"></td>
                    <td style="text-align: right">Kembalian</td>
                    <td style="text-align: right"><?= $sales->kembalian ?>
                    </td>
                </tr>
            </table>
        </div>
        <div class="thanks">
            --- Terimakasih ---
            <br>
        </div>
    </div>
</body>

</html>