<?php 


//About Video
if(function_exists('vc_map')){
   vc_map( array(
   "name" => __($pre_text."Slider Video"),
   "base" => "slidervideo",
   "class" => "",
   "category" => 'Content',
   "icon" => "icon-st",
   "params" => array(
      array(
         "type" => "attach_image",
         "holder" => "div",
         "class" => "",
         "heading" => __("Image Banner", 'ananke'),
         "param_name" => "poster",
         "value" => "",
         "description" => __("Upload image banner if not use video.", 'ananke')
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Link video mp4",
         "param_name" => "mp4",
         "value" => "",
         "description" => __("Add link video .mp4", 'ananke')
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Link video webm",
         "param_name" => "webm",
         "value" => "",
         "description" => __("Add link video .webm", 'ananke')
      ), 
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Link video ogg",
         "param_name" => "ogg",
         "value" => "",
         "description" => __("Add link video .ogg", 'ananke')
      ),     
      array(
         "type" => "textarea_html",
         "holder" => "div",
         "class" => "",
         "heading" => __("Text Slider", 'ananke'),
         "param_name" => "content",
         "value" => "",
         "description" => __("List text slider.", 'ananke')
      ),
    )
    ));
}

//Moving Background
if(function_exists('vc_map')){
   vc_map( array(
   "name" => __($pre_text."Moving Background Slider"),
   "base" => "movingbg",
   "class" => "",
   "category" => 'Content',
   "icon" => "icon-st",
   "params" => array(
      array(
         "type" => "attach_image",
         "holder" => "div",
         "class" => "",
         "heading" => __("Image Moving", 'ananke'),
         "param_name" => "poster",
         "value" => "",
         "description" => __("Upload image moving.", 'ananke')
      ),
      array(
         "type" => "textarea_html",
         "holder" => "div",
         "class" => "",
         "heading" => __("Text Slider", 'ananke'),
         "param_name" => "content",
         "value" => "",
         "description" => __("List text slider.", 'ananke')
      ),
    )
    ));
}


//Moving Background
if(function_exists('vc_map')){
   vc_map( array(
   "name" => __($pre_text."Pattern Slider"),
   "base" => "patternbg",
   "class" => "",
   "category" => 'Content',
   "icon" => "icon-st",
   "params" => array(
      array(
         "type" => "attach_image",
         "holder" => "div",
         "class" => "",
         "heading" => __("Image Pattern", 'ananke'),
         "param_name" => "poster",
         "value" => "",
         "description" => __("Upload image pattern.", 'ananke')
      ),
      array(
         "type" => "textarea_html",
         "holder" => "div",
         "class" => "",
         "heading" => __("Text Slider", 'ananke'),
         "param_name" => "content",
         "value" => "",
         "description" => __("List text slider.", 'ananke')
      ),
    )
    ));
}


// Arrow Down for Revo Slider
if(function_exists('vc_map')){
   vc_map( array(
   "name" => __($pre_text."Arrow Down", 'ananke'),
   "base" => "arrowdown",
   "class" => "",
   "icon" => "icon-st",
   "category" => 'Content',
   "params" => array(
      array(
         "type" => "attach_image",
         "holder" => "div",
         "class" => "",
         "heading" => __("Change Background Button", 'ananke'),
         "param_name" => "bg",
         "value" => "",
         "description" => __("", 'ananke')
      ),
	  array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Button text", 'ananke'),
         "param_name" => "btntext",
         "value" => "ABOUT AGENCY",
         "description" => __("Button text.", 'ananke')
      ),
	   array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("URL (Link)", 'ananke'),
         "param_name" => "link",
         "value" => "#about",
         "description" => __("Button link.", 'ananke')
      ),	  
    )));
}


//Button Slider
if(function_exists('vc_map')){
   vc_map( array(
   "name" => __($pre_text."Buttons Slider", 'ananke'),
   "base" => "btnslider",
   "class" => "",
   "icon" => "icon-st",
   "category" => 'Content',
   "params" => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Text Button 1", 'ananke'),
         "param_name" => "text1",
         "value" => "portfolio",
         "description" => __("", 'ananke')
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Link Button 1", 'ananke'),
         "param_name" => "link1",
         "value" => "#work",
         "description" => __("", 'ananke')
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Text Button 2", 'ananke'),
         "param_name" => "text2",
         "value" => "contact",
         "description" => __("", 'ananke')
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Link Button 2", 'ananke'),
         "param_name" => "link2",
         "value" => "#contact",
         "description" => __("", 'ananke')
      ),
    )));
}

//Button Slider
if(function_exists('vc_map')){
   vc_map( array(
   "name" => __($pre_text."Socials Slider", 'ananke'),
   "base" => "socslider",
   "class" => "",
   "icon" => "icon-st",
   "category" => 'Content',
   "params" => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Icon 1", 'ananke'),
         "param_name" => "icon1",
         "value" => "twitter",
         "description" => __("Find here: <a target='_blank' href='http://fontawesome.io/icons/'>http://fontawesome.io/icons/</a>", 'ananke')
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Link 1", 'ananke'),
         "param_name" => "link1",
         "value" => "#",
         "description" => __("Link Social", 'ananke')
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Icon 2", 'ananke'),
         "param_name" => "icon2",
         "value" => "facebook",
         "description" => __("Find here: <a target='_blank' href='http://fontawesome.io/icons/'>http://fontawesome.io/icons/</a>", 'ananke')
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Link 2", 'ananke'),
         "param_name" => "link2",
         "value" => "#",
         "description" => __("Link Social", 'ananke')
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Icon 3", 'ananke'),
         "param_name" => "icon3",
         "value" => "",
         "description" => __("Find here: <a target='_blank' href='http://fontawesome.io/icons/'>http://fontawesome.io/icons/</a>", 'ananke')
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Link 3", 'ananke'),
         "param_name" => "link3",
         "value" => "#",
         "description" => __("Link Social", 'ananke')
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Icon 4", 'ananke'),
         "param_name" => "icon4",
         "value" => "github",
         "description" => __("Find here: <a target='_blank' href='http://fontawesome.io/icons/'>http://fontawesome.io/icons/</a>", 'ananke')
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Link 4", 'ananke'),
         "param_name" => "link4",
         "value" => "#",
         "description" => __("Link Social", 'ananke')
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Icon 5", 'ananke'),
         "param_name" => "icon5",
         "value" => "google-plus",
         "description" => __("Find here: <a target='_blank' href='http://fontawesome.io/icons/'>http://fontawesome.io/icons/</a>", 'ananke')
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Link 5", 'ananke'),
         "param_name" => "link5",
         "value" => "#",
         "description" => __("Link Social", 'ananke')
      ),
    )));
}

//About Box
if(function_exists('vc_map')){
   vc_map( array(
   "name" => __($pre_text."About Box"),
   "base" => "aboutbox",
   "class" => "",
   "category" => 'Content',
   "icon" => "icon-st",
   "params" => array(
     array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Icon Box",
         "param_name" => "icon",
         "value" => "",
         "description" => __("Find here: <a target='_blank' href='http://fontawesome.io/icons/'>http://fontawesome.io/icons/</a>", 'ananke')
      ),    
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Title", 'ananke'),
         "param_name" => "title",
         "value" => "",
         "description" => __("Title Box.", 'ananke')
      ),
      array(
         "type" => "textarea",
         "holder" => "div",
         "class" => "",
         "heading" => __("Content", 'ananke'),
         "param_name" => "content",
         "value" => "",
         "description" => __("Content Box", 'ananke')
      ),
    )
    ));
}

//About Video
if(function_exists('vc_map')){
   vc_map( array(
   "name" => __($pre_text."About Video or Image"),
   "base" => "aboutvideo",
   "class" => "",
   "category" => 'Content',
   "icon" => "icon-st",
   "params" => array(
      array(
         "type" => "attach_image",
         "holder" => "div",
         "class" => "",
         "heading" => __("Image Left", 'ananke'),
         "param_name" => "poster",
         "value" => "",
         "description" => __("Upload image left if not use video.", 'ananke')
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Link video mp4",
         "param_name" => "mp4",
         "value" => "",
         "description" => __("Add link video .mp4", 'ananke')
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Link video webm",
         "param_name" => "webm",
         "value" => "",
         "description" => __("Add link video .webm", 'ananke')
      ), 
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Link video ogg",
         "param_name" => "ogg",
         "value" => "",
         "description" => __("Add link video .ogg", 'ananke')
      ),     
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Text Over Video", 'ananke'),
         "param_name" => "textover",
         "value" => "",
         "description" => __("", 'ananke')
      ),
      array(
         "type" => "textarea",
         "holder" => "div",
         "class" => "",
         "heading" => __("Content 1", 'ananke'),
         "param_name" => "content1",
         "value" => "",
         "description" => __("Content About", 'ananke')
      ),
      array(
         "type" => "textarea",
         "holder" => "div",
         "class" => "",
         "heading" => __("Content 2", 'ananke'),
         "param_name" => "content2",
         "value" => "",
         "description" => __("Content About", 'ananke')
      ),
      array(
         "type" => "textarea",
         "holder" => "div",
         "class" => "",
         "heading" => __("Content 3", 'ananke'),
         "param_name" => "content3",
         "value" => "",
         "description" => __("Content About", 'ananke')
      ),
    )
    ));
}


//Our Team
if(function_exists('vc_map')){
   vc_map( array(
   "name" => __($pre_text."Our Team", 'ananke'),
   "base" => "memberItem",
   "class" => "",
   "icon" => "icon-st",
   "category" => 'Content',
   "params" => array(
      array(
         "type" => "attach_image",
         "holder" => "div",
         "class" => "",
         "heading" => "Avarta",
         "param_name" => "src",
         "value" => "",
         "description" => __("Avarta of member, Recomended Size: 280 x 280", 'ananke')
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Name", 'ananke'),
         "param_name" => "name",
         "value" => "",
         "description" => __("Member's Name", 'ananke')
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Job", 'ananke'),
         "param_name" => "job",
         "value" => "",
         "description" => __("Member's job.", 'ananke')
      ),
      array(
         "type" => "textarea_html",
         "holder" => "div",
         "class" => "",
         "heading" => __("Description", 'ananke'),
         "param_name" => "content",
         "value" => "",
         "description" => __("Member's Description.", 'ananke')
      ),            
      array(
         "type"      => "textfield",
         "holder"    => "div",
         "class"     => "",
         "heading"   => __("Icon 1", 'ananke'),
         "param_name"=> "icon1",
         "value"     => "twitter",
         "description" => __("Find here: <a target='_blank' href='http://fontawesome.io/icons/'>http://fontawesome.io/icons/</a>", 'ananke')
      ),
     array(
         "type"      => "textfield",
         "holder"    => "div",
         "class"     => "",
         "heading"   => "Url 1",
         "param_name"=> "url1",
         "value"     => "#",
         "description" => __("Url.", 'ananke')
      ),
     array(
         "type"      => "textfield",
         "holder"    => "div",
         "class"     => "",
         "heading"   => __("Icon 2", 'ananke'),
         "param_name"=> "icon2",
         "value"     => "facebook",
         "description" => __("Find here: <a target='_blank' href='http://fontawesome.io/icons/'>http://fontawesome.io/icons/</a>", 'ananke')
      ),
     array(
         "type"      => "textfield",
         "holder"    => "div",
         "class"     => "",
         "heading"   => "Url 2",
         "param_name"=> "url2",
         "value"     => "#",
         "description" => __("Url.", 'ananke')
      ),
     array(
         "type"      => "textfield",
         "holder"    => "div",
         "class"     => "",
         "heading"   => __("Icon 3", 'ananke'),
         "param_name"=> "icon3",
         "value"     => "github",
         "description" => __("Find here: <a target='_blank' href='http://fontawesome.io/icons/'>http://fontawesome.io/icons/</a>", 'ananke')
      ),
     array(
         "type"      => "textfield",
         "holder"    => "div",
         "class"     => "",
         "heading"   => "Url 3",
         "param_name"=> "url3",
         "value"     => "#",
         "description" => __("Url.", 'ananke')
      ),
     array(
         "type"      => "textfield",
         "holder"    => "div",
         "class"     => "",
         "heading"   => __("Icon 4", 'ananke'),
         "param_name"=> "icon4",
         "value"     => "google-plus",
         "description" => __("Find here: <a target='_blank' href='http://fontawesome.io/icons/'>http://fontawesome.io/icons/</a>", 'ananke')
      ),
     array(
         "type"      => "textfield",
         "holder"    => "div",
         "class"     => "",
         "heading"   => "Url 4",
         "param_name"=> "url4",
         "value"     => "#",
         "description" => __("Url.", 'ananke')
      ),
    )));
}


//Call To Action
if(function_exists('vc_map')){
   vc_map( array(
   "name" => __($pre_text."Call To Action"),
   "base" => "callto",
   "class" => "",
   "category" => 'Content',
   "icon" => "icon-st",
   "params" => array(
     array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Label Button",
         "param_name" => "btntext",
         "value" => "",
         "description" => __("", 'ananke')
      ),    
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Label Button Hover", 'ananke'),
         "param_name" => "btnhover",
         "value" => "",
         "description" => __("", 'ananke')
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Link Button", 'ananke'),
         "param_name" => "link",
         "value" => "#",
         "description" => __("", 'ananke')
      ),
      array(
         "type" => "textarea",
         "holder" => "div",
         "class" => "",
         "heading" => __("Content", 'ananke'),
         "param_name" => "content",
         "value" => "",
         "description" => __("Content Box", 'ananke')
      ),
    )
    ));
}

// Our Facts
if(function_exists('vc_map')){
   vc_map( array(
   "name" => __($pre_text."Our Facts", 'ananke'),
   "base" => "ourfacts",
   "class" => "",
   "category" => 'Content',
   "icon" => "icon-st",
   "params" => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Title Fact", 'ananke'),
         "param_name" => "title",
         "value" => "",
         "description" => __("Title display in Our Facts box.", 'ananke')
      ),
     array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Number Fact", 'ananke'),
         "param_name" => "number",
         "value" => "",
         "description" => __("Number display in Our Facts box.", 'ananke')
      ),
      
    )));
}


// Slide Show
if(function_exists('vc_map')){
   vc_map( array(
   "name" => __($pre_text."Slide Show", 'ananke'),
   "base" => "slideshow",
   "class" => "",
   "category" => 'Content',
   "icon" => "icon-st",
   "params" => array(
      
    )));
}


// Services Box
if(function_exists('vc_map')){
	vc_map( array(
   "name" => __($pre_text."Services Box"),
   "base" => "servicebox",
   "class" => "",
   "category" => 'Content',
   "icon" => "icon-st",
   "params" => array(
	  array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Icon Service",
         "param_name" => "icon",
         "value" => "",
         "description" => __("Find here: <a target='_blank' href='http://html.vegatheme.com/svg-icons/'>http://html.vegatheme.com/svg-icons/</a>", 'ananke')
      ), 	
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Title Service", 'ananke'),
         "param_name" => "title",
         "value" => "",
         "description" => __("Title display in Services box.", 'ananke')
      ),
      array(
         "type" => "textarea_html",
         "holder" => "div",
         "class" => "",
         "heading" => __("Content Service", 'ananke'),
         "param_name" => "content",
         "value" => "",
         "description" => __("About your Services.", 'ananke')
      ),
    )
    ));
}


// Pricing Table
if(function_exists('vc_map')){
	vc_map( array(
   "name" => __($pre_text." Pricing Table", 'ananke'),
   "base" => "pricingtable",
   "class" => "",
   "category" => 'Content',
   "icon" => "icon-st",
   "params" => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Title Pricing", 'ananke'),
         "param_name" => "title",
         "value" => "",
         "description" => __("Title display in Pricing Table.", 'ananke')
      ),
	  array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Price Pricing", 'ananke'),
         "param_name" => "price",
         "value" => "",
         "description" => __("Price display in Pricing Table.", 'ananke')
      ),
      array(
         "type" => "textarea_html",
         "holder" => "div",
         "class" => "",
         "heading" => __("Detail Pricing", 'ananke'),
         "param_name" => "content",
         "value" => "",
         "description" => __("Content Pricing Table.", 'ananke')
      ),
	  array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Label Button", 'ananke'),
         "param_name" => "buttontext",
         "value" => "sign up",
         "description" => __("Text display in button.", 'ananke')
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Link Button", 'ananke'),
         "param_name" => "link",
         "value" => "#",
         "description" => __("Link in button.", 'ananke')
      ),
	  array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => __("Featured Pricing?", 'ananke'),
         "param_name" => "featured",
         "value" => array(   

                     __('No', 'ananke') => 'no',

                     __('Yes', 'ananke') => 'yes',

                    ),
         "description" => __("", 'ananke')
      ),
    )));
}

//blog
if(function_exists('vc_map')){
   vc_map( array(
   "name" => __($pre_text." Blog Post", 'ananke'),
   "base" => "blog",
   "class" => "",
   "icon" => "icon-st",
   "category" => 'Content',
   "params" => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Label button", 'ananke'),
         "param_name" => "btntext",
         "value" => "VIEW ALL",
         "description" => __("Text display in button.", 'ananke')
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("link button", 'ananke'),
         "param_name" => "link",
         "value" => "",
         "description" => __("Link button.", 'ananke')
      ),
      
    )));
}

// Portfolio
if(function_exists('vc_map')){
   vc_map( array(
   "name"      => __($pre_text."Portfolio", 'ananke'),
   "base"      => "portfolio",
   "class"     => "",
   "icon" => "icon-st",
   "category"  => 'Content',
   "params"    => array(
       array(
         "type"      => "textfield",
         "holder"    => "div",
         "class"     => "",
         "heading"   => __("Text Show All Portfolio", 'ananke'),
         "param_name"=> "all",
         "value"     => "Show All",
         "description" => __("Text Filter Show All Portfolio.", 'ananke')
      ),
	  array(         
         "type" => "textfield",         
         "holder" => "div",         
         "class" => "",         
         "heading" => "Order by :",         
         "param_name" => "orderby",         
         "value" => "date",         
         "description" => __("Enter Order by. Example: title, date, rand ", 'ananke' )      
      ),  
      array(         
         "type" => "textfield",         
         "holder" => "div",         
         "class" => "",         
         "heading" => "Order : ",         
         "param_name" => "order",         
         "value" => "ASC",         
         "description" => __("Enter Order. Example: DESC, ASC ", 'ananke' )      
      ),  
      array(
         "type"      => "textfield",
         "holder"    => "div",
         "class"     => "",
         "heading"   => __("Number Show Portfolio", 'ananke'),
         "param_name"=> "show",
         "value"     => "8",
         "description" => __("Number Show Portfolio, Default: 8.", 'ananke')
      ),
    )));
}

//Slider Project
if(function_exists('vc_map')){
   vc_map( array(
   "name"      => __($pre_text."Slider Project", 'ananke'),
   "base"      => "folioslider",
   "class"     => "",
   "icon" => "icon-st",
   "category"  => 'Content',
   "params"    => array(
      array(
         "type" => "attach_images",
         "holder" => "div",
         "class" => "",
         "heading" => "Images Slider",
         "param_name" => "gallery",
         "value" => "",
         "description" => __("", 'ananke')
      ),
      
    )));
}

//Video Player
if(function_exists('vc_map')){
   vc_map( array(
   "name"      => __($pre_text."Video Project", 'ananke'),
   "base"      => "videoplayer",
   "class"     => "",
   "icon" => "icon-st",
   "category"  => 'Content',
   "params"    => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Link Video",
         "param_name" => "video",
         "value" => "",
         "description" => __("Ex: http://player.vimeo.com/video/88883554 or http://www.youtube.com/embed/eP2VWNtU5rw", 'ananke')
      ), 
        array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Set with video", 'ananke' ),
         "param_name" => "withvideo",
         "value" => "950",
         "description" => __("Example with number : 940 ", 'ananke' )
      ),     
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Set height video", 'ananke' ),
         "param_name" => "heightvideo",
         "value" => "400",
         "description" => __("Example height number : 450 ", 'ananke' )
      ), 
    )));
}

//Audio Player (use)
if(function_exists('vc_map')){
   vc_map( array(
   "name"      => __($pre_text."Audio Project", 'ananke'),
   "base"      => "audiopost",
   "class"     => "",
   "icon" => "icon-st",
   "category"  => 'Content',
   "params"    => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Link Mp3",
         "param_name" => "linkmp3",
         "value" => "",
         "description" => __("", 'ananke')
      ), 
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Link Ogg",
         "param_name" => "linkoog",
         "value" => "",
         "description" => __("", 'ananke')
      ),
    )));
}

//Clients Logo 
if(function_exists('vc_map')){
   vc_map( array(
   "name"      => __($pre_text." Clients Logo", 'ananke'),
   "base"      => "clients",
   "class"     => "",
   "icon" => "icon-st",
   "category"  => 'Content',
   "params"    => array(
      array(
         "type" => "attach_image",
         "holder" => "div",
         "class" => "",
         "heading" => "Logo Client",
         "param_name" => "src",
         "value" => "",
         "description" => __("Logo Client, Recomended Size: 156 x 113", 'ananke')
      ), 
           array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Link Out Client", 'ananke'),
         "param_name" => "link",
         "value" => "",
         "description" => __("Link Out Client.", 'ananke')
      ),
      
    )));
}


//Contact Info
if(function_exists('vc_map')){
	vc_map( array(
   "name"      => __($pre_text."Contact Info", 'ananke'),
   "base"      => "cinfo",
   "class"     => "",
   "icon" => "icon-st",
   "category"  => 'Content',
   "params"    => array(
      array(
         "type"      => "textfield",
         "holder"    => "div",
         "class"     => "",
         "heading"   => __("Icon", 'ananke'),
         "param_name"=> "icon",
         "value"     => "",
         "description" => __("Icon before title info", 'ananke')
      ),
	   array(
         "type"      => "textfield",
         "holder"    => "div",
         "class"     => "",
         "heading"   => __("Title", 'ananke'),
         "param_name"=> "title",
         "value"     => "",
         "description" => __("Title info", 'ananke')
      ),
      array(
         "type"      => "textarea",
         "holder"    => "div",
         "class"     => "",
         "heading"   => __("Description", 'ananke'),
         "param_name"=> "desc",
         "value"     => "",
         "description" => __("Description info", 'ananke')
      ),
    )));
}


//Google Map
if(function_exists('vc_map')){
	vc_map( array(
   "name"      => __($pre_text." Maps", 'ananke'),
   "base"      => "maps",
   "class"     => "",
   "icon" => "icon-st",
   "category"  => 'Content',
   "params"    => array(
      array(
         "type"      => "textfield",
         "holder"    => "div",
         "class"     => "",
         "heading"   => __("Text Button Toggle Map", 'ananke'),
         "param_name"=> "btntext",
         "value"     => 'Locate Us on Map',
         "description" => __("", 'ananke')
      ),
		array(
         "type"      => "textfield",
         "holder"    => "div",
         "class"     => "",
         "heading"   => __("Latitude", 'ananke'),
         "param_name"=> "latitude",
         "value"     => 44.789511,
         "description" => __("", 'ananke')
      ),
	  array(
         "type"      => "textfield",
         "holder"    => "div",
         "class"     => "",
         "heading"   => __("Longitude", 'ananke'),
         "param_name"=> "longitude",
         "value"     => 20.43633,
         "description" => __("", 'ananke')
      ),     
	  array(
         "type"      => "attach_images",
         "holder"    => "div",
         "class"     => "",
         "heading"   => __("Location Image", 'ananke'),
         "param_name"=> "imgmap",
         "value"     => "",
         "description" => __("Upload Location Image.", 'ananke')
      ),
      array(
         "type"      => "textfield",
         "holder"    => "div",
         "class"     => "",
         "heading"   => __("Tootip Location Click", 'ananke'),
         "param_name"=> "tooltip",
         "value"     => 'Ananke',
         "description" => __("", 'ananke')
      ),
	  array(
         "type"      => "textfield",
         "holder"    => "div",
         "class"     => "",
         "heading"   => __("Zoom map number", 'ananke'),
         "param_name"=> "zoommap",
         "value"     => '14',
         "description" => __("", 'ananke')
      ),
      array(
        "type" => "dropdown",
        "heading" => __('Options Show Gmap', 'ananke'),
        "param_name" => "showgmap",
        "value" => array(   
            __('Option 1: Click button for show Gmap', 'ananke') => 'optionmap1',
            __('Option 2: Always show Gmap', 'ananke') => 'optionmap2',           
         ),
        "description" => __("Options Show Gmap, Default: Click button for show Gmap", 'ananke'),      
      ),          
    )));
}
?>