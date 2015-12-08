<?php namespace Blog\Http\Controllers\Admin;

use Blog\Comment;
use Blog\Http\Controllers\Controller;
use Blog\Http\Requests;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('admin.comments.index');
    }

    public function grid(Request $request)
    {
        if ($request->ajax() && $request->exists('req')) {
            $req = json_decode(\Input::get('req'));
            $perPage = $req->page->perPage;
            $from = $perPage * (($req->page->currentPage) - 1);

            $query = Comment::select(['comments.id as comments.id', 'comments.post_id as comments.post_id', 'comments.name as comments.name', 'comments.email as comments.email', 'comments.website as comments.website', 'comments.body as comments.body', 'comments.approved as comments.approved', 'comments.created_at as comments.created_at']);

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

    public function toggleApproved($id)
    {
        $comment = Comment::find($id);
        $comment->approved = ($comment->approved) ? false : true;
        $comment->save();
        return redirect('admin/comments');
    }

}
