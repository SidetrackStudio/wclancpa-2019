/**
 * Scripts to run when in WordPress Gutenberg editor
 * 
 * Unregister any block styles we don't want user to be able to select
 * or register our own custom block styles.
 */
wp.domReady( () => {
	// Unregister any block styles we don't want user to be able to select
	// wp.blocks.unregisterBlockStyle( 'core/quote', 'default' );
	// wp.blocks.unregisterBlockStyle( 'core/quote', 'large' );
	wp.blocks.unregisterBlockStyle( 'core/button', 'default' );
	wp.blocks.unregisterBlockStyle( 'core/button', 'outline' );
	wp.blocks.unregisterBlockStyle( 'core/button', 'squared' );

	// Add custom block styles:
	wp.blocks.registerBlockStyle("core/quote", {
		name: "mycustomstyle",
		label: "My Custom Style",
		isdefault: true
	});
	// Add custom block styles:
	wp.blocks.registerBlockStyle("core/button", {
		name: "mycustomstyle",
		label: "My Custom Style"
	});
} );