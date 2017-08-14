// JavaScript Document


$(document).ready(function(e) {
    $("#userfile").change(function(){
	   var nombre_form = $("#nombre_form").val();
	   open_loading();
	   $("#"+nombre_form).attr("action", base_url()+"load_image/do_upload");
	   $("#"+nombre_form).attr("target", "upload_frame");
	   setTimeout("$('#"+nombre_form+"').submit()",500);
	   setTimeout("close_loading()",5000);
	   
	}); 
	
	
	$("#btn-regresar").click(function(e) {
        window.history.back();
    });
    
    if ($('#datatable').length){
        $('#datatable').dataTable( {
            "responsive": 'true',
        } );
    }
    
    

    
    
});






$(function() {
    $.ajaxSetup({
        error: function( jqXHR, textStatus, errorThrown ) {
            if (jqXHR.status === 0) {
                msj_error('Not connect: Verify Network. Please try later', 3000);
            } else if (jqXHR.status == 404) {
                msj_error('Requested page not found [404]. Please try later', 3000);
            } else if (jqXHR.status == 500) {
                msj_error('Internal Server Error [500]. Please try later', 3000);
            } else if (textStatus === 'parsererror') {
                msj_error('Requested JSON parse failed. Please try later', 3000);
            } else if (textStatus === 'timeout') {
                msj_error('Time out error. Please try later', 3000);
            } else if (textStatus === 'abort') {
                msj_error('Ajax request aborted. Please try later', 3000);
            } else {
                msj_error('Uncaught Error: ' + jqXHR.responseText + '. Please Try Later', 3000);
           }
           close_loading();
        }
    });
});





function base_url(){
	var base_url = $("#base_url").val()+"index.php/";
	return base_url;	
}



function ses_out(){

	open_loading();
		$.post(base_url()+"Order/logout_user",{},function(data){
			redirect("inicio/", 0);	
		});
	close_loading();	
}



function msj_exito(mensaje, tiempo){
	$("#msj_exito div").html(mensaje);
	$("#msj_exito").fadeIn(500);
	setTimeout("close_msj('exito')",tiempo);	
}


function msj_error(mensaje, tiempo){
	$("#msj_error div").html(mensaje);
	$("#msj_error").fadeIn(500);
	setTimeout("close_msj('error')",tiempo);	
}

function msj_advertencia(mensaje, tiempo){
	$("#msj_advertencia div").html(mensaje);
	$("#msj_advertencia").fadeIn(500);
	setTimeout("close_msj('advertencia')",tiempo);	
}


function close_msj(tipo){
	$("#msj_"+tipo).fadeOut(500);	
}



function redirect(url, tiempo){
	setTimeout("location.href='"+base_url()+url+"'",tiempo);	
}

function open_loading(){
	$("#div_loading").fadeIn(500);	
}

function close_loading(){
	$("#div_loading").fadeOut();	
}


function reset_form(form){
	$("#"+form).each(function(index, element) {
        element.reset();
    });	
}


function quitarOption(id, sel){
	$("#"+sel).find("option[value='"+id+"']").remove();	
}

