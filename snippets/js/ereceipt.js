$( document ).ready(function() {
    var printContents = document.getElementById('ereceipt').innerHTML;
    window.close();
    window.document.close();
    window.focus();
    window.print(printContents);
 });