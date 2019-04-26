const { registerBlockType } = wp.blocks;
const { 
	RichText, 
	BlockControls, 
	AlignmentToolbar,
	InspectorControls, 
	ColorPalette
} = wp.editor;


registerBlockType( 'wclancpa-2019/inspector-controls', {
	title:  __( 'Inspector Example', 'wclancpa-2019' ),,
	description: __( 'An example block built.', 'wclancpa-2019' ),

	category: 'wclancpa-2019',

	icon: {
		background: '#29c8aa',
		foreground: '#ffffff',
		src: 'smiley',
	},

	keywords: [
		__( 'Introduction', 'wclancpa-2019' ),
		__( 'Hello World', 'wclancpa-2019' ),
		__( 'Example', 'wclancpa-2019' ),
	],

	attributes: {
		content: {
			type: 'array',
			source: 'children',
			selector: 'p',
		},
	},
	edit: ( props ) => {
		console.log( props );
		const { attributes: { content, alignment, newColor }, setAttributes, className } = props;
		const onChangeContent = ( newContent ) => {
			setAttributes( { content: newContent } );
		};

		const onChangeAlignment = ( newAlignment ) => {
			let alignmentValue = ( newAlignment === undefined ) ? 'none' : newAlignment;
				setAttributes( { alignment: alignmentValue } );
		};

		const onChangeTextColor = ( newColor ) => {
			let newColorValue = ( newColor === undefined ) ? 'none' : newColor;
			setAttributes( { newColor: newColorValue } );
		};

		return (
			<div>
				{
					<BlockControls>
						<AlignmentToolbar
							value={ alignment }
							onChange={ onChangeAlignment }
						/>
					</BlockControls>
				}
				{
					<InspectorControls>
						<ColorPalette // Element Tag for Gutenberg standard colour selector
							onChange={onChangeTextColor} // onChange event callback
						/>
					</InspectorControls>
				}
				<RichText
					tagName="p"
					style = {{
						textAlign: alignment,
						color: newColor
					}}
					className={ className }
					onChange={ onChangeContent }
					value={ content }
				/>
			</div>
		);
	},
	save: ( props ) => {

		const contentStyle = {
			textAlign: props.attributes.alignment,
			color: props.attributes.newColor
		}

		return (
			<RichText.Content
				style= { contentStyle }
				className={ `wclancpa-block-align-${ props.attributes.alignment }` }
				tagName="p"
				value={ props.attributes.content }
			/>
		);
	},
} );