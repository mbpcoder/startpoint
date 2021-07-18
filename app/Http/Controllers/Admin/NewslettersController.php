<?php namespace App\Http\Controllers\Admin;


use StartPoint\Http\Controllers\Controller;
use StartPoint\Newsletter;
use Illuminate\Http\Request;

class NewslettersController extends Controller
{

    /**
     * Display a listing of newsletters
     *
     * @return Response
     */
    public function index()
    {
        return view('admin.newsletters.index');
    }

    public function grid(Request $request)
    {
        if ($request->ajax() && $request->exists('req')) {
            $req = json_decode($request->get('req'));
            $perPage = 10;
            $from = $perPage * (($req->page->currentPage) - 1);
            $query = Newsletter::join('users', 'newsletters.user_id', '=', 'users.id')
                ->select(['newsletters.id as newsletters.id', 'users.full_name', 'newsletters.title as newsletters.title', 'newsletters.content as newsletters.content', 'newsletters.receivers as newsletters.receivers', 'newsletters.created_at as newsletters.created_at']);
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

    public function create()
    {
        return view('admin.newsletters.create');
    }

    public function destroy($id)
    {
        Newsletter::destroy($id);

        return redirect('/admin/newsletters');
    }
}
