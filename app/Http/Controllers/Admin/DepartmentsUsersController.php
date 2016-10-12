<?php

namespace StartPoint\Http\Controllers\Admin;

use Illuminate\Support\Facades\Redirect;
use StartPoint\Department;
use StartPoint\DepartmentUser;
use StartPoint\Http\Controllers\Controller;
use Illuminate\Http\Request;
use StartPoint\User;

class DepartmentsUsersController extends Controller
{
    public function index()
    {
        return view('admin.departments_users.index');
    }

    public function create()
    {
        $departments = Department::all();
        $users = User::all();

        $data = [
            'users' => $users,
            'departments' => $departments
        ];

        return view('admin.departments_users.create', $data);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['manual'] = 1;

        if ($data['user_id'] == 0 or $data['department_id'] == 0)
            return Redirect::back()->withErrors(['کاربر و یا دپارتمان انتخاب نشده است']);

        $status = false;
        if (DepartmentUser::create($data))
            $status = true;
        /*
         * Find department child's
         */
        if ($status) {
            $departments = Department::where('parent_id', $data['department_id'])->get();
            foreach ($departments as $department) {
                $child = [
                    'user_id' => $data['user_id'],
                    'department_id' => $department->id,
                    'manual' => 0
                ];
                DepartmentUser::create($child);
            }
        }
        return redirect('/admin/departments_users');
    }

    public function edit($id)
    {
        $department = DepartmentUser::find($id);
        $departments = Department::all();
        $users = User::all();

        $data = [
            'formAction' => '/admin/departments_users/' . $department->id,
            'users' => $users,
            'department' => $department,
            'departments' => $departments
        ];

        return view('admin.departments_users.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $department = DepartmentUser::find($id);

        DepartmentUser::where([
                ['manual', '=', 0],
                ['user_id', '=', $department->user_id],
            ])->delete();

        $data = $request->all();
        $data['manual'] = 1;

        $department->update($data);
        /*
         * Find department child's
         */
        $departments = Department::where('parent_id', $data['department_id'])->get();
        foreach ($departments as $department) {
            $child = [
                'user_id' => $data['user_id'],
                'department_id' => $department->id,
                'manual' => 0
            ];
            DepartmentUser::create($child);
        }
        return redirect('/admin/departments');
    }

    public function destroy($id)
    {
        DepartmentUser::destroy($id);
        return redirect()->back();
    }

    public function grid(Request $request)
    {
        if ($request->ajax() && $request->exists('req')) {
            $req = json_decode($request->get('req'));
            $perPage = $req->page->perPage;
            $from = $perPage * (($req->page->currentPage) - 1);

            $query = DepartmentUser::where('manual', '=', 1);

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

            foreach ($data as $item) {
                $item->user_name = $item->user->name;
                $item->department_name = $item->department->name;
            }

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
