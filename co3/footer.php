		</div>
	</div>
	<!-- /page -->

	<!-- script -->
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script type="text/javascript">!window.jQuery && document.write(unescape('%3Cscript type="text/javascript" src="/script/jquery-2.1.1.js"%3E%3C/script%3E'))</script>
	<?php if(empty($_CO3_CONFIG['script']) === false) { ?>
		<?php foreach($_CO3_CONFIG['script'] as $script) { ?>
			<script type="text/javascript" src="<?php echo $script; ?>"></script>
		<?php } ?>
	<?php } ?>
	<!-- /script -->

</body>
</html>