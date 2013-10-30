<?php include('../config/config.php'); ?>
$(function uploadify() {
    	$('#FILE_NAME2_1').uploadify({
	'method': 'post',
        'auto': false,
        'multi': true,
        'formData': {'someKey': 'someValue', 'someOtherKey': 1},
        'scriptData': {'texto': $("#mitexto").val()},
        'swf': '<?php echo ROOT_URL; ?>uploadify.swf',
        'uploader': '<?php echo ROOT_URL; ?>uploadify.php',
        'queueSizeLimit': 15,
        'onUploadStart': function(file) {
            $("#FILE_NAME2").uploadify("settings", "someOtherKey", 2);

        },
        'onUploadSuccess': function(file, data, response) {

            var scntDiv = $('#p_scents');
            var i = $('#p_scents p').size() + 1;
            
           
            $('<p><input id="FILE_NAME" name="FILE_NAME[' + i + ']" type="hidden" value="' + data + '" /></p>').appendTo(scntDiv);
           
  
            $(".btn-success").prop('disabled', false);
  

            
        },
        'onUploadProgress': function(file, bytesUploaded, bytesTotal, totalBytesUploaded, totalBytesTotal) {
            $('#progress').html(totalBytesUploaded + ' bytes uploaded of ' + totalBytesTotal + ' bytes.');

        },
        'onQueueComplete' : function(queueData) {
            var scntDiv = $('#p_scents');
            
			
			
			 
	
            
            $('<input id="insert_note" name="insert_note" type="hidden" value="Guardar" />').appendTo(scntDiv);
            
           
            
            document.getElementById("form1").submit();
            
            
            
        }  

    });
	});
		
		function updateRecord() {
			
				$('#FILE_NAME2_1').uploadify('upload','*');
						   return true;
				   
							
}


