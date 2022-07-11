<?php

namespace App\Service;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostService
{
    public function store($data){
        try{

            DB::beginTransaction();
            //получаем теги из пришедших полей 
            $tagIds = $data['tag_ids'] ?? [];

            // удаляем переменную из массива для коректной работы(Post::firstOrCreate($data));
            unset($data['tag_ids']);

            //сохранение файла и присвоение значений (Storage::put() returns 'путь к сохраненному файлу')
            $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            $data['post_image'] = Storage::disk('public')->put('/images', $data['post_image']);   

            $post = Post::firstOrCreate($data);
            $post->tags()->attach($tagIds);
            DB::commit();

        } catch(\Exception $exception){
            DB::rollBack();
            return abort(500);
        }
    }
    public function update($data, $post){
        try{

            DB::beginTransaction();
            //получаем теги из пришедших полей 
            $tagIds = $data['tag_ids'] ?? [];

            // удаляем переменную из массива для коректной работы(Post::firstOrCreate($data));
            unset($data['tag_ids']);
            
            //сохранение файла и присвоение значений (Storage::put() returns 'путь к сохраненному файлу')
            if(isset($data['preview_image'])){
                $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            }

            if(isset($data['post_image'])){
                $data['post_image'] = Storage::disk('public')->put('/images', $data['post_image']);
            }    
        
            $post->update($data);
            $post->tags()->sync($tagIds);
            DB::commit();

        } catch(\Exception $exception){
            DB::rollBack();
            return abort(500);
        }
    }
}
