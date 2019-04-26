wp.hooks.addFilter( 'editor.BlockEdit', 'core/image', withInspectorControls );

wp.blocks.registerBlockStyle( 'core/quote', {
    name: 'fancy-quote',
    label: 'Fancy FFS Quote'
} );

wp.blocks.registerBlockStyle( 'core-embed/spotify', {
    name: 'peter-harper',
    label: 'Peter Harper'
} );

const { createHigherOrderComponent } = wp.compose;
const { Fragment } = wp.element;
const { InspectorControls } = wp.editor;
const { PanelBody } = wp.components;

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

