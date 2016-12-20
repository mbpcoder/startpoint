<?php

namespace StartPoint\Http\Controllers\Admin;

use StartPoint\Category;
use StartPoint\Http\Controllers\Controller;
use StartPoint\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.categories.index');
    }

    public function grid(Request $request)
    {
        if ($request->ajax() && $request->exists('req')) {
            $req = json_decode($request->get('req'));
            $perPage = $req->page->perPage;
            $from = $perPage * (($req->page->currentPage) - 1);

            $query = Category::select(['id', 'name', 'alias', 'order','published']);

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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create')->with([
            'pageTitle' => 'ایجاد دسته بندی جدید'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
        ]);
        $data = $request->all();
        $data['alias'] = (empty($data['alias'])) ? str_replace(" ", "-", $data['name']) : str_replace(" ", "-", $data['alias']);;
        $data['user_id'] = \Auth::id();
        $data['published'] = $request->has('published');
        Category::create($data);
        return redirect('/admin/categories');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.categories.edit')->with('category', Category::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
        ]);

        $category = Category::find($id);
        $data = $request->all();
        $data['alias'] = (empty($data['alias'])) ? str_replace(" ", "-", $data['name']) : str_replace(" ", "-", $data['alias']);;
        $data['user_id'] = \Auth::id();
        $data['published'] = $request->has('published');
        $category->update($data);
        return redirect('/admin/categories');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // TODO: check category posts
        Category::destroy($id);
        return redirect()->back();
    }
}
