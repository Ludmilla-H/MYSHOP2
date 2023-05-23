$(document).ready(function() {

console.log("documents charge");


$( ".plus" ).on( "click", function() {

    console.log('id='+$(this).data("id"));
    const myId = $(this).data("id") ;

   console.log('inputValue=' +$('#'+myId).val());
   const nextVal = +$('#'+myId).val() + 1 ;

    window.location.href="/add/"+myId+"?quantity="+nextVal ;


} );

/*$( "input[type='text']" ).on( "change", function() {
    // Check input( $( this ).val() ) for validity here
    console.log($(this).val());

} );*/



})
