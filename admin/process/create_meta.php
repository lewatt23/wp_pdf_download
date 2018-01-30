<?php





function Book_create_metaboxes(){
    
    add_meta_box( 
    'Books_author_options',
    __('Addtional Options for the Book','books'),
    'Books_author_options',
        'book',
        'normal',
        'high'
    );
    
}