/**
 * Internal block libraries
 */
const { __ } = wp.i18n;

const { registerBlockType } = wp.blocks;
const {
	ClipboardButton,
	Tooltip,
	withNotices,
	Button,
} = wp.components;
const { Fragment } = wp.element;
const { withState } = wp.compose;

import classnames from 'classnames';
import './style.scss';

const ButtonWithNotice = withNotices(
    ( { noticeOperations, noticeUI } ) => {
        const addError = () => noticeOperations.createErrorNotice( 'Notices only appear in the editor, according to the Handbook. See references below..' );
        return (
            <div>
                { noticeUI }
				<h3>{ __( 'Clicking the button will trigger a dismissible notice.' ) }</h3>
                <Button isDefault onClick={ addError }>Add error</Button>
 				<p>For more info consult: 
					&nbsp;<a target="_blank" href="https://wordpress.org/gutenberg/handbook/designers-developers/developers/components/notice/">Notice Component</a>, 
					&nbsp;<a target="_blank" href="https://wordpress.org/gutenberg/handbook/designers-developers/developers/components/with-notices/">withNotices Component</a>, and 
					&nbsp;<a target="_blank" href="https://wordpress.org/gutenberg/handbook/designers-developers/developers/data/data-core-notices/">Core Notices Data</a>.
 				</p>
            </div>
        )
    }
);

export default registerBlockType( 'wclancpa-2019/using-notices', {

	title: __( 'Using Notices', 'wclancpa-2019' ),

	description: __( 'Demonstrating how to use.', 'wclancpa-2019' ),

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
	attributes: {},

	edit: props => {
		const { className } = props;
		return (
            <div className="message-backend" >
				<ButtonWithNotice />
			</div>
		);
	},
	save: props => {
		const { className } = props;
		return (
			<div className="message-frontend" >
				<h3>{ __( 'According to the Handbook, Notices only appear in the editor.' ) }</h3>
 				<p>For more info consult: 
 				&nbsp;<a target="_blank" href="https://wordpress.org/gutenberg/handbook/designers-developers/developers/components/notice/">Notice Component</a>, 
 				&nbsp;<a target="_blank" href="https://wordpress.org/gutenberg/handbook/designers-developers/developers/components/with-notices/">withNotices Component</a>, and 
 				&nbsp;<a target="_blank" href="https://wordpress.org/gutenberg/handbook/designers-developers/developers/data/data-core-notices/">Core Notices Data</a>.
 				</p>
			</div>
		);
	},
});
