<?php
/*
Template Name: Career Form template
*/
?>
<?php get_header(); ?>
<style>
	#extensions_message{
		    text-align: left;
    display: block;
    font-size: 12px;
	}
</style>
<?php
$pid = $_GET['pid'];
$title = get_the_title($pid);
?>
	<div id="careerform">
		<div class="container">
			<h3 class="applyFormTitle text-center">Reach out to apply for a suitable role</h3>
			<div class="apply-form-center">
				<?php
	         	echo do_shortcode('[gravityform id=17 title=false description=false ajax=true tabindex=32]');
	        ?>
			</div>
		</div>
	</div>

<?php get_footer(); ?>
<script>
   $( document ).ready(function() {
   	$('#input_17_10').append("<option value='others'>Others</option>");
    $('#input_17_9').val("<?php echo $title;?>");
});

</script>