const {
	ToggleControl,
	PanelBody,
	TextControl,
	TextareaControl,
} = wp.components;
const { __, setLocaleData } = wp.i18n;

const {
	createHigherOrderComponent
} = wp.compose;

const {
	InspectorControls
} = wp.editor;

const {
	isEmpty
} = lodash;

const {
	Fragment,
	RawHTML,
	renderToString
} = wp.element;

const { hooks } = wp;

const newAttributes = {
	vimeo_replace: {
		type: 'toggle',
		default: 'true',
    },
    vimeo_id:{
        type: 'string',
    },
};

const registerAttributes = ( settings, name ) => {

	if ( 'core/video' == name ) {
		return settings;
	}

	settings.attributes = Object.assign( settings.attributes, newAttributes );
	return settings;
};

hooks.addFilter( 'blocks.registerBlockType', 'core/video', registerAttributes );


const withInspectorControls =  createHigherOrderComponent( ( BlockEdit ) => {
	return ( props ) => {
		const {
			attributes: {
				vimeo_replace,
				vimeo_id,
			},
			setAttributes,
		} = props;
        return (
            <Fragment>
                <BlockEdit { ...props } />
                <InspectorControls>
                    <PanelBody>                        
						<ToggleControl
							label={ __( 'Toggle vimeo video on click?' ) }
							checked={ vimeo_replace }
							onChange={ ( value ) => setAttributes( { vimeo_replace: value } ) }
						/>
                        <TextControl
                                label={   __( 'Vimeo ID' ) }
                                value={ vimeo_id }
                                onChange={ ( value ) => setAttributes( { vimeo_id: value } ) }
                            />
                    </PanelBody>
                </InspectorControls>
            </Fragment>
        );
    };
}, "withInspectorControl" );

wp.hooks.addFilter( 'editor.BlockEdit', 'core/video', withInspectorControls );