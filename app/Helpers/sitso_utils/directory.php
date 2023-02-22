<?php

    use Illuminate\Support\Facades\File;


    function create_directory($path){
        if(!File::isDirectory($path)){
            File::makeDirectory($path, 0777, true, true);
            return  $path;
        }
        if(File::isDirectory($path)){
            return  $path;
        }
    }
