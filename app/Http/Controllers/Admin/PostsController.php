<?php namespace Blog\Http\Controllers\Admin;

use Blog\Http\Controllers\Controller;
use Blog\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('admin.posts.index');
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:6',
            'body' => 'required',
        ], [], \Lang::get('attributes'));
        $post = new Post();
        $post->title = $request->get('title');
        $post->body = $request->get('body');
        $post->user_id = \Auth::id();
        $post->published = $request->has('published');
        $post->save();
        return redirect('/admin/posts');
    }

    public function edit($id)
    {
        $post = Post::find($id);
        return view('admin.posts.edit')->with([
            'post' => $post,
        ]);
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:6',
            'body' => 'required',
        ], [], \Lang::get('attributes'));
        $post = Post::find($id);
        $post->title = $request->get('title');
        $post->body = $request->get('body');
        $post->published = $request->has('published');
        $post->save();
        return redirect('/admin/posts');

    }

    public function show($id = 0)
    {
        $post = Post::find($id);
        return view('admin.posts.show')->with('post', $post);
    }

    public function destroy($id)
    {
        Post::destroy($id);
        return redirect('/admin/posts');
    }

    public function grid(Request $request)
    {
        if ($request->ajax() && $request->exists('req')) {
            $req = json_decode(\Input::get('req'));
            $perPage = $req->page->perPage;
            $from = $perPage * (($req->page->currentPage) - 1);

            $query = Post::select(['posts.id as posts.id', 'posts.title as posts.title', 'posts.created_at as posts.created_at', 'posts.updated_at as posts.updated_at']);

            if (!is_null($req->sort)) {
                foreach ($req->sort as $key => $value) {
                    $query->orderBy($key, $value);
                }
            }
            if (!is_null($req->filter)) {
                foreach ($req->filter as $key => $value) {
                    switch ($value->operator) {
                        case 'IsEqualTo':
                            $query->where($key, '=', $value->operand1);
                            break;
                        case 'IsNotEqualTo':
                            $query->where($key, '<>', $value->operand1);
                            break;
                        case 'StartWith':
                            $query->where($key, 'LIKE', $value->operand1 . '%');
                            break;
                        case 'Contains':
                            $query->where($key, 'LIKE', '%' . $value->operand1 . '%');
                            break;
                        case 'DoesNotContains':
                            $query->where($key, 'NOT LIKE', '%' . $value->operand1 . '%');
                            break;
                        case 'EndsWith':
                            $query->where($key, 'LIKE', '%' . $value->operand1);
                            break;
                        case 'Between':
                            $query->whereBetween($key, array($value->operand1, $value->operand2));
                            break;
                    }
                }
            }
            $total = $query->count();
            $query->take($perPage)->skip($from);
            $data = $query->get();
            $totalPage = ceil($total / $perPage);

            $countDataPerPage = count($data);
            $page = array(
                "currentPage" => $req->page->currentPage,
                "lastPage" => $totalPage,
                "total" => $total,
                "from" => $from + 1,
                "count" => $countDataPerPage,
                "perPage" => $perPage,
            );
            $result = ['data' => $data, 'page' => $page];
            return json_encode($result, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        }
    }
}
