<?php

namespace App\Models;

use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post 
{
    public $title;
    public $exerpt;
    public $date;
    public $body;
    public $slug;
    public function __construct($title,$exerpt,$date,$body,$slug){
        $this->title=$title;
        $this->exerpt=$exerpt;
        $this->date=$date;
        $this->body=$body;
        $this->slug=$slug;
    }
    
    public static function find($slug){
       return static::all()->firstWhere('slug',$slug);
        /**
        $path = resource_path("/posts/{$slug}.html");
        if(!file_exists($path)){
            throw new ModelNotFoundException;
        }
        return cache()->remember("posts.{$slug}",1200, fn() =>  file_get_contents($path));
        //*/
    }

    public static function all(){
        return cache()->rememberForever('posts.all', function(){
            return collect(File::files(resource_path("/posts")))
            ->map(fn($file)=>  YamlFrontMatter::parseFile($file))
            ->map(fn($document)=> new Post(
                $document->title,
                $document->exerpt,
                $document->date,
                $document->body(),
                $document->slug))->sortByDesc('date');
        });
        

        /**
        $files= File::files(resource_path("/posts"));

        return array_map(function($file){
            return $file->getContents();
        },$files);
        //*/
    }
}
