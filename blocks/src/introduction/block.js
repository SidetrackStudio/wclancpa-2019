/**
 * Internal block libraries
 */
const { __ } = wp.i18n;

const { registerBlockType } = wp.blocks;

import classnames from 'classnames';
import './style.scss';

/**
 * Register block
 */
export default registerBlockType( 'wclancpa-2019/introduction', {
	title: __( 'Block Introduction', 'wclancpa-2019' ),

	description: __( 'An example block built without needing NPM and Webpack.', 'wclancpa-2019' ),

	category: 'wclancpa-2019',

	icon: {
		background: '#29c8aa',
		foreground: '#ffffff',
		src:'admin-site',
	},

	keywords: [
		__( 'Introduction', 'wclancpa-2019' ),
		__( 'Hello World', 'wclancpa-2019' ),
		__( 'Example', 'wclancpa-2019' ),
	],
	attributes: {
	},

	edit: props => {
		const { className } = props;
		return (
            <div className="{ className } " >
			<h2>{ __( 'Hello Backend!!', 'wclancpa-2019' ) }</h2>
			<h2 className="message-love">{ __( 'Love,', 'wclancpa-2019' ) }</h2>
			<h3>{ __( 'the Edit method', 'wclancpa-2019' ) }</h3>
			<h4>{ __( '(in block.js).', 'wclancpa-2019' ) }</h4>
			</div>
		);
	},

	save: props => {
		const { className } = props;
		return (
            <div className="message-frontend" >
			<h2>{ __( 'Hello Frontend!!', 'wclancpa-2019' ) }</h2>
			<h2 className="message-love">{ __( 'Love,', 'wclancpa-2019' ) }</h2>
			<h3>{ __( 'the Save method', 'wclancpa-2019' ) }</h3>
			<h4>{ __( '(in block.js).', 'wclancpa-2019' ) }</h4>
			</div>
		);
	},
});
