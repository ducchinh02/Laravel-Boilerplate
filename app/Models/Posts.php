<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Posts extends Model
{
    use HasFactory;
    public function getAllPosts()
    {
        $posts = DB::select('SELECT * FROM posts ORDER BY created_at DESC');

        return $posts;
    }
    public function addNewPost($post)
    {
        DB::insert('INSERT INTO posts (title,content,slug,author,created_at) values (?,?,?,?,?)', $post);
    }
    public function updatePost($slug, $id, $post)
    {
        $dataUpdate = array_merge($post, [$slug, $id]);
        DB::update('UPDATE posts SET title=?,content=?,slug=? WHERE slug=? AND id=?', $dataUpdate);
    }
    public function deletePost($slug, $id)
    {
        DB::delete('DELETE FROM posts WHERE slug=:slug AND id=:id', ['slug' => $slug, 'id' => $id]);
    }
    public function getPostDetail($slug, $id)
    {
        $post = DB::selectOne('SELECT * FROM posts
        WHERE slug =:slug AND id =:id LIMIT 1', ['slug' => $slug, 'id' => $id]);
        return $post;
    }
}
