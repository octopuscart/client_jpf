<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require(APPPATH . 'libraries/REST_Controller.php');

class CustomApi extends REST_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Product_model');
        $this->load->library('session');
        $this->checklogin = $this->session->userdata('logged_in');
        $this->user_id = $this->session->userdata('logged_in')['login_id'];
    }

    //shirt Implemantation
    function cartOperationSingle_get($product_id, $custom_id) {
        $prodct_details = $this->Product_model->productDetails($product_id, $custom_id);
        $prodct_details['product_id'] = $prodct_details['id'];
        $this->response($prodct_details);
    }

    function customeElements_get() {
        $customeele = array(
            "keys" => [
                array(
                    "title" => "Collar",
                    "viewtype" => "front",
                    "type" => "main",
                ),
                array(
                    "title" => "Collar Insert",
                    "viewtype" => "front",
                    "type" => "submain",
                ),
                array(
                    "title" => "Cuff & Sleeve",
                    "viewtype" => "front",
                    "type" => "main",
                ),
                array(
                    "title" => "Cuff Insert",
                    "viewtype" => "front",
                    "type" => "submain",
                ),
                array(
                    "title" => "Front",
                    "viewtype" => "front",
                    "type" => "main",
                ),
                array(
                    "title" => "Back",
                    "viewtype" => "back",
                    "type" => "main",
                ),
                array(
                    "title" => "Pocket",
                    "viewtype" => "front",
                    "type" => "main",
                ),
                array(
                    "title" => "Bottom",
                    "viewtype" => "front",
                    "type" => "main",
                ),
//                array(
//                    "title" => "Buttons",
//                    "viewtype" => "front",
//                    "type" => "main",
//                ),
                array(
                    "title" => "Monogram",
                    "viewtype" => "front",
                    "type" => "main",
                ),
            ],
            "collar_cuff_insert" => array(),
            "data" => array(
                "Monogram" => [
                    array(
                        "status" => "1",
                        "title" => "No",
                        "css_class" => "monogramtext_posistion_none",
                        "not_show_when" => [],
                        "checkwith" => "",
                        "image" => "no_monogram.jpg"
                    ),
                    array(
                        "status" => "0",
                        "title" => "Collar",
                        "css_class" => "monogramtext_posistion_collar",
                        "not_show_when" => [],
                        "image" => "monogram_inside_coller_band.jpg"
                    ),
                    array(
                        "status" => "0",
                        "title" => "Cuff",
                        "css_class" => "monogramtext_posistion_cuff_left",
                        "not_show_when" => ["Short Sleeve Without Cuff", "Short Sleeve With Cuff"],
                        "checkwith" => "Cuff & Sleeve",
                        "image" => "monogram_left_cuff.jpg"
                    ),
                    array(
                        "status" => "0",
                        "title" => "Pocket",
                        "css_class" => "monogramtext_posistion_left_pocket",
                        "not_show_when" => ["No Pocket"],
                        "checkwith" => "Pocket",
                        "image" => "monogram_left_chest_pocket.jpg"
                    )],
                "Buttons" => [
                    array(
                        "status" => "1",
                        "title" => "Standard",
                        "customization_category_id" => "8",
                    ), array(
                        "status" => "0",
                        "title" => "Matching",
                        "customization_category_id" => "8",
                    )],
                "Bottom" => [
                    array(
                        "status" => "1",
                        "title" => "Rounded",
                        "elements" => ["flyfrontsingle.png", "bottom_round.png",],
                        "backelements" => ["bottom_round.png",],
                        "customization_category_id" => "6",
                        "image" => "bottom_rounded.jpeg"
                    ), array(
                        "status" => "0",
                        "title" => "Squared",
                        "elements" => ["flyfrontsingle.png", "bottom_squre.png"],
                        "backelements" => ["bottom_squre.png"],
                        "customization_category_id" => "6",
                        "image" => "bottom_squred.jpeg"
                    )],
                "Cuff & Sleeve" => [
                    array(
                        "status" => "0",
                        "title" => "Short Sleeve",
                        "elements" => ["half_sleeve.png"],
                        "customization_category_id" => "3",
                        "image" => "withoutcuff_sort.jpg",
                        "sleeve1" => ["half_sleeve.png",],
                        "sleeve" => ["half_sleeve.png",],
                        "monogram_change_css" => "monogramtext_posistion_collar",
                        "monogram_position" => array(
                            "status" => "0",
                            "title" => "Collar",
                            "css_class" => "monogramtext_posistion_collar",
                        ),
                    ), array(
                        "status" => "1",
                        "title" => "Single Cuff Rounded",
                        "elements" => [ "cuff_rounded.png"],
                        "insertele" => [ "cuff_m_rounded30001.png"],
                        "inserteleo" => [ "cuff_m_rounded30001.png"],
                        "customization_category_id" => "3",
                        "image" => "cuff_single_rounded.jpg",
                        "sleeve1" => ["full_sleeve.png"],
                        "insert_style_css" => "",
                        "insert_style" => "cuff_m_rounded20001.png",
                        "insert_overlay" => "cuff_single_insert_overlay.png",
                        "insert_overlay_css" => "",
                        "insert_full" => ["cuff_single_rounded0001.png"],
                        "sleeve" => ["full_sleeve.png", "back_cuff.png"],
                        "buttons" => "cuff_button_1.png",
                    ), array(
                        "status" => "0",
                        "title" => "Single Cuff Cutaway",
                        "elements" => [ "cuff_cutaway.png"],
                        "insertele" => [ "cuff_m_cutaway30001.png"],
                        "inserteleo" => [ "cuff_m_cutaway30001.png"],
                        "customization_category_id" => "3",
                        "image" => "single_cuff_cutaway.jpg",
                        "insert_style_css" => "",
                        "sleeve1" => ["full_sleeve.png"],
                        "insert_style" => "cuff_m_cutaway20001.png",
                        "insert_overlay" => "cuff_single_insert_overlay.png",
                        "insert_overlay_css" => "",
                        "insert_full" => ["cuff_single_cutaway0001.png"],
                        "sleeve" => ["full_sleeve.png", "back_cuff.png"],
                        "buttons" => "cuff_button_1.png",
                    ), array(
                        "status" => "0",
                        "title" => "2 Buttons Cutaway",
                        "customization_category_id" => "3",
                        "sleeve1" => ["full_sleeve.png"],
                        "elements" => [ "cuff_cutaway.png"],
                        "insertele" => [ "cuff_m_cutaway30001.png"],
                        "inserteleo" => [ "cuff_m_cutaway30001.png"],
                        "image" => "2_buttons_cutaway.jpg",
                        "insert_style_css" => "",
                        "insert_style" => "cuff_m_cutaway20001.png",
                        "insert_overlay" => "cuff_single_insert_overlay.png",
                        "insert_overlay_css" => "",
                        "insert_full" => ["cuff_single_cutaway0001.png"],
                        "sleeve" => ["full_sleeve.png", "back_cuff.png"],
                        "buttons" => "cuff_button_2.png",
                    ), array(
                        "status" => "0",
                        "title" => "2 Buttons Rounded",
                        "sleeve1" => ["full_sleeve.png"],
                        "elements" => [ "cuff_rounded.png"],
                        "insertele" => [ "cuff_m_rounded30001.png"],
                        "inserteleo" => [ "cuff_m_rounded30001.png"],
                        "customization_category_id" => "3",
                        "image" => "2_buttons_rounded.jpg",
                        "insert_style_css" => "",
                        "insert_style" => "cuff_m_rounded20001.png",
                        "insert_overlay" => "cuff_single_insert_overlay.png",
                        "insert_overlay_css" => "",
                        "insert_full" => ["cuff_single_rounded0001.png"],
                        "sleeve" => ["full_sleeve.png", "back_cuff.png"],
                        "buttons" => "cuff_button_2.png",
                    ), array(
                        "status" => "0",
                        "title" => "French Cuff Squared",
                        "sleeve1" => ["full_sleeve.png"],
                        "customization_category_id" => "3",
                        "elements" => [ "cuff_franch_squre.png",],
                        "insertele" => [ "cuff_m_franch_squre0001.png"],
                        "inserteleo" => [ "cuff_m_franch_squre0001.png"],
                        "image" => "cuff_france_squred.jpg",
                        "insert_style_css" => "",
                        "insert_style" => "cuff_m_franch_squre_insert0001.png",
                        "insert_overlay" => "cuff_franch_insert_overlay.png",
                        "insert_overlay_css" => "",
                        "insert_full" => ["cuff_franch_rounded0001.png"],
                        "buttons" => "cuff_button_f.png",
                        "sleeve" => ["full_sleeve.png", "back_cuff.png"],
                    )
                    , array(
                        "status" => "0",
                        "title" => "French Cuff Cutaway",
                        "sleeve1" => ["full_sleeve.png"],
                        "customization_category_id" => "3",
                        "elements" => [ "cuff_franch_cutaway.png"],
                        "insertele" => [],
                        "inserteleo" => [ "cuff_m_franch_squre0001.png"],
                        "image" => "cufffranchcuffcutaway.jpeg",
                        "insert_style_css" => "",
                        "insert_style" => "",
                        "insert_overlay" => "cuff_franch_insert_overlay.png",
                        "insert_overlay_css" => "",
                        "insert_full" => ["cuff_franch_rounded0001.png"],
                        "buttons" => "cuff_button_f.png",
                        "sleeve" => ["full_sleeve.png", "back_cuff.png"],
                    ),
                    array(
                        "status" => "0",
                        "title" => "Convertible Cuff Cutaway",
                        "elements" => [ "cuff_cutaway.png", "cuff_convertible_button.png"],
                        "insertele" => [ "cuff_m_cutaway30001.png"],
                        "inserteleo" => [ "cuff_m_cutaway30001.png"],
                        "customization_category_id" => "3",
                        "image" => "single_cuff_cutaway.jpg",
                        "insert_style_css" => "",
                        "sleeve1" => ["full_sleeve.png"],
                        "insert_style" => "cuff_m_cutaway20001.png",
                        "insert_overlay" => "cuff_single_insert_overlay.png",
                        "insert_overlay_css" => "",
                        "insert_full" => ["cuff_single_cutaway0001.png"],
                        "sleeve" => ["full_sleeve.png", "back_cuff.png"],
                        "buttons" => "cuff_button_1.png",
                    )
                ],
                "Back" => [
                    array(
                        "status" => "1",
                        "title" => "Plain",
                        "customization_category_id" => "5",
                        "halfsleeve" => ["back_half_sleeve0001.png", "back_half_sleeve_cuff0001.png"],
                        "fullsleeve" => ["b_full_shirt_sleeve0001.png",],
                        "elements" => [],
                        "overlay" => "",
                        "image" => "back_plain.jpeg"
                    ), array(
                        "status" => "0",
                        "title" => "Two Side",
                        "customization_category_id" => "5",
                        "halfsleeve" => ["back_half_sleeve0001.png", "back_half_sleeve_cuff0001.png"],
                        "fullsleeve" => ["b_full_shirt_sleeve0001.png", "b_full_shirt_sleeve0001.png",],
                        "overlay" => "back_two_side_plea_over_lay.png",
                        "elements" => ["back_sidepleat.png",],
                        "image" => "back_two_side.jpeg"
                    ), array(
                        "status" => "0",
                        "title" => "Boxpleat",
                        "customization_category_id" => "5",
                        "halfsleeve" => ["back_half_sleeve0001.png", "back_half_sleeve_cuff0001.png"],
                        "fullsleeve" => ["b_full_shirt_sleeve0001.png", "back_full_sleeve_cuff0001.png"],
                        "overlay" => "box_pleat_overlay1.png",
                        "elements" => ["back_boxpleat.png",],
                        "image" => "back_box_pleat.jpeg"
                    ), array(
                        "status" => "0",
                        "title" => "Dart",
                        "customization_category_id" => "5",
                        "halfsleeve" => ["back_half_sleeve0001.png", "back_half_sleeve_cuff0001.png"],
                        "fullsleeve" => ["b_full_shirt_sleeve0001.png", "back_full_sleeve_cuff0001.png"],
                        "overlay" => "dart_overlay1.png",
                        "elements" => ["back_dart.png",],
                        "image" => "dart.jpeg"
                    )],
                "Pocket" => [
                    array(
                        "status" => "0",
                        "title" => "No Pocket",
                        "customization_category_id" => "7",
                        "elements" => [],
                        "image" => "pocket_no.jpeg",
                        "monogram_change_css" => "monogramtext_posistion_collar",
                        "monogram_position" => array(
                            "status" => "0",
                            "title" => "Collar",
                            "css_class" => "monogramtext_posistion_collar",
                        ),
                    ), array(
                        "status" => "1",
                        "title" => "1 Pocket",
                        "customization_category_id" => "7",
                        "elements" => ["pocketr.png",],
                        "image" => "pocket_one.jpeg"
                    ), array(
                        "status" => "0",
                        "title" => "2 Pocket",
                        "customization_category_id" => "7",
                        "elements" => ["pocketr.png", "pocketl.png"],
                        "image" => "pocket_two.jpeg"
                    )],
                "Front" => [
                    array(
                        "status" => "0",
                        "title" => "Plain Front",
                        "customization_category_id" => "4",
                        "elements" => [],
                        "image" => "front_plain.jpeg",
                        "show_buttons" => "true",
                    ), array(
                        "status" => "0",
                        "title" => "Fly Front",
                        "elements" => [ "flyfront.png"],
                        "customization_category_id" => "4",
                        "image" => "front_fly.jpeg",
                        "show_buttons" => "false",
                    )
                    , array(
                        "status" => "1",
                        "title" => "Pleated",
                        "elements" => [ "flyfront.png"],
                        "customization_category_id" => "4",
                        "image" => "front_ivy.jpeg",
                        "show_buttons" => "true",
                    )
                ],
                "Collar" => [
                    array(
                        "status" => "1",
                        "title" => "Regular",
                        "elements" => [ "collar_ragular.png"],
                        "customization_category_id" => "2",
                        "insert_style" => "collar_m_comman_insert20001.png",
                        "insert_overlay" => "collar_simple_insert_overlay.png",
                        "insert_full" => ["collar_m_regular20001.png"],
                        "image" => "../shirt_elements/collar/ragular.png",
                        "buttons" => "buttonsh1.png",
                        "monogram_style" => "    margin-top: 6px;margin-left: -3px;"
                    ), array(
                        "status" => "0",
                        "title" => "Medium Spread",
                        "customization_category_id" => "2",
                        "insert_style" => "collar_m_comman_insert20001.png",
                        "insert_overlay" => "collar_simple_insert_overlay.png",
                        "elements" => [ "collar_mediumespread.png"],
                        "insert_full" => ["collar_m_medium_spread20001.png"],
                        "image" => "../shirt_elements/collar/mediamspread.png",
                        "buttons" => "buttonsh1.png",
                        "monogram_style" => "    margin-top: 0px;margin-left: -3px;"
                    ), array(
                        "status" => "0",
                        "title" => "Full Cutaway",
                        "customization_category_id" => "2",
                        "insert_style" => "collar_m_comman_insert20001.png",
                        "insert_overlay" => "collar_simple_insert_overlay.png",
                        "insert_full" => ["collar_m_full_cutaway20001.png"],
                        "elements" => [ "collar_fullcutaway.png"],
                        "image" => "../shirt_elements/collar/fullcutaway.png",
                        "buttons" => "buttonsh1.png",
                        "monogram_style" => "    margin-top: 0px;margin-left: -3px;"
                    ), array(
                        "status" => "0",
                        "title" => "Wide Spread",
                        "customization_category_id" => "2",
                        "elements" => [ "collar_widespread.png"],
                        "image" => "../shirt_elements/collar/widespread.png",
                        "insert_style" => "collar_m_comman_insert0001.png",
                        "insert_overlay" => "collar_simple_insert_overlay.png",
                        "insert_full" => ["collar_wide_spread20001.png"],
                        "buttons" => "buttonsh1.png",
                        "monogram_style" => "    margin-top: 6px;margin-left: -3px;"
                    )
                ]
            ),
            "cuff_collar_insert" => ["p10", "p11", "p2", "p18"],
            "monogram_colors" => [
                array(
                    "color" => "#fff",
                    "backcolor" => "#000080",
                    "title" => "Navy Blue"
                ),
                array(
                    "color" => "white",
                    "backcolor" => "#000",
                    "title" => "Black"
                ),
                array(
                    "color" => "#000",
                    "backcolor" => "#c0c0c0",
                    "title" => "Silver"
                ),
                array(
                    "color" => "red",
                    "backcolor" => "white",
                    "title" => "Red-White"
                ),
                array(
                    "color" => "white",
                    "backcolor" => "red",
                    "title" => "White-Red"
                ),
            ],
            "monogram_style" => [
                array(
                    "font_style" => "font-family: 'Orbitron';",
                    "title" => "8",
                    "image" => "8.jpg",
                ),
                array(
                    "font_style" => "font-family: 'Orbitron';",
                    "title" => "10",
                    "image" => "10.jpg",
                ),
                array(
                    "font_style" => "font-family: 'Black Ops One';",
                    "title" => "13",
                    "image" => "13.jpg",
                ),
                array(
                    "font_style" => "font-family: 'Bungee';",
                    "title" => "16",
                    "image" => "16.jpg",
                ),
                array(
                    "font_style" => "font-family: 'Bungee';",
                    "title" => "17",
                    "image" => "17.jpg",
                ),
                array(
                    "font_style" => "font-family: 'Bungee';",
                    "title" => "19",
                    "image" => "19.jpg",
                ),
                array(
                    "font_style" => "font-family: 'Wallpoet';",
                    "title" => "21",
                    "image" => "21.jpg",
                ),
            ],
        );
        foreach ($customeele as $key => $value) {
            
        }
        $this->response($customeele);
    }

    //end of shirt


    function customeElementsSuit_get() {
        $customeele = array(
            "keys" => [
                array(
                    "title" => "Jacket Style",
                    "viewtype" => "front",
                    "type" => "main",
                ),
                array(
                    "title" => "Lapel Style",
                    "viewtype" => "front",
                    "type" => "main",
                ),
                array(
                    "title" => "Lapel Button Hole",
                    "viewtype" => "front",
                    "type" => "main",
                ),
                array(
                    "title" => "Breast Pocket",
                    "viewtype" => "front",
                    "type" => "main",
                ),
                array(
                    "title" => "Lower Pocket",
                    "viewtype" => "front",
                    "type" => "main",
                ),
                array(
                    "title" => "Back Vent",
                    "viewtype" => "back",
                    "type" => "main",
                ),
                array(
                    "title" => "Sleeve Buttons",
                    "viewtype" => "front",
                    "type" => "main",
                    "style_side" => "    background-size: 19%!important;",
                ),
                array(
                    "title" => "Number of Pleat",
                    "viewtype" => "pant",
                    "type" => "main",
                ),
                array(
                    "title" => "Front Pocket Style",
                    "viewtype" => "pant",
                    "type" => "main",
                ),
                array(
                    "title" => "Number of Back Pocket",
                    "viewtype" => "pantback",
                    "type" => "main",
                ),
                array(
                    "title" => "Waistband",
                    "viewtype" => "pant",
                    "type" => "main",
                ),
                array(
                    "title" => "Cuff",
                    "viewtype" => "pant",
                    "type" => "main",
                ),
            ],
            "collar_cuff_insert" => array(),
            "data" => array(
                "Number of Pleat" => [
                    array(
                        "status" => "1",
                        "title" => "No Pleat",
                        "customization_category_id" => "4",
                        "elements" => [],
                        "image" => "../pant_elements/pleat/no_pleat.png",
                        "show_buttons" => "true",
                    ),
                    array(
                        "status" => "0",
                        "title" => "1 Pleat Standard",
                        "elements" => ["pleat_s1.png"],
                        "customization_category_id" => "4",
                        "image" => "../pant_elements/pleat/pleat_s1.png",
                        "show_buttons" => "true",
                    ),
                    array(
                        "status" => "0",
                        "title" => "2 Pleats Standard",
                        "elements" => ["pleat_s1.png", "pleat_s2.png"],
                        "customization_category_id" => "4",
                        "image" => "../pant_elements/pleat/pleat_s2.png",
                        "show_buttons" => "true",
                    )
                ],
                "Waistband" => [
                    array(
                        "status" => "0",
                        "title" => "No Belt Loop",
                        "customization_category_id" => "4",
                        "elements" => [],
                        "image" => "../pant_elements/waistband/no_belt_loop.png",
                        "show_buttons" => "true",
                    ), array(
                        "status" => "1",
                        "title" => "Belt Loop",
                        "elements" => ["belt_loop.png",],
                        "customization_category_id" => "4",
                        "image" => "../pant_elements/waistband/belt_loop.png",
                        "backbeltloop" => "true",
                        "show_buttons" => "true",
                    ), array(
                        "status" => "0",
                        "title" => "Adjustable with Button",
                        "elements" => ["adjustable_button.png",],
                        "customization_category_id" => "4",
                        "image" => "../pant_elements/waistband/adjustable_button.png",
                        "show_buttons" => "true",
                    ),
                ],
                "Front Pocket Style" => [
                    array(
                        "status" => "1",
                        "title" => "Slanting Pocket",
                        "customization_category_id" => "4",
                        "elements" => ["pocket_slanted.png"],
                        "image" => "../pant_elements/pocket/pocket_slanted.png",
                        "show_buttons" => "true",
                    ), array(
                        "status" => "0",
                        "title" => "Piped",
                        "elements" => ["pocket_piped.png",],
                        "customization_category_id" => "4",
                        "image" => "../pant_elements/pocket/pocket_piped.png",
                        "show_buttons" => "true",
                    ), array(
                        "status" => "0",
                        "title" => "Seam",
                        "elements" => ["pocket_seam.png",],
                        "customization_category_id" => "4",
                        "image" => "../pant_elements/pocket/pocket_seam.png",
                        "show_buttons" => "true",
                    ),
                ],
                "Number of Back Pocket" => [
                    array(
                        "status" => "0",
                        "title" => "1 Pocket Right Side",
                        "customization_category_id" => "4",
                        "elements" => ["pocket_back_r.png"],
                        "image" => "../pant_elements/back_pocket/back_r_pocket.png",
                        "show_buttons" => "true",
                    ), array(
                        "status" => "0",
                        "title" => "1 Pocket Left Side",
                        "elements" => ["pocket_back_l.png",],
                        "customization_category_id" => "4",
                        "image" => "../pant_elements/back_pocket/back_l_pocket.png",
                        "show_buttons" => "true",
                    ), array(
                        "status" => "1",
                        "title" => "2 Pockets",
                        "elements" => ["pocket_back_r.png", "pocket_back_l.png",],
                        "customization_category_id" => "4",
                        "image" => "../pant_elements/back_pocket/back_2_pocket.png",
                        "show_buttons" => "true",
                    ),
                ],
                "Cuff" => [
                    array(
                        "status" => "1",
                        "title" => "No Cuff",
                        "customization_category_id" => "4",
                        "elements" => [],
                        "image" => "../pant_elements/pant_cuff/pant_no_cuff.png",
                        "show_buttons" => "true",
                    ), array(
                        "status" => "0",
                        "title" => "Cuff 1 3/8",
                        "elements" => ["pant_cuff.png",],
                        "customization_category_id" => "4",
                        "image" => "../pant_elements/pant_cuff/pant_cuff.png",
                        "show_buttons" => "true",
                    ),
                ],
                "Buttons" => [
                    array(
                        "status" => "1",
                        "title" => "Brown Lipshell",
                        "customization_category_id" => "4",
                        "image" => "buttonlipsell.png",
                        "folder" => "buttonlipsell",
                        "show_buttons" => "true",
                    ), array(
                        "status" => "0",
                        "title" => "Emerald Lipshell",
                        "folder" => "buttonemrald",
                        "customization_category_id" => "4",
                        "image" => "buttonemrald.png",
                        "show_buttons" => "true",
                    ),
                    array(
                        "status" => "0",
                        "title" => "Horn",
                        "folder" => "buttonhorn",
                        "customization_category_id" => "4",
                        "image" => "buttonhorn.png",
                        "show_buttons" => "true",
                    ),
                    array(
                        "status" => "0",
                        "title" => "Gold",
                        "folder" => "buttongold",
                        "customization_category_id" => "4",
                        "image" => "buttongold.png",
                        "show_buttons" => "true",
                    ),
                    array(
                        "status" => "0",
                        "title" => "Silver",
                        "folder" => "buttonsilver",
                        "customization_category_id" => "4",
                        "image" => "buttonsilver.png",
                        "show_buttons" => "true",
                    ),
                    array(
                        "status" => "0",
                        "title" => "Leather",
                        "folder" => "buttonleather",
                        "customization_category_id" => "4",
                        "image" => "buttonleather.png",
                        "show_buttons" => "true",
                    ),
                ],
                "Breast Pocket" => [
                    array(
                        "status" => "1",
                        "title" => "Slanted Pocket",
                        "customization_category_id" => "4",
                        "elements" => ["pocket_upper.png"],
                        "image" => "../suit_elements/breastpocket/breast_pocket_yes.png",
                        "show_buttons" => "true",
                    ), array(
                        "status" => "0",
                        "title" => "No Pocket",
                        "elements" => [],
                        "customization_category_id" => "4",
                        "image" => "../suit_elements/breastpocket/breast_pocket_no.png",
                        "show_buttons" => "true",
                    )],
                "Back Vent" => [
                    array(
                        "status" => "0",
                        "title" => "No Vent",
                        "customization_category_id" => "4",
                        "elements" => ["back_no_vent.png",],
                        "image" => "../suit_elements/back/back_no_vent.png",
                        "show_buttons" => "true",
                    ), array(
                        "status" => "0",
                        "title" => "Center Vent",
                        "elements" => ["back_no_vent.png", "back_center_vent.png"],
                        "customization_category_id" => "4",
                        "image" => "../suit_elements/back/back_center_vent.png",
                        "show_buttons" => "false",
                    ), array(
                        "status" => "1",
                        "title" => "Side Vent",
                        "elements" => ["back_no_vent.png", "back_side_vent.png"],
                        "customization_category_id" => "4",
                        "image" => "../suit_elements/back/back_side_vent.png",
                        "show_buttons" => "true",
                    )],
                "Lapel Button Hole" => [
                    array(
                        "status" => "1",
                        "title" => "Yes",
                        "customization_category_id" => "4",
                        "elements" => ["back_sleeve0001.png", "back_side__no_vent0001.png"],
                        "image" => "../suit_elements/laple_button_hole/button_hole_yes.png",
                        "show_buttons" => "true",
                        "insert" => "Matching",
                    ), array(
                        "status" => "0",
                        "title" => "No",
                        "elements" => ["back_sleeve0001.png", "back_side_center_vent0001.png"],
                        "customization_category_id" => "4",
                        "image" => "../suit_elements/laple_button_hole/button_hole_no.png",
                        "show_buttons" => "false",
                        "insert" => "Matching",
                    )],
                "Handstitching" => [
                    array(
                        "status" => "1",
                        "title" => "No",
                        "image" => "handstitchyes.jpeg",
                    ), array(
                        "status" => "0",
                        "title" => "Yes",
                        "image" => "handstitchno.jpeg"
                    )],
                "Sleeve Buttons" => [
                    array(
                        "status" => "1",
                        "title" => "4 Flat Buttons",
                        "customization_category_id" => "4",
                        "elements" => ["sleeve_button_f3.png", "sleeve_button_f1.png",],
                        "image" => "../suit_elements/button/button_4_flat.png",
                        "buttons" => ["sleeve_buttons_flat_30001", "sleeve_buttons_flat_3_40001"],
                        "buttonhole" => ["sleeve_button_hole_40001.png", "sleeve_button_hole_comman0001.png", "sleeve_button_hole_10001.png"],
                        "show_buttons" => "true",
                    ),
                    array(
                        "status" => "0",
                        "title" => "4 Kissing Buttons",
                        "elements" => ["sleeve_button_k3.png", "sleeve_button_f1.png",],
                        "customization_category_id" => "4",
                        "image" => "../suit_elements/button/button_4_kissing.png",
                        "buttons" => ["sleeve_buttons_kissing_30001", "sleeve_buttons_kissing_40001"],
                        "show_buttons" => "false",
                    ),
                    array(
                        "status" => "0",
                        "title" => "3 Flat Buttons",
                        "customization_category_id" => "4",
                        "elements" => ["sleeve_button_f3.png"],
                        "image" => "../suit_elements/button/button_3_kissing.png",
                        "buttons" => ["sleeve_buttons_flat_30001"],
                        "buttonhole" => ["sleeve_button_hole_40001.png", "sleeve_button_hole_comman0001.png",],
                        "show_buttons" => "true",
                    ),
                    array(
                        "status" => "0",
                        "title" => "3 Kissing Buttons",
                        "elements" => ["sleeve_button_k3.png"],
                        "customization_category_id" => "4",
                        "image" => "../suit_elements/button/button_3_kissing.png",
                        "buttons" => ["sleeve_buttons_kissing_30001"],
                        "show_buttons" => "false",
                    ),
                ],
                "Lower Pocket" => [
//                    array(
//                        "status" => "1",
//                        "title" => "Slanted Flap Pocket",
//                        "customization_category_id" => "4",
//                        "elements" => ["lower_pocket_slanting_flap0001.png"],
//                        "image" => "lower_flap_pocket.jpeg",
//                        "show_buttons" => "true",
//                    ), 
                    array(
                        "status" => "1",
                        "title" => "Straight Flap Pocket",
                        "customization_category_id" => "4",
                        "elements" => ["pocket_flap.png",],
                        "image" => "../suit_elements/pocket/pocket_flap.png",
                        "show_buttons" => "true",
                    )
                    , array(
                        "status" => "0",
                        "title" => "Patch Pocket",
                        "elements" => ["pocket_patch.png",],
                        "customization_category_id" => "4",
                        "image" => "../suit_elements/pocket/pocket_patch.png",
                        "show_buttons" => "false",
                    )
                    , array(
                        "status" => "0",
                        "title" => "Pipe Pocket",
                        "elements" => ["pocket_pipe.png",],
                        "customization_category_id" => "4",
                        "image" => "../suit_elements/pocket/pocket_pipe.png",
                        "show_buttons" => "false",
                    ),
//                    array(
//                        "status" => "0",
//                        "title" => "Slanting Pipe Pocket",
//                        "elements" => ["lower_slanting_pocket0001.png"],
//                        "customization_category_id" => "4",
//                        "image" => "lower_slanting_pipe.jpeg",
//                        "show_buttons" => "true",
//                    )
                ],
                "Jacket Style" => [
                    array(
                        "status" => "1",
                        "title" => "1 Button",
                        "customization_category_id" => "4",
                        "elements" => ['body_single.png'],
                        "image" => "../suit_elements/suittype/1_button.png",
                        "left" => "body_single.png",
                        "right" => "body_single.png",
                        "buttons" => ["button_1"],
                        "button_hole" => ["button_1_hole10001.png"],
                        "show_buttons" => "true",
                        "overlay" => ["single_overlay.png"],
                    ), array(
                        "status" => "0",
                        "title" => "2 Buttons",
                        "customization_category_id" => "4",
                        "elements" => ['body_single.png',],
                        "image" => "../suit_elements/suittype/2_button.png",
                        "left" => "body_single_left_v40001.png",
                        "right" => "body_single_right_v40001.png",
                        "buttons" => ["button_1"],
                        "buttons2" => ["button_2"],
                        "button_hole" => ["button_1_hole0001.png", "button_1_hole20001.png"],
                        "show_buttons" => "false",
                        "overlay" => [ "single_overlay.png"],
                    )
                    , array(
                        "status" => "0",
                        "title" => "4 Buttons 1 Button Fasten",
                        "elements" => ["body_41.png",],
                        "customization_category_id" => "4",
                        "image" => "../suit_elements/suittype/41_button.png",
                        "left" => "body_double_left_v40001.png",
                        "right" => "body_double_right_v40001.png",
                        "button_hole" => ["button_4_hole_10001.png", "button_4_hole_20001.png"],
                        "buttons" => ["button_41", "button_44",],
                        "buttons2" => [],
                        "show_buttons" => "true",
                        "overlay" => ["body_double_overlay.png"],
                    )
                    , array(
                        "status" => "0",
                        "title" => "6 Buttons 2 Buttons Fasten",
                        "elements" => ["body_42.png",],
                        "customization_category_id" => "4",
                        "left" => "body_double_left_v40001.png",
                        "right" => "body_double_right_v40001.png",
                        "button_hole" => ["button_4_hole_10001.png", "button_4_hole_20001.png"],
                        "buttons" => ["button_422", "button_424", "button_46"],
                        "buttons2" => [],
                        "image" => "../suit_elements/suittype/62_button.png",
                        "show_buttons" => "true",
                        "overlay" => ["body_double_overlay.png"],
                    )
                ],
                "Lapel Style" => [
                    array(
                        "status" => "1",
                        "title" => "Notch Laple",
                        "elements" => ["body_round0001.png"],
                        "laple_style" => array(
                            "1 Button" => array("elements" => [

                                    "laple_single_notch.png"
                                ],
                                "stitcing" => ['laple_notch_stitching.png'],
                                "hole" => ["button_hole_notch.png"],
                                "overelay" => ["13notchpeaklapleoverlay.png", "laple_single_notch_modern_overlay.png"]),
                            "2 Buttons" => array("elements" => [

                                    "laple_single_notch.png"
                                ],
                                "stitcing" => ['laple_notch_stitching.png'],
                                "hole" => ["button_hole_notch.png"],
                                "overelay" => ["13notchpeaklapleoverlay.png", "laple_single_notch_modern_overlay.png"]),
                            "3 Buttons" => array("elements" => [
                                    "laple_single_3_notch_peak_upper0001.png",
                                    "laple_single_3_notch_modern0001.png"
                                ], "overelay" => ["13notchpeaklapleoverlay.png"]),
                            "4 Buttons" => array("elements" => [
                                    "laple_single_3_notch_peak_upper0001.png",
                                    "laple_single_3_notch_modern0001.png"
                                ], "overelay" => ["13notchpeaklapleoverlay.png"]),
                            "4 Buttons 1 Button Fasten" => array("elements" => [

                                    "laple_double_notch.png"
                                ],
                                "stitcing" => ['button_hole_notch.png'],
                                "hole" => ["button_hole_notch.png"],
                                "overelay" => []),
                            "4 Buttons 2 Buttons Fasten" => array("elements" => [

                                    "laple_double_notch.png"
                                ],
                                "stitcing" => ['laple_double_notch_stitch.png'],
                                "hole" => ["button_hole_notch.png"],
                                "overelay" => []),
                            "6 Buttons 1 Button Fasten" => array("elements" => [

                                    "laple_double_notch.png",
                                    "laple_double_42.png",
                                ], "overelay" => ["laple_double_42.png"]),
                            "6 Buttons 2 Buttons Fasten" => array("elements" => [
                                    "laple_double_notch.png",
                                    "laple_double_42.png",
                                ],
                                "stitcing" => ['laple_double_notch_stitch.png'],
                                "hole" => ["button_hole_notch.png"],
                                "overelay" => []),
                        ),
                        "customization_category_id" => "6",
                        "image" => "../suit_elements/laple/notch.png"
                    ),
                    array(
                        "status" => "0",
                        "title" => "Peak Laple",
                        "elements" => ["body_round0001.png"],
                        "laple_style" => array(
                            "1 Button" => array("elements" => [

                                    "laple_single_peak.png"
                                ],
                                "stitcing" => ['laple_peak_stitch.png'],
                                "hole" => ["button_hole_peak.png"],
                                "overelay" => ["laple_peak_overlay.png"]),
                            "2 Buttons" => array("elements" => [

                                    "laple_single_peak.png"
                                ],
                                "stitcing" => ['laple_peak_stitch.png'],
                                "hole" => ["button_hole_peak.png"],
                                "overelay" => ["laple_peak_overlay.png"]),
                            "3 Buttons" => array("elements" => [
                                    "laple_single_3_notch_peak_upper0001.png",
                                    "laple_single_3_peak_morden0001.png"
                                ], "overelay" => ["13notchpeaklapleoverlay.png"]),
                            "4 Buttons" => array("elements" => [
                                    "laple_single_3_notch_peak_upper0001.png",
                                    "laple_single_3_peak_morden0001.png"
                                ], "overelay" => ["13notchpeaklapleoverlay.png"]),
                            "4 Buttons 1 Button Fasten" => array("elements" => [

                                    "laple_double_peak.png"
                                ],
                                "stitcing" => ['laple_double_peak_stitch.png'],
                                "hole" => ["button_hole_peak.png"],
                                "overelay" => []),
                            "4 Buttons 2 Buttons Fasten" => array("elements" => [

                                    "laple_double_peak.png",
                                    "laple_double_42.png"
                                ],
                                "stitcing" => ['laple_double_peak_stitch.png'],
                                "hole" => ["button_hole_peak.png"],
                                "overelay" => []),
                            "6 Buttons 1 Button Fasten" => array("elements" => [
                                    "laple_peak_upper0001.png",
                                    "laple_6_peack_morden0001.png"
                                ], "overelay" => ["4_peak_m.png"]),
                            "6 Buttons 2 Buttons Fasten" => array("elements" => [

                                    "laple_double_peak.png",
                                    "laple_double_42.png"
                                ],
                                "stitcing" => ['laple_double_peak_stitch.png'],
                                "hole" => ["button_hole_peak.png"],
                                "overelay" => []),
                        ),
                        "customization_category_id" => "6",
                        "image" => "../suit_elements/laple/peak.png"
                    ),
                    array(
                        "status" => "0",
                        "title" => "Shwal Laple",
                        "elements" => ["body_round0001.png"],
                        "laple_style" => array(
                            "1 Button" => array("elements" => [

                                    "laple_single_shwal.png"
                                ],
                                "stitcing" => ['laple_peak_stitch.png'],
                                "hole" => ["button_hole_peak.png"],
                                "overelay" => ["laple_peak_overlay.png"]),
                            "2 Buttons" => array("elements" => [

                                    "laple_single_shwal.png"
                                ],
                                "stitcing" => ['laple_peak_stitch.png'],
                                "hole" => ["button_hole_peak.png"],
                                "overelay" => ["laple_peak_overlay.png"]),
                            "3 Buttons" => array("elements" => [
                                    "laple_single_3_notch_peak_upper0001.png",
                                    "laple_single_3_peak_morden0001.png"
                                ], "overelay" => ["13notchpeaklapleoverlay.png"]),
                            "4 Buttons" => array("elements" => [
                                    "laple_single_3_notch_peak_upper0001.png",
                                    "laple_single_3_peak_morden0001.png"
                                ], "overelay" => ["13notchpeaklapleoverlay.png"]),
                            "4 Buttons 1 Button Fasten" => array("elements" => [

                                    "laple_double_shwal.png"
                                ],
                                "stitcing" => ['laple_double_peak_stitch.png'],
                                "hole" => ["button_hole_peak.png"],
                                "overelay" => []),
                            "4 Buttons 2 Buttons Fasten" => array("elements" => [

                                    "laple_double_shwal.png",
                                    "laple_double_42.png"
                                ],
                                "stitcing" => ['laple_double_peak_stitch.png'],
                                "hole" => ["button_hole_peak.png"],
                                "overelay" => []),
                            "6 Buttons 1 Button Fasten" => array("elements" => [
                                    "laple_peak_upper0001.png",
                                    "laple_6_peack_morden0001.png"
                                ], "overelay" => ["4_peak_m.png"]),
                            "6 Buttons 2 Buttons Fasten" => array("elements" => [

                                    "laple_double_shwal.png",
                                    "laple_double_42.png"
                                ],
                                "stitcing" => ['laple_double_peak_stitch.png'],
                                "hole" => ["button_hole_peak.png"],
                                "overelay" => []),
                        ),
                        "customization_category_id" => "6",
                        "image" => "../suit_elements/laple/shwal.png"
                    ),
                ],
            ),
        );
        foreach ($customeele as $key => $value) {
            
        }
        $this->response($customeele);
    }

    function customeElementsJacket_get() {
        $customeele = array(
            "keys" => [
                array(
                    "title" => "Jacket Style",
                    "viewtype" => "front",
                    "type" => "main",
                ),
                array(
                    "title" => "Lapel Style",
                    "viewtype" => "front",
                    "type" => "main",
                ),
                array(
                    "title" => "Lapel Button Hole",
                    "viewtype" => "front",
                    "type" => "main",
                ),
                array(
                    "title" => "Breast Pocket",
                    "viewtype" => "front",
                    "type" => "main",
                ),
                array(
                    "title" => "Lower Pocket",
                    "viewtype" => "front",
                    "type" => "main",
                ),
                array(
                    "title" => "Back Vent",
                    "viewtype" => "back",
                    "type" => "main",
                ),
                array(
                    "title" => "Sleeve Buttons",
                    "viewtype" => "front",
                    "type" => "main",
                    "style_side" => "    background-size: 19%!important;",
                ),
            ],
            "collar_cuff_insert" => array(),
            "data" => array(
                "Breast Pocket" => [
                    array(
                        "status" => "1",
                        "title" => "Slanted Pocket",
                        "customization_category_id" => "4",
                        "elements" => ["pocket_upper.png"],
                        "image" => "../suit_elements/breastpocket/breast_pocket_yes.png",
                        "show_buttons" => "true",
                    ), array(
                        "status" => "0",
                        "title" => "No Pocket",
                        "elements" => [],
                        "customization_category_id" => "4",
                        "image" => "../suit_elements/breastpocket/breast_pocket_no.png",
                        "show_buttons" => "true",
                    )],
                "Back Vent" => [
                    array(
                        "status" => "0",
                        "title" => "No Vent",
                        "customization_category_id" => "4",
                        "elements" => ["back_no_vent.png",],
                        "image" => "../suit_elements/back/back_no_vent.png",
                        "show_buttons" => "true",
                    ), array(
                        "status" => "0",
                        "title" => "Center Vent",
                        "elements" => ["back_no_vent.png", "back_center_vent.png"],
                        "customization_category_id" => "4",
                        "image" => "../suit_elements/back/back_center_vent.png",
                        "show_buttons" => "false",
                    ), array(
                        "status" => "1",
                        "title" => "Side Vent",
                        "elements" => ["back_no_vent.png", "back_side_vent.png"],
                        "customization_category_id" => "4",
                        "image" => "../suit_elements/back/back_side_vent.png",
                        "show_buttons" => "true",
                    )],
                "Lapel Button Hole" => [
                    array(
                        "status" => "1",
                        "title" => "Yes",
                        "customization_category_id" => "4",
                        "elements" => ["back_sleeve0001.png", "back_side__no_vent0001.png"],
                        "image" => "../suit_elements/laple_button_hole/button_hole_yes.png",
                        "show_buttons" => "true",
                        "insert" => "Matching",
                    ), array(
                        "status" => "0",
                        "title" => "No",
                        "elements" => ["back_sleeve0001.png", "back_side_center_vent0001.png"],
                        "customization_category_id" => "4",
                        "image" => "../suit_elements/laple_button_hole/button_hole_no.png",
                        "show_buttons" => "false",
                        "insert" => "Matching",
                    )],
                "Handstitching" => [
                    array(
                        "status" => "1",
                        "title" => "No",
                        "image" => "handstitchyes.jpeg",
                    ), array(
                        "status" => "0",
                        "title" => "Yes",
                        "image" => "handstitchno.jpeg"
                    )],
                "Sleeve Buttons" => [
                    array(
                        "status" => "1",
                        "title" => "4 Flat Buttons",
                        "customization_category_id" => "4",
                        "elements" => ["sleeve_button_f3.png", "sleeve_button_f1.png",],
                        "image" => "../suit_elements/button/button_4_flat.png",
                        "buttons" => ["sleeve_buttons_flat_30001", "sleeve_buttons_flat_3_40001"],
                        "buttonhole" => ["sleeve_button_hole_40001.png", "sleeve_button_hole_comman0001.png", "sleeve_button_hole_10001.png"],
                        "show_buttons" => "true",
                    ),
                    array(
                        "status" => "0",
                        "title" => "4 Kissing Buttons",
                        "elements" => ["sleeve_button_k3.png", "sleeve_button_f1.png",],
                        "customization_category_id" => "4",
                        "image" => "../suit_elements/button/button_4_kissing.png",
                        "buttons" => ["sleeve_buttons_kissing_30001", "sleeve_buttons_kissing_40001"],
                        "show_buttons" => "false",
                    ),
                    array(
                        "status" => "0",
                        "title" => "3 Flat Buttons",
                        "customization_category_id" => "4",
                        "elements" => ["sleeve_button_f3.png"],
                        "image" => "../suit_elements/button/button_3_kissing.png",
                        "buttons" => ["sleeve_buttons_flat_30001"],
                        "buttonhole" => ["sleeve_button_hole_40001.png", "sleeve_button_hole_comman0001.png",],
                        "show_buttons" => "true",
                    ),
                    array(
                        "status" => "0",
                        "title" => "3 Kissing Buttons",
                        "elements" => ["sleeve_button_k3.png"],
                        "customization_category_id" => "4",
                        "image" => "../suit_elements/button/button_3_kissing.png",
                        "buttons" => ["sleeve_buttons_kissing_30001"],
                        "show_buttons" => "false",
                    ),
                ],
                "Lower Pocket" => [
//                    array(
//                        "status" => "1",
//                        "title" => "Slanted Flap Pocket",
//                        "customization_category_id" => "4",
//                        "elements" => ["lower_pocket_slanting_flap0001.png"],
//                        "image" => "lower_flap_pocket.jpeg",
//                        "show_buttons" => "true",
//                    ), 
                    array(
                        "status" => "1",
                        "title" => "Straight Flap Pocket",
                        "customization_category_id" => "4",
                        "elements" => ["pocket_flap.png",],
                        "image" => "../suit_elements/pocket/pocket_flap.png",
                        "show_buttons" => "true",
                    )
                    , array(
                        "status" => "0",
                        "title" => "Patch Pocket",
                        "elements" => ["pocket_patch.png",],
                        "customization_category_id" => "4",
                        "image" => "../suit_elements/pocket/pocket_patch.png",
                        "show_buttons" => "false",
                    )
                    , array(
                        "status" => "0",
                        "title" => "Pipe Pocket",
                        "elements" => ["pocket_pipe.png",],
                        "customization_category_id" => "4",
                        "image" => "../suit_elements/pocket/pocket_pipe.png",
                        "show_buttons" => "false",
                    ),
//                    array(
//                        "status" => "0",
//                        "title" => "Slanting Pipe Pocket",
//                        "elements" => ["lower_slanting_pocket0001.png"],
//                        "customization_category_id" => "4",
//                        "image" => "lower_slanting_pipe.jpeg",
//                        "show_buttons" => "true",
//                    )
                ],
                "Jacket Style" => [
                    array(
                        "status" => "1",
                        "title" => "1 Button",
                        "customization_category_id" => "4",
                        "elements" => ['body_single.png'],
                        "image" => "../suit_elements/suittype/1_button.png",
                        "left" => "body_single.png",
                        "right" => "body_single.png",
                        "buttons" => ["button_1"],
                        "button_hole" => ["button_1_hole10001.png"],
                        "show_buttons" => "true",
                        "overlay" => ["single_overlay.png"],
                    ), array(
                        "status" => "0",
                        "title" => "2 Buttons",
                        "customization_category_id" => "4",
                        "elements" => ['body_single.png',],
                        "image" => "../suit_elements/suittype/2_button.png",
                        "left" => "body_single_left_v40001.png",
                        "right" => "body_single_right_v40001.png",
                        "buttons" => ["button_1"],
                        "buttons2" => ["button_2"],
                        "button_hole" => ["button_1_hole0001.png", "button_1_hole20001.png"],
                        "show_buttons" => "false",
                        "overlay" => [ "single_overlay.png"],
                    )
                    , array(
                        "status" => "0",
                        "title" => "4 Buttons 1 Button Fasten",
                        "elements" => ["body_41.png",],
                        "customization_category_id" => "4",
                        "image" => "../suit_elements/suittype/41_button.png",
                        "left" => "body_double_left_v40001.png",
                        "right" => "body_double_right_v40001.png",
                        "button_hole" => ["button_4_hole_10001.png", "button_4_hole_20001.png"],
                        "buttons" => ["button_41", "button_44",],
                        "buttons2" => [],
                        "show_buttons" => "true",
                        "overlay" => ["body_double_overlay.png"],
                    )
                    , array(
                        "status" => "0",
                        "title" => "6 Buttons 2 Buttons Fasten",
                        "elements" => ["body_42.png",],
                        "customization_category_id" => "4",
                        "left" => "body_double_left_v40001.png",
                        "right" => "body_double_right_v40001.png",
                        "button_hole" => ["button_4_hole_10001.png", "button_4_hole_20001.png"],
                        "buttons" => ["button_422", "button_424", "button_46"],
                        "buttons2" => [],
                        "image" => "../suit_elements/suittype/62_button.png",
                        "show_buttons" => "true",
                        "overlay" => ["body_double_overlay.png"],
                    )
                ],
                "Lapel Style" => [
                    array(
                        "status" => "1",
                        "title" => "Notch Laple",
                        "elements" => ["body_round0001.png"],
                        "laple_style" => array(
                            "1 Button" => array("elements" => [

                                    "laple_single_notch.png"
                                ],
                                "stitcing" => ['laple_notch_stitching.png'],
                                "hole" => ["button_hole_notch.png"],
                                "overelay" => ["13notchpeaklapleoverlay.png", "laple_single_notch_modern_overlay.png"]),
                            "2 Buttons" => array("elements" => [

                                    "laple_single_notch.png"
                                ],
                                "stitcing" => ['laple_notch_stitching.png'],
                                "hole" => ["button_hole_notch.png"],
                                "overelay" => ["13notchpeaklapleoverlay.png", "laple_single_notch_modern_overlay.png"]),
                            "3 Buttons" => array("elements" => [
                                    "laple_single_3_notch_peak_upper0001.png",
                                    "laple_single_3_notch_modern0001.png"
                                ], "overelay" => ["13notchpeaklapleoverlay.png"]),
                            "4 Buttons" => array("elements" => [
                                    "laple_single_3_notch_peak_upper0001.png",
                                    "laple_single_3_notch_modern0001.png"
                                ], "overelay" => ["13notchpeaklapleoverlay.png"]),
                            "4 Buttons 1 Button Fasten" => array("elements" => [

                                    "laple_double_notch.png"
                                ],
                                "stitcing" => ['button_hole_notch.png'],
                                "hole" => ["button_hole_notch.png"],
                                "overelay" => []),
                            "4 Buttons 2 Buttons Fasten" => array("elements" => [

                                    "laple_double_notch.png"
                                ],
                                "stitcing" => ['laple_double_notch_stitch.png'],
                                "hole" => ["button_hole_notch.png"],
                                "overelay" => []),
                            "6 Buttons 1 Button Fasten" => array("elements" => [

                                    "laple_double_notch.png",
                                    "laple_double_42.png",
                                ], "overelay" => ["laple_double_42.png"]),
                            "6 Buttons 2 Buttons Fasten" => array("elements" => [
                                    "laple_double_notch.png",
                                    "laple_double_42.png",
                                ],
                                "stitcing" => ['laple_double_notch_stitch.png'],
                                "hole" => ["button_hole_notch.png"],
                                "overelay" => []),
                        ),
                        "customization_category_id" => "6",
                        "image" => "../suit_elements/laple/notch.png"
                    ),
                    array(
                        "status" => "0",
                        "title" => "Peak Laple",
                        "elements" => ["body_round0001.png"],
                        "laple_style" => array(
                            "1 Button" => array("elements" => [

                                    "laple_single_peak.png"
                                ],
                                "stitcing" => ['laple_peak_stitch.png'],
                                "hole" => ["button_hole_peak.png"],
                                "overelay" => ["laple_peak_overlay.png"]),
                            "2 Buttons" => array("elements" => [

                                    "laple_single_peak.png"
                                ],
                                "stitcing" => ['laple_peak_stitch.png'],
                                "hole" => ["button_hole_peak.png"],
                                "overelay" => ["laple_peak_overlay.png"]),
                            "3 Buttons" => array("elements" => [
                                    "laple_single_3_notch_peak_upper0001.png",
                                    "laple_single_3_peak_morden0001.png"
                                ], "overelay" => ["13notchpeaklapleoverlay.png"]),
                            "4 Buttons" => array("elements" => [
                                    "laple_single_3_notch_peak_upper0001.png",
                                    "laple_single_3_peak_morden0001.png"
                                ], "overelay" => ["13notchpeaklapleoverlay.png"]),
                            "4 Buttons 1 Button Fasten" => array("elements" => [

                                    "laple_double_peak.png"
                                ],
                                "stitcing" => ['laple_double_peak_stitch.png'],
                                "hole" => ["button_hole_peak.png"],
                                "overelay" => []),
                            "4 Buttons 2 Buttons Fasten" => array("elements" => [

                                    "laple_double_peak.png",
                                    "laple_double_42.png"
                                ],
                                "stitcing" => ['laple_double_peak_stitch.png'],
                                "hole" => ["button_hole_peak.png"],
                                "overelay" => []),
                            "6 Buttons 1 Button Fasten" => array("elements" => [
                                    "laple_peak_upper0001.png",
                                    "laple_6_peack_morden0001.png"
                                ], "overelay" => ["4_peak_m.png"]),
                            "6 Buttons 2 Buttons Fasten" => array("elements" => [

                                    "laple_double_peak.png",
                                    "laple_double_42.png"
                                ],
                                "stitcing" => ['laple_double_peak_stitch.png'],
                                "hole" => ["button_hole_peak.png"],
                                "overelay" => []),
                        ),
                        "customization_category_id" => "6",
                        "image" => "../suit_elements/laple/peak.png"
                    ),
                    array(
                        "status" => "0",
                        "title" => "Shwal Laple",
                        "elements" => ["body_round0001.png"],
                        "laple_style" => array(
                            "1 Button" => array("elements" => [

                                    "laple_single_shwal.png"
                                ],
                                "stitcing" => ['laple_peak_stitch.png'],
                                "hole" => ["button_hole_peak.png"],
                                "overelay" => ["laple_peak_overlay.png"]),
                            "2 Buttons" => array("elements" => [

                                    "laple_single_shwal.png"
                                ],
                                "stitcing" => ['laple_peak_stitch.png'],
                                "hole" => ["button_hole_peak.png"],
                                "overelay" => ["laple_peak_overlay.png"]),
                            "3 Buttons" => array("elements" => [
                                    "laple_single_3_notch_peak_upper0001.png",
                                    "laple_single_3_peak_morden0001.png"
                                ], "overelay" => ["13notchpeaklapleoverlay.png"]),
                            "4 Buttons" => array("elements" => [
                                    "laple_single_3_notch_peak_upper0001.png",
                                    "laple_single_3_peak_morden0001.png"
                                ], "overelay" => ["13notchpeaklapleoverlay.png"]),
                            "4 Buttons 1 Button Fasten" => array("elements" => [

                                    "laple_double_shwal.png"
                                ],
                                "stitcing" => ['laple_double_peak_stitch.png'],
                                "hole" => ["button_hole_peak.png"],
                                "overelay" => []),
                            "4 Buttons 2 Buttons Fasten" => array("elements" => [

                                    "laple_double_shwal.png",
                                    "laple_double_42.png"
                                ],
                                "stitcing" => ['laple_double_peak_stitch.png'],
                                "hole" => ["button_hole_peak.png"],
                                "overelay" => []),
                            "6 Buttons 1 Button Fasten" => array("elements" => [
                                    "laple_peak_upper0001.png",
                                    "laple_6_peack_morden0001.png"
                                ], "overelay" => ["4_peak_m.png"]),
                            "6 Buttons 2 Buttons Fasten" => array("elements" => [

                                    "laple_double_shwal.png",
                                    "laple_double_42.png"
                                ],
                                "stitcing" => ['laple_double_peak_stitch.png'],
                                "hole" => ["button_hole_peak.png"],
                                "overelay" => []),
                        ),
                        "customization_category_id" => "6",
                        "image" => "../suit_elements/laple/shwal.png"
                    ),
                ],
            ),
        );
        foreach ($customeele as $key => $value) {
            
        }
        $this->response($customeele);
    }

    function customeElementsPant_get() {
        $customeele = array(
            "keys" => [

                array(
                    "title" => "Number of Pleat",
                    "viewtype" => "pant",
                    "type" => "main",
                ),
                array(
                    "title" => "Front Pocket Style",
                    "viewtype" => "pant",
                    "type" => "main",
                ),
                array(
                    "title" => "Number of Back Pocket",
                    "viewtype" => "pantback",
                    "type" => "main",
                ),
                array(
                    "title" => "Waistband",
                    "viewtype" => "pant",
                    "type" => "main",
                ),
                array(
                    "title" => "Cuff",
                    "viewtype" => "pant",
                    "type" => "main",
                ),
            ],
            "collar_cuff_insert" => array(),
            "data" => array(
                "Number of Pleat" => [
                    array(
                        "status" => "1",
                        "title" => "No Pleat",
                        "customization_category_id" => "4",
                        "elements" => [],
                        "image" => "../pant_elements/pleat/no_pleat.png",
                        "show_buttons" => "true",
                    ),
                    array(
                        "status" => "0",
                        "title" => "1 Pleat Standard",
                        "elements" => ["pleat_s1.png"],
                        "customization_category_id" => "4",
                        "image" => "../pant_elements/pleat/pleat_s1.png",
                        "show_buttons" => "true",
                    ),
                    array(
                        "status" => "0",
                        "title" => "2 Pleats Standard",
                        "elements" => ["pleat_s1.png", "pleat_s2.png"],
                        "customization_category_id" => "4",
                        "image" => "../pant_elements/pleat/pleat_s2.png",
                        "show_buttons" => "true",
                    )
                ],
                "Waistband" => [
                    array(
                        "status" => "0",
                        "title" => "No Belt Loop",
                        "customization_category_id" => "4",
                        "elements" => [],
                        "image" => "../pant_elements/waistband/no_belt_loop.png",
                        "show_buttons" => "true",
                    ), array(
                        "status" => "1",
                        "title" => "Belt Loop",
                        "elements" => ["belt_loop.png",],
                        "customization_category_id" => "4",
                        "image" => "../pant_elements/waistband/belt_loop.png",
                        "backbeltloop" => "true",
                        "show_buttons" => "true",
                    ), array(
                        "status" => "0",
                        "title" => "Adjustable with Button",
                        "elements" => ["adjustable_button.png",],
                        "customization_category_id" => "4",
                        "image" => "../pant_elements/waistband/adjustable_button.png",
                        "show_buttons" => "true",
                    ),
                ],
                "Front Pocket Style" => [
                    array(
                        "status" => "1",
                        "title" => "Slanting Pocket",
                        "customization_category_id" => "4",
                        "elements" => ["pocket_slanted.png"],
                        "image" => "../pant_elements/pocket/pocket_slanted.png",
                        "show_buttons" => "true",
                    ), array(
                        "status" => "0",
                        "title" => "Piped",
                        "elements" => ["pocket_piped.png",],
                        "customization_category_id" => "4",
                        "image" => "../pant_elements/pocket/pocket_piped.png",
                        "show_buttons" => "true",
                    ), array(
                        "status" => "0",
                        "title" => "Seam",
                        "elements" => ["pocket_seam.png",],
                        "customization_category_id" => "4",
                        "image" => "../pant_elements/pocket/pocket_seam.png",
                        "show_buttons" => "true",
                    ),
                ],
                "Number of Back Pocket" => [
                    array(
                        "status" => "0",
                        "title" => "1 Pocket Right Side",
                        "customization_category_id" => "4",
                        "elements" => ["pocket_back_r.png"],
                        "image" => "../pant_elements/back_pocket/back_r_pocket.png",
                        "show_buttons" => "true",
                    ), array(
                        "status" => "0",
                        "title" => "1 Pocket Left Side",
                        "elements" => ["pocket_back_l.png",],
                        "customization_category_id" => "4",
                        "image" => "../pant_elements/back_pocket/back_l_pocket.png",
                        "show_buttons" => "true",
                    ), array(
                        "status" => "1",
                        "title" => "2 Pockets",
                        "elements" => ["pocket_back_r.png", "pocket_back_l.png",],
                        "customization_category_id" => "4",
                        "image" => "../pant_elements/back_pocket/back_2_pocket.png",
                        "show_buttons" => "true",
                    ),
                ],
                "Cuff" => [
                    array(
                        "status" => "1",
                        "title" => "No Cuff",
                        "customization_category_id" => "4",
                        "elements" => [],
                        "image" => "../pant_elements/pant_cuff/pant_no_cuff.png",
                        "show_buttons" => "true",
                    ), array(
                        "status" => "0",
                        "title" => "Cuff 1 3/8",
                        "elements" => ["pant_cuff.png",],
                        "customization_category_id" => "4",
                        "image" => "../pant_elements/pant_cuff/pant_cuff.png",
                        "show_buttons" => "true",
                    ),
                ],
            ),
        );
        foreach ($customeele as $key => $value) {
            
        }
        $this->response($customeele);
    }

}

?>