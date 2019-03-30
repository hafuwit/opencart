//Common
$('#account_with90_days').click(function() {
    if ($(this).is(':checked')) {
        $('.account_with90_days_show').removeClass("hidden");
        $('.account_without90_days_show').addClass("hidden");
        $('.account-name-1').removeClass("has-error");
        $('.account-number-1').removeClass("has-error");
        $('.invoice-number').removeClass("has-error");
        $('.invoice-amount').removeClass("has-error");
    }
});

$('#account_without90_days').click(function() {
    if ($(this).is(':checked')) {
        $( ".account_without90_days_show" ).removeClass( "hidden" );
        $( ".account_with90_days_show" ).addClass( "hidden" );
        $('.account-name-2').removeClass("has-error");
        $('.account-number-2').removeClass("has-error");
    }
});

$('#not_account').click(function() {
    if ($(this).is(':checked')) {
        $( ".account_without90_days_show" ).addClass( "hidden" );
        $( ".account_with90_days_show" ).addClass( "hidden" );

        $('.account_with90_days_show input').removeAttr('data-validate');
        $('.account_without90_days_show input').removeAttr('data-validate');

        $('.account-name-1').removeClass("has-error");
        $('.account-number-1').removeClass("has-error");
        $('.invoice-number').removeClass("has-error");
        $('.invoice-amount').removeClass("has-error");
        $('.account-name-2').removeClass("has-error");
        $('.account-number-2').removeClass("has-error");
    }
});

var today = getDate(new Date());
$('#input-date-available').val(today);
$('#invoice-date').datetimepicker({ pickTime: false });
function getDate(datetime) {
    var day = datetime.getDate();
    var month = datetime.getMonth()+1;
    var year = datetime.getFullYear();
    if (day < 10) {
        day = '0' + day;
    }
    if (month < 10) {
        month = '0' + month;
    }
    return month + '/' + day + '/' + year;
}

//Account Screen Javascript

//Account Success Screen Javascript
$('#add-account').click(function() {
    if ($('#add-account-section').hasClass("hidden")) {
        $('#add-account-section').removeClass("hidden");
        $('.add-account-option').removeClass("hidden");
        $('#verify-account').removeClass("hidden");
    } else {
        $('#add-account-section').addClass("hidden");
        $('.add-account-option').addClass("hidden");
        $('#verify-account').addClass("hidden");
    }
});