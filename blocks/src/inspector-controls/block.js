const { registerBlockType } = wp.blocks;
const { RichText, BlockControls, AlignmentToolbar,
	InspectorControls, ColorPalette } = wp.editor;

import lancpaIcon from  './lancpaIcon';

( function() {
    var el = wp.element.createElement;
    var SVG = wp.components.SVG;
    var circle = el( 'circle', { cx: 10, cy: 10, r: 10, fill: 'red', stroke: 'blue', strokeWidth: '10' } );
    var svgIcon = el( SVG, { width: 20, height: 20, viewBox: '0 0 20 20'}, circle);
    wp.blocks.updateCategory( 'wclancpa-2019', { icon: lancpaIcon } );
} )();

wp.blocks.unregisterBlockStyle( 'core/quote', 'large' );

registerBlockType( 'wclancpa-2019/inspector-controls', {
	title: 'Inspector Example',
	icon: {
		background: '#29c8aa',
		foreground: '#ffffff',
		src: 'smiley',
	},
	category: 'wclancpa-2019',
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
				className={ `myguten-block-align-${ props.attributes.alignment }` }
				tagName="p"
				value={ props.attributes.content }
			/>
		);
	},
} );