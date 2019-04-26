/**
 * Import internationalization
 */
import './i18n.js';


import './built-with-php/block';
import './introduction/block';
import './inspector-controls/block';
import './using-notices/block';

import lancpaIcon from  './inspector-controls/lancpaIcon';

wp.blocks.updateCategory( 'wclancpa-2019', {
	icon: lancpaIcon
} );

wp.blocks.registerBlockStyle( 'core/image', {
    name: 'default',
    label: 'Default'
} );

wp.blocks.registerBlockStyle( 'core/image', {
    name: 'phader',
    label: 'Philly Phader'
} );
