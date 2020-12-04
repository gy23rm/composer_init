<?php

class AutoLoader{

    /**
     * 类库自动加载
     * @param string $class 对象类名
     * @return void
     */
    public static function autoload($class) {
        $name = $class;
        $path = '';
        if(false !== strpos($name,'\\')){
            $pathInfo = explode('\\', $class);
            $name = array_pop($pathInfo);
            $path = implode('/', $pathInfo);
        }
        if($path){
            $filename = ROOT_PATH."/$path/".$name.".php";
        }else{
            $filename = ROOT_PATH."/".$name.".php";
        }
        if(is_file($filename)) {
            include $filename;
            return;
        }
    }
}

spl_autoload_register('AutoLoader::autoload');

