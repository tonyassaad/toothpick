<?php
namespace App\Services\Admin;
use App\Helper\GeneralHelper;
use App\Models\Posts;
use Auth;
use Carbon\Carbon;
use Exception;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Arr;
 
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
 

class PostService
{

    public static function createPost($params)
    {
        $params['slug'] = Str::slug($params['title']);

        $product = Posts::firstOrCreate(
            ['title' => $params['title']],
            $params
        );
        if ($product) {
        }
        return $product;
    }


    public static function editPost($params, int $postId)
    {
        $post = new Posts();
        $params['slug'] = Str::slug($params['title']);
        $postToUpdate = $post->where('id', $postId);
        if ($postToUpdate->update(
            [
                'title' => $params['title'],
                'sub_title' => $params['sub_title'],
                'slug' => $params['slug'],
                'description' => $params['description']

            ],
        )) {
            return  $postToUpdate->first();
        }
    }




    public static function listPost($itemPerPage)
    {
        $query = (new Posts())->newQuery();
        $query->with('user');
        $query->select(
            'posts.*'
        );
        $posts = $query->paginate($itemPerPage);
        return $posts;
    }


    public static function deletePostById($id)
    {
        return Posts::where('id', $id)->delete();
    }

    public static function getPostById($id)
    {
        return Posts::findOrFail($id);
    }
}
