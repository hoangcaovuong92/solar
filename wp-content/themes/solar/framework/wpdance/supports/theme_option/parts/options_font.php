<?php 
Redux::setSection( $opt_name, array(
    'title'            => __( 'Font Settings', 'laparis' ),
    'id'               => 'tvlgiao_wpdance_font_setting',
    'desc'             => __( '', 'laparis' ),
    'customizer_width' => '400px',
    'icon'             => 'el el-font'
) );

//Font Settings
$objXML_font        = simplexml_load_file(TVLGIAO_WPDANCE_THEME_WPDANCE."/config_xml/".$xml_font_file.".xml");

$i = 1;
foreach ($objXML_font->children() as $child) {                  //items_setting => general
    $title          = (string)$child->title;
    $section        = (string)$child->section;
    $description    = (string)$child->description;

    $font_field_array = array();
    foreach ($child->items->children() as $childofchild) {          //items => item
        $name           =  (string)$childofchild->name;                 //name
        $slug           =  (string)$childofchild->slug;                     //slug
        $std            =  (string)$childofchild->std;
        $description    =  (string)$childofchild->description;                  //std
        
        $font_field_array[] = array(
            'id'       => $slug,
            'type'     => 'typography',
            'title'    => $name,
            'subtitle' => $description,
            'google'   => true,
            'font-weight'   => false,
            'color'         => false,
            'text-align'    => false,
            'line-height'   => false,
            'font-style'    => false,
            'font-size'     => false,
            'subsets'       => false,
            'default'  => array(
                'color'       => '#dd9933',
                'font-size'   => '30px',
                'font-family' =>  $std,
                'font-weight' => 'Normal',
            ),
        );
    }

    Redux::setSection( $opt_name, array(
        'title'            => $title,
        'id'               => 'tvlgiao_wpdance_font_setting_'.$i,
        'subsection'       => true,
        'customizer_width' => '450px',
        'desc'             => $description,
        'fields'           => $font_field_array
    ) );

    $i ++;
}
?>