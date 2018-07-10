<div class="news-letter">
	<div class="container">
		<div class="join">
			<h6>Поиск по магазину</h6>
			<div class="sub-left-right">
			<?php echo	apply_filters( 'get_product_search_form',
				'<form>
					<input  name ="s" type="text" value="Введите поиск" onfocus="this.value = "";"
					       onblur="if (this.value == "") {this.value = "Ввудиет поиск";}"/>
					<input type="submit" value="Поиск"/>
				</form>');
				?>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>

<div class="footer">
	<div class="container">
		<div class="footer_top">
			<div class="span_of_4">
				<?php dynamic_sidebar('footer') ?>
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="cards text-center">
			<img src="<?php  echo  get_template_directory_uri()  ;?>/images/cards.jpg" alt="" />
		</div>
		<div class="copyright text-center">
			<p>© 2015 Eshop. All Rights Reserved | Design by   <a href="http://w3layouts.com">  W3layouts</a></p>
		</div>
	</div>
</div>
<?php wp_footer(); ?>

<script>
	jQuery(function ($) {
		$('#pagination-posts').on('change', function () {
 			var countPage = $('#pagination-posts').val();

			var args = {};
 			var parts = window.location.href.slice(window.location.href.indexOf('?')+1).split('&');

			for (var i=0; i<parts.length;i++){
				var pos= parts[i].indexOf('=');
				if(pos = -1){
					continue;
				}
				var name = parts[i].substr(0, pos-1);
				var value = parts[i].substr( pos+1);
				args[name]=value;

			}
			args['ppp']= countPage;
			window.location.href = '?'+$.param(args);




		})
	})
</script>
</body>
</html>