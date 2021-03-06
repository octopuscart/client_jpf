<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Product_model');
        $this->load->library('session');
        $this->user_id = $this->session->userdata('logged_in')['login_id'];
    }

    public function index() {
        $product_home_slider_bottom = $this->Product_model->product_home_slider_bottom();
        $categories = $this->Product_model->productListCategories(0);
        $data["categories"] = $categories;
        $data["product_home_slider_bottom"] = $product_home_slider_bottom;
        $customarray = [1, 2];
        $this->db->where_in('id', $customarray);
        $query = $this->db->get('custome_items');
        $customeitem = $query->result();

        $data['shirtcustome'] = $customeitem[0];
        $data['suitcustome'] = $customeitem[1];

        $query = $this->db->get('sliders');
        $data['sliders'] = $query->result();

        $this->load->view('home', $data);
    }

    public function contactus() {
        if (isset($_POST['sendmessage'])) {
            $web_enquiry = array(
                'last_name' => $this->input->post('last_name'),
                'first_name' => $this->input->post('first_name'),
                'email' => $this->input->post('email'),
                'contact' => $this->input->post('contact'),
                'subject' => $this->input->post('subject'),
                'message' => $this->input->post('message'),
                'datetime' => date("Y-m-d H:i:s a"),
            );

            $this->db->insert('web_enquiry', $web_enquiry);

            $emailsender = email_sender;
            $sendername = email_sender_name;
            $email_bcc = email_bcc;
            $sendernameeq = $this->input->post('last_name') . " " . $this->input->post('first_name');
            if ($this->input->post('email')) {
                $this->email->set_newline("\r\n");
                $this->email->from($this->input->post('email'), $sendername);
                $this->email->to(email_bcc);
//                $this->email->bcc(email_bcc);
                $subjectt = $this->input->post('subject');
                $orderlog = array(
                    'log_type' => 'Enquiry',
                    'log_datetime' => date('Y-m-d H:i:s'),
                    'user_id' => 'ENQ',
                    'log_detail' => "Enquiry from website - " . $this->input->post('subject')
                );
                $this->db->insert('system_log', $orderlog);

                $subject = "Enquiry from website - " . $this->input->post('subject');
                $this->email->subject($subject);

                $web_enquiry['web_enquiry'] = $web_enquiry;

                $htmlsmessage = $this->load->view('Email/web_enquiry', $web_enquiry, true);
                $this->email->message($htmlsmessage);

                $this->email->print_debugger();
                $send = $this->email->send();
                if ($send) {
                    echo json_encode("send");
                } else {
                    $error = $this->email->print_debugger(array('headers'));
                    echo json_encode($error);
                }
            }

            redirect('Shop/contactus');
        }
        $this->load->view('Pages/contactus');
    }

    public function aboutus() {
        $this->load->view('Pages/aboutus');
    }

    public function clients() {
        $this->load->view('Pages/clients');
    }



    public function testinsert() {
        $foldersstrip = ['HL_41007_72.jpg', 'HL_41009_72.jpg', 'HL_41043_72.jpg', 'HL_41044_72.jpg', 'HL_41045_72.jpg', 'HL_41094_72.jpg', 'HL_51045_64.jpg', 'HL_51047_64.jpg', 'HL_51048_64.jpg', 'HL_51077_64.jpg', 'HL_51082_64.jpg', 'HL_51143_64.jpg', 'HL_51145_64.jpg', 'HL_51146_64.jpg', 'HL_51147_64.jpg', 'HL_51148_64.jpg', 'HL_51156_64.jpg', 'HL_51157_64.jpg', 'HL_51158_64.jpg', 'HL_71005_56.jpg', 'HL_71007_56.jpg', 'HL_71008_56.jpg', 'HL_71009_56.jpg', 'HL_71010_56.jpg', 'HL_71058_56.jpg', 'HL_71059_56.jpg', 'HL_71087_56.jpg', 'HL_71088_56.jpg', 'HL_71093_56.jpg', 'HL_71094_56.jpg', 'HL_71098_56.jpg', 'HL_71099_56.jpg', 'HL_71122_56.jpg', 'HL_71124_56.jpg', 'HL_71126_56.jpg', 'HL_71241_56.jpg', 'HL_71242_56.jpg', 'HL_71299_56.jpg', 'HL_71300_56.jpg', 'HL_71301_56.jpg', 'HL_71303_56.jpg'];
        $foldercheck = ['HL_42002_72.jpg', 'HL_42004_72.jpg', 'HL_42004_72.png', 'HL_42009_72.jpg', 'HL_42023_72.jpg', 'HL_42031_72.jpg', 'HL_42032_72.jpg', 'HL_42033_72.jpg', 'HL_42034_72.jpg', 'HL_42035_72.jpg', 'HL_42036_72.jpg', 'HL_42037_72.jpg', 'HL_42038_72.jpg', 'HL_42039_72.jpg', 'HL_42040_56.jpg', 'HL_42040_72.jpg', 'HL_42041_72.jpg', 'HL_42042_72.jpg', 'HL_42067_72.jpg', 'HL_42068_72.jpg', 'HL_42069_72.jpg', 'HL_42071_72.jpg', 'HL_72104_56.jpg', 'HL_72107_56.jpg', 'HL_72108_56.jpg', 'HL_72119_56.jpg', 'HL_72120_56.jpg', 'HL_72121_56.jpg', 'HL_72124_56.jpg', 'HL_72197_56.jpg', 'HL_72198_56.jpg', 'HL_72199_56.jpg', 'HL_72200_56.jpg', 'HL_72211_56.jpg', 'HL_72214_56.jpg', 'HL_72215_56.jpg', 'HL_72217_56.jpg', 'HL_72219_56.jpg', 'HL_72221_56.jpg', 'HL_72222_56.jpg', 'HL_72275_56.jpg', 'HL_72276_56.jpg', 'HL_72277_56.jpg', 'HL_72281_56.jpg', 'HL_72282_56.jpg'];
        $foldersolid = ['HL5600164.jpg', 'HL5601064.jpg', 'HL5601264.jpg', 'HL5601764.jpg', 'HL5601864.jpg', 'HL5602064.jpg', 'HL5602164.jpg', 'HL5602464.jpg', 'HL5602564.jpg', 'HL5602664.jpg', 'HL5603264.jpg', 'HL5603464.jpg', 'HL5603564.jpg', 'HL5702564.jpg', 'HL5702664.jpg'];
        $foldertexture = ['701118.jpg', '701251.jpg', '701252.jpg', '701253.jpg', '701254.jpg', '701279.jpg', '701315.jpg', '701413.jpg', '701414.jpg', '701485.jpg', '701496.jpg', '701508.jpg', '701509.jpg', '701510.jpg', '701614.jpg', '701615.jpg', '701622.jpg', '701623.jpg', '701624.jpg', '701625.jpg', '701626.jpg', '701627.jpg', '701628.jpg', '701629.jpg', '701630.jpg', '701631.jpg', '753003.jpg', '753103.jpg', '753112.jpg', '756025.jpg', '756026.jpg', '83001.jpg', '83007.jpg', '83008.jpg', '83040.jpg', '83501.jpg', '83534.jpg', '83536.jpg', '83538.jpg', '83546.jpg', '83914.jpg', '83969.jpg', '83971.jpg', '83972.jpg', '981601.jpg', '981602.jpg', '981606.jpg', '981619.jpg', '981620.jpg', '981656.jpg', '981801.jpg', '981802.jpg', '981803.jpg', '981806.jpg', '981807.jpg', '981812.jpg', '981821.jpg', '981822.jpg', '981850.jpg', '981852.jpg'];


        foreach ($foldertexture as $key => $value) {
            $folder = $value;
            $foldermain = str_replace(".jpg", "", $folder);
            $titles = explode("_", $folder);

            if(count($titles)>1){
            $title = "" . $titles[1];
            }
            else{
                $title = $titles[0];
            }
echo $foldermain;
            $products = array(
                "category_id" => 42,
                "sku" => $foldermain,
                "title" => $foldermain,
                "category_items_id" => 1,
                "short_description" => "2 Ply 100% Cotton",
                "description" => "2 Ply 100% Cotton",
                "video_link" => "",
                "regular_price" => "95",
                "sale_price" => "0",
                "credit_limit" => "",
                "price" => "95",
                "file_name" => $foldermain . "shirt_model20001.png",
                "file_name1" => $foldermain . "shirt_model10001.png",
                "file_name2" => $foldermain . "fabricx0001.png",
                "file_name3" => "",
                "user_id" => "10",
                "op_date_time" => "",
                "status" => "1",
                "home_slider" => "",
                "home_bottom" => "",
                "keywords" => "",
                "stock_status" => "In Stock",
                "variant_product_of" => "",
                "folder" => $foldermain);
            #$this->db->insert('products', $products);
        }
    }

    public function testinsertsuit() {
        $foldercheck = ['12501.jpg', '12502.jpg', '12503.jpg', '12504.jpg', '12508.jpg', '12509.jpg', '12510.jpg', '12511.jpg', '12512.jpg', '12514.jpg', '12601.jpg', '12602.jpg', '9775.jpg', '9776.jpg', '9777.jpg', '9778.jpg', '9779.jpg', '9780.jpg'];
        $folderchek2 = ['12512.jpg', '12514.jpg', '12601.jpg', '12602.jpg', '12603.jpg', '12604.jpg', '12605.jpg', '12606.jpg', '12611.jpg', '12612.jpg', '12613.jpg', '12615.jpg', '12616.jpg', '12617.jpg', '12618.jpg', '12619.jpg', '12649.jpg', '12650.jpg', '12651.jpg', '12652.jpg', '12653.jpg', '12654.jpg', '12655.jpg', '12656.jpg'];
       
        $folderstrip = ['11926.jpg', '1197.jpg', '1198.jpg', '1199.jpg', '1232.jpg', '1234.jpg', '12343.jpg', '12343C.jpg', '12357.jpg', '1236.jpg', '12364.jpg', '12511.jpg', '12522.jpg', '12525.jpg', '12610.jpg', '12610C.jpg', '1262.jpg', '12625.jpg', '12644.jpg', '19913.jpg'];
        foreach ($folderstrip as $key => $value) {
            $folder = $value;
            $foldermain = str_replace(".jpg", "", $folder);

            if (strpos($folder, '_')) {
                $titles = explode("_", $foldermain);
                $title = "BT" . $titles[1];
            } else {
                $title = $foldermain;
            }




            $products = array(
                "category_id" => 43,
                "category_items_id" => 3,
                "sku" => $title,
                "title" => $title,
                "short_description" => "100% Cotton",
                "description" => "100% Cotton",
                "video_link" => "",
                "regular_price" => "800",
                "sale_price" => "0",
                "credit_limit" => "",
                "price" => "800",
                "file_name" => $foldermain . "s1_master_style60001.png",
                "file_name1" => $foldermain . "style_buttons.png",
                "file_name2" => $foldermain . "fabricx0001.png",
                "file_name3" => "",
                "user_id" => "10",
                "op_date_time" => "",
                "status" => "1",
                "home_slider" => "",
                "home_bottom" => "",
                "keywords" => "",
                "stock_status" => "In Stock",
                "variant_product_of" => "",
                "folder" => $foldermain);

            #$this->db->insert('products', $products);
        }
    }
    
        public function measurements_guide() {
        $mesurementdata = array(
            array(
                "id" => "mes1",
                "title" => "Neck",
                "description" => "Place measuring tape around base of neck with one finger space.",
                "standard_value" => "15",
                "min_value" => "12",
                "max_value" => "20",
                "image" => "nack.JPG"),
            array(
                "id" => "mes2",
                "title" => "Chest",
                "standard_value" => "35",
                "min_value" => "25",
                "max_value" => "76",
                "description" => "Place measuring tape around the fullest part of the chest, high up under the arms with two fingers space. Tape should be at level and not so tight.",
                "image" => "front_chest.JPG"),
            array(
                "id" => "mes3",
                "title" => "Stomach",
                "standard_value" => "38",
                "min_value" => "25",
                "max_value" => "76",
                "description" => "Place measuring tape around the stomach with two fingers space and at level over the fullest part of the stomach. Make sure the tape is not so tight.",
                "image" => "waist.JPG"),
            array(
                "id" => "mes4",
                "title" => "Full Sleeve",
                "standard_value" => "24",
                "min_value" => "13",
                "max_value" => "36",
                "description" => "Place measuring Tape from the point where the shoulder seam joins the sleeve, down along the arm to the point below the wrist, and please note add extra 1.5 CM",
                "image" => "sleeve.JPG"),
            array(
                "id" => "mes5",
                "title" => "Shoulder",
                "standard_value" => "17",
                "min_value" => "10",
                "max_value" => "31",
                "description" => "Place measuring tape from the point where the shoulder seam joins the sleeve of one hand to shoulder seam joining the sleeve of the other hand, and then add allowance according to the body shape .(generally 2-4 CM)",
                "image" => "shoulder.JPG"),
            array(
                "id" => "mes6",
                "title" => "Front Length",
                "standard_value" => "24",
                "min_value" => "20",
                "max_value" => "42",
                "description" => "Place measuring tape from the point where the shoulder seam joins the collar vertically to the point of length you require.",
                "image" => "jacket_length.JPG"),
            array(
                "id" => "mes7",
                "title" => "Biceps",
                "standard_value" => "15",
                "min_value" => "8",
                "max_value" => "30",
                "description" => "Place measuring tape around the fullest part of the upper bicep with two fingers space and parallel to the level.",
                "image" => "bicep.JPG"),
            array(
                "id" => "mes8",
                "title" => "Out & Inseam",
                "standard_value" => "35",
                "min_value" => "20",
                "max_value" => "55",
                "description" => "Place measuring tape from the top of the right waistband to the floor, less 1-1.5 CM.",
                "image" => "outseam.JPG"),
            array(
                "id" => "mes9",
                "title" => "Waist",
                "standard_value" => "35",
                "min_value" => "20",
                "max_value" => "55",
                "description" => "Place measuring tape around the waistband with two fingers space and make the tape snug or tight according to the body shape.",
                "image" => "twaist.JPG"),
            array(
                "id" => "mes10",
                "title" => "Hips",
                "standard_value" => "35",
                "min_value" => "20",
                "max_value" => "85",
                "description" => "Place measuring tape around hips at the hip bone area (fullest part) with two fingers space. Tape should be snug and at level.",
                "image" => "hips.JPG"),
            array(
                "id" => "mes11",
                "title" => "Thigh",
                "standard_value" => "25",
                "min_value" => "15",
                "max_value" => "40",
                "description" => "Place measuring tape around the thigh near the lowest point of the crotch with two fingers space. Tape should be snug and at level.",
                "image" => "thigh.JPG"),
            array(
                "id" => "mes12",
                "title" => "U-rise",
                "standard_value" => "30",
                "min_value" => "15",
                "max_value" => "40",
                "description" => "Place the measuring tape from the center of front rise, across the crotch and then up to the center of the back waistband. Make sure to fit well and usually the measurement can be 1 CM large.",
                "image" => "crotch.JPG"),
        );

        $data["measurements"] = $mesurementdata;

        if (isset($_POST['priceenquiry'])) {
            $price_enquiry = array(
                'last_name' => $this->input->post('last_name'),
                'first_name' => $this->input->post('first_name'),
                'email' => $this->input->post('email'),
                'contact' => $this->input->post('contact'),
                'remark' => $this->input->post('remark'),
            );
            $sendernameeq = $this->input->post('last_name') . " " . $this->input->post('first_name');
            if ($this->input->post('email')) {
                $emailsender = email_sender;
                $sendername = email_sender_name;
                $email_bcc = email_bcc;
                $this->email->set_newline("\r\n");
                $this->email->from(email_bcc, $sendername);
                $this->email->to($this->input->post('email'));
                $this->email->bcc(email_bcc);

                $measurement_key = $this->input->post('measurement_key');
                $measurement_value = $this->input->post('measurement_value');




                $subject = "Measurement From Customer";
                $this->email->subject($subject);

                $price_enquiry['name'] = $sendernameeq;
                $price_enquiry['measurement_key'] = $measurement_key;
                $price_enquiry['measurement_value'] = $measurement_value;
                $price_enquiry['subject'] = $subject;



                $htmlsmessage = $this->load->view('Email/measurements_enquiry', $price_enquiry, true);
                $this->email->message($htmlsmessage);

                $this->email->print_debugger();
                $send = $this->email->send();
                if ($send) {
                    // echo json_encode("send");
                } else {
                    $error = $this->email->print_debugger(array('headers'));
                    //  echo json_encode($error);
                }
            }
        }


        $this->load->view('Pages/how_to_measurements', $data);
    }

}
