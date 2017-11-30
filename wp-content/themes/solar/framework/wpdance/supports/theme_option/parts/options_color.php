<?php 
Redux::setSection( $opt_name, array(
    'title'            => __( 'Color Settings', 'laparis' ),
    'id'               => 'tvlgiao_wpdance_color_setting',
    'desc'             => __( '', 'laparis' ),
    'customizer_width' => '400px',
    'icon'             => 'el el-magic'
) );

/*Redux::setSection( $opt_name, array(
    'title'            => __( 'Primary Color', 'laparis' ),
    'id'               => 'tvlgiao_wpdance_color_setting_primary_color',
    'subsection'       => true,
    'customizer_width' => '450px',
    'desc'             => __( '', 'laparis' ),
    'fields'           => array(
        array(
            'id'       => 'tvlgiao_wpdance_color_setting_primary_color_select',
            'type'     => 'image_select',
            'title'    => __( 'Select Primary Color', 'laparis' ),
            'subtitle' => __( 'If change it, you need to SAVE before customizing the items below', 'laparis' ),
            'desc'     => __( '', 'laparis' ),
            'options'  => array(
                'color_default' => array(
                    'alt' => 'Color Default',
                    'img' => TVLGIAO_WPDANCE_THEME_IMAGES . '/styling/color_default.png'
                ),
            ),
            'default'  => 'color_default'
        ),
    )
) );*/

//Color Settings
$objXML_color       = simplexml_load_file(TVLGIAO_WPDANCE_THEME_WPDANCE."/config_xml/".$xml_color_file.".xml");

$i = 1;
foreach ($objXML_color->children() as $child) {                 //items_setting => general
    $title          = (string)$child->title;
    $section        = (string)$child->section;
    $description    = (string)$child->description;

    $color_field_array = array();
    foreach ($child->items->children() as $childofchild) {      //items => item
        $name   =  (string)$childofchild->name;                 //name
        $slug   =  (string)$childofchild->slug;                 //slug
        $std    =  (string)$childofchild->std;                  //std

        $color_field_array[] = array(
            'id'            => $slug,
            'type'          => 'color',
            'transparent'   => false,
            'title'         => $name,
            'subtitle'      => __( '', 'laparis' ),
            'default'       => $std,
        );
    }

    Redux::setSection( $opt_name, array(
        'title'            => $title,
        'id'               => 'tvlgiao_wpdance_color_setting_'.$i,
        'subsection'       => true,
        'customizer_width' => '450px',
        'desc'             => $description,
        'fields'           => $color_field_array
    ) );

    $i ++;
}
?>