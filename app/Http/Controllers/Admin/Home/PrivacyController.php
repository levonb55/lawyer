<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Requests\Admin\TermsStore;
use App\Models\Admin\Content;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PrivacyController extends Controller
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

    //privacy
    public function index()
    {
        $privacy = $this->model->where('name','privacy')->get();
        return view('admin.privacy.privacy',compact('privacy'));
    }
    public function store(TermsStore $request){
        $data = $request->except('_token');
        $data['name'] = 'privacy';
        $this->model->create($data);
        return redirect()->back()->with('create','create resource');
    }
}
