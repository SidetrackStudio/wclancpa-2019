
const withInspectorControls =  createHigherOrderComponent( ( BlockEdit ) => {
    return ( props ) => {
        return (
            <Fragment>
                <BlockEdit { ...props } />
                <InspectorControls>
                    <PanelBody>
                        My custom control
                    </PanelBody>
                </InspectorControls>
            </Fragment>
        );
    };
}, "withInspectorControl" );

wp.hooks.addFilter( 'editor.BlockEdit', 'core-embed/spotify', withInspectorControls );
wp.blocks.registerBlockStyle( 'core/quote', {
    name: 'fancy-quote',
    label: 'Fancy FFS Quote'
} );

wp.blocks.registerBlockStyle( 'core-embed/spotify', {
    name: 'peter-harper',
    label: 'Peter Harper'
} );
