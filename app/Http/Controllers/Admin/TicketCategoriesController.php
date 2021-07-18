<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\TicketCategory;

class TicketCategoriesController extends Controller
{
    public function index()
    {
        return view('admin.ticket_categories.index');
    }

    public function grid(Request $request)
    {
        if ($request->ajax() && $request->exists('req')) {
            $req = json_decode($request->get('req'));
            $perPage = $req->page->perPage;
            $from = $perPage * (($req->page->currentPage) - 1);

            $query = TicketCategory::select(['id', 'name', 'order', 'published']);

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
        return view('admin.ticket_categories.create')->with([
            'pageTitle' => 'ایجاد دسته بندی جدید'
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
        ]);
        $data = $request->all();
        $data['alias'] = (empty($data['alias'])) ? str_replace(" ", "-", $data['name']) : str_replace(" ", "-", $data['alias']);;
        $data['user_id'] = \Auth::id();
        $data['published'] = $request->has('published');
        TicketCategory::create($data);
        return redirect('/admin/ticket-categories');
    }

    public function edit($id)
    {
        return view('admin.ticket_categories.edit')->with('ticketCategory', TicketCategory::find($id));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
        ]);

        $category = TicketCategory::find($id);
        $data = $request->all();
        $data['alias'] = (empty($data['alias'])) ? str_replace(" ", "-", $data['name']) : str_replace(" ", "-", $data['alias']);;
        $data['user_id'] = \Auth::id();
        $data['published'] = $request->has('published');
        $category->update($data);
        return redirect('/admin/ticket-categories');

    }

    public function destroy($id)
    {
        // TODO: check category posts
        TicketCategory::destroy($id);
        return redirect()->back();
    }
}
