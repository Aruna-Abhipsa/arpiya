<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Purchase Order</title>
</head>

<body>
<table style="width:100%; margin:0px auto; border-collapse: collapse; background-color:#fff;">
  <tbody>
    <tr>
      <td colspan="2"  style="font-weight:bold; font-size:22px; text-align:center;">Purchase Order</td>
    </tr>
  </tbody>
</table>
<table style="width:100%;  margin:20px auto; border-collapse: collapse; background-color:#fff;">
  <tbody>
    <tr>
      <td style=" width:50%; padding:3px 5px; font-size:12px; line-height:20px;"><span style="padding-bottom:20px;">ARPIYA AIRCON</span><br />
        LAXMI CLASSIC, C-1,<br />
        VISHRANTWADI AIRPORT ROAD<br />
        OPPOSITE ETHIYA HOSPITAL, YERWADA, PUNE<br/>
        GSTIN/UIN- 19ALYPS1558E1ZE <br />
        State Name : MAHARASTRA, Code : 411006 <br />
        E-Mail : info@arpiyaaircon.net </td>
      <td style="width:50%;  padding:3px 5px; font-size:12px; float:left; text-align:right; vertical-align: top;"> PO No. <?php echo $po->code; ?><br />
        Dated : <?php echo date("d.m.Y", strtotime($po->created_on)); ?></td>
    </tr>
  </tbody>
</table>
<table style="width:100%;  font-size:12px; margin:20px auto; border-collapse: collapse; float: left;">
  <thead>
    <tr>
      <th colspan="2" style="padding:10px 3px; font-size:14px;">Supplier Details</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td width="25%" style="padding:3px 5px; font-weight:bold;">Heading :</td>
      <td width="75%" style="padding:3px 5px; "><?php echo $po->heading; ?></td>
    </tr>
    <tr>
      <td width="25%" style="padding:3px 5px; font-weight:bold;">Supplier Code :</td>
      <td width="75%" style="padding:3px 5px;"><?php echo $po->supplier_code; ?></td>
    </tr>
    <tr>
      <td width="25%" style="padding:3px 5px; font-weight:bold;">Supplier Name :</td>
      <td width="75%" style="padding:3px 5px;"><?php echo $po->supplier_name; ?></td>
    </tr>
    <tr>
      <td width="25%" style="padding:3px 5px; font-weight:bold;">Contact Person :</td>
      <td width="75%" style="padding:3px 5px; "><?php echo $po->person1; ?></td>
    </tr>
    <tr>
      <td width="25%" style="padding:3px 5px; font-weight:bold;">Contact Number :</td>
      <td width="75%" style="padding:3px 5px;"><?php echo $po->mobile; ?></td>
    </tr>
    <tr>
      <td width="25%" style="padding:3px 5px; font-weight:bold;">Email :</td>
      <td width="75%" style="padding:3px 5px;"><?php echo $po->supplier_email; ?></td>
    </tr>
    <tr>
      <td width="25%" style="padding:3px 5px; font-weight:bold;">Payment Terms :</td>
      <td width="75%" style="padding:3px 5px;"><?php echo $po->pt == 'Others' ? $po->pto: $po->pt; ?></td>
    </tr>
  </tbody>
</table>
<table style="width:100%;  font-size:12px; margin:20px auto; border-collapse: collapse;">
  <thead>
    <tr>
      <th width="3%" style="padding:3px 5px; border:1px solid #ccc;">SL No.</th>
      <th width="27%" style="padding:3px 5px; border:1px solid #ccc;">Item Code</th>
      <th width="10%" style="padding:3px 5px; border:1px solid #ccc;">Item Name</th>
      <th width="10%" style="padding:3px 5px; border:1px solid #ccc;">Storage</th>
      <th width="10%" style="padding:3px 5px; border:1px solid #ccc;">UoM</th>
      <th width="5%" style="padding:3px 5px; border:1px solid #ccc;">Currency</th>
      <th width="5%" style="padding:3px 5px; border:1px solid #ccc;">Quantity</th>
      <th width="10%" style="padding:3px 5px; border:1px solid #ccc;">PPU</th>
      <th width="10%" style="padding:3px 5px; border:1px solid #ccc;">HSN</th>
      <th width="10%" style="padding:3px 5px; border:1px solid #ccc; text-align:center;">Amount (<?php echo $po->currency; ?>)</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th width="3%" style="padding:3px 5px; border:1px solid #ccc;">1</th>
      <td width="20%" style="padding:3px 5px; border:1px solid #ccc;"><?php echo $po->item_code; ?></td>
      <td width="17%" style="padding:3px 5px; border:1px solid #ccc;"><?php echo $po->item_name; ?></td>
      <td width="10%" style="padding:3px 5px; border:1px solid #ccc;"><?php echo $po->storage; ?></td>
      <td width="10%" style="padding:3px 5px; border:1px solid #ccc;"><?php echo $po->uom_code." - ".$po->uom_name; ?></td>
      <td width="5%" style="padding:3px 5px; border:1px solid #ccc;"><?php echo $po->currency; ?></td>
      <td width="5%" style="padding:3px 5px; border:1px solid #ccc;"><?php echo $po->quantity; ?></td>
      <td width="10%" style="padding:3px 5px; border:1px solid #ccc;"><?php echo $po->ppu; ?></td>
      <td width="10%" style="padding:3px 5px; border:1px solid #ccc;"><?php echo $po->hsn; ?></td>
      <td width="10%" style="padding:3px 5px; border:1px solid #ccc; text-align:center;"><?php echo $po->amount; ?></td>
    </tr>
    <tr>
      <td colspan="9" style="padding:3px 5px; border:1px solid #ccc; ">Total PO Base Amount W/O additional Charge</td>
      <td style="padding:3px 5px; border:1px solid #ccc; text-align:center;"><?php echo $po->base_amount; ?></td>
    </tr>
    <?php if($po->tax_type == 1){ ?>
    <tr>
      <td colspan="9" style="padding:3px 5px; border:1px solid #ccc; ">CGST Amount ( <?php echo ($po->tax_percentage/2)." %"; ?> )</td>
      <td style="padding:3px 5px; border:1px solid #ccc; text-align:center;"><?php echo ($po->tax_amount/2); ?></td>
    </tr>
    <tr>
      <td colspan="9" style="padding:3px 5px; border:1px solid #ccc; ">SGST Amount ( <?php echo ($po->tax_percentage/2)." %"; ?> )</td>
      <td style="padding:3px 5px; border:1px solid #ccc; text-align:center;"><?php echo ($po->tax_amount/2); ?></td>
    </tr>
    <?php } else { ?>
    <tr>
      <td colspan="9" style="padding:3px 5px; border:1px solid #ccc; ">IGST Amount</td>
      <td style="padding:3px 5px; border:1px solid #ccc; text-align:center;"><?php echo ($po->tax_amount/2); ?></td>
    </tr>
    <?php } ?>
    <tr>
      <td colspan="9" style="padding:3px 5px; border:1px solid #ccc; ">Discount %</td>
      <td style="padding:3px 5px; border:1px solid #ccc; text-align:center;"><?php echo $po->discount."%"; ?></td>
    </tr>
    <tr>
      <td colspan="9" style="padding:3px 5px; border:1px solid #ccc; ">Insurance Charge</td>
      <td style="padding:3px 5px; border:1px solid #ccc; text-align:center;"><?php echo $po->insurance; ?></td>
    </tr>
    <tr>
      <td colspan="9" style="padding:3px 5px; border:1px solid #ccc; ">Freight Charge</td>
      <td style="padding:3px 5px; border:1px solid #ccc; text-align:center;"><?php echo $po->freight; ?></td>
    </tr>
    <tr>
      <td colspan="9" style="padding:3px 5px; border:1px solid #ccc; ">Custom Charge</td>
      <td style="padding:3px 5px; border:1px solid #ccc; text-align:center;"><?php echo $po->custom; ?></td>
    </tr>
    <tr>
      <td colspan="9" style="padding:3px 5px; border:1px solid #ccc; ">Packaging Charge</td>
      <td style="padding:3px 5px; border:1px solid #ccc; text-align:center;"><?php echo $po->packaging; ?></td>
    </tr>
    <tr>
      <td colspan="9" style="padding:3px 5px; border:1px solid #ccc; ">Extra Charge</td>
      <td style="padding:3px 5px; border:1px solid #ccc; text-align:center;"><?php echo $po->extra; ?></td>
    </tr>
    <tr>
      <td colspan="9" style="padding:3px 5px; border:1px solid #ccc; ">Total PO Amount</td>
      <td style="padding:3px 5px; border:1px solid #ccc; text-align:center;"><?php echo $po->total_po_amount; ?></td>
    </tr>
  </tbody>
</table>
<table style="width:100%; margin:20px auto; border-collapse: collapse; background-color:#fff;">
  <tbody>
    <tr>
      <td  style="font-size:12px; padding-top:10px;"><span style=" font-weight:bold;">Company's PAN:</span> ALYPS1558E</td>
    </tr>
  </tbody>
</table>
<table style="width:100%; margin:10px auto; border-collapse: collapse; background-color:#fff;">
  <tbody>
    <tr>
      <td width="60%">&nbsp;</td>
      <td  style="font-size:12px; padding-top:20px; font-weight:bold; vertical-align:top;">For Arpiya Aircon</td>
    </tr>
  </tbody>
</table>
<table style="width:100%; margin:0px auto; font-size:12; border-collapse: collapse; float:right;">
  <tbody>
    <tr>
      <td width="60%" style="vertical-align:bottom; font-weight:bold; font-size:12px;">Customer's Seal & Signature</td>
      <td width="40%" style="font-size:12px; line-height:20px; float:right;"> Prepared By: <br />
        Verified By: <br />
        Auth. Sign. </td>
    </tr>
  </tbody>
</table>
</body>
</html>
