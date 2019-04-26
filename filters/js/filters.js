// const { createHigherOrderComponent } = wp.compose;

// const withClientIdClassName = createHigherOrderComponent( ( BlockListBlock ) => {
//     return ( props ) => {
//         return <BlockListBlock { ...props } className={ "block-" + props.clientId } />;
//     };
// }, 'withClientIdClassName' );

// wp.hooks.addFilter( 'editor.BlockListBlock', 'core-embed/spotify', withClientIdClassName );
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
wp.blocks.registerBlockStyle( 'core/quote', {
    name: 'fancy-quote',
    label: 'Fancy FFS Quote'
} );

wp.blocks.registerBlockStyle( 'core-embed/spotify', {
    name: 'peter-harper',
    label: 'Peter Harper'
} );

wp.blocks.registerBlockStyle( 'core/image', {
    name: 'phader',
    label: 'Philly Phader'
} );
