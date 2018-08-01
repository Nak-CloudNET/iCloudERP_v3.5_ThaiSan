<?php //$this->erp->print_arrays($discount['discount']) ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invoice&nbsp;<?= $invs->reference_no ?></title>
    <link href="<?php echo $assets ?>styles/theme.css" rel="stylesheet">
    <link href="<?php echo $assets ?>styles/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $assets ?>styles/custome.css" rel="stylesheet">
</head>
<style>
    body {
        font-size: 12px !important;
    }

    .container {
        width: 19.3cm;
    }

    @page {
        size: 8.5in 11in;
        margin: 2%;

        @top-left {
            content: "Hamlet";
        }
        @top-right {
            content: "Page " counter(page);
        }
    }


    @media print {
        .pageBreak {
            page-break-after: always;
        }
        .container {
            margin-left: -11px !important;

        }
        .customer_label {
            padding-left: 0 !important;
        }

        .invoice_label {
            padding-left: 0 !important;
        }

        .row table tr td {
            font-size: 14px !important;
        }
        .border {
            font-size: 17px !important;
        }
        .table thead > tr > th, .table tbody > tr > th, .table tfoot > tr > th {
            background-color: #444 !important;
            color: #FFF !important;
        }

        .row .col-xs-7 table tr td, .col-sm-5 table tr td{
            font-size: 14px !important;
        }
        #note{
            max-width: 95% !important;
            margin: 0 auto !important;
            border-radius: 5px 5px 5px 5px !important;
            margin-left: 26px !important;
        }
        div .fonts p{
             font-size: 12px !important;
         }
        .col-sm-5 {
            margin-left:-60px !important;
        }
    }

    div .fonts p{
        font-size: 12px;
    }
    .thead th {
        text-align: center !important;
    }

    .table thead > tr > th, .table tbody > tr > th, .table tfoot > tr > th, .table thead > tr > td, .table tbody > tr > td, .table tfoot > tr > td {
        border: 1px solid #000 !important;
    }

    .company_addr h3:first-child {
        font-family: Khmer OS Muol !important;
    //padding-left: 12% !important;
    }

    .company_addr h3:nth-child(2) {
        margin-top:-2px !important;
    //padding-left: 130px !important;
        font-size: 26px !important;
        font-weight: bold;
    }

    .company_addr h3:last-child {
        margin-top:-2px !important;
    //padding-left: 100px !important;
    }

    .company_addr p {
        font-size: 12px !important;
        margin-top:-10px !important;
        padding-left: 20px !important;
    }

    .inv h4:first-child {
        font-family: Khmer OS Muol !important;
        font-size: 12px !important;
    }

    .inv h4:last-child {
        margin-top:-5px !important;
        font-size: 12px !important;
    }

    button {
        border-radius: 0 !important;
    }
    .header{
        font-family:"Khmer OS Muol Light" !important;
        -moz-font-family: "Khmer OS System";
        font-size: 18px;
    }

</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $("#hide").click(function(){
            $(".myhide").toggle();
        });
    });
</script>

<body>
<div class="container" style="margin: 0 auto;">
    <div class="col-xs-12" style="padding: 0">
        <div class="row" style=" margin-top: 20px !important;">
            <div class="col-sm-3 col-xs-3 " style=" margin-top: 0px !important;">


                <?php if(!empty($biller->logo)) { ?>
                    <img class="img-responsive myhide" src="<?= base_url() ?>assets/uploads/logos/<?= $biller->logo; ?>"id="hidedlo" style="width: 140px; margin-top: -10px;" />
                <?php } ?>
            </div>
            <div  class="col-sm-7 col-xs-7 company_addr "  style="margin-top: -20px !important;margin-left:-20px !important;">
                <div class="myhide">
                    <center >
                        <?php if($biller->company) { ?>
                            <h3 class="header"><?= $biller->company ?></h3>
                        <?php } ?>

                        <div style="margin-top: 15px;">
                            <?php if(!empty($biller->vat_no)) { ?>
                                <p style="font-size: 12px !important;white-space: nowrap;">លេខអត្តសញ្ញាណកម្ម អតប (VAT No):&nbsp;<?= $biller->vat_no; ?></p>
                            <?php } ?>

                            <?php if(!empty($biller->address)) { ?>
                                <p style="margin-top:-10px !important;white-space: nowrap;font-size: 12px !important;">អាសយដ្ឋាន ៖ &nbsp;<?= $biller->address; ?></p>
                            <?php } ?>

                            <?php if(!empty($biller->phone)) { ?>
                                <p style="margin-top:-10px ;white-space: nowrap;font-size: 12px !important;">Tel:&nbsp;<?= $biller->phone; ?></p>
                            <?php } ?>

                            <?php if(!empty($biller->email)) { ?>
                                <p style="margin-top:-10px !important;white-space: nowrap;font-size: 12px !important;">E-mail :&nbsp;<?= $biller->email; ?></p>
                            <?php } ?>
                        </div>

                    </center>
                </div>

            </div>
            <div class="col-sm-2 col-xs-2 pull-right">
                <div class="row">
                    <button type="button" class="btn btn-xs btn-default no-print pull-right" style="margin-right:15px;" onclick="window.print();">
                        <i class="fa fa-print"></i> <?= lang('print'); ?>
                    </button>
                </div>
                <div class="row">
                    <button type="button" class="btn btn-xs btn-default no-print pull-right " id="hide" style="margin-right:15px;" onclick="">
                        <i class="fa"></i> <?= lang('Hide/Show_header'); ?>
                    </button>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="invoice" style="margin-top: -10px !important">
                <center>
                    <h4 style="font-size: 16px !important;font-family: 'Khmer OS Muol Light' !important;">តារាងតម្លៃ</h4>
                    <h4 style="font-size: 14px !important;margin-top: 3px;">QUOTATION</h4>

                </center>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-7 col-xs-7">
                <table>
                    <?php if(!empty($customer->company)) { ?>

                        <tr>
                            <td style="width: 45%;white-space: nowrap !important;  font-weight: bold">ក្រុមហ៊ុន / Company</td>
                            <td style="width: 5%;font-weight: bold">:</td>
                            <td style="width: 40%;white-space: nowrap !important; "><?= $customer->company ?></td>
                        </tr>
                    <?php } ?>

                    <?php if(!empty($customer->name_kh || $customer->name)) { ?>
                        <tr>
                            <td style="width: 45%;white-space: nowrap !important; font-weight: bold">អតិថិជន / Customer</td>
                            <td style="width: 5%;font-weight: bold">:</td>
                            <?php if(!empty($customer->name_kh)) { ?>
                                <td style="width: 40%;"><?= $customer->name_kh ?></td>
                            <?php }else { ?>
                                <td style="width: 40%;"><?= $customer->name ?></td>
                            <?php } ?>
                        </tr>
                    <?php } ?>
                    <?php if(!empty($customer->address_kh || $customer->address)) { ?>
                        <tr>
                            <td style="width: 45%;white-space: nowrap !important; font-weight: bold">អាសយដ្ឋាន / Address</td>
                            <td style="width: 5%;font-weight: bold">:</td>
                            <?php if(!empty($customer->address_kh)) { ?>
                                <td style="width: 40%;"><?= $customer->address_kh?></td>
                            <?php }else { ?>
                                <td style="width: 40%;"><?= $customer->address ?></td>
                            <?php } ?>
                        </tr>
                    <?php } ?>
                    <?php if(!empty($customer->address_kh || $customer->address)) { ?>
                        <tr>
                            <td style="width: 45%;font-weight: bold">ទូរស័ព្ទលេខ / (Tel)</td>
                            <td style="width: 5%;font-weight: bold">:</td>
                            <td style="width: 40%;"><?= $customer->phone ?></td>
                        </tr>
                    <?php } ?>

                </table>
            </div>
            <div class="col-sm-5 col-xs-5">
                <table>
                    <tr>
                        <td style="width: 45%; font-weight: bold;white-space: nowrap !important;">លេខវិក្កយបត្រ / Reference</td>
                        <td style="width: 5%; font-weight: bold">:</td>
                        <td style="width:50%;white-space: nowrap !important; "><?= $invs->reference_no ?></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold">កាលបរិច្ឆេទ / Date</td>
                        <td style="font-weight: bold">:</td>
                        <td style="white-space: nowrap !important;"><?= $this->erp->hrld($invs->date); ?></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold">អ្នកលក់ / Salesman</td>
                        <td style="font-weight: bold">:</td>
                        <td><?= $invs->username; ?></td>
                    </tr>
                    <?php if ($invs->payment_term) { ?>
                        <tr>
                            <td style="font-weight: bold">រយៈពេលបង់ប្រាក់ </td>
                            <td style="font-weight: bold">:</td>
                            <td><?= $invs->payment_term ?></td>
                        </tr>
                        <tr>
                            <td style="width: 30% !important; font-weight: bold">កាលបរិច្ឆេទនៃការបង់ប្រាក់ </td>
                            <td>:</td>
                            <td><?= $this->erp->hrsd($invs->due_date) ?></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>

        <?php
        $cols = 6;
        if ($discount != 0) {
            $cols = 7;
        }
        ?>
        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <table class="table table-bordered" style=" white-space: nowrap;width: 100%; margin-top: 10px;">
                    <tbody style="font-size: 14px;">
                    <tr class="thead" style="background-color: #444 !important; color: #FFF !important;">
                        <th style="width: 50px">ល.រ<br />No</th>
                        <th style="width: 50px">កូដ<br />Code</th>
                        <th>បរិយាយ<br />Description</th>
                        <th>ខ្នាត<br />Unit</th>
                        <th>ចំនួន<br />Qty</th>
                        <th style="width: 50px">តម្លៃ<br />Unit Price</th>

                        <?php if ($Settings->product_discount) { ?>
                            <th>បញ្ចុះតម្លៃ<br />Discount</th>
                        <?php } ?>
                        <?php if ($Settings->tax1) { ?>
                            <th>ពន្ធទំនិញ<br />Tax</th>
                        <?php } ?>
                        <th>តម្លៃសរុប<br />Subtotal</th>
                    </tr>
                    <?php

                    $no = 1;
                    $erow = 1;
                    $totalRow = 0;
                    foreach ($rows as $row) {
                       // $this->erp->print_arrays($rows);
                        $free = lang('free');
                        $product_unit = '';
                        $total = 0;

                        if($row->product_variant){
                            $product_unit = $row->product_variant;

                        }else{
                            $product_unit = $row->uname;
                        }
                        $product_name_setting;
                        if($setting->show_code == 0) {
                            $product_name_setting = $row->product_name . ($row->variant ? ' (' . $row->variant . ')' : '');
                        }else {
                            if($setting->separate_code == 0) {
                                $product_name_setting = $row->product_name . " (" . $row->product_code . ")" . ($row->variant ? ' (' . $row->variant . ')' : '');
                            }else {
                                $product_name_setting = $row->product_name . ($row->variant ? ' (' . $row->variant . ')' : '');
                            }
                        }
                        $balance=$invs->grand_total - (($invs->paid-$invs->deposit) + $invs->deposit);

                        ?>
                        <tr class="border">
                            <td style="vertical-align: middle; text-align: center"><?php echo $no ?></td>
                            <td style="vertical-align: middle;">
                                <?=$row->product_code;?>
                            </td>
                            <td style="vertical-align: middle;white-space: nowrap">
                                <?=$row->product_name;?>
                            </td>

                            <td style="vertical-align: middle; text-align: center">
                                <?= $product_unit ?>
                            </td>
                            <td style="vertical-align: middle; text-align: center">
                                <?=$this->erp->formatQuantity($row->quantity);?>
                            </td>
                            <td style="vertical-align: middle; text-align: right">
                                <?php
                                if($row->unit_price==0){echo "Free";}
                                else{
                                    echo $this->erp->formatMoney($row->unit_price);
                                }
                                ?>
                            </td>
                            <?php if ($row->item_discount) {?>
                                <td style="vertical-align: middle; text-align: center">
                                    <?=$this->erp->formatMoney($row->item_discount);?></td>
                            <?php } ?>
                            <?php if ($row->item_tax) {?>
                                <td style="vertical-align: middle; text-align: center">
                                    <?=$this->erp->formatMoney($row->item_tax);?></td>
                            <?php } ?>
                            <td style="vertical-align: middle; text-align: right">
                                <?php
                                if($row->subtotal==0){echo "Free";}
                                else{
                                    echo $this->erp->formatMoney($row->subtotal);
                                }
                                ?>
                            </td>
                        </tr>
                        <?php
                        $no++;
                        $erow++;
                        $totalRow++;
                        if ($totalRow % 25 == 0) {
                            echo '<tr class="pageBreak"></tr>';
                        }

                    }
                    ?>
                    <?php
                    if($erow<9){
                        $k=9 - $erow;
                        for($j=1;$j<=$k;$j++) {
                            if($discount != 0) {
                                echo  '<tr>
													<td height="34px" style="text-align: center; vertical-align: middle">'.$no.'</td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
												</tr>';
                            }else {
                                echo  '<tr>
													<td height="34px" style="text-align: center; vertical-align: middle">'.$no.'</td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
												</tr>';
                            }
                            $no++;
                        }
                    }
                    ?>
                    <?php

                    $row = 1;
                    $col =3;
                    $col2 = 5;
                    if($invs->total_discount){$col=3;$col2=4;}
                    if($invs->product_tax){$col=3;$col2=4;}
                    if($invs->total_discount>0 && $invs->product_tax>0 ){$col=4;$col2=4;}
                    if($invs->total_discount==0 && $invs->product_tax==0 ){$col=3;$col2=3;}
                    if ($discount != 0) {
                        $col =3;
                    }
                    if ($invs->grand_total != $invs->total) {
                        $row++;
                    }

                    if ($invs->order_discount != 0) {
                        $row++;
                        $col =3;
                    }
                    if ($invs->shipping != 0) {
                        $row++;
                        $col =3;
                    }
                    if ($invs->order_tax != 0) {
                        $row++;
                        $col =3;
                    }
                    if($invs->paid != 0 && $invs->deposit != 0) {
                        $row += 3;
                    }elseif ($invs->paid != 0 && $invs->deposit == 0) {
                        $row += 2;
                    }elseif ($invs->paid == 0 && $invs->deposit != 0) {
                    }

                    ?>

                    <?php //$this->erp->print_arrays($invs);
                    if ($invs->grand_total != $invs->total) { ?>
                        <tr>
                            <td rowspan = "<?= $row; ?>" colspan="<?= $col2; ?>" style="border-left: 1px solid #FFF !important; border-bottom: 1px solid #FFF !important;">
                                <?php if (!empty($billerr->invoice_footer)) { ?>
                                    <p style="font-size:14px !important;"><strong><u>Note:</u></strong></p>
                                    <p style="margin-top:-5px !important; line-height: 2"><?= $billerr->invoice_footer ?></p>
                                <?php } ?>
                            </td>
                            <td colspan="<?= $col; ?>" style="text-align: right; font-weight: bold;">សរុប​ / <?= strtoupper(lang('total')) ?>
                                (<?= $default_currency->code; ?>)
                            </td>
                            <td align="right"><?=$this->erp->formatMoney($invs->total); ?></td>
                        </tr>
                    <?php } ?>

                    <?php if ($invs->order_discount != 0) : ?>
                        <tr>
                            <td colspan="<?= $col; ?>" style="text-align: right; font-weight: bold;">បញ្ចុះតម្លៃ / <?= strtoupper(lang('order_discount')) ?></td>
                            <td align="right">$<?php echo $this->erp->formatQuantity($invs->order_discount).' $'; ?></td>
                        </tr>
                    <?php endif; ?>

                    <?php if ($invs->shipping != 0) : ?>

                    <?php endif; ?>

                    <?php if ($invs->order_tax != 0) : ?>

                    <?php endif; ?>

                    <tr>
                        <?php if ($invs->grand_total == $invs->total) { ?>

                            <td rowspan="<?= $row; ?>" colspan="<?= $col2; ?>" style="border-left: 1px solid #FFF !important; border-bottom: 1px solid #FFF !important;">
                                <?php  if (!empty($billerr->invoice_footer)) { ?>
                                    <p><strong><u>Note:</u></strong></p>
                                    <p><?= $billerr->invoice_footer ?></p>
                                <?php } ?>
                            </td>
                        <?php } ?>
                        <td colspan="<?= $col; ?>" style="text-align: right; font-weight: bold;">សរុបរួម / <?= strtoupper(lang('total_amount')) ?>
                            (<?= $default_currency->code; ?>)
                        </td>
                        <td align="right"><?= $this->erp->formatMoney($invs->grand_total); ?></td>
                    </tr>

                    </tbody>

                </table>

            </div>
        </div>
        <?php if($invs->invoice_footer){ ?>
            <div style="font-size: 12px !important;margin-top: 10px;height: auto;" id="note" class="col-md-12 col-xs-12">
                <p ><strong><u>Note:</u></strong></p>
                <p style="margin-left: 10px;margin-top:10px;"><?php echo $invs->invoice_footer; ?></p>
            </div>
        <?php } ?>

    </div>	<!--div col sm 6 -->

    <div id="footer" class="row">
        <div class="col-sm-4 col-xs-4" style="padding-top: 60px;">

            <center>
                <hr style="margin:0; border:1px solid #000; width: 80%">
                <p style="font-size: 16px; margin-top: 4px !important">ហត្ថលេខាអ្នកលក់</p>
                <p style="margin-top:-10px; font-size: 14px">Seller's Signature</p>
            </center>
        </div>
        <div class="col-sm-4 col-xs-4">
            <center>

            </center>
        </div>
        <div class="col-sm-4 col-xs-4" style="padding-top: 60px;">

            <center>
                <hr style="margin:0; border:1px solid #000; width: 80%">
                <p style="font-size: 16px; margin-top: 4px !important">ហត្ថលេខាអ្នកទិញ</p>
                <p style="margin-top:-10px; font-size: 14px">Customer's Signature</p>
            </center>
        </div>
    </div>
    <div style="width: 821px;margin: 20px">
        <a class="btn btn-warning no-print" href="<?= site_url('quotes'); ?>" style="border-radius: 0">
            <i class="fa fa-hand-o-left" aria-hidden="true"></i>&nbsp;<?= lang("back"); ?>
        </a>
    </div>
</div>
</body>
<script type="text/javascript">
    if(!<?=$invs->total_discount?$invs->total_discount:0; ?>){
        $('td:nth-child(7),th:nth-child(7)').hide();
    }
    if(!<?=$invs->product_tax?$invs->product_tax:0; ?>){
        $('td:nth-child(8),th:nth-child(8)').hide();
    }
</script>
</html>