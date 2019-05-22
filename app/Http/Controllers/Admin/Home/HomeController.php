<?php

namespace App\Http\Controllers\Admin\Home;

use App\Models\Admin\Content;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
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
    //home
    public function homeFirst()
    {
        $first_content = $this->model->where('name','home_first')->first();
        return view('admin.about.about_first',compact('first_content'));
    }
    public function homeSecond()
    {
        $second_content = $this->model->where('name','home_second')->first();
        return view('admin.about.about_second',compact('second_content'));
    }
    public function homeThird()
    {
        $third_content = $this->model->where('name','home_third')->first();
        return view('admin.about.about_third',compact('third_content'));
    }

    //about
    public function aboutFirst()
    {
        $first_content = $this->model->where('name','about_first')->first();
        return view('admin.about.about_first',compact('first_content'));
    }
    public function aboutSecond()
    {
        $second_content = $this->model->where('name','about_second')->first();
        return view('admin.about.about_second',compact('second_content'));
    }
    public function aboutThird()
    {
        $third_content = $this->model->where('name','about_third')->first();
        return view('admin.about.about_third',compact('third_content'));
    }
    //Terms
    public function terms()
    {
        $terms = $this->model->where('name','terms')->get();

        return view('admin.terms.terms',compact('terms'));
    }
    //privacy
    public function privacy()
    {
        $privacy = $this->model->where('name','privacy')->get();
        return view('admin.privacy.privacy',compact('privacy'));
    }
    public function update(Request $request,$id)
    {

        $data = $request->except('_token','file');
        if ($request->hasFile('file'                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            )) {
            $file = $request->file;
            $extesion = $file->getClientOriginalExtension();
            $fileName = str_random(20) . '.' . $extesion;
            $data['image_path'] = 'assets/site/images/' . $fileName;
            $destinationPath = 'assets/site/images/';
            $file->move($destinationPath, $fileName);
        }
        $this->model->where('id',$id)->update($data);
        return redirect()->back()->with('update','updated');

    }
}
