
// Profile flip
$('#pm-flip').click(function() {
$('#flip-card').toggleClass('rotated');
});


// TinyScrollBar
$(document).ready(function(){
  $('#scrollbar-two').tinyscrollbar();
});


// popover and tooltip for rel element 
/* Tooltips */
$.fn.tooltip && $('[rel="tooltip"]').tooltip();
/* Popovers */
$.fn.popover && $('[rel="popover"]').popover(); 


// footable table init 
$(function()
{
	/* FooTable */
  if ($('.footable').length)
      $('.footable').footable();
});

//select picker init 
$('.selectpicker').selectpicker();


// Tooltip Btn grp fix 
$('.btn-group [title]').tooltip({
  container: 'body'
})

