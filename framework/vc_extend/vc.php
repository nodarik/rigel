<?php
/* ------------------------------------------------------------------------ */
/* VC Extendes */
/* ------------------------------------------------------------------------ */
vc_map(array(
    "name" => esc_html__("Price Table", 'rigel'),
    "base" => "vc_price",
    "class" => "",
    "icon" => get_template_directory_uri() . '/framework/images/vc_image.jpg',
    "admin_enqueue_css" => array(
        get_template_directory_uri() . '/framework/vc_extend/style.css'
    ),
    "category" => esc_html__('Content', 'rigel'),
    "params" => array(
        array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("It will be special table?", 'rigel'),
            "param_name" => "price_spec",
            "value" => esc_html__("0", 'rigel'),
            "description" => esc_html__("1 or 0", 'rigel')
        ),
        array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Price Title", 'rigel'),
            "param_name" => "price_title",
            "value" => esc_html__("Business Plan", 'rigel')
        ),
        array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Amount", 'rigel'),
            "param_name" => "price_amount",
            "value" => esc_html__("10", 'rigel')
        ),
        array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Currency", 'rigel'),
            "param_name" => "price_cur",
            "value" => esc_html__("$", 'rigel')
        ),
        array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Date", 'rigel'),
            "param_name" => "price_date",
            "value" => esc_html__("per month", 'rigel')
        ),
        array(
            "type" => "colorpicker",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Header background color", 'rigel'),
            "param_name" => "price_head_bg",
            "value" => '#ff5c00'
        ),
        array(
            "type" => "colorpicker",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Header text color", 'rigel'),
            "param_name" => "price_title_color",
            "value" => '#ffffff'
        ),
        array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Text on the button", 'rigel'),
            "param_name" => "text_on_button",
            "value" => esc_html__("Order Now", 'rigel')
        ),
        array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Button URL", 'rigel'),
            "param_name" => "url_on_button",
            "value" => esc_html__("#", 'rigel')
        ),
        array(
            "type" => "textarea_html",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Content", 'rigel'),
            "param_name" => "content",
            "value" => esc_html__("<ul><li>1</li><li>2</li><li>3</li></ul>", 'rigel')
        )
    )
));
vc_map(array(
    "name" => esc_html__("Light Box Image", 'rigel'),
    "base" => "vc_lightbox",
    "class" => "",
    "icon" => get_template_directory_uri() . '/framework/images/vc_image.jpg',
    "admin_enqueue_css" => array(
        get_template_directory_uri() . '/framework/vc_extend/style.css'
    ),
    "category" => esc_html__('Content', 'rigel'),
    "params" => array(
        array(
            "type" => "attach_image",
            "class" => "",
            "heading" => esc_html__("Member Photo", 'rigel'),
            "param_name" => "image",
            "value" => esc_html__("", 'rigel')
        )
    )
));
vc_map(array(
    "name" => esc_html__("Gallery-Slider", 'rigel'),
    "base" => "vc_rigel_gallery",
    "class" => "",
    "icon" => get_template_directory_uri() . '/framework/images/vc_image.jpg',
    "admin_enqueue_css" => array(
        get_template_directory_uri() . '/framework/vc_extend/style.css'
    ),
    "category" => esc_html__('Content', 'rigel'),
    "params" => array(
        array(
            "type" => "attach_images",
            "heading" => esc_html__("Images", "rigel"),
            "param_name" => "images",
            "value" => "",
            "description" => esc_html__("Select images from media library.", "rigel")
        )
    )
));
vc_map(array(
    "name" => esc_html__("Team Member", 'rigel'),
    "base" => "vc_team_member",
    "class" => "",
    "icon" => get_template_directory_uri() . '/framework/images/vc_image.jpg',
    "admin_enqueue_css" => array(
        get_template_directory_uri() . '/framework/vc_extend/style.css'
    ),
    "category" => esc_html__('Content', 'rigel'),
    "params" => array(
        array(
            "type" => "attach_image",
            "class" => "",
            "heading" => esc_html__("Member Photo", 'rigel'),
            "param_name" => "image",
            "value" => esc_html__("", 'rigel')
        ),
        array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Name", 'rigel'),
            "param_name" => "name",
            "value" => esc_html__("Jhon Doe", 'rigel')
        ),
        array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Position In Company", 'rigel'),
            "param_name" => "position",
            "value" => esc_html__("My Position In Company", 'rigel'),
            "description" => esc_html__("", 'rigel')
        ),
        array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Contact text", 'rigel'),
            "param_name" => "welcome",
            "value" => esc_html__("Text above the icons", 'rigel')
        ),
        array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("URL to Facebook page", 'rigel'),
            "param_name" => "fb_url",
            "value" => esc_html__("", 'rigel')
        ),
        array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("URL to Twitter page", 'rigel'),
            "param_name" => "tw_url",
            "value" => esc_html__("", 'rigel')
        ),
        array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("URL to Google plus page", 'rigel'),
            "param_name" => "gplus_url",
            "value" => esc_html__("", 'rigel')
        ),
        array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("URL to LinkedIn page", 'rigel'),
            "param_name" => "in_url",
            "value" => esc_html__("", 'rigel')
        ),
        array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("e-mail", 'rigel'),
            "param_name" => "mail_url",
            "value" => esc_html__("", 'rigel')
        ),
        array(
            "type" => "textarea_html",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Content", 'rigel'),
            "param_name" => "content",
            "value" => esc_html__("<p>I am test text block. Click edit button to change this text.</p>", 'rigel'),
            "description" => esc_html__('Enter your content.', 'rigel')
        )
    )
));
vc_map(array(
    "name" => esc_html__("Testimonial I", 'rigel'),
    "base" => "testimonial_i",
    "class" => "",
    "icon" => get_template_directory_uri() . '/framework/images/vc_image.jpg',
    "admin_enqueue_css" => array(
        get_template_directory_uri() . '/framework/vc_extend/style.css'
    ),
    "category" => esc_html__('Content', 'rigel'),
    "params" => array(
        array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Want to stick with header?", 'rigel'),
            "param_name" => "title",
            "value" => esc_html__("Testimonial Author", 'rigel')
        ),
        array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Date", 'rigel'),
            "param_name" => "date",
            "value" => esc_html__("Testimonial date", 'rigel')
        ),
        array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Rating", 'rigel'),
            "param_name" => "rating",
            "value" => esc_html__("5", 'rigel'),
            "description" => esc_html__("From 1 to 5", 'rigel')
        ),
        array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Company", 'rigel'),
            "param_name" => "company",
            "value" => esc_html__("Testimonial Company", 'rigel')
        ),
        array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("URL to Company Site", 'rigel'),
            "param_name" => "cpmpany_url",
            "value" => esc_html__("#", 'rigel')
        ),
        array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Author Image", 'rigel'),
            "param_name" => "image",
            "value" => esc_html__("#", 'rigel'),
            "description" => esc_html__("Past url to your image", 'rigel')
        ),
        array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Image Style", 'rigel'),
            "param_name" => "image_style",
            "value" => esc_html__("1", 'rigel'),
            "description" => esc_html__("1 -  Image Circle, 2 -  Image Rounded conors, 3 -  Image Polaroid Style", 'rigel')
        ),
        array(
            "type" => "colorpicker",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Background color", 'rigel'),
            "param_name" => "bg",
            "value" => '#ffffff',
            "description" => esc_html__("Choose background color", 'rigel')
        ),
        array(
            "type" => "colorpicker",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Border color", 'rigel'),
            "param_name" => "border",
            "value" => '#f6f6f6',
            "description" => esc_html__("Choose border color", 'rigel')
        ),
        array(
            "type" => "colorpicker",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Text color", 'rigel'),
            "param_name" => "color",
            "value" => '#666666',
            "description" => esc_html__("Choose text color", 'rigel')
        ),
        array(
            "type" => "textarea_html",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Content", 'rigel'),
            "param_name" => "content",
            "value" => esc_html__("<p>I am test text block. Click edit button to change this text.</p>", 'rigel'),
            "description" => esc_html__("Enter your content.", 'rigel')
        )
    )
));
vc_map(array(
    "name" => esc_html__("rigel icon I", 'rigel'),
    "base" => "vc_box",
    "class" => "",
    "icon" => get_template_directory_uri() . '/framework/images/vc_image.jpg',
    "admin_enqueue_css" => array(
        get_template_directory_uri() . '/framework/vc_extend/style.css'
    ),
    "category" => esc_html__('Content', 'rigel'),
    "params" => array(
        array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Want to stick with header?", 'rigel'),
            "param_name" => "title",
            "value" => esc_html__("Box Title", 'rigel'),
            "description" => esc_html__("Enter the box title", 'rigel')
        ),
        array(
            "type" => "colorpicker",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Icon Background color", 'rigel'),
            "param_name" => "icon_bg",
            "value" => '#ff5c00',
            "description" => esc_html__("Choose Icon Background color", 'rigel')
        ),
        array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Icon", 'rigel'),
            "param_name" => "icon",
            "value" => esc_html__("#", 'rigel'),
            "description" => esc_html__("Past url to your icon", 'rigel')
        ),
        array(
            "type" => "colorpicker",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Background color", 'rigel'),
            "param_name" => "bg",
            "value" => '#f9f9f9',
            "description" => esc_html__("Choose text color", 'rigel')
        ),
        array(
            "type" => "colorpicker",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Border color", 'rigel'),
            "param_name" => "border",
            "value" => '#ededed',
            "description" => esc_html__("Choose Border color", 'rigel')
        ),
        array(
            "type" => "colorpicker",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Text color", 'rigel'),
            "param_name" => "color",
            "value" => '#666666',
            "description" => esc_html__("Choose text color", 'rigel')
        ),
        array(
            "type" => "textarea_html",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Content", 'rigel'),
            "param_name" => "content",
            "value" => esc_html__("<p>I am test text block. Click edit button to change this text.</p>", 'rigel'),
            "description" => esc_html__("Enter your content.", 'rigel')
        )
    )
));
vc_map(array(
    "name" => esc_html__("rigel icon II", 'rigel'),
    "base" => "vc_box_ii",
    "class" => "",
    "icon" => get_template_directory_uri() . '/framework/images/vc_image.jpg',
    "admin_enqueue_css" => array(
        get_template_directory_uri() . '/framework/vc_extend/style.css'
    ),
    "category" => esc_html__('Content', 'rigel'),
    "params" => array(
        array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Want to stick with header?", 'rigel'),
            "param_name" => "title",
            "value" => esc_html__("Box Title", 'rigel'),
            "description" => esc_html__("Enter the box title", 'rigel')
        ),
        array(
            "type" => "colorpicker",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Icon Background color", 'rigel'),
            "param_name" => "icon_bg",
            "value" => '#ff5c00',
            "description" => esc_html__("Choose Icon Background color", 'rigel')
        ),
        array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Icon", 'rigel'),
            "param_name" => "icon",
            "value" => esc_html__("#", 'rigel'),
            "description" => esc_html__("Past url to your icon", 'rigel')
        ),
        array(
            "type" => "colorpicker",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Background color", 'rigel'),
            "param_name" => "bg",
            "value" => '#ffffff',
            "description" => esc_html__("Choose text color", 'rigel')
        ),
        array(
            "type" => "colorpicker",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Border color", 'rigel'),
            "param_name" => "border",
            "value" => '#ededed',
            "description" => esc_html__("Choose Border color", 'rigel')
        ),
        array(
            "type" => "colorpicker",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Text color", 'rigel'),
            "param_name" => "color",
            "value" => '#666666',
            "description" => esc_html__("Choose text color", 'rigel')
        ),
        array(
            "type" => "textarea_html",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Content", 'rigel'),
            "param_name" => "content",
            "value" => esc_html__("<p>I am test text block. Click edit button to change this text.</p>", 'rigel'),
            "description" => esc_html__("Enter your content.", 'rigel')
        )
    )
));
vc_map(array(
    "name" => esc_html__("rigel icon III", 'rigel'),
    "base" => "vc_box_iii",
    "class" => "",
    "icon" => get_template_directory_uri() . '/framework/images/vc_image.jpg',
    "admin_enqueue_css" => array(
        get_template_directory_uri() . '/framework/vc_extend/style.css'
    ),
    "category" => esc_html__('Content', 'rigel'),
    "params" => array(
        array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Want to stick with header?", 'rigel'),
            "param_name" => "title",
            "value" => esc_html__("Box Title", 'rigel'),
            "description" => esc_html__("Enter the box title", 'rigel')
        ),
        array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Icon", 'rigel'),
            "param_name" => "icon",
            "value" => esc_html__("#", 'rigel'),
            "description" => esc_html__("Past url to your icon", 'rigel')
        ),
        array(
            "type" => "textarea_html",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Content", 'rigel'),
            "param_name" => "content",
            "value" => esc_html__("<p>I am test text block. Click edit button to change this text.</p>", 'rigel'),
            "description" => esc_html__("Enter your content.", 'rigel')
        )
    )
));
vc_map(array(
    "name" => esc_html__("rigel icon IV", 'rigel'),
    "base" => "vc_box_iv",
    "class" => "",
    "icon" => get_template_directory_uri() . '/framework/images/vc_image.jpg',
    "admin_enqueue_css" => array(
        get_template_directory_uri() . '/framework/vc_extend/style.css'
    ),
    "category" => esc_html__('Content', 'rigel'),
    "params" => array(
        array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Want to stick with header?", 'rigel'),
            "param_name" => "title",
            "value" => esc_html__("Box Title", 'rigel'),
            "description" => esc_html__("Enter the box title", 'rigel')
        ),
        array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Title Link", 'rigel'),
            "param_name" => "titlelink",
            "value" => esc_html__("#", 'rigel'),
            "description" => esc_html__("Paste a link for title", 'rigel')
        ),
        array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Icon", 'rigel'),
            "param_name" => "icon",
            "value" => esc_html__("fa-ban", 'rigel'),
            "description" => esc_html__("FontAwesom icon", 'rigel')
        ),
        array(
            "type" => "colorpicker",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Icon Color", 'rigel'),
            "param_name" => "iconcolor",
            "value" => '#fff',
            "description" => esc_html__("Choose icon color", 'rigel')
        ),
        array(
            "type" => "colorpicker",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Title Color", 'rigel'),
            "param_name" => "titlecolor",
            "value" => '#666',
            "description" => esc_html__("Choose title color", 'rigel')
        ),
        array(
            "type" => "colorpicker",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Icon Background Color", 'rigel'),
            "param_name" => "bgcolor",
            "value" => '#000',
            "description" => esc_html__("Choose icon background  color", 'rigel')
        ),
        array(
            "type" => "textarea_html",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Content", 'rigel'),
            "param_name" => "content",
            "value" => esc_html__("<p>I am test text block. Click edit button to change this text.</p>", 'rigel'),
            "description" => esc_html__("Enter your content.", 'rigel')
        )
    )
));
vc_map(array(
    "name" => esc_html__("Achievements", 'rigel'),
    "base" => "achievements",
    "class" => "",
    "icon" => get_template_directory_uri() . '/framework/images/vc_image.jpg',
    "admin_enqueue_css" => array(
        get_template_directory_uri() . '/framework/vc_extend/style.css'
    ),
    "category" => esc_html__('Content', 'rigel'),
    "params" => array(
        array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Achievement Title", 'rigel'),
            "param_name" => "title",
            "value" => esc_html__("123", 'rigel'),
            "description" => esc_html__("Enter the achievement title", 'rigel')
        ),
        array(
            "type" => "colorpicker",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Text color", 'rigel'),
            "param_name" => "color",
            "value" => '#ff5c00',
            "description" => esc_html__("Choose text color", 'rigel')
        ),
        array(
            "type" => "textarea_html",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Content", 'rigel'),
            "param_name" => "content",
            "value" => esc_html__("<p>I am test text block. Click edit button to change this text.</p>", 'rigel'),
            "description" => esc_html__("Enter your content.", 'rigel')
        )
    )
));
vc_map(array(
    "name" => esc_html__("Content Break", 'rigel'),
    "base" => "c_break",
    "class" => "",
    "icon" => get_template_directory_uri() . '/framework/images/vc_image.jpg',
    "admin_enqueue_css" => array(
        get_template_directory_uri() . '/framework/vc_extend/style.css'
    ),
    "category" => esc_html__('Content', 'rigel'),
    "params" => array(
        array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Top Margin", 'rigel'),
            "param_name" => "m_t",
            "value" => esc_html__("40px", 'rigel'),
            "description" => esc_html__("", 'rigel')
        ),
        array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Bottom Margin", 'rigel'),
            "param_name" => "m_b",
            "value" => esc_html__("40px", 'rigel'),
            "description" => esc_html__("", 'rigel')
        ),
        array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Top Padding", 'rigel'),
            "param_name" => "p_t",
            "value" => esc_html__("40px", 'rigel'),
            "description" => esc_html__("", 'rigel')
        ),
        array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Bottom Padding", 'rigel'),
            "param_name" => "p_b",
            "value" => esc_html__("40px", 'rigel'),
            "description" => esc_html__("", 'rigel')
        ),
        array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Fix content on the center?", 'rigel'),
            "param_name" => "fixed",
            "value" => esc_html__("1", 'rigel'),
            "description" => esc_html__("Set '0' if you want to stretch content and '1' if you don't want.", 'rigel')
        ),
        array(
            "type" => "attach_image",
            "class" => "",
            "heading" => esc_html__("Background Image", 'rigel'),
            "param_name" => "image",
            "value" => esc_html__("", 'rigel')
        ),
        array(
            "type" => "colorpicker",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("BackGround color", 'rigel'),
            "param_name" => "bg",
            "value" => '#f9f9f9',
            "description" => esc_html__("Choose text color", 'rigel')
        ),
        array(
            "type" => "colorpicker",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Border color", 'rigel'),
            "param_name" => "border",
            "value" => '',
            "description" => esc_html__("Choose Border color", 'rigel')
        ),
        array(
            "type" => "colorpicker",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Text color", 'rigel'),
            "param_name" => "color",
            "value" => '#3a3a3a',
            "description" => esc_html__("Choose text color", 'rigel')
        ),
        array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Want to add extra class name?", 'rigel'),
            "param_name" => "extraclass",
            "value" => esc_html__("", 'rigel'),
            "description" => esc_html__("Extra class name", 'rigel')
        ),
        array(
            "type" => "textarea_html",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Content", 'rigel'),
            "param_name" => "content",
            "value" => esc_html__("<p>I am test text block. Click edit button to change this text.</p>", 'rigel'),
            "description" => esc_html__("Enter your content.", 'rigel')
        )
    )
));
vc_map(array(
    "name" => esc_html__("Full Paralax", 'rigel'),
    "base" => "c_break_full_paralax_break",
    "class" => "",
    "icon" => get_template_directory_uri() . '/framework/images/vc_image.jpg',
    "admin_enqueue_css" => array(
        get_template_directory_uri() . '/framework/vc_extend/style.css'
    ),
    "category" => esc_html__('Content', 'rigel'),
    "params" => array(
        array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Fix content on the center?", 'rigel'),
            "param_name" => "fixed",
            "value" => esc_html__("1", 'rigel'),
            "description" => esc_html__("Set '0' if you want to stretch content and '1' if you don't want.", 'rigel')
        ),
        array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Top Margin", 'rigel'),
            "param_name" => "m_t",
            "value" => esc_html__("40px", 'rigel'),
            "description" => esc_html__("", 'rigel')
        ),
        array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Bottom Margin", 'rigel'),
            "param_name" => "m_b",
            "value" => esc_html__("40px", 'rigel'),
            "description" => esc_html__("", 'rigel')
        ),
        array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Top Padding", 'rigel'),
            "param_name" => "p_t",
            "value" => esc_html__("40px", 'rigel'),
            "description" => esc_html__("", 'rigel')
        ),
        array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Bottom Padding", 'rigel'),
            "param_name" => "p_b",
            "value" => esc_html__("40px", 'rigel'),
            "description" => esc_html__("", 'rigel')
        ),
        array(
            "type" => "attach_image",
            "class" => "",
            "heading" => esc_html__("Upload LeftSide Background image", 'rigel'),
            "param_name" => "image",
            "value" => esc_html__("", 'rigel')
        ),
        array(
            "type" => "colorpicker",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("RightSide BackGround color", 'rigel'),
            "param_name" => "bgcolor",
            "value" => '#e9e8e4',
            "description" => esc_html__("Choose text color", 'rigel')
        ),
        array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Want to add extra class name?", 'rigel'),
            "param_name" => "extraclass",
            "value" => esc_html__("", 'rigel'),
            "description" => esc_html__("Extra class name", 'rigel')
        ),
        array(
            "type" => "textarea_html",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Content", 'rigel'),
            "param_name" => "content",
            "value" => esc_html__("<p>I am test text block. Click edit button to change this text.</p>", 'rigel'),
            "description" => esc_html__("Enter your content.", 'rigel')
        )
    )
));

vc_map(array(
    "name" => esc_html__("Rotated text", 'rigel'),
    "base" => "rotated_text",
    "class" => "",
    "icon" => get_template_directory_uri() . '/framework/images/vc_image.jpg',
    "admin_enqueue_css" => array(
        get_template_directory_uri() . '/framework/vc_extend/style.css'
    ),
    "category" => esc_html__('Content', 'rigel'),
    "params" => array(
        array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Rotation text", 'rigel'),
            "param_name" => "title",
            "value" => esc_html__("Text", 'rigel'),
            "description" => esc_html__("Enter text to rotate", 'rigel')
        ),
    )
));
/* ------------------------------------------------------------------------ */
/* / Tis if for Visual Composer Content Break shortcode/
/* ------------------------------------------------------------------------ */
add_filter('the_content', 'my_div_form');
function my_div_form($text)
{
    $regexp_code = "|\[vc_row(.*)\](.*)\[/vc_row\]|imuUs";
    preg_match_all($regexp_code, $text, $out);
    $text_out = "";
    foreach ($out[0] as $val) {
        $regexp_code1 = "|\[c_break(.*)\[/c_break(.*)\]|imuUs";
        preg_match_all($regexp_code1, $val, $out1);
        if (count($out1[1]) > 0) {
            foreach ($out1[0] as $key_c => $val_c) {
                $text_out .= $out1[0][$key_c];
            }
        } else {
            $text_out .= $val;
        }
    }
    if (count($out[0]) == 0) {
        $text_out = $text;
    }
    return $text_out;
}
?>