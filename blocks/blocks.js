import './wclancpa-2019/block';


import lancpaIcon from '../filters/filter-assets/lancpaIcon';

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
