<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Model\EmailTemplate;
use Illuminate\Support\Facades\Auth; 
use Validator;
use App\Http\Requests\Backend\Auth\User\StoreUserRequest;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class EmailController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth'); 
    }


    /**
     * Display a listing of the users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        $emailtemps = EmailTemplate::all()->toArray();
        return view('backend.emailtemplate.index', compact('emailtemps'));
    }


    /**
     * Show the form for creating a new users.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.emailtemplate.create');
    }

    /**
     * Store a newly created users in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'subject'=>'required',
            'content'=>'required'
        ]);

        $emailTemplate = new EmailTemplate([
            'title' => $request->get('title'),
            'subject' => $request->get('subject'),           
            'content' => $request->get('content')                    
        ]);
        $emailTemplate->save();
       
        return redirect('admin/emailtemplates')->with('success', 'EmailTemplate added successfully!');
    }

   
    /**
     * Show the form for editing the specified users.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $emailtemp = EmailTemplate::find($id);
        return view('backend.emailtemplate.edit', compact('emailtemp')); 
    }

    /**
     * Update the specified users in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=>'required',
            'subject'=>'required',
            'content'=>'required'
        ]);

        $emailTemplate = EmailTemplate::find($id);
        $emailTemplate->title =  $request->get('title');
        $emailTemplate->subject = $request->get('subject');
        $emailTemplate->content = $request->get('content');
       
        $emailTemplate->save();

        return redirect('admin/emailtemplates')->with('success', 'Email Template updated successfully!');
    }

    /**
     * Remove the specified users from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = EmailTemplate::find($id);
        $user->delete();

        return redirect('admin/emailtemplates')->with('success', 'Email Template deleted!');
    }

    
   
}
