<?php
//Dynamically add Javascript files to header page
if(!function_exists('add_js')){
    function add_js($file='')
    {
        $str = '';
        $ci = &get_instance();
        $header_js = $ci->config->item('extra_js');
        if(empty($file)){
            return;
        }
        if(is_array($file)){
            if(!is_array($file) && count($file) <= 0){
                return;
            }
            foreach($file AS $item){
                $header_js[] = $item;
            }
            $ci->config->set_item('extra_js',$header_js);
        }else{
            $str = $file;
            $header_js[] = $str;
            $ci->config->set_item('extra_js',$header_js);
        }
    }
}
//Dynamically add CSS files to header page
if(!function_exists('add_css')){
    function add_css($file='')
    {
        $str = '';
        $ci = &get_instance();
        $header_css = $ci->config->item('extra_css');
        if(empty($file)){
            return;
        }
        if(is_array($file)){
            if(!is_array($file) && count($file) <= 0){
                return;
            }
            foreach($file AS $item){
                $header_css[] = $item;
            }
            $ci->config->set_item('extra_css',$header_css);
        }else{
            $str = $file;
            $header_css[] = $str;
            $ci->config->set_item('extra_css',$header_css);
        }
    }
}
//Putting our CSS and JS files together
if(!function_exists('put_headers')){
    function put_headers()
    {
        $str = '';
        $ci = &get_instance();
        $header_css = $ci->config->item('extra_css');
        $header_js  = $ci->config->item('extra_js');
        foreach($header_css AS $item){
            $str .= '<link rel="stylesheet" href="'.$item.'" type="text/css" />'."\n";
        }
        foreach($header_js AS $item){
            $str .= '<script type="text/javascript" src="'.$item.'"></script>'."\n";
        }
        return $str;
    }
}