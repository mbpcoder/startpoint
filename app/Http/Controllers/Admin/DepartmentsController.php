<?php namespace StartPoint\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use StartPoint\Department;
use StartPoint\Http\Requests;
use StartPoint\Http\Controllers\Controller;
use StartPoint\Post;

class DepartmentsController extends Controller
{
    public function index()
    {
        return view('admin.departments.index');
    }

    public function create()
    {
        $formAction = "/admin/departments/store";

        $departments = Department::all();

        return view('admin.departments.create', ['formAction' => $formAction, 'departments' => $departments]);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        Department::create($data);
        return redirect('/admin/departments');
    }

    public function edit($id)
    {
        $departments = Department::all();
        $department = Department::find($id);
        $formAction = "/admin/departments/". $department->id;

        return view('admin.departments.edit', ['formAction' => $formAction, 'department' => $department, 'departments' => $departments]);
    }

    public function update(Request $request, $id)
    {
        $department = Department::find($id);
        $data = $request->all();
        $department->update($data);
        return redirect('/admin/departments');

    }

    public function destroy($id)
    {
        Department::destroy($id);
        return redirect()->back();
    }

    public function grid(Request $request)
    {
        if ($request->ajax() && $request->exists('req')) {
            $req = json_decode($request->get('req'));
            $perPage = $req->page->perPage;
            $from = $perPage * (($req->page->currentPage) - 1);

            $query = Department::select(['id', 'name', 'parent_id']);
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
