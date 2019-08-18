<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $perPage = 15;
        $posts = Post::latest()->paginate($perPage);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create(Request $request)
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'loanAmount' => 'integer|min:1000|max:100000000',
            'loanTerm' => 'integer|min:1|max:50',
            'interestRate' => 'regex:/^\d*(\.\d{1,2})?$/|between:1.00,36.00',
        ]);
        $requestData = $request->all();

        $data = Post::create($requestData);
        $id = $data->id;
        return redirect("admin/posts/$id")->with('flash_message', 'The loan has been created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);

        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);

        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'loanAmount' => 'integer|min:1000|max:100000000',
            'loanTerm' => 'integer|min:1|max:50',
            'interestRate' => 'regex:/^\d*(\.\d{1,2})?$/|between:1.00,36.00'
        ]);
        $requestData = $request->all();

        $post = Post::findOrFail($id);
        $post->update($requestData);
        return redirect("admin/posts/$id")->with('flash_message', 'The loan has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Post::destroy($id);

        return redirect('admin/posts')->with('flash_message', "The loan #$id has been delete successfully");
    }
}
