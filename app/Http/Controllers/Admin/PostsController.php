<?php

namespace App\Http\Controllers\Admin;

use App\Helper\ResponseOutputHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostsCollection;
use App\Models\Posts;
use App\Services\Admin\PostService;
use App\Transformers\PostTransfomer;
use App\Validators\PostValidator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostsController extends Controller
{



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $post = PostService::listPost($request->get('item_per_page'));
        $postReponse = PostsCollection::collection($post);
        return ResponseOutputHelper::successGet($postReponse);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, PostValidator $postAdValidator)
    {
        $postAdValidator->validate($request->post());
        return ResponseOutputHelper::successPost(PostService::createPost($request->post()));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = PostService::getPostById($id);
        $postReponse = new PostsCollection($post);
        return ResponseOutputHelper::successGet($postReponse);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, PostValidator $postAdValidator)
    {
        $postAdValidator->validate($request->post());

        return ResponseOutputHelper::successPost(PostService::editPost($request->post(), $id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $postReponse = PostService::deletePostById($id);
        return ResponseOutputHelper::successGet($postReponse);
    }
}
