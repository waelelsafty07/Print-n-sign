<?php

namespace App\Http\Controllers;
use App\DataTables\ContactsDatatables;
use App\Models\Contact;

use Illuminate\Http\Request;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ContactsDatatables $contacts)
    {
        //
        return $contacts->render('admin.contacts.index',['page_title'=>'Contacts Message']);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // return $request;

        $request->validate([
            'c_name'=>"required|min:3|max:190",
            'c_email'=>'required',
            'c_phone'=>'required',
            'c_message'=>'required',
            'c_subject'=>'required',
            'g-recaptcha-response'=>'required'
        ]);
       
        Contact::create([
            'name'=>$request->c_name,
            'email'=>$request->c_email,
            'phone'=>$request->c_phone,
            'message'=>$request->c_message,
            'subject'=>$request->c_subject,
        ]);
        (new \MainHelper)->notify_user([
            'user_id'=>1,
            'message'=>$request->c_name,
            'url'=>route('admin.contact.index'),
                  'methods'=>['database']
        ]);
        notify()->success('Successful Operation','Your Message was successfully Sent');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
