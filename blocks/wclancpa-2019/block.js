const { __ } = wp.i18n; 
const { registerBlockType } = wp.blocks; 

import lancpaIcon from  '../../filters/lancpaIcon';

registerBlockType( 'wclancpa-2019/wclancpa-2019-block', {

    title: __( 'WC LancPA 2019', 'wclancpa-2019' ),
	icon: {
		background: '#29c8aa',
		foreground: '#ffffff',
		src: lancpaIcon,
	},
	category: 'wclancpa-2019', 
	keywords: [
		__( 'WC LancPA Block', 'wclancpa-2019' ),
		__( 'wclancpa-2019', 'wclancpa-2019' ),
	],

	edit: function( props ) {
		return (
			<div className={ props.className }>
				<p>{ __(`— Hello from the backend.`, 'wclancpa-2019') }</p>
			</div>
		);
	},

	save: function( props ) {
		return (
			<div>
				<p>{ __(`— Hello on the frontend from the backend.`, 'wclancpa-2019') }</p>
			</div>
		);
	},
} );
