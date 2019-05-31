<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Requests\Admin\TermsStore;
use App\Models\Admin\Content;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TermsController extends Controller
{
    protected  $model;

    /**
     * MessageController constructor.
     * @param Message $model
     */
    public function __construct(Content $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $terms = $this->model->where('name','terms')->get();

        return view('admin.terms.terms',compact('terms'));
    }


    public function store(TermsStore $request){
        $data = $request->except('_token');
        $data['name'] = 'terms';
        $this->model->create($data);
        return redirect()->back()->with('create','create resource');
    }

}
