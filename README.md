# wclancpa-2019
Demonstration of building WordPress blocks and employing filters to modify existing blocks.


`/**
 * Adding a block category creates a Panel
 */
function create_wclancpa_2019_panel( $categories, $post ) {
	return array_merge(
		$categories,
		array(
			array(
				'slug'  => 'wclancpa-2019',
				'title' => __( 'WC Lancaster 2019 Panel', 'wclancpa-2019' ),
			),
		)
	);
}
add_filter( 'block_categories', 'create_wclancpa_2019_panel', 10, 2 );`



// const { createHigherOrderComponent } = wp.compose;
// const { Fragment } = wp.element;
// const { InspectorControls } = wp.editor;
// const { PanelBody } = wp.components;

// const withInspectorControls =  createHigherOrderComponent( ( BlockEdit ) => {
//     return ( props ) => {
//         return (
//             <Fragment>
//                 <BlockEdit { ...props } />
//                 <InspectorControls>
//                     <PanelBody>
//                         My custom control
//                     </PanelBody>
//                 </InspectorControls>
//             </Fragment>
//         );
//     };
// }, "withInspectorControl" );

// wp.hooks.addFilter( 'editor.BlockEdit', 'core-embed/spotify', withInspectorControls );
