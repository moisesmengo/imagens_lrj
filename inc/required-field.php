<?php
function cmb2_after_form_do_js_validation( $post_id, $cmb ) {
	static $added = false;

	// Only add this to the page once (not for every metabox)
	if ( $added ) {
		return;
	}

	$added = true;
	?>
	<script type="text/javascript">
	jQuery(document).ready(function($) {

		$form = $( document.getElementById( 'post' ) );
		$htmlbody = $( 'html, body' );
		$toValidate = $( '[data-validation]' );

		if ( ! $toValidate.length ) {
			return;
		}

		function checkValidation( evt ) {
			var labels = [];
			var $first_error_row = null;
			var $row = null;

			function add_required( $row ) {
				$row.css({ 'background-color': 'rgb(255, 170, 170)' });
				$first_error_row = $first_error_row ? $first_error_row : $row;
				labels.push( $row.find( '.cmb-th label' ).text() );
			}

			function remove_required( $row ) {
				$row.css({ background: '' });
			}

			$toValidate.each( function() {
				var $this = $(this);
				var val = $this.val();
				$row = $this.parents( '.cmb-row' );

				if ( $this.is( '[type="button"]' ) || $this.is( '.cmb2-upload-file-id' ) ) {
					return true;
				}

				if ( 'required' === $this.data( 'validation' ) ) {
					if ( $row.is( '.cmb-type-file-list' ) ) {

						var has_LIs = $row.find( 'ul.cmb-attach-list li' ).length > 0;

						if ( ! has_LIs ) {
							add_required( $row );
						} else {
							remove_required( $row );
						}

					} else {
						if ( ! val ) {
							add_required( $row );
						} else {
							remove_required( $row );
						}
					}
				}

			});

			if ( $first_error_row ) {
				evt.preventDefault();
				alert( '<?php _e( 'Você não preencheu um ou mais campos obrigatórios', 'cmb2' ); ?> ' + labels.join( ', ' ) );
				$htmlbody.animate({
					scrollTop: ( $first_error_row.offset().top - 200 )
				}, 1000);
			}  
		}

		$form.on( 'submit', checkValidation );
	});
	</script>
	<?php
}

add_action( 'cmb2_after_form', 'cmb2_after_form_do_js_validation', 10, 2 );