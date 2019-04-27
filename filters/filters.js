
import lancpaIcon from './lancpaIcon';

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
