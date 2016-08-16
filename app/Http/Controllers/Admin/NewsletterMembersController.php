<?php

namespace StartPoint\Http\Controllers\Admin;

use StartPoint\Http\Controllers\Controller;
use StartPoint\NewsletterMember;
use Illuminate\Http\Request;
use Input as Input;
use Redirect as Redirect;
use Validator as Validator;
use View as View;

class NewsletterMembersController extends Controller
{

    /**
     * Display a listing of newsletter_members
     *
     * @return Response
     */
    public function index()
    {
        return view('admin.newsletter_members.index');
    }

    public function grid(Request $request)
    {
        if ($request->ajax() && $request->exists('req')) {
            $req = json_decode($request->get('req'));
            $perPage = $req->page->perPage;
            $from = $perPage * (($req->page->currentPage) - 1);
            $query = NewsletterMember::distinct();
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

            $data = $query->get(['newsletter_members.id as newsletter_members.id', 'newsletter_members.email as newsletter_members.email', 'newsletter_members.code as newsletter_members.code', 'newsletter_members.active as newsletter_members.active']);
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

    public function active($code)
    {
        $member = NewsletterMember::where('code', '=', $code)->get()->first();
        $member->active = true;
        $member->save();

        return redirect()->back()->with('message', 'ایمیل ' . $member->email . ' به خبرنامه اضافه گردید');
    }

    public function deactivate($code)
    {
        $member = NewsletterMember::where('code', '=', $code)->get()->first();
        $member->active = false;
        $member->save();
        return redirect()->back()->with('message', 'ایمیل ' . $member->email . ' از خبرنامه حذف گردید');
    }

    /**
     * Show the form for creating a new newsletter_members
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.newsletter_members.create');
    }

    /**
     * Store a newly created newslettermembers in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $data = $request->get('emails');
        $data = str_replace(array("\n", "\r", ','), ' ', $data);
        $emails = explode(' ', $data);
        $emails = array_filter($emails);
        foreach ($emails as $email) {
            $email = trim($email);
            if ($email != '' && !filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                $data = array('email' => $email);
                $data['code'] = md5($data['email']);
                $data['active'] = true;

                $count = NewsletterMember::where('email', '=', $data['email'])->count();
                if ($count > 0) {
                    $member = NewsletterMember::where('email', '=', $data['email'])->get()->first();
                    $member->active = true;
                    $member->save();
                } else {
                    NewsletterMember::create($data);
                }
            }
        }
        return Redirect::to('admin/newsletter_members');
    }
}
