function create_modal(id)
{
	$("body").css("overflow","hidden");
	$('#'+id).show();
	$('#'+id).append("<div  id='modal_close' style='position:fixed; left:20px; top:20px; cursor:pointer; font-size:20px;' onclick='close_modal(\""+id+"\"); '> X</div>");
}
$(document).keyup(function(e) {

  if (e.keyCode == 27) { $("body").css("overflow","auto");
	$('.overlay_modal').hide(); }   
});
function close_modal(id)
{
	$("body").css("overflow","auto");
	$('#'+id).hide();
}