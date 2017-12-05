<?php 
Redux::setSection( $opt_name, array(
        'title'            => __( 'Basic Fields', 'solar' ),
        'id'               => 'basic',
        'desc'             => __( 'These are really basic fields!', 'solar' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-home',
        'fields'           => array(
            array(
                'id'       => 'opt-checkbox',
                'type'     => 'checkbox',
                'title'    => __( 'Checkbox Option', 'solar' ),
                'subtitle' => __( 'No validation can be done on this field type', 'solar' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'solar' ),
                'default'  => '1'// 1 = on | 0 = off
            ),
        ),
    ) );

    Redux::setSection( $opt_name, array(
        'title'            => __( 'Checkbox', 'solar' ),
        'id'               => 'basic-checkbox',
        'subsection'       => true,
        'customizer_width' => '450px',
        'desc'             => __( 'For full documentation on this field, visit: ', 'solar' ) . '<a href="//docs.reduxframework.com/core/fields/checkbox/" target="_blank">docs.reduxframework.com/core/fields/checkbox/</a>',
        'fields'           => array(
            array(
                'id'       => 'opt-checkbox',
                'type'     => 'checkbox',
                'title'    => __( 'Checkbox Option', 'solar' ),
                'subtitle' => __( 'No validation can be done on this field type', 'solar' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'solar' ),
                'default'  => '1'// 1 = on | 0 = off
            ),
            array(
                'id'       => 'opt-multi-check',
                'type'     => 'checkbox',
                'title'    => __( 'Multi Checkbox Option', 'solar' ),
                'subtitle' => __( 'No validation can be done on this field type', 'solar' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'solar' ),
                //Must provide key => value pairs for multi checkbox options
                'options'  => array(
                    '1' => 'Opt 1',
                    '2' => 'Opt 2',
                    '3' => 'Opt 3'
                ),
                //See how std has changed? you also don't need to specify opts that are 0.
                'default'  => array(
                    '1' => '1',
                    '2' => '0',
                    '3' => '0'
                )
            ),
            array(
                'id'       => 'opt-checkbox-data',
                'type'     => 'checkbox',
                'title'    => __( 'Multi Checkbox Option (with menu data)', 'solar' ),
                'subtitle' => __( 'No validation can be done on this field type', 'solar' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'solar' ),
                'data'     => 'menu'
            ),
            array(
                'id'       => 'opt-checkbox-sidebar',
                'type'     => 'checkbox',
                'title'    => __( 'Multi Checkbox Option (with sidebar data)', 'solar' ),
                'subtitle' => __( 'No validation can be done on this field type', 'solar' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'solar' ),
                'data'     => 'sidebars'
            ),
        )
    ) );
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Radio', 'solar' ),
        'id'               => 'basic-Radio',
        'subsection'       => true,
        'customizer_width' => '500px',
        'desc'             => __( 'For full documentation on this field, visit: ', 'solar' ) . '<a href="//docs.reduxframework.com/core/fields/radio/" target="_blank">docs.reduxframework.com/core/fields/radio/</a>',
        'fields'           => array(
            array(
                'id'       => 'opt-radio',
                'type'     => 'radio',
                'title'    => __( 'Radio Option', 'solar' ),
                'subtitle' => __( 'No validation can be done on this field type', 'solar' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'solar' ),
                //Must provide key => value pairs for radio options
                'options'  => array(
                    '1' => 'Opt 1',
                    '2' => 'Opt 2',
                    '3' => 'Opt 3'
                ),
                'default'  => '2'
            ),
            array(
                'id'       => 'opt-radio-data',
                'type'     => 'radio',
                'title'    => __( 'Radio Option w/ Menu Data', 'solar' ),
                'subtitle' => __( 'No validation can be done on this field type', 'solar' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'solar' ),
                'data'     => 'menu'
            ),
        )
    ) );
    Redux::setSection( $opt_name, array(
        'title'      => __( 'Sortable', 'solar' ),
        'id'         => 'basic-Sortable',
        'subsection' => true,
        'desc'       => __( 'For full documentation on this field, visit: ', 'solar' ) . '<a href="//docs.reduxframework.com/core/fields/sortable/" target="_blank">docs.reduxframework.com/core/fields/sortable/</a>',
        'fields'     => array(
            array(
                'id'       => 'opt-sortable',
                'type'     => 'sortable',
                'title'    => __( 'Sortable Text Option', 'solar' ),
                'subtitle' => __( 'Define and reorder these however you want.', 'solar' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'solar' ),
                'label'    => true,
                'options'  => array(
                    'Text One'   => 'Item 1',
                    'Text Two'   => 'Item 2',
                    'Text Three' => 'Item 3',
                )
            ),
            array(
                'id'       => 'opt-check-sortable',
                'type'     => 'sortable',
                'mode'     => 'checkbox', // checkbox or text
                'title'    => __( 'Sortable Text Option', 'solar' ),
                'subtitle' => __( 'Define and reorder these however you want.', 'solar' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'solar' ),
                'options'  => array(
                    'cb1' => 'Checkbox One',
                    'cb2' => 'Checkbox Two',
                    'cb3' => 'Checkbox Three',
                ),
                'default'  => array(
                    'cb1' => false,
                    'cb2' => true,
                    'cb3' => false,
                )
            ),
        )
    ) );


    Redux::setSection( $opt_name, array(
        'title'            => __( 'Text', 'solar' ),
        'desc'             => __( 'For full documentation on this field, visit: ', 'solar' ) . '<a href="//docs.reduxframework.com/core/fields/text/" target="_blank">docs.reduxframework.com/core/fields/text/</a>',
        'id'               => 'basic-Text',
        'subsection'       => true,
        'customizer_width' => '700px',
        'fields'           => array(
            array(
                'id'       => 'text-example',
                'type'     => 'text',
                'title'    => __( 'Text Field', 'solar' ),
                'subtitle' => __( 'Subtitle', 'solar' ),
                'desc'     => __( 'Field Description', 'solar' ),
                'default'  => 'Default Text',
            ),
            array(
                'id'        => 'text-example-hint',
                'type'      => 'text',
                'title'     => __( 'Text Field w/ Hint', 'solar' ),
                'subtitle'  => __( 'Subtitle', 'solar' ),
                'desc'      => __( 'Field Description', 'solar' ),
                'default'   => 'Default Text',
                'text_hint' => array(
                    'title'   => 'Hint Title',
                    'content' => 'Hint content about this field!'
                )
            ),
            array(
                'id'          => 'text-placeholder',
                'type'        => 'text',
                'title'       => __( 'Text Field', 'solar' ),
                'subtitle'    => __( 'Subtitle', 'solar' ),
                'desc'        => __( 'Field Description', 'solar' ),
                'placeholder' => 'Placeholder Text',
            ),

        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Multi Text', 'solar' ),
        'id'         => 'basic-Multi Text',
        'desc'       => __( 'For full documentation on this field, visit: ', 'solar' ) . '<a href="//docs.reduxframework.com/core/fields/multi-text/" target="_blank">docs.reduxframework.com/core/fields/multi-text/</a>',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'opt-multitext',
                'type'     => 'multi_text',
                'title'    => __( 'Multi Text Option', 'solar' ),
                'subtitle' => __( 'Field subtitle', 'solar' ),
                'desc'     => __( 'Field Decription', 'solar' ),
            ),
        )
    ) );
    Redux::setSection( $opt_name, array(
        'title'      => __( 'Password', 'solar' ),
        'id'         => 'basic-Password',
        'desc'       => __( 'For full documentation on this field, visit: ', 'solar' ) . '<a href="//docs.reduxframework.com/core/fields/password/" target="_blank">docs.reduxframework.com/core/fields/password/</a>',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'password',
                'type'     => 'password',
                'username' => true,
                'title'    => 'Password Field',
                //'placeholder' => array(
                //    'username' => 'Username',
                //    'password' => 'Password',
                //)
            )
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Textarea', 'solar' ),
        'id'         => 'basic-Textarea',
        'desc'       => __( 'For full documentation on this field, visit: ', 'solar' ) . '<a href="//docs.reduxframework.com/core/fields/textarea/" target="_blank">docs.reduxframework.com/core/fields/textarea/</a>',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'opt-textarea',
                'type'     => 'textarea',
                'title'    => __( 'Textarea Option - HTML Validated Custom', 'solar' ),
                'subtitle' => __( 'Subtitle', 'solar' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'solar' ),
                'default'  => 'Default Text',
            )
        )
    ) );

    // -> START Editors
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Editors', 'solar' ),
        'id'               => 'editor',
        'customizer_width' => '500px',
        'icon'             => 'el el-edit',
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'WordPress Editor', 'solar' ),
        'id'         => 'editor-wordpress',
        //'icon'  => 'el el-home'
        'desc'       => __( 'For full documentation on this field, visit: ', 'solar' ) . '<a href="//docs.reduxframework.com/core/fields/editor/" target="_blank">docs.reduxframework.com/core/fields/editor/</a>',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'opt-editor',
                'type'     => 'editor',
                'title'    => __( 'Editor', 'solar' ),
                'subtitle' => __( 'Use any of the features of WordPress editor inside your panel!', 'solar' ),
                'default'  => 'Powered by Redux Framework.',
            ),
            array(
                'id'      => 'opt-editor-tiny',
                'type'    => 'editor',
                'title'   => __( 'Editor w/o Media Button', 'solar' ),
                'default' => 'Powered by Redux Framework.',
                'args'    => array(
                    'wpautop'       => false,
                    'media_buttons' => false,
                    'textarea_rows' => 5,
                    //'tabindex' => 1,
                    //'editor_css' => '',
                    'teeny'         => false,
                    //'tinymce' => array(),
                    'quicktags'     => false,
                )
            ),
            array(
                'id'         => 'opt-editor-full',
                'type'       => 'editor',
                'title'      => __( 'Editor - Full Width', 'solar' ),
                'full_width' => true
            ),
        ),
        'desc'       => __( 'For full documentation on this field, visit: ', 'solar' ) . '<a href="//docs.reduxframework.com/core/fields/editor/" target="_blank">docs.reduxframework.com/core/fields/editor/</a>',
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'ACE Editor', 'solar' ),
        'id'         => 'editor-ace',
        //'icon'  => 'el el-home'
        'subsection' => true,
        'desc'       => __( 'For full documentation on the this field, visit: ', 'solar' ) . '<a href="//docs.reduxframework.com/core/fields/ace-editor/" target="_blank">docs.reduxframework.com/core/fields/ace-editor/</a>',
        'fields'     => array(
            array(
                'id'       => 'opt-ace-editor-css',
                'type'     => 'ace_editor',
                'title'    => __( 'CSS Code', 'solar' ),
                'subtitle' => __( 'Paste your CSS code here.', 'solar' ),
                'mode'     => 'css',
                'theme'    => 'monokai',
                'desc'     => 'Possible modes can be found at <a href="' . 'http://' . 'ace.c9.io" target="_blank">' . 'http://' . 'ace.c9.io/</a>.',
                'default'  => "#header{\n   margin: 0 auto;\n}"
            ),
            array(
                'id'       => 'opt-ace-editor-js',
                'type'     => 'ace_editor',
                'title'    => __( 'JS Code', 'solar' ),
                'subtitle' => __( 'Paste your JS code here.', 'solar' ),
                'mode'     => 'javascript',
                'theme'    => 'chrome',
                'desc'     => 'Possible modes can be found at <a href="' . 'http://' . 'ace.c9.io" target="_blank">' . 'http://' . 'ace.c9.io/</a>.',
                'default'  => "jQuery(document).ready(function(){\n\n});"
            ),
            array(
                'id'         => 'opt-ace-editor-php',
                'type'       => 'ace_editor',
                'full_width' => true,
                'title'      => __( 'PHP Code', 'solar' ),
                'subtitle'   => __( 'Paste your PHP code here.', 'solar' ),
                'mode'       => 'php',
                'theme'      => 'chrome',
                'desc'       => 'Possible modes can be found at <a href="' . 'http://' . 'ace.c9.io" target="_blank">' . 'http://' . 'ace.c9.io/</a>.',
                'default'    => '<?php
    echo "PHP String";'
            ),


        )
    ) );

    // -> START Color Selection
    Redux::setSection( $opt_name, array(
        'title' => __( 'Color Selection', 'solar' ),
        'id'    => 'color',
        'desc'  => __( '', 'solar' ),
        'icon'  => 'el el-brush'
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Color', 'solar' ),
        'id'         => 'color-Color',
        'desc'       => __( 'For full documentation on this field, visit: ', 'solar' ) . '<a href="//docs.reduxframework.com/core/fields/color/" target="_blank">docs.reduxframework.com/core/fields/color/</a>',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'opt-color-title',
                'type'     => 'color',
                'output'   => array( '.site-title' ),
                'title'    => __( 'Site Title Color', 'solar' ),
                'subtitle' => __( 'Pick a title color for the theme (default: #000).', 'solar' ),
                'default'  => '#000000',
            ),
            array(
                'id'       => 'opt-color-footer',
                'type'     => 'color',
                'title'    => __( 'Footer Background Color', 'solar' ),
                'subtitle' => __( 'Pick a background color for the footer (default: #dd9933).', 'solar' ),
                'default'  => '#dd9933',
                'validate' => 'color',
            ),
        ),
    ) );
    Redux::setSection( $opt_name, array(
        'title'      => __( 'Color Gradient', 'solar' ),
        'desc'       => __( 'For full documentation on this field, visit: ', 'solar' ) . '<a href="//docs.reduxframework.com/core/fields/color-gradient/" target="_blank">docs.reduxframework.com/core/fields/color-gradient/</a>',
        'id'         => 'color-gradient',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'opt-color-header',
                'type'     => 'color_gradient',
                'title'    => __( 'Header Gradient Color Option', 'solar' ),
                'subtitle' => __( 'Only color validation can be done on this field type', 'solar' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'solar' ),
                'default'  => array(
                    'from' => '#1e73be',
                    'to'   => '#00897e'
                )
            ),
        )
    ) );
    Redux::setSection( $opt_name, array(
        'title'      => __( 'Color RGBA', 'solar' ),
        'desc'       => __( 'For full documentation on this field, visit: ', 'solar' ) . '<a href="//docs.reduxframework.com/core/fields/color-rgba/" target="_blank">docs.reduxframework.com/core/fields/color-rgba/</a>',
        'id'         => 'color-rgba',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'opt-color-rgba',
                'type'     => 'color_rgba',
                'title'    => __( 'Color RGBA', 'solar' ),
                'subtitle' => __( 'Gives you the RGBA color.', 'solar' ),
                'default'  => array(
                    'color' => '#7e33dd',
                    'alpha' => '.8'
                ),
                //'output'   => array( 'body' ),
                'mode'     => 'background',
                //'validate' => 'colorrgba',
            ),
        )
    ) );
    Redux::setSection( $opt_name, array(
        'title'      => __( 'Link Color', 'solar' ),
        'desc'       => __( 'For full documentation on this field, visit: ', 'solar' ) . '<a href="//docs.reduxframework.com/core/fields/link-color/" target="_blank">docs.reduxframework.com/core/fields/link-color/</a>',
        'id'         => 'color-link',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'opt-link-color',
                'type'     => 'link_color',
                'title'    => __( 'Links Color Option', 'solar' ),
                'subtitle' => __( 'Only color validation can be done on this field type', 'solar' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'solar' ),
                //'regular'   => false, // Disable Regular Color
                //'hover'     => false, // Disable Hover Color
                //'active'    => false, // Disable Active Color
                //'visited'   => true,  // Enable Visited Color
                'default'  => array(
                    'regular' => '#aaa',
                    'hover'   => '#bbb',
                    'active'  => '#ccc',
                )
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Palette Colors', 'solar' ),
        'desc'       => __( 'For full documentation on this field, visit: ', 'solar' ) . '<a href="//docs.reduxframework.com/core/fields/palette-color/" target="_blank">docs.reduxframework.com/core/fields/palette-color/</a>',
        'id'         => 'color-palette',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'opt-palette-color',
                'type'     => 'palette',
                'title'    => __( 'Palette Color Option', 'solar' ),
                'subtitle' => __( 'Only color validation can be done on this field type', 'solar' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'solar' ),
                'default'  => 'red',
                'palettes' => array(
                    'red'  => array(
                        '#ef9a9a',
                        '#f44336',
                        '#ff1744',
                    ),
                    'pink' => array(
                        '#fce4ec',
                        '#f06292',
                        '#e91e63',
                        '#ad1457',
                        '#f50057',
                    ),
                    'cyan' => array(
                        '#e0f7fa',
                        '#80deea',
                        '#26c6da',
                        '#0097a7',
                        '#00e5ff',
                    ),
                )
            ),
        )
    ) );


    // -> START Design Fields
    Redux::setSection( $opt_name, array(
        'title' => __( 'Design Fields', 'solar' ),
        'id'    => 'design',
        'desc'  => __( '', 'solar' ),
        'icon'  => 'el el-wrench'
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Background', 'solar' ),
        'id'         => 'design-background',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'opt-background',
                'type'     => 'background',
                'output'   => array( 'body' ),
                'title'    => __( 'Body Background', 'solar' ),
                'subtitle' => __( 'Body background with image, color, etc.', 'solar' ),
                //'default'   => '#FFFFFF',
            ),

        ),
        'desc'       => __( 'For full documentation on this field, visit: ', 'solar' ) . '<a href="//docs.reduxframework.com/core/fields/background/" target="_blank">docs.reduxframework.com/core/fields/background/</a>',
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Border', 'solar' ),
        'id'         => 'design-border',
        'desc'       => __( 'For full documentation on this field, visit: ', 'solar' ) . '<a href="//docs.reduxframework.com/core/fields/border/" target="_blank">docs.reduxframework.com/core/fields/border/</a>',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'opt-header-border',
                'type'     => 'border',
                'title'    => __( 'Header Border Option', 'solar' ),
                'subtitle' => __( 'Only color validation can be done on this field type', 'solar' ),
                'output'   => array( '.site-header' ),
                // An array of CSS selectors to apply this font style to
                'desc'     => __( 'This is the description field, again good for additional info.', 'solar' ),
                'default'  => array(
                    'border-color'  => '#1e73be',
                    'border-style'  => 'solid',
                    'border-top'    => '3px',
                    'border-right'  => '3px',
                    'border-bottom' => '3px',
                    'border-left'   => '3px'
                )
            ),
            array(
                'id'       => 'opt-header-border-expanded',
                'type'     => 'border',
                'title'    => __( 'Header Border Option', 'solar' ),
                'subtitle' => __( 'Only color validation can be done on this field type', 'solar' ),
                'output'   => array( '.site-header' ),
                'all'      => false,
                // An array of CSS selectors to apply this font style to
                'desc'     => __( 'This is the description field, again good for additional info.', 'solar' ),
                'default'  => array(
                    'border-color'  => '#1e73be',
                    'border-style'  => 'solid',
                    'border-top'    => '3px',
                    'border-right'  => '3px',
                    'border-bottom' => '3px',
                    'border-left'   => '3px'
                )
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Dimensions', 'solar' ),
        'id'         => 'design-dimensions',
        'desc'       => __( 'For full documentation on this field, visit: ', 'solar' ) . '<a href="//docs.reduxframework.com/core/fields/dimensions/" target="_blank">docs.reduxframework.com/core/fields/dimensions/</a>',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'             => 'opt-dimensions',
                'type'           => 'dimensions',
                'units'          => array( 'em', 'px', '%' ),    // You can specify a unit value. Possible: px, em, %
                'units_extended' => 'true',  // Allow users to select any type of unit
                'title'          => __( 'Dimensions (Width/Height) Option', 'solar' ),
                'subtitle'       => __( 'Allow your users to choose width, height, and/or unit.', 'solar' ),
                'desc'           => __( 'You can enable or disable any piece of this field. Width, Height, or Units.', 'solar' ),
                'default'        => array(
                    'width'  => 200,
                    'height' => 100,
                )
            ),
            array(
                'id'             => 'opt-dimensions-width',
                'type'           => 'dimensions',
                'units'          => array( 'em', 'px', '%' ),    // You can specify a unit value. Possible: px, em, %
                'units_extended' => 'true',  // Allow users to select any type of unit
                'title'          => __( 'Dimensions (Width) Option', 'solar' ),
                'subtitle'       => __( 'Allow your users to choose width, height, and/or unit.', 'solar' ),
                'desc'           => __( 'You can enable or disable any piece of this field. Width, Height, or Units.', 'solar' ),
                'height'         => false,
                'default'        => array(
                    'width'  => 200,
                    'height' => 100,
                )
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Spacing', 'solar' ),
        'id'         => 'design-spacing',
        'desc'       => __( 'For full documentation on this field, visit: ', 'solar' ) . '<a href="//docs.reduxframework.com/core/fields/spacing/" target="_blank">docs.reduxframework.com/core/fields/spacing/</a>',
        'subsection' => true,
        'fields'     => array(

            array(
                'id'       => 'opt-spacing',
                'type'     => 'spacing',
                'output'   => array( '.site-header' ),
                // An array of CSS selectors to apply this font style to
                'mode'     => 'margin',
                // absolute, padding, margin, defaults to padding
                'all'      => true,
                // Have one field that applies to all
                //'top'           => false,     // Disable the top
                //'right'         => false,     // Disable the right
                //'bottom'        => false,     // Disable the bottom
                //'left'          => false,     // Disable the left
                //'units'         => 'em',      // You can specify a unit value. Possible: px, em, %
                //'units_extended'=> 'true',    // Allow users to select any type of unit
                //'display_units' => 'false',   // Set to false to hide the units if the units are specified
                'title'    => __( 'Padding/Margin Option', 'solar' ),
                'subtitle' => __( 'Allow your users to choose the spacing or margin they want.', 'solar' ),
                'desc'     => __( 'You can enable or disable any piece of this field. Top, Right, Bottom, Left, or Units.', 'solar' ),
                'default'  => array(
                    'margin-top'    => '1px',
                    'margin-right'  => '2px',
                    'margin-bottom' => '3px',
                    'margin-left'   => '4px'
                )
            ),
            array(
                'id'             => 'opt-spacing-expanded',
                'type'           => 'spacing',
                // An array of CSS selectors to apply this font style to
                'mode'           => 'margin',
                // absolute, padding, margin, defaults to padding
                'all'            => false,
                // Have one field that applies to all
                //'top'           => false,     // Disable the top
                //'right'         => false,     // Disable the right
                //'bottom'        => false,     // Disable the bottom
                //'left'          => false,     // Disable the left
                'units'          => array( 'em', 'px', '%' ),      // You can specify a unit value. Possible: px, em, %
                'units_extended' => 'true',    // Allow users to select any type of unit
                //'display_units' => 'false',   // Set to false to hide the units if the units are specified
                'title'          => __( 'Padding/Margin Option', 'solar' ),
                'subtitle'       => __( 'Allow your users to choose the spacing or margin they want.', 'solar' ),
                'desc'           => __( 'You can enable or disable any piece of this field. Top, Right, Bottom, Left, or Units.', 'solar' ),
                'default'        => array(
                    'margin-top'    => '1px',
                    'margin-right'  => '2px',
                    'margin-bottom' => '3px',
                    'margin-left'   => '4px'
                )
            ),
        )
    ) );

    // -> START Media Uploads
    Redux::setSection( $opt_name, array(
        'title' => __( 'Media Uploads', 'solar' ),
        'id'    => 'media',
        'desc'  => __( '', 'solar' ),
        'icon'  => 'el el-picture'
    ) );


    Redux::setSection( $opt_name, array(
        'title'      => __( 'Gallery', 'solar' ),
        'id'         => 'media-gallery',
        'desc'       => __( 'For full documentation on this field, visit: ', 'solar' ) . '<a href="//docs.reduxframework.com/core/fields/gallery/" target="_blank">docs.reduxframework.com/core/fields/gallery/</a>',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'opt-gallery',
                'type'     => 'gallery',
                'title'    => __( 'Add/Edit Gallery', 'solar' ),
                'subtitle' => __( 'Create a new Gallery by selecting existing or uploading new images using the WordPress native uploader', 'solar' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'solar' ),
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Media', 'solar' ),
        'id'         => 'media-media',
        'desc'       => __( 'For full documentation on this field, visit: ', 'solar' ) . '<a href="//docs.reduxframework.com/core/fields/media/" target="_blank">docs.reduxframework.com/core/fields/media/</a>',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'opt-media',
                'type'     => 'media',
                'url'      => true,
                'title'    => __( 'Media w/ URL', 'solar' ),
                'compiler' => 'true',
                //'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'desc'     => __( 'Basic media uploader with disabled URL input field.', 'solar' ),
                'subtitle' => __( 'Upload any media using the WordPress native uploader', 'solar' ),
                'default'  => array( 'url' => 'http://s.wordpress.org/style/images/codeispoetry.png' ),
                //'hint'      => array(
                //    'title'     => 'Hint Title',
                //    'content'   => 'This is a <b>hint</b> for the media field with a Title.',
                //)
            ),
            array(
                'id'       => 'media-no-url',
                'type'     => 'media',
                'title'    => __( 'Media w/o URL', 'solar' ),
                'desc'     => __( 'This represents the minimalistic view. It does not have the preview box or the display URL in an input box. ', 'solar' ),
                'subtitle' => __( 'Upload any media using the WordPress native uploader', 'solar' ),
            ),
            array(
                'id'       => 'media-no-preview',
                'type'     => 'media',
                'preview'  => false,
                'title'    => __( 'Media No Preview', 'solar' ),
                'desc'     => __( 'This represents the minimalistic view. It does not have the preview box or the display URL in an input box. ', 'solar' ),
                'subtitle' => __( 'Upload any media using the WordPress native uploader', 'solar' ),
                'hint'     => array(
                    'title'   => 'Test',
                    'content' => 'This is a <b>hint</b> tool-tip for the webFonts field.<br/><br/>Add any HTML based text you like here.',
                )
            ),
            array(
                'id'         => 'opt-random-upload',
                'type'       => 'media',
                'title'      => __( 'Upload Anything - Disabled Mode', 'solar' ),
                'full_width' => true,
                'mode'       => false,
                // Can be set to false to allow any media type, or can also be set to any mime type.
                'desc'       => __( 'Basic media uploader with disabled URL input field.', 'solar' ),
                'subtitle'   => __( 'Upload any media using the WordPress native uploader', 'solar' ),
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Slides', 'solar' ),
        'id'         => 'additional-slides',
        'desc'       => __( 'For full documentation on this field, visit: ', 'solar' ) . '<a href="//docs.reduxframework.com/core/fields/slides/" target="_blank">docs.reduxframework.com/core/fields/slides/</a>',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'          => 'opt-slides',
                'type'        => 'slides',
                'title'       => __( 'Slides Options', 'solar' ),
                'subtitle'    => __( 'Unlimited slides with drag and drop sortings.', 'solar' ),
                'desc'        => __( 'This field will store all slides values into a multidimensional array to use into a foreach loop.', 'solar' ),
                'placeholder' => array(
                    'title'       => __( 'This is a title', 'solar' ),
                    'description' => __( 'Description Here', 'solar' ),
                    'url'         => __( 'Give us a link!', 'solar' ),
                ),
            ),
        )
    ) );

    // -> START Presentation Fields
    Redux::setSection( $opt_name, array(
        'title' => __( 'Presentation Fields', 'solar' ),
        'id'    => 'presentation',
        'desc'  => __( '', 'solar' ),
        'icon'  => 'el el-screen'
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Divide', 'solar' ),
        'id'         => 'presentation-divide',
        'desc'       => __( 'The spacer to the section menu as seen to the left (after this section block) is the divide "section". Also the divider below is the divide "field".', 'solar' ) . '<br />' . __( 'For full documentation on this field, visit: ', 'solar' ) . '<a href="//docs.reduxframework.com/core/fields/divide/" target="_blank">docs.reduxframework.com/core/fields/divide/</a>',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'opt-divide',
                'type' => 'divide'
            ),
        ),
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Info', 'solar' ),
        'id'         => 'presentation-info',
        'desc'       => __( 'For full documentation on this field, visit: ', 'solar' ) . '<a href="//docs.reduxframework.com/core/fields/info/" target="_blank">docs.reduxframework.com/core/fields/info/</a>',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'opt-info-field',
                'type' => 'info',
                'desc' => __( 'This is the info field, if you want to break sections up.', 'solar' )
            ),
            array(
                'id'    => 'opt-notice-info1',
                'type'  => 'info',
                'style' => 'info',
                'title' => __( 'This is a title.', 'solar' ),
                'desc'  => __( 'This is an info field with the <strong>info</strong> style applied. By default the <strong>normal</strong> style is applied.', 'solar' )
            ),
            array(
                'id'    => 'opt-info-warning',
                'type'  => 'info',
                'style' => 'warning',
                'title' => __( 'This is a title.', 'solar' ),
                'desc'  => __( 'This is an info field with the <strong>warning</strong> style applied.', 'solar' )
            ),
            array(
                'id'    => 'opt-info-success',
                'type'  => 'info',
                'style' => 'success',
                'icon'  => 'el el-info-circle',
                'title' => __( 'This is a title.', 'solar' ),
                'desc'  => __( 'This is an info field with the <strong>success</strong> style applied and an icon.', 'solar' )
            ),
            array(
                'id'    => 'opt-info-critical',
                'type'  => 'info',
                'style' => 'critical',
                'icon'  => 'el el-info-circle',
                'title' => __( 'This is a title.', 'solar' ),
                'desc'  => __( 'This is an info field with the <strong>critical</strong> style applied and an icon.', 'solar' )
            ),
            array(
                'id'    => 'opt-info-custom',
                'type'  => 'info',
                'style' => 'custom',
                'color' => 'purple',
                'icon'  => 'el el-info-circle',
                'title' => __( 'This is a title.', 'solar' ),
                'desc'  => __( 'This is an info field with the <strong>custom</strong> style applied, color arg passed, and an icon.', 'solar' )
            ),
            array(
                'id'     => 'opt-info-normal',
                'type'   => 'info',
                'notice' => false,
                'title'  => __( 'This is a title.', 'solar' ),
                'desc'   => __( 'This is an info non-notice field with the <strong>normal</strong> style applied.', 'solar' )
            ),
            array(
                'id'     => 'opt-notice-info',
                'type'   => 'info',
                'notice' => false,
                'style'  => 'info',
                'title'  => __( 'This is a title.', 'solar' ),
                'desc'   => __( 'This is an info non-notice field with the <strong>info</strong> style applied.', 'solar' )
            ),
            array(
                'id'     => 'opt-notice-warning',
                'type'   => 'info',
                'notice' => false,
                'style'  => 'warning',
                'icon'   => 'el el-info-circle',
                'title'  => __( 'This is a title.', 'solar' ),
                'desc'   => __( 'This is an info non-notice field with the <strong>warning</strong> style applied and an icon.', 'solar' )
            ),
            array(
                'id'     => 'opt-notice-success',
                'type'   => 'info',
                'notice' => false,
                'style'  => 'success',
                'icon'   => 'el el-info-circle',
                'title'  => __( 'This is a title.', 'solar' ),
                'desc'   => __( 'This is an info non-notice field with the <strong>success</strong> style applied and an icon.', 'solar' )
            ),
            array(
                'id'     => 'opt-notice-critical',
                'type'   => 'info',
                'notice' => false,
                'style'  => 'critical',
                'icon'   => 'el el-info-circle',
                'title'  => __( 'This is a title.', 'solar' ),
                'desc'   => __( 'This is an non-notice field with the <strong>critical</strong> style applied and an icon.', 'solar' )
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Section', 'solar' ),
        'id'         => 'presentation-section',
        'desc'       => __( 'For full documentation on this field, visit: ', 'solar' ) . '<a href="//docs.reduxframework.com/core/fields/section/" target="_blank">docs.reduxframework.com/core/fields/section/</a>',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'section-start',
                'type'     => 'section',
                'title'    => __( 'Section Example', 'solar' ),
                'subtitle' => __( 'With the "section" field you can create indented option sections.', 'solar' ),
                'indent'   => true, // Indent all options below until the next 'section' option is set.
            ),
            array(
                'id'       => 'section-test',
                'type'     => 'text',
                'title'    => __( 'Field Title', 'solar' ),
                'subtitle' => __( 'Field Subtitle', 'solar' ),
            ),
            array(
                'id'       => 'section-test-media',
                'type'     => 'media',
                'title'    => __( 'Field Title', 'solar' ),
                'subtitle' => __( 'Field Subtitle', 'solar' ),
            ),
            array(
                'id'     => 'section-end',
                'type'   => 'section',
                'indent' => false, // Indent all options below until the next 'section' option is set.
            ),
            array(
                'id'   => 'section-info',
                'type' => 'info',
                'desc' => __( 'And now you can add more fields below and outside of the indent.', 'solar' ),
            ),
        ),
    ) );
    Redux::setSection( $opt_name, array(
        'id'   => 'presentation-divide-sample',
        'type' => 'divide',
    ) );

    // -> START Switch & Button Set
    Redux::setSection( $opt_name, array(
        'title' => __( 'Switch & Button Set', 'solar' ),
        'id'    => 'switch_buttonset',
        'desc'  => __( '', 'solar' ),
        'icon'  => 'el el-cogs'
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Button Set', 'solar' ),
        'id'         => 'switch_buttonset-set',
        'desc'       => __( 'For full documentation on this field, visit: ', 'solar' ) . '<a href="//docs.reduxframework.com/core/fields/button-set/" target="_blank">docs.reduxframework.com/core/fields/button-set/</a>',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'opt-button-set',
                'type'     => 'button_set',
                'title'    => __( 'Button Set Option', 'solar' ),
                'subtitle' => __( 'No validation can be done on this field type', 'solar' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'solar' ),
                //Must provide key => value pairs for radio options
                'options'  => array(
                    '1' => 'Opt 1',
                    '2' => 'Opt 2',
                    '3' => 'Opt 3'
                ),
                'default'  => '2'
            ),
            array(
                'id'       => 'opt-button-set-multi',
                'type'     => 'button_set',
                'title'    => __( 'Button Set, Multi Select', 'solar' ),
                'subtitle' => __( 'No validation can be done on this field type', 'solar' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'solar' ),
                'multi'    => true,
                //Must provide key => value pairs for radio options
                'options'  => array(
                    '1' => 'Opt 1',
                    '2' => 'Opt 2',
                    '3' => 'Opt 3'
                ),
                'default'  => array( '2', '3' )
            ),

        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Switch', 'solar' ),
        'id'         => 'switch_buttonset-switch',
        'desc'       => __( 'For full documentation on this field, visit: ', 'solar' ) . '<a href="//docs.reduxframework.com/core/fields/switch/" target="_blank">docs.reduxframework.com/core/fields/switch/</a>',
        'subsection' => true,
        'fields'     => array(

            array(
                'id'       => 'switch-on',
                'type'     => 'switch',
                'title'    => __( 'Switch On', 'solar' ),
                'subtitle' => __( 'Look, it\'s on!', 'solar' ),
                'default'  => true,
            ),
            array(
                'id'       => 'switch-off',
                'type'     => 'switch',
                'title'    => __( 'Switch Off', 'solar' ),
                'subtitle' => __( 'Look, it\'s on!', 'solar' ),
                //'options' => array('on', 'off'),
                'default'  => false,
            ),
            array(
                'id'       => 'switch-parent',
                'type'     => 'switch',
                'title'    => __( 'Switch - Nested Children, Enable to show', 'solar' ),
                'subtitle' => __( 'Look, it\'s on! Also hidden child elements!', 'solar' ),
                'default'  => 0,
                'on'       => 'Enabled',
                'off'      => 'Disabled',
            ),
            array(
                'id'       => 'switch-child1',
                'type'     => 'switch',
                'required' => array( 'switch-parent', '=', '1' ),
                'title'    => __( 'Switch - This and the next switch required for patterns to show', 'solar' ),
                'subtitle' => __( 'Also called a "fold" parent.', 'solar' ),
                'desc'     => __( 'Items set with a fold to this ID will hide unless this is set to the appropriate value.', 'solar' ),
                'default'  => false,
            ),
            array(
                'id'       => 'switch-child2',
                'type'     => 'switch',
                'required' => array( 'switch-parent', '=', '1' ),
                'title'    => __( 'Switch2 - Enable the above switch and this one for patterns to show', 'solar' ),
                'subtitle' => __( 'Also called a "fold" parent.', 'solar' ),
                'desc'     => __( 'Items set with a fold to this ID will hide unless this is set to the appropriate value.', 'solar' ),
                'default'  => false,
            ),
        )
    ) );

    // -> START Select Fields
    Redux::setSection( $opt_name, array(
        'title' => __( 'Select Fields', 'solar' ),
        'id'    => 'select',
        'icon'  => 'el el-list-alt'
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Select', 'solar' ),
        'id'         => 'select-select',
        'desc'       => __( 'For full documentation on this field, visit: ', 'solar' ) . '<a href="//docs.reduxframework.com/core/fields/select/" target="_blank">docs.reduxframework.com/core/fields/select/</a>',
        'subsection' => true,
        'fields'     => array(

            array(
                'id'       => 'opt-select',
                'type'     => 'select',
                'title'    => __( 'Select Option', 'solar' ),
                'subtitle' => __( 'No validation can be done on this field type', 'solar' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'solar' ),
                //Must provide key => value pairs for select options
                'options'  => array(
                    '1' => 'Opt 1',
                    '2' => 'Opt 2',
                    '3' => 'Opt 3',
                ),
                'default'  => '2'
            ),
            array(
                'id'       => 'opt-select-stylesheet',
                'type'     => 'select',
                'title'    => __( 'Theme Stylesheet', 'solar' ),
                'subtitle' => __( 'Select your themes alternative color scheme.', 'solar' ),
                'options'  => array( 'default.css' => 'default.css', 'color1.css' => 'color1.css' ),
                'default'  => 'default.css',
            ),
            array(
                'id'       => 'opt-select-optgroup',
                'type'     => 'select',
                'title'    => __( 'Select Option with optgroup', 'solar' ),
                'subtitle' => __( 'No validation can be done on this field type', 'solar' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'solar' ),
                //Must provide key => value pairs for select options
                'options'  => array(
                    'Group 1' => array(
                        '1' => 'Opt 1',
                        '2' => 'Opt 2',
                        '3' => 'Opt 3',
                    ),
                    'Group 2' => array(
                        '4' => 'Opt 4',
                        '5' => 'Opt 5',
                        '6' => 'Opt 6',
                    ),
                    '7'       => 'Opt 7',
                    '8'       => 'Opt 8',
                    '9'       => 'Opt 9',
                ),
                'default'  => '2'
            ),
            array(
                'id'       => 'opt-multi-select',
                'type'     => 'select',
                'multi'    => true,
                'title'    => __( 'Multi Select Option', 'solar' ),
                'subtitle' => __( 'No validation can be done on this field type', 'solar' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'solar' ),
                //Must provide key => value pairs for radio options
                'options'  => array(
                    '1' => 'Opt 1',
                    '2' => 'Opt 2',
                    '3' => 'Opt 3'
                ),
                //'required' => array( 'opt-select', 'equals', array( '1', '3' ) ),
                'default'  => array( '2', '3' )
            ),
            array(
                'id'       => 'opt-select-image',
                'type'     => 'select_image',
                'title'    => __( 'Select Image', 'solar' ),
                'subtitle' => __( 'A preview of the selected image will appear underneath the select box.', 'solar' ),
                'options'  => $sample_patterns,
                // Alternatively
                //'options'   => Array(
                //                'img_name' => 'img_path'
                //             )
                'default'  => 'tree_bark.png',
            ),
            array(
                'id'   => 'opt-info',
                'type' => 'info',
                'desc' => __( 'You can easily add a variety of data from WordPress.', 'solar' ),
            ),
            array(
                'id'       => 'opt-select-categories',
                'type'     => 'select',
                'data'     => 'categories',
                'title'    => __( 'Categories Select Option', 'solar' ),
                'subtitle' => __( 'No validation can be done on this field type', 'solar' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'solar' ),
            ),
            array(
                'id'       => 'opt-select-categories-multi',
                'type'     => 'select',
                'data'     => 'categories',
                'multi'    => true,
                'title'    => __( 'Categories Multi Select Option', 'solar' ),
                'subtitle' => __( 'No validation can be done on this field type', 'solar' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'solar' ),
            ),
            array(
                'id'       => 'opt-select-pages',
                'type'     => 'select',
                'data'     => 'pages',
                'title'    => __( 'Pages Select Option', 'solar' ),
                'subtitle' => __( 'No validation can be done on this field type', 'solar' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'solar' ),
            ),
            array(
                'id'       => 'opt-multi-select-pages',
                'type'     => 'select',
                'data'     => 'pages',
                'multi'    => true,
                'title'    => __( 'Pages Multi Select Option', 'solar' ),
                'subtitle' => __( 'No validation can be done on this field type', 'solar' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'solar' ),
            ),
            array(
                'id'       => 'opt-select-tags',
                'type'     => 'select',
                'data'     => 'tags',
                'title'    => __( 'Tags Select Option', 'solar' ),
                'subtitle' => __( 'No validation can be done on this field type', 'solar' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'solar' ),
            ),
            array(
                'id'       => 'opt-multi-select-tags',
                'type'     => 'select',
                'data'     => 'tags',
                'multi'    => true,
                'title'    => __( 'Tags Multi Select Option', 'solar' ),
                'subtitle' => __( 'No validation can be done on this field type', 'solar' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'solar' ),
            ),
            array(
                'id'       => 'opt-select-menus',
                'type'     => 'select',
                'data'     => 'menus',
                'title'    => __( 'Menus Select Option', 'solar' ),
                'subtitle' => __( 'No validation can be done on this field type', 'solar' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'solar' ),
            ),
            array(
                'id'       => 'opt-multi-select-menus',
                'type'     => 'select',
                'data'     => 'menu',
                'multi'    => true,
                'title'    => __( 'Menus Multi Select Option', 'solar' ),
                'subtitle' => __( 'No validation can be done on this field type', 'solar' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'solar' ),
            ),
            array(
                'id'       => 'opt-select-post-type',
                'type'     => 'select',
                'data'     => 'post_type',
                'title'    => __( 'Post Type Select Option', 'solar' ),
                'subtitle' => __( 'No validation can be done on this field type', 'solar' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'solar' ),
            ),
            array(
                'id'       => 'opt-multi-select-post-type',
                'type'     => 'select',
                'data'     => 'post_type',
                'multi'    => true,
                'title'    => __( 'Post Type Multi Select Option', 'solar' ),
                'subtitle' => __( 'No validation can be done on this field type', 'solar' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'solar' ),
            ),
            array(
                'id'       => 'opt-multi-select-sortable',
                'type'     => 'select',
                'data'     => 'post_type',
                'multi'    => true,
                'sortable' => true,
                'title'    => __( 'Post Type Multi Select Option + Sortable', 'solar' ),
                'subtitle' => __( 'This field also has sortable enabled!', 'solar' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'solar' ),
            ),
            array(
                'id'       => 'opt-select-posts',
                'type'     => 'select',
                'data'     => 'post',
                'title'    => __( 'Posts Select Option2', 'solar' ),
                'subtitle' => __( 'No validation can be done on this field type', 'solar' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'solar' ),
            ),
            array(
                'id'       => 'opt-multi-select-posts',
                'type'     => 'select',
                'data'     => 'post',
                'multi'    => true,
                'title'    => __( 'Posts Multi Select Option', 'solar' ),
                'subtitle' => __( 'No validation can be done on this field type', 'solar' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'solar' ),
            ),
            array(
                'id'       => 'opt-select-roles',
                'type'     => 'select',
                'data'     => 'roles',
                'title'    => __( 'User Role Select Option', 'solar' ),
                'subtitle' => __( 'No validation can be done on this field type', 'solar' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'solar' ),
            ),
            array(
                'id'       => 'opt-select-capabilities',
                'type'     => 'select',
                'data'     => 'capabilities',
                'multi'    => true,
                'title'    => __( 'Capabilities Select Option', 'solar' ),
                'subtitle' => __( 'No validation can be done on this field type', 'solar' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'solar' ),
            ),
            array(
                'id'       => 'opt-select-elusive',
                'type'     => 'select',
                'data'     => 'elusive-icons',
                'title'    => __( 'Elusive Icons Select Option', 'solar' ),
                'subtitle' => __( 'No validation can be done on this field type', 'solar' ),
                'desc'     => __( 'Here\'s a list of all the elusive icons by name and icon.', 'solar' ),
            ),
            array(
                'id'       => 'opt-select-users',
                'type'     => 'select',
                'data'     => 'users',
                'title'    => __( 'Users Select Option', 'solar' ),
                'subtitle' => __( 'No validation can be done on this field type', 'solar' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'solar' ),
            ),
        )
    ) );
    Redux::setSection( $opt_name, array(
        'title'      => __( 'Image Select', 'solar' ),
        'id'         => 'select-image_select',
        'desc'       => __( 'For full documentation on this field, visit: ', 'solar' ) . '<a href="//docs.reduxframework.com/core/fields/image-select/" target="_blank">docs.reduxframework.com/core/fields/image-select/</a>',
        'subsection' => true,
        'fields'     => array(

            array(
                'id'       => 'opt-image-select-layout',
                'type'     => 'image_select',
                'title'    => __( 'Images Option for Layout', 'solar' ),
                'subtitle' => __( 'No validation can be done on this field type', 'solar' ),
                'desc'     => __( 'This uses some of the built in images, you can use them for layout options.', 'solar' ),
                //Must provide key => value(array:title|img) pairs for radio options
                'options'  => array(
                    '1' => array(
                        'alt' => '1 Column',
                        'img' => ReduxFramework::$_url . 'assets/img/1col.png'
                    ),
                    '2' => array(
                        'alt' => '2 Column Left',
                        'img' => ReduxFramework::$_url . 'assets/img/2cl.png'
                    ),
                    '3' => array(
                        'alt' => '2 Column Right',
                        'img' => ReduxFramework::$_url . 'assets/img/2cr.png'
                    ),
                    '4' => array(
                        'alt' => '3 Column Middle',
                        'img' => ReduxFramework::$_url . 'assets/img/3cm.png'
                    ),
                    '5' => array(
                        'alt' => '3 Column Left',
                        'img' => ReduxFramework::$_url . 'assets/img/3cl.png'
                    ),
                    '6' => array(
                        'alt' => '3 Column Right',
                        'img' => ReduxFramework::$_url . 'assets/img/3cr.png'
                    )
                ),
                'default'  => '2'
            ),
            array(
                'id'       => 'opt-patterns',
                'type'     => 'image_select',
                'tiles'    => true,
                'title'    => __( 'Images Option (with tiles => true)', 'solar' ),
                'subtitle' => __( 'Select a background pattern.', 'solar' ),
                'default'  => 0,
                'options'  => $sample_patterns
                ,
            ),
            array(
                'id'       => 'opt-image-select',
                'type'     => 'image_select',
                'title'    => __( 'Images Option', 'solar' ),
                'subtitle' => __( 'No validation can be done on this field type', 'solar' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'solar' ),
                //Must provide key => value(array:title|img) pairs for radio options
                'options'  => array(
                    '1' => array( 'title' => 'Opt 1', 'img' => 'images/align-none.png' ),
                    '2' => array( 'title' => 'Opt 2', 'img' => 'images/align-left.png' ),
                    '3' => array( 'title' => 'Opt 3', 'img' => 'images/align-center.png' ),
                    '4' => array( 'title' => 'Opt 4', 'img' => 'images/align-right.png' )
                ),
                'default'  => '2'
            ),
            array(
                'id'         => 'opt-presets',
                'type'       => 'image_select',
                'presets'    => true,
                'full_width' => true,
                'title'      => __( 'Preset', 'solar' ),
                'subtitle'   => __( 'This allows you to set a json string or array to override multiple preferences in your theme.', 'solar' ),
                'default'    => 0,
                'desc'       => __( 'This allows you to set a json string or array to override multiple preferences in your theme.', 'solar' ),
                'options'    => array(
                    '1' => array(
                        'alt'     => 'Preset 1',
                        'img'     => ReduxFramework::$_url . '../sample/presets/preset1.png',
                        'presets' => array(
                            'switch-on'     => 1,
                            'switch-off'    => 1,
                            'switch-parent' => 1
                        )
                    ),
                    '2' => array(
                        'alt'     => 'Preset 2',
                        'img'     => ReduxFramework::$_url . '../sample/presets/preset2.png',
                        'presets' => '{"opt-slider-label":"1", "opt-slider-text":"10"}'
                    ),
                ),
            ),
        )
    ) );
    Redux::setSection( $opt_name, array(
        'title'      => __( 'Select Image', 'solar' ),
        'id'         => 'select-select_image',
        'desc'       => __( 'For full documentation on this field, visit: ', 'solar' ) . '<a href="//docs.reduxframework.com/core/fields/select-image/" target="_blank">docs.reduxframework.com/core/fields/select-image/</a>',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'      => 'opt-select_image',
                'type'    => 'select_image',
                'presets' => true,
                'title'   => __( 'Select Image', 'solar' ),
                'default' => 0,
                'options' => array(
                    '1' => array(
                        'alt' => 'Preset 1',
                        'img' => ReduxFramework::$_url . '../sample/presets/preset1.png',
                    ),
                    '2' => array(
                        'alt' => 'Preset 2',
                        'img' => ReduxFramework::$_url . '../sample/presets/preset2.png',
                    ),
                ),
            ),
        )
    ) );

    // -> START Slider / Spinner
    Redux::setSection( $opt_name, array(
        'title' => __( 'Slider / Spinner', 'solar' ),
        'id'    => 'slider_spinner',
        'desc'  => __( '', 'solar' ),
        'icon'  => 'el el-adjust-alt'
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Slider', 'solar' ),
        'id'         => 'slider_spinner-slider',
        'desc'       => __( 'For full documentation on this field, visit: ', 'solar' ) . '<a href="//docs.reduxframework.com/core/fields/slider/" target="_blank">docs.reduxframework.com/core/fields/slider/</a>',
        'fields'     => array(

            array(
                'id'            => 'opt-slider-label',
                'type'          => 'slider',
                'title'         => __( 'Slider Example 1', 'solar' ),
                'subtitle'      => __( 'This slider displays the value as a label.', 'solar' ),
                'desc'          => __( 'Slider description. Min: 1, max: 500, step: 1, default value: 250', 'solar' ),
                'default'       => 250,
                'min'           => 1,
                'step'          => 1,
                'max'           => 500,
                'display_value' => 'label'
            ),
            array(
                'id'            => 'opt-slider-text',
                'type'          => 'slider',
                'title'         => __( 'Slider Example 2 with Steps (5)', 'solar' ),
                'subtitle'      => __( 'This example displays the value in a text box', 'solar' ),
                'desc'          => __( 'Slider description. Min: 0, max: 300, step: 5, default value: 75', 'solar' ),
                'default'       => 75,
                'min'           => 0,
                'step'          => 5,
                'max'           => 300,
                'display_value' => 'text'
            ),
            array(
                'id'            => 'opt-slider-select',
                'type'          => 'slider',
                'title'         => __( 'Slider Example 3 with two sliders', 'solar' ),
                'subtitle'      => __( 'This example displays the values in select boxes', 'solar' ),
                'desc'          => __( 'Slider description. Min: 0, max: 500, step: 5, slider 1 default value: 100, slider 2 default value: 300', 'solar' ),
                'default'       => array(
                    1 => 100,
                    2 => 300,
                ),
                'min'           => 0,
                'step'          => 5,
                'max'           => '500',
                'display_value' => 'select',
                'handles'       => 2,
            ),
            array(
                'id'            => 'opt-slider-float',
                'type'          => 'slider',
                'title'         => __( 'Slider Example 4 with float values', 'solar' ),
                'subtitle'      => __( 'This example displays float values', 'solar' ),
                'desc'          => __( 'Slider description. Min: 0, max: 1, step: .1, default value: .5', 'solar' ),
                'default'       => .5,
                'min'           => 0,
                'step'          => .1,
                'max'           => 1,
                'resolution'    => 0.1,
                'display_value' => 'text'
            ),

        ),
        'subsection' => true,
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Spinner', 'solar' ),
        'id'         => 'slider_spinner-spinner',
        'desc'       => __( 'For full documentation on this field, visit: ', 'solar' ) . '<a href="//docs.reduxframework.com/core/fields/spinner/" target="_blank">docs.reduxframework.com/core/fields/spinner/</a>',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'      => 'opt-spinner',
                'type'    => 'spinner',
                'title'   => __( 'JQuery UI Spinner Example 1', 'solar' ),
                'desc'    => __( 'JQuery UI spinner description. Min:20, max: 100, step:20, default value: 40', 'solar' ),
                'default' => '40',
                'min'     => '20',
                'step'    => '20',
                'max'     => '100',
            ),
        )
    ) );

    // -> START Typography
    Redux::setSection( $opt_name, array(
        'title'  => __( 'Typography', 'solar' ),
        'id'     => 'typography',
        'desc'   => __( 'For full documentation on this field, visit: ', 'solar' ) . '<a href="//docs.reduxframework.com/core/fields/typography/" target="_blank">docs.reduxframework.com/core/fields/typography/</a>',
        'icon'   => 'el el-font',
        'fields' => array(
            array(
                'id'       => 'opt-typography-body',
                'type'     => 'typography',
                'title'    => __( 'Body Font', 'solar' ),
                'subtitle' => __( 'Specify the body font properties.', 'solar' ),
                'google'   => true,
                'default'  => array(
                    'color'       => '#dd9933',
                    'font-size'   => '30px',
                    'font-family' => 'Arial,Helvetica,sans-serif',
                    'font-weight' => 'Normal',
                ),
            ),
            array(
                'id'          => 'opt-typography',
                'type'        => 'typography',
                'title'       => __( 'Typography h2.site-description', 'solar' ),
                //'compiler'      => true,  // Use if you want to hook in your own CSS compiler
                //'google'      => false,
                // Disable google fonts. Won't work if you haven't defined your google api key
                'font-backup' => true,
                // Select a backup non-google font in addition to a google font
                //'font-style'    => false, // Includes font-style and weight. Can use font-style or font-weight to declare
                //'subsets'       => false, // Only appears if google is true and subsets not set to false
                //'font-size'     => false,
                //'line-height'   => false,
                //'word-spacing'  => true,  // Defaults to false
                //'letter-spacing'=> true,  // Defaults to false
                //'color'         => false,
                //'preview'       => false, // Disable the previewer
                'all_styles'  => true,
                // Enable all Google Font style/weight variations to be added to the page
                'output'      => array( 'h2.site-description, .entry-title' ),
                // An array of CSS selectors to apply this font style to dynamically
                'compiler'    => array( 'h2.site-description-compiler' ),
                // An array of CSS selectors to apply this font style to dynamically
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => __( 'Typography option with each property can be called individually.', 'solar' ),
                'default'     => array(
                    'color'       => '#333',
                    'font-style'  => '700',
                    'font-family' => 'Abel',
                    'google'      => true,
                    'font-size'   => '33px',
                    'line-height' => '40px'
                ),
            ),
        )
    ) );

    // -> START Additional Types
    Redux::setSection( $opt_name, array(
        'title' => __( 'Additional Types', 'solar' ),
        'id'    => 'additional',
        'desc'  => __( '', 'solar' ),
        'icon'  => 'el el-magic',
        //'fields' => array(
        //    array(
        //        'id'              => 'opt-customizer-only-in-section',
        //        'type'            => 'select',
        //        'title'           => __( 'Customizer Only Option', 'solar' ),
        //        'subtitle'        => __( 'The subtitle is NOT visible in customizer', 'solar' ),
        //        'desc'            => __( 'The field desc is NOT visible in customizer.', 'solar' ),
        //        'customizer_only' => true,
        //        //Must provide key => value pairs for select options
        //        'options'         => array(
        //            '1' => 'Opt 1',
        //            '2' => 'Opt 2',
        //            '3' => 'Opt 3'
        //        ),
        //        'default'         => '2'
        //    ),
        //)
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Date', 'solar' ),
        'id'         => 'additional-date',
        'desc'       => __( 'For full documentation on this field, visit: ', 'solar' ) . '<a href="//docs.reduxframework.com/core/fields/date/" target="_blank">docs.reduxframework.com/core/fields/date/</a>',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'opt-datepicker',
                'type'     => 'date',
                'title'    => __( 'Date Option', 'solar' ),
                'subtitle' => __( 'No validation can be done on this field type', 'solar' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'solar' )
            ),
        ),
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Sorter', 'solar' ),
        'id'         => 'additional-sorter',
        'desc'       => __( 'For full documentation on this field, visit: ', 'solar' ) . '<a href="//docs.reduxframework.com/core/fields/sorter/" target="_blank">docs.reduxframework.com/core/fields/sorter/</a>',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'opt-homepage-layout',
                'type'     => 'sorter',
                'title'    => 'Layout Manager Advanced',
                'subtitle' => 'You can add multiple drop areas or columns.',
                'compiler' => 'true',
                'options'  => array(
                    'enabled'  => array(
                        'highlights' => 'Highlights',
                        'slider'     => 'Slider',
                        'staticpage' => 'Static Page',
                        'services'   => 'Services'
                    ),
                    'disabled' => array(),
                    'backup'   => array(),
                ),
                'limits'   => array(
                    'disabled' => 1,
                    'backup'   => 2,
                ),
            ),
            array(
                'id'       => 'opt-homepage-layout-2',
                'type'     => 'sorter',
                'title'    => 'Homepage Layout Manager',
                'desc'     => 'Organize how you want the layout to appear on the homepage',
                'compiler' => 'true',
                'options'  => array(
                    'disabled' => array(
                        'highlights' => 'Highlights',
                        'slider'     => 'Slider',
                    ),
                    'enabled'  => array(
                        'staticpage' => 'Static Page',
                        'services'   => 'Services'
                    ),
                ),
            ),
        )

    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Raw', 'solar' ),
        'id'         => 'additional-raw',
        'desc'       => __( 'For full documentation on this field, visit: ', 'solar' ) . '<a href="//docs.reduxframework.com/core/fields/raw/" target="_blank">docs.reduxframework.com/core/fields/raw/</a>',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'opt-raw_info_4',
                'type'     => 'raw',
                'title'    => __( 'Standard Raw Field', 'solar' ),
                'subtitle' => __( 'Subtitle', 'solar' ),
                'desc'     => __( 'Description', 'solar' ),
                'content'  => $sampleHTML,
            ),
            array(
                'id'         => 'opt-raw_info_5',
                'type'       => 'raw',
                'full_width' => false,
                'title'      => __( 'Raw Field <code>full_width</code> False', 'solar' ),
                'subtitle'   => __( 'Subtitle', 'solar' ),
                'desc'       => __( 'Description', 'solar' ),
                'content'    => $sampleHTML,
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title' => __( 'Advanced Features', 'solar' ),
        'icon'  => 'el el-thumbs-up',
        // 'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Callback', 'solar' ),
        'id'         => 'additional-callback',
        'desc'       => __( 'For full documentation on this field, visit: ', 'solar' ) . '<a href="//docs.reduxframework.com/core/fields/callback/" target="_blank">docs.reduxframework.com/core/fields/callback/</a>',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'opt-custom-callback',
                'type'     => 'callback',
                'title'    => __( 'Custom Field Callback', 'solar' ),
                'subtitle' => __( 'This is a completely unique field type', 'solar' ),
                'desc'     => __( 'This is created with a callback function, so anything goes in this field. Make sure to define the function though.', 'solar' ),
                'callback' => 'redux_my_custom_field'
            ),
        )
    ) );

    // -> START Validation
    Redux::setSection( $opt_name, array(
        'title'      => __( 'Field Validation', 'solar' ),
        'id'         => 'validation',
        'desc'       => __( 'For full documentation on validation, visit: ', 'solar' ) . '<a href="//docs.reduxframework.com/core/the-basics/validation/" target="_blank">docs.reduxframework.com/core/the-basics/validation/</a>',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'opt-text-email',
                'type'     => 'text',
                'title'    => __( 'Text Option - Email Validated', 'solar' ),
                'subtitle' => __( 'This is a little space under the Field Title in the Options table, additional info is good in here.', 'solar' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'solar' ),
                'validate' => 'email',
                'msg'      => 'custom error message',
                'default'  => 'test@test.com',
            ),
            array(
                'id'       => 'opt-text-post-type',
                'type'     => 'text',
                'title'    => __( 'Text Option with Data Attributes', 'solar' ),
                'subtitle' => __( 'You can also pass an options array if you want. Set the default to whatever you like.', 'solar' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'solar' ),
                'data'     => 'post_type',
            ),
            array(
                'id'       => 'opt-multi-text',
                'type'     => 'multi_text',
                'title'    => __( 'Multi Text Option - Color Validated', 'solar' ),
                'validate' => 'color',
                'subtitle' => __( 'If you enter an invalid color it will be removed. Try using the text "blue" as a color.  ;)', 'solar' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'solar' )
            ),
            array(
                'id'       => 'opt-text-url',
                'type'     => 'text',
                'title'    => __( 'Text Option - URL Validated', 'solar' ),
                'subtitle' => __( 'This must be a URL.', 'solar' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'solar' ),
                'validate' => 'url',
                'default'  => 'http://reduxframework.com',
            ),
            array(
                'id'       => 'opt-text-numeric',
                'type'     => 'text',
                'title'    => __( 'Text Option - Numeric Validated', 'solar' ),
                'subtitle' => __( 'This must be numeric.', 'solar' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'solar' ),
                'validate' => 'numeric',
                'default'  => '0',
            ),
            array(
                'id'       => 'opt-text-comma-numeric',
                'type'     => 'text',
                'title'    => __( 'Text Option - Comma Numeric Validated', 'solar' ),
                'subtitle' => __( 'This must be a comma separated string of numerical values.', 'solar' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'solar' ),
                'validate' => 'comma_numeric',
                'default'  => '0',
            ),
            array(
                'id'       => 'opt-text-no-special-chars',
                'type'     => 'text',
                'title'    => __( 'Text Option - No Special Chars Validated', 'solar' ),
                'subtitle' => __( 'This must be a alpha numeric only.', 'solar' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'solar' ),
                'validate' => 'no_special_chars',
                'default'  => '0'
            ),
            array(
                'id'       => 'opt-text-str_replace',
                'type'     => 'text',
                'title'    => __( 'Text Option - Str Replace Validated', 'solar' ),
                'subtitle' => __( 'You decide.', 'solar' ),
                'desc'     => __( 'This field\'s default value was changed by a filter hook!', 'solar' ),
                'validate' => 'str_replace',
                'str'      => array(
                    'search'      => ' ',
                    'replacement' => 'thisisaspace'
                ),
                'default'  => 'This is the default.'
            ),
            array(
                'id'       => 'opt-text-preg_replace',
                'type'     => 'text',
                'title'    => __( 'Text Option - Preg Replace Validated', 'solar' ),
                'subtitle' => __( 'You decide.', 'solar' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'solar' ),
                'validate' => 'preg_replace',
                'preg'     => array(
                    'pattern'     => '/[^a-zA-Z_ -]/s',
                    'replacement' => 'no numbers'
                ),
                'default'  => '0'
            ),
            array(
                'id'                => 'opt-text-custom_validate',
                'type'              => 'text',
                'title'             => __( 'Text Option - Custom Callback Validated', 'solar' ),
                'subtitle'          => __( 'You decide.', 'solar' ),
                'desc'              => __( 'Enter <code>1</code> and click <strong>Save Changes</strong> for an error message, or enter <code>2</code> and click <strong>Save Changes</strong> for a warning message.', 'solar' ),
                'validate_callback' => 'redux_validate_callback_function',
                'default'           => '0'
            ),
            //array(
            //    'id'                => 'opt-text-custom_validate-class',
            //    'type'              => 'text',
            //    'title'             => __( 'Text Option - Custom Callback Validated - Class', 'solar' ),
            //    'subtitle'          => __( 'You decide.', 'solar' ),
            //    'desc'              => __( 'This is the description field, again good for additional info.', 'solar' ),
            //    'validate_callback' => array( 'Class_Name', 'validate_callback_function' ),
            //    // You can pass the current class
            //    // Or pass the class name and method
            //    //'validate_callback' => array(
            //    //    'Redux_Framework_sample_config',
            //    //    'validate_callback_function'
            //    //),
            //    'default'           => '0'
            //),
            array(
                'id'       => 'opt-textarea-no-html',
                'type'     => 'textarea',
                'title'    => __( 'Textarea Option - No HTML Validated', 'solar' ),
                'subtitle' => __( 'All HTML will be stripped', 'solar' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'solar' ),
                'validate' => 'no_html',
                'default'  => 'No HTML is allowed in here.'
            ),
            array(
                'id'       => 'opt-textarea-html',
                'type'     => 'textarea',
                'title'    => __( 'Textarea Option - HTML Validated', 'solar' ),
                'subtitle' => __( 'HTML Allowed (wp_kses)', 'solar' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'solar' ),
                'validate' => 'html', //see http://codex.wordpress.org/Function_Reference/wp_kses_post
                'default'  => 'HTML is allowed in here.'
            ),
            array(
                'id'           => 'opt-textarea-some-html',
                'type'         => 'textarea',
                'title'        => __( 'Textarea Option - HTML Validated Custom', 'solar' ),
                'subtitle'     => __( 'Custom HTML Allowed (wp_kses)', 'solar' ),
                'desc'         => __( 'This is the description field, again good for additional info.', 'solar' ),
                'validate'     => 'html_custom',
                'default'      => '<p>Some HTML is allowed in here.</p>',
                'allowed_html' => array(
                    'a'      => array(
                        'href'  => array(),
                        'title' => array()
                    ),
                    'br'     => array(),
                    'em'     => array(),
                    'strong' => array()
                ) //see http://codex.wordpress.org/Function_Reference/wp_kses
            ),
            array(
                'id'       => 'opt-textarea-js',
                'type'     => 'textarea',
                'title'    => __( 'Textarea Option - JS Validated', 'solar' ),
                'subtitle' => __( 'JS will be escaped', 'solar' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'solar' ),
                'validate' => 'js'
            ),
        )
    ) );

    // -> START Required
    Redux::setSection( $opt_name, array(
        'title'      => __( 'Field Required / Linking', 'solar' ),
        'id'         => 'required',
        'desc'       => __( 'For full documentation on validation, visit: ', 'solar' ) . '<a href="//docs.reduxframework.com/core/the-basics/required/" target="_blank">docs.reduxframework.com/core/the-basics/required/</a>',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'opt-required-basic',
                'type'     => 'switch',
                'title'    => 'Basic Required Example',
                'subtitle' => 'Click <code>On</code> to see the text field appear.',
                'default'  => false
            ),
            array(
                'id'       => 'opt-required-basic-text',
                'type'     => 'text',
                'title'    => 'Basic Text Field',
                'subtitle' => 'This text field is only show when the above switch is set to <code>On</code>, using the <code>required</code> argument.',
                'required' => array( 'opt-required-basic', '=', true )
            ),
            array(
                'id'   => 'opt-required-divide-1',
                'type' => 'divide'
            ),
            array(
                'id'       => 'opt-required-nested',
                'type'     => 'switch',
                'title'    => 'Nested Required Example',
                'subtitle' => 'Click <code>On</code> to see another set of options appear.',
                'default'  => false
            ),
            array(
                'id'       => 'opt-required-nested-buttonset',
                'type'     => 'button_set',
                'title'    => 'Multiple Nested Required Examples',
                'subtitle' => 'Click any buton to show different fields based on their <code>required</code> statements.',
                'options'  => array(
                    'button-text'     => 'Show Text Field',
                    'button-textarea' => 'Show Textarea Field',
                    'button-editor'   => 'Show WP Editor',
                    'button-ace'      => 'Show ACE Editor'
                ),
                'required' => array( 'opt-required-nested', '=', true ),
                'default'  => 'button-text'
            ),
            array(
                'id'       => 'opt-required-nested-text',
                'type'     => 'text',
                'title'    => 'Nested Text Field',
                'required' => array( 'opt-required-nested-buttonset', '=', 'button-text' )
            ),
            array(
                'id'       => 'opt-required-nested-textarea',
                'type'     => 'textarea',
                'title'    => 'Nested Textarea Field',
                'required' => array( 'opt-required-nested-buttonset', '=', 'button-textarea' )
            ),
            array(
                'id'       => 'opt-required-nested-editor',
                'type'     => 'editor',
                'title'    => 'Nested Editor Field',
                'required' => array( 'opt-required-nested-buttonset', '=', 'button-editor' )
            ),
            array(
                'id'       => 'opt-required-nested-ace',
                'type'     => 'ace_editor',
                'title'    => 'Nested ACE Editor Field',
                'required' => array( 'opt-required-nested-buttonset', '=', 'button-ace' )
            ),
            array(
                'id'   => 'opt-required-divide-2',
                'type' => 'divide'
            ),
            array(
                'id'       => 'opt-required-select',
                'type'     => 'select',
                'title'    => 'Select Required Example',
                'subtitle' => 'Select a different option to display its value.  Required may be used to display multiple & reusable fields',
                'options'  => array(
                    'no-sidebar'    => 'No Sidebars',
                    'left-sidebar'  => 'Left Sidebar',
                    'right-sidebar' => 'Right Sidebar',
                    'both-sidebars' => 'Both Sidebars'
                ),
                'default'  => 'no-sidebar',
                'select2'  => array( 'allowClear' => false )
            ),
            array(
                'id'       => 'opt-required-select-left-sidebar',
                'type'     => 'select',
                'title'    => 'Select Left Sidebar',
                'data'     => 'sidebars',
                'default'  => '',
                'required' => array( 'opt-required-select', '=', array( 'left-sidebar', 'both-sidebars' ) )
            ),
            array(
                'id'       => 'opt-required-select-right-sidebar',
                'type'     => 'select',
                'title'    => 'Select Right Sidebar',
                'data'     => 'sidebars',
                'default'  => '',
                'required' => array( 'opt-required-select', '=', array( 'right-sidebar', 'both-sidebars' ) )
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'WPML Integration', 'solar' ),
        'desc'       => __( 'These fields can be fully translated by WPML (WordPress Multi-Language). This serves as an example for you to implement. For extra details look at our <a href="//docs.reduxframework.com/core/advanced/wpml-integration/" target="_blank">WPML Implementation</a> documentation.', 'solar' ),
        'subsection' => true,
        // 'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
        'fields'     => array(
            array(
                'id'    => 'wpml-text',
                'type'  => 'textarea',
                'title' => __( 'WPML Text', 'solar' ),
                'desc'  => __( 'This string can be translated via WPML.', 'solar' ),
            ),
            array(
                'id'      => 'wpml-multicheck',
                'type'    => 'checkbox',
                'title'   => __( 'WPML Multi Checkbox', 'solar' ),
                'desc'    => __( 'You can literally translate the values via key.', 'solar' ),
                //Must provide key => value pairs for multi checkbox options
                'options' => array(
                    '1' => 'Option 1',
                    '2' => 'Option 2',
                    '3' => 'Option 3'
                ),
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'icon'            => 'el el-list-alt',
        'title'           => __( 'Customizer Only', 'solar' ),
        'desc'            => __( '<p class="description">This Section should be visible only in Customizer</p>', 'solar' ),
        'customizer_only' => true,
        'fields'          => array(
            array(
                'id'              => 'opt-customizer-only',
                'type'            => 'select',
                'title'           => __( 'Customizer Only Option', 'solar' ),
                'subtitle'        => __( 'The subtitle is NOT visible in customizer', 'solar' ),
                'desc'            => __( 'The field desc is NOT visible in customizer.', 'solar' ),
                'customizer_only' => true,
                //Must provide key => value pairs for select options
                'options'         => array(
                    '1' => 'Opt 1',
                    '2' => 'Opt 2',
                    '3' => 'Opt 3'
                ),
                'default'         => '2'
            ),
        )
    ) );
?>