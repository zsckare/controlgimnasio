(function($){
  $(function(){
    $('.modal-trigger').leanModal();
    $('.button-collapse').sideNav();
$(".dropdown-button").dropdown();
 $('select').material_select();
  $('.tooltipped').tooltip({delay: 50});
	  $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 90 // Creates a dropdown of 15 years to control year
  });
  }); // end of document ready
})(jQuery); // end of jQuery name space