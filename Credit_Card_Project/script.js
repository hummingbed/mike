$(function(){
    var number = $( "#cc-number"),
    expDate = $( "#cc-expiration-date"),
    cvv = $( "#cc-cvv" ),
    paymentButton = $( "#submit-payment");

    number.inputmask( "9999 9999 9999 9[999] [999]", { "placeholder": ""} );
    expDate.inputmask( "mm/yyyy" );
    cvv.inputmask( "999", { "placeholder": "" } );
});