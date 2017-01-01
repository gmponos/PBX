jQuery.fn.delay = function(time,func){
    return this.each(function(){
        setTimeout(func,time);
    });
};

$(document).ready(function(){

$('#info').delay(5000, function(){$('#info').fadeOut()})
$('#error').delay(5000, function(){$('#error').fadeOut()})

var initdevice = $("#device").val();

if(initdevice=='0-0') {
	$("#mac-address").hide();
}	


$("#device").change(function(){            
       var test = $(this).val();
	   if(test=='0-0') {
		$("#mac-address").hide("slow");		
	   }else {
	  	 $("#mac-address").show("slow");	    
		}
	});

var fwd_condition = $("#condition").val();

if(fwd_condition=='CFB' || fwd_condition=='CFA'){
	$("#fwd_timeout").hide();
}

$("#condition").change(function(){
	var test = $(this).val();
	if(test=='CFU') {
		$("#fwd_timeout").show("slow");
	} else {
	  	 $("#fwd_timeout").hide("slow");
	}
});

});
