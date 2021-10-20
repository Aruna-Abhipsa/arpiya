//var baseUrl   = window.location.origin+'/arpiya/';
var baseUrl   = window.location.origin+'/spaatech-demo-arpiya/';
var error = false;
var regPrice = /^(?:\d+|\d{1,3}(?:,\d{3})+)(?:\.\d+)?$/;
var regPhone = /^\d*(?:\.\d{1,2})?$/;
var regGst = /\d{2}[A-Z]{5}\d{4}[A-Z]{1}[A-Z\d]{1}[Z]{1}[A-Z\d]{1}/;
var regPan = /[A-Z]{5}[0-9]{4}[A-Z]{1}$/;
var regPin = /^\d*(?:\.\d{1,2})?$/;
var regEmail = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
var regIfsc = /^[A-Za-z]{4}[a-zA-Z0-9]{7}$/;
var regAccount = /^\d{9,18}$/;
$( "#manufacturer_id" ).change(function() { 
  if($( "#manufacturer_id" ).val() == ' ')  $( "#new_make_div" ).show();
  else $( "#new_make_div" ).hide();
});
$( "#material_id" ).change(function() { 
  if($( "#material_id" ).val() == ' ')  $( "#new_material_div" ).show();
  else $( "#new_material_div" ).hide();
});
$( "#customer_id" ).change(function() { 
    var customer_id = $("#customer_id").val(); 
    $.ajax({
        url: baseUrl+"admin/getCustomerDetailsAjax",
        type: 'post',
        dataType: 'html',
        data: {customer_id: customer_id},
        success: function( data ) { 
            var data = JSON.parse(data);
            //console.log(data.address);
            $('#cust_address').val(data.address);
            $('#cust_contact').val(data.phone);
        }
    });
});
$( "#vendor_id" ).change(function() { 
  var vendor_id = $("#vendor_id").val(); 
  $.ajax({
      url: baseUrl+"admin/getVendorDetailsAjax",
      type: 'post',
      dataType: 'html',
      data: {vendor_id: vendor_id},
      success: function( data ) { 
          var data = JSON.parse(data);
          //console.log(data.address);
          $('#name').val(data.name);
          $('#contact_person').val(data.person1);
          $('#number').val(data.mobile);
          $('#email').val(data.email);
          if(data.payment_terms == "Others") $('#payment_terms').val(data.payment_terms_other);
          else $('#payment_terms').val(data.payment_terms);
      }
  });
});
$( "#item_id" ).change(function() { 
  var item_id = $("#item_id").val(); 
  $.ajax({
      url: baseUrl+"admin/getItemDetailsAjax",
      type: 'post',
      dataType: 'html',
      data: {item_id: item_id},
      success: function( data ) { 
          var data = JSON.parse(data);
          //console.log(data.address);
          $('#item_name').val(data.name);
          $('#uom').val(data.uom_code+" - "+data.uom_name);
      }
  });
});
$("#price").blur(function () { 
  $("span").remove(".span-error");  
  var price = $("#price").val(); 
  var result = regPrice.test(price);
  if(!price){
    $("#price").focus();
    $("#price").after("<span class='span-error'>Enter a price</span>");
    error = true;
  } else if(!result){
    $("#price").focus();
    $("#price").after("<span class='span-error'>Price can only be numbers</span>");
    error = true;
  } else {
    $('#price').css("border-color", "#d2d6de");
    $("span").remove(".span-error"); 
    error = false;
  }
});
$( "#payment_terms" ).change(function() { 
    if($( "#payment_terms" ).val() == 'Others')  $( "#payment_terms_other" ).show();
    else $( "#payment_terms_other" ).hide();
});  
$( "#mobile" ).blur(function() { 
  $("span").remove(".span-error");
  var mobile = $("#mobile").val();
  var result = regPhone.test(mobile);
  if(!mobile){
    $("#mobile").focus();
    $("#mobile").after("<span class='span-error'>Enter a phone number</span>");
    error = true;
  } else if(mobile.length != 10){
    $("#mobile").focus();
    $("#mobile").after("<span class='span-error'>Mobile no. must be 10 digit</span>");
    error = true;
  } else if(!result){
    $("#mobile").focus();
    $("#mobile").after("<span class='span-error'>Enter a valid mobile number</span>");
    error = true;
  } else {
    $('#mobile').css("border-color", "#d2d6de");
    $("span").remove(".span-error"); 
    error = false;
  } 
});  
$( "#gstin" ).blur(function() { 
  if(error == false)$("span").remove(".span-error");
  var gstin = $("#gstin").val();
  var result = regGst.test(gstin);
  if(!gstin){    
    $("#gstin").focus();
    $("#gstin").after("<span class='span-error'>GSTIN can't be empty</span>");
    error = true;
  } else if(gstin.length != 15){    
    $("#gstin").focus();
    $("#gstin").after("<span class='span-error'>GSTIN must be of 15 digits</span>");
    error = true;
  } else if(!result){    
    $("#gstin").focus();
    $("#gstin").after("<span class='span-error'>Enter a valid GSTIN</span>");
    error = true;
  } else {
    $('#gstin').css("border-color", "#d2d6de");
    $("span").remove(".span-error");
    error = false;
  }  
});  
$( "#msme" ).blur(function() {
  if(error == false)$("span").remove(".span-error");
  $("span").remove(".span-error");
  var msme = $("#msme").val();
  if(!msme){    
    $("#msme").focus();
    $("#msme").after("<span class='span-error'>MSME No can't be empty</span>");
    error = true;
  } else if(msme.length != 12){    
    $("#msme").focus();
    $("#msme").after("<span class='span-error'>MSME Registration No must be of 12 digits</span>");
    error = true;
  } else {
    $('#msme').css("border-color", "#d2d6de");
    $("span").remove(".span-error");
    error = false;
  }  
});  
$( "#pan" ).blur(function() { 
  if(error == false)$("span").remove(".span-error");
  $("span").remove(".span-error");
  var pan_no = $("#pan").val();
  var result = regPan.test(pan_no);
  if(!pan_no){
    $("#pan").focus();
    $("#pan").after("<span class='span-error'>Pan no. can't be empty</span>"); 
    error = true;
  } else if(pan_no.length != 10){    
    $("#pan").focus();
    $("#pan").after("<span class='span-error'>Pan must be of 10 digits</span>");
    error = true;
  } else if(!result){
    $("#pan").focus();
    $("#pan").after("<span class='span-error'>Enter a valid pan number</span>");    
    error = true;
  } else {
    $('#pan').css("border-color", "#d2d6de");
    $("span").remove(".span-error");
    error = false;
  }  
});  
$( "#pin" ).blur(function() { 
  if(error == false)$("span").remove(".span-error");
  $("span").remove(".span-error");
  var pin = $("#pin").val();
  var result = regPin.test(pin);
  if(!pin){
    $("#pin").focus();
    $("#pin").after("<span class='span-error'>Pin can't be empty</span>"); 
    error = true;
  } else if(pin.length != 6){    
    $("#pin").focus();
    $("#pin").after("<span class='span-error'>Pin must be of 6 digits</span>");
    error = true;
  } else if(!result){
    $("#pin").focus();
    $("#pin").after("<span class='span-error'>Enter a valid pin number</span>"); 
    error = true;   
  } else {
    $('#pin').css("border-color", "#d2d6de");
    $("span").remove(".span-error");
    error = false;
  }  
});  
$( "#email" ).blur(function() { 
  if(error == false)$("span").remove(".span-error");
  $("span").remove(".span-error");
  var email = $("#email").val();
  var result = regEmail.test(email);
  if(!email){
    $("#email").focus();
    $("#email").after("<span class='span-error'>Enter an email</span>");
    error = true;
  } else if(!result){
    $("#email").focus();
    $("#email").after("<span class='span-error'>Enter a valid email</span>");
    error = true;
  } else {
    $('#email').css("border-color", "#d2d6de");
    $("span").remove(".span-error"); 
    error = false;
  } 
});  
$( "#phone1" ).blur(function() { 
  if(error == false)$("span").remove(".span-error");
  $("span").remove(".span-error");
  var phone1 = $("#phone1").val();
  var result = regPhone.test(phone1);  
  if(phone1){    
    if(phone1.length != 10){
      $("#phone1").focus();
      $("#phone1").after("<span class='span-error'>Phone no. must be 10 digit</span>");
      error = true;
    } else if(!result){
      $("#phone1").focus();
      $("#phone1").after("<span class='span-error'>Enter a valid phone number</span>");
      error = true;
    } else {
      $('#phone1').css("border-color", "#d2d6de");
      $("span").remove(".span-error"); 
      error = false;
    } 
  } else {
    $('#phone1').css("border-color", "#d2d6de");
    $("span").remove(".span-error"); 
    error = false;
  }
});
$( "#phone2" ).blur(function() { 
  if(error == false)$("span").remove(".span-error");
  $("span").remove(".span-error");
  var phone2 = $("#phone2").val();
  var result = regPhone.test(phone2);  
  if(phone2){    
    if(phone2.length != 10){
      $("#phone2").focus();
      $("#phone2").after("<span class='span-error'>Phone no. must be 10 digit</span>");
      error = true;
    } else if(!result){
      $("#phone2").focus();
      $("#phone2").after("<span class='span-error'>Enter a valid phone number</span>");
      error = true;
    } else {
      $('#phone2').css("border-color", "#d2d6de");
      $("span").remove(".span-error"); 
      error = false;
    } 
  } else {
    $('#phone2').css("border-color", "#d2d6de");
    $("span").remove(".span-error"); 
    error = false;
  }
});
$( "#ifsc_code" ).blur(function() { 
  if(error == false)$("span").remove(".span-error");
  $("span").remove(".span-error");
  var ifsc_code = $("#ifsc_code").val();
  var result = regIfsc.test(ifsc_code);
  if(!ifsc_code){
    $("#ifsc_code").focus();
    $("#ifsc_code").after("<span class='span-error'>Enter an IFSCode</span>");
    error = true;
  } else if(!result){
    $("#ifsc_code").focus();
    $("#ifsc_code").after("<span class='span-error'>Enter a valid IFSCode</span>");
    error = true;
  } else {
    $('#ifsc_code').css("border-color", "#d2d6de");
    $("span").remove(".span-error"); 
    error = false;
  } 
});   
$( "#account_no" ).blur(function() { 
  if(error == false)$("span").remove(".span-error");
  $("span").remove(".span-error");
  var account_no = $("#account_no").val();
  var result = regAccount.test(account_no);
  if(!account_no){
    $("#account_no").focus();
    $("#account_no").after("<span class='span-error'>Enter an bank account no</span>");
    error = true;
  } else if(!result){
    $("#account_no").focus();
    $("#account_no").after("<span class='span-error'>Enter a valid bank account no</span>");
    error = true;
  } else {
    $('#account_no').css("border-color", "#d2d6de");
    $("span").remove(".span-error"); 
    error = false;
  } 
});   
$( "#phone" ).blur(function() { 
  $("span").remove(".span-error");
  var phone = $("#phone").val();
  var result = regPhone.test(phone);
  if(!phone){
    $("#phone").focus();
    $("#phone").after("<span class='span-error'>Enter a phone number</span>");
    error = true;
  } else if(phone.length != 10){
    $("#phone").focus();
    $("#phone").after("<span class='span-error'>Phone no. must be 10 digit</span>");
    error = true;
  } else if(!result){
    $("#phone").focus();
    $("#phone").after("<span class='span-error'>Enter a valid phone number</span>");
    error = true;
  } else {
    $('#phone').css("border-color", "#d2d6de");
    $("span").remove(".span-error"); 
    error = false;
  } 
});
$('#base_amount').on('keyup keypress blur change', function() { 
  $("span").remove(".span-error");
  var base_amount = $("#base_amount").val();
  var result = regPrice.test(base_amount);
  if(!base_amount){
    $("#base_amount").focus();
    $("#base_amount").after("<span class='span-error'>Enter Total PO Base Amount W/O additional charge</span>");
    error = true;
  } else if(!result){
    $("#base_amount").focus();
    $("#base_amount").after("<span class='span-error'>Enter a valid base amount</span>");
    error = true;
  } else { 
    $('#base_amount').css("border-color", "#d2d6de");
    $("span").remove(".span-error"); 
    var tax_amount = calculateTaxAmount();
    $("#tax_amount").val(tax_amount);
    calculateTotalAmount();
    error = false;
  } 
});
$( "#tax_percentage" ).on('keyup keypress blur change', function() { 
  $("span").remove(".span-error");
  var tax = $("#tax_percentage").val();
  var result = regPrice.test(tax);
  if(!tax){
    $("#tax_percentage").focus();
    $("#tax_percentage").after("<span class='span-error'>Tax %</span>");
    error = true;
  } else if(!result){
    $("#tax_percentage").focus();
    $("#tax_percentage").after("<span class='span-error'>Numeric</span>");
    error = true;
  } else {
    $('#tax_percentage').css("border-color", "#d2d6de");
    $("span").remove(".span-error"); 
    var tax_amount = calculateTaxAmount();
    $("#tax_amount").val(tax_amount);
    calculateTotalAmount();
    error = false;
  } 
}); 
$( "#discount" ).on('keyup keypress blur change', function() { 
  $("span").remove(".span-error");
  var discount = $("#discount").val();
  var result = regPrice.test(discount);
  if(!discount){
    $("#discount").focus();
    $("#discount").after("<span class='span-error'>Enter discount percentage</span>");
    error = true;
  } else if(!result){
    $("#discount").focus();
    $("#discount").after("<span class='span-error'>Enter a valid discount percentage</span>");
    error = true;
  } else {
    $('#discount').css("border-color", "#d2d6de");
    $("span").remove(".span-error");
    calculateTotalAmount(); 
    error = false;
  } 
}); 
$( "#insurance" ).on('keyup keypress blur change', function() { 
  $("span").remove(".span-error");
  var insurance = $("#insurance").val();
  var result = regPrice.test(insurance);
  if(!insurance){
    $("#insurance").focus();
    $("#insurance").after("<span class='span-error'>Enter insurance amount</span>");
    error = true;
  } else if(!result){
    $("#insurance").focus();
    $("#insurance").after("<span class='span-error'>Enter a valid insurance amount</span>");
    error = true;
  } else {
    $('#insurance').css("border-color", "#d2d6de");
    $("span").remove(".span-error"); 
    calculateTotalAmount();
    error = false;
  } 
}); 
$( "#freight" ).on('keyup keypress blur change', function() { 
  $("span").remove(".span-error");
  var freight = $("#freight").val();
  var result = regPrice.test(freight);
  if(!freight){
    $("#freight").focus();
    $("#freight").after("<span class='span-error'>Enter freight amount</span>");
    error = true;
  } else if(!result){
    $("#freight").focus();
    $("#freight").after("<span class='span-error'>Enter a valid freight amount</span>");
    error = true;
  } else {
    $('#freight').css("border-color", "#d2d6de");
    $("span").remove(".span-error"); 
    calculateTotalAmount();
    error = false;
  } 
});
$( "#packaging" ).on('keyup keypress blur change', function() { 
  $("span").remove(".span-error");
  var packaging = $("#packaging").val();
  var result = regPrice.test(packaging);
  if(!packaging){
    $("#packaging").focus();
    $("#packaging").after("<span class='span-error'>Enter packaging amount</span>");
    error = true;
  } else if(!result){
    $("#packaging").focus();
    $("#packaging").after("<span class='span-error'>Enter a valid packaging amount</span>");
    error = true;
  } else {
    $('#packaging').css("border-color", "#d2d6de");
    $("span").remove(".span-error"); 
    calculateTotalAmount();
    error = false;
  } 
});
$( "#extra" ).on('keyup keypress blur change', function() { 
  $("span").remove(".span-error");
  var extra = $("#extra").val();
  var result = regPrice.test(extra);
  if(!extra){
    $("#extra").focus();
    $("#extra").after("<span class='span-error'>Enter extra amount</span>");
    error = true;
  } else if(!result){
    $("#extra").focus();
    $("#extra").after("<span class='span-error'>Enter a valid extra amount</span>");
    error = true;
  } else {
    $('#extra').css("border-color", "#d2d6de");
    $("span").remove(".span-error"); 
    calculateTotalAmount();
    error = false;
  } 
});
$('#delivery_qty1').on('keyup keypress blur change', function() {
  $("span").remove(".span-error");
  var quantity = $("#delivery_qty1").val();
  var result = regPin.test(quantity);
  if(!quantity){
    $("#delivery_qty1").focus();
    $("#delivery_qty1").after("<span class='span-error'>Enter item quantity</span>");
    error = true;
  } else if(!result){
    $("#delivery_qty1").focus();
    $("#delivery_qty1").after("<span class='span-error'>Enter valid item number</span>");
    error = true;
  } else {
    $('#delivery_qty1').css("border-color", "#d2d6de");
    $("span").remove(".span-error"); 
    validateQuantity('1');
    var ppu = $("#ppu").val();
    if(ppu)validateItemAmount();
    //error = false;
  }   
});
$('#delivery_qty2').on('keyup keypress blur change', function() { 
  $("span").remove(".span-error");
  var quantity2 = $("#delivery_qty2").val();
  var result = regPin.test(quantity2);
  if(!quantity2 || quantity2 == 0){
    $("#delivery_qty2").focus();
    $("#delivery_qty2").after("<span class='span-error'>Enter item quantity</span>");
    error = true;
  } else if(!result){
    $("#delivery_qty2").focus();
    $("#delivery_qty2").after("<span class='span-error'>Enter valid item number</span>");
    error = true;
  } else {
    $('#delivery_qty2').css("border-color", "#d2d6de");
    $("span").remove(".span-error"); 
    validateQuantity('2');
    var ppu = $("#ppu").val();
    if(ppu)validateItemAmount();
    //error = false;
  }   
});
$('#delivery_qty3').on('keyup keypress blur change', function() {
  $("span").remove(".span-error");
  var quantity3 = $("#delivery_qty3").val();
  var result = regPin.test(quantity3);
  if(!quantity3 || quantity3 == 0){
    $("#delivery_qty3").focus();
    $("#delivery_qty3").after("<span class='span-error'>Enter item quantity</span>");
    error = true;
  } else if(!result){
    $("#delivery_qty3").focus();
    $("#delivery_qty3").after("<span class='span-error'>Enter valid item number</span>");
    error = true;
  } else {
    $('#delivery_qty3').css("border-color", "#d2d6de");
    $("span").remove(".span-error");
    validateQuantity('3'); 
    var ppu = $("#ppu").val();
    if(ppu)validateItemAmount();
    //error = false;
  }   
});
$('#ppu').on('keyup keypress blur change', function() {
  $("span").remove(".span-error");
  var ppu = $("#ppu").val();
  var result = regPrice.test(ppu);
  if(!ppu){
    $("#ppu").focus();
    $("#ppu").after("<span class='span-error'>Enter price per unit</span>");
    error = true;
  } else if(!result){
    $("#ppu").focus();
    $("#ppu").after("<span class='span-error'>Enter valid price per unit</span>");
    error = true;
  } else {
    $('#ppu').css("border-color", "#d2d6de");
    $("span").remove(".span-error"); 
    var quantity = $("#delivery_qty1").val();
    if(quantity)validateItemAmount();
    //error = false;
  }   
});
$('#amount').on('keyup keypress blur change', function() {
  validateItemAmount();
});

function calculateTaxAmount(){ 
  var base_amount = $('#base_amount').val();
  var tax_percentage = $('#tax_percentage').val();
  if(!base_amount){
    $("#base_amount").focus();
    $("#base_amount").after("<span class='span-error'>Enter Total PO Base Amount W/O additional charge</span>");
    error = true;
  } 
  if(!tax_percentage){
    $("#tax_percentage").focus();
    $("#tax_percentage").after("<span class='span-error'>Tax %</span>"); 
    error = true;   
  } 
  if(base_amount && tax_percentage){
    return tax_amount = base_amount*(tax_percentage/100);
    //console.log(tax_amount);return tax_amount;
  } 
}

function calculateTotalAmount(){   
  var tax = $('#tax_percentage').val();
  if(tax){
    var tax_amount = calculateTaxAmount();
    $("#tax_amount").val(tax_amount);
  } 

  var base_amount = $('#base_amount').val();
  var discount = $('#discount').val();
  var insurance = $('#insurance').val();
  var freight = $('#freight').val();
  var custom = $('#custom').val();
  var packaging = $('#packaging').val();
  var extra = $('#extra').val();
  var total_po_amount = 0;

  if(base_amount){ 
    total_po_amount = parseFloat(base_amount);
  } 
  if(tax){
    total_po_amount = total_po_amount + parseFloat(tax);
  }
  if(insurance){ 
    total_po_amount = total_po_amount + parseFloat(insurance);
  }
  if(freight){ 
    total_po_amount = total_po_amount + parseFloat(freight);
  }
  if(custom){ 
    total_po_amount = total_po_amount + parseFloat(custom);
  }
  if(packaging){ 
    total_po_amount = total_po_amount + parseFloat(packaging);
  }
  if(extra){ 
    total_po_amount = total_po_amount + parseFloat(extra);
  }
  if(discount){ 
    var discAmt = parseFloat(total_po_amount)*(discount/100);
    discAmt = discAmt.toFixed(2);
    total_po_amount = parseFloat(total_po_amount) - parseFloat(discAmt);
  }
  if($.isNumeric(total_po_amount))
  $('#total_po_amount').val(total_po_amount.toFixed(2));
  else
  $('#total_po_amount').val(0);
}

function validateItemAmount(){ 
  $("span").remove(".span-error");
  var quantity = $('#delivery_qty1').val();
  var quantity2 = $('#delivery_qty2').val();
  var quantity3 = $('#delivery_qty3').val();
  var ppu = $('#ppu').val(); 
  if(!quantity && !ppu){
    if(!quantity){
      $("#delivery_qty1").val('');
      $("#delivery_qty1").after("<span class='span-error'>Enter quantity</span>");
      error = true;
    } else if(!quantity2){
      $("#delivery_qty2").val('');
      $("#delivery_qty2").after("<span class='span-error'>Enter quantity</span>");
      error = true;
    }  else if(!quantity3){
      $("#delivery_qty3").val('');
      $("#delivery_qty3").after("<span class='span-error'>Enter quantity</span>");
      error = true;
    } else if(!ppu){
      $("#ppu").focus();
      $("#ppu").after("<span class='span-error'>Enter price per unit</span>");
      error = true;
    } else {
      $('#delivery_qty1').css("border-color", "#d2d6de");
      $('#delivery_qty2').css("border-color", "#d2d6de");
      $('#delivery_qty3').css("border-color", "#d2d6de");
      $('#ppu').css("border-color", "#d2d6de");
      $("span").remove(".span-error"); 
      error = false;
    } 
  } else { 
    var quantity = parseInt(quantity);
    if(quantity2) {quantity = parseInt(quantity) + parseInt(quantity2); error = false; }
    if(quantity3) {quantity = parseInt(quantity) + parseInt(quantity3); error = false; }
    var amount = parseFloat(ppu) * parseInt(quantity);
    $("#amount").val(Math.ceil(amount));
    $("#base_amount").val(Math.ceil(amount));
    calculateTotalAmount();
  }
}

function validateQuantity(id){
  var quantity = $("#delivery_qty1").val();
  var quantity2 = $("#delivery_qty2").val();
  var quantity3 = $("#delivery_qty3").val();
  var po_qty = $('#quantity').val();

  if(quantity2) quantity = parseInt(quantity) + parseInt(quantity2);
  if(quantity3) quantity = parseInt(quantity) + parseInt(quantity3);
  
  if(parseInt(quantity) > parseInt(po_qty)){    
    $('#delivery_qty1').css("border-color", "red");
    $('#delivery_qty2').css("border-color", "red");
    $('#delivery_qty3').css("border-color", "red");
    $('#delivery_qty'+id).val('');
    swal("Total quantity should not exceed the PO quantity");
    error = true;
  } else {
    $('#delivery_qty1').css("border-color", "#d2d6de");
    $('#delivery_qty2').css("border-color", "#d2d6de");
    $('#delivery_qty3').css("border-color", "#d2d6de");
    //calculateTotalAmount();
  }
}