<?php

    use Illuminate\Support\Facades\File;
    use Illuminate\Support\Facades\Http;
    use Illuminate\Support\Facades\Response;

    function log_JSON_file($my_data, $tag='untagged')
    {
        if(env('APP_DEBUG')===true){
            $data = json_encode($my_data);
            $fileName = $tag.'_' .time() . '_datafile.json';
            $dir = '/json_logs/';
            create_directory(storage_path($dir));
            File::put(storage_path($dir . $fileName), $data);
            $file_path = storage_path($dir . $fileName);
            return Response::download($file_path);
        }
    }
