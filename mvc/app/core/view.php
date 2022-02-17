<?php 
class view
{
    public static function load($view_name, $view_data=[])
    {
        $files = VIEWS.$view_name.'.php';
        if(file_exists($files)){
            extract($view_data);
            ob_start();
                require($files);
            ob_end_flush();
        }
        else{
            echo "This view : ".$view_name." does not exist";
        }
    }
}
