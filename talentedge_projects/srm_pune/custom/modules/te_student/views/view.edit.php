<?php
require_once('include/MVC/View/views/view.edit.php');
class te_studentViewEdit extends ViewEdit {
	function display(){
		
		require_once('include/MVC/View/views/view.detail.php');
		require_once('include/utils.php');		
		global $current_user,$db;
		parent::display();
			
			
	?>
	<script>	
	$(function(){
	$("#status option[value='Inactive_transfer']").remove();
	});		
    $( document ).ready(function() {
		$('#upload_image_file').bind('change', function() {

		//this.files[0].size gets the size of your file.
		var reader = new FileReader();
		reader.readAsDataURL(this.files[0]);
		
		reader.onload = function (e) {
			//Initiate the JavaScript Image object.
			var image = new Image();

			//Set the Base64 string return from FileReader as source.
			image.src = e.target.result;
				   
			//Validate the File Height and Width.
			image.onload = function () {
				var height = this.height;
				var width = this.width;
				if (height > 170 || width > 250) {
					alert("Height and Width must not exceed by 250x170 pixels");
					$("#upload_image").val($("#upload_image_file").val(''));
					$("#upload_image").val('');
					return false;
				}
				
				return true;
			};
        }

		});
    
    });
	
	
	</script>
	<?php
    }
}
?>
