<?php

namespace App\Http\Controllers\Admin;

use App\Http\Traits\DestroyModelRow;
use App\Models\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminContactUsController extends Controller
{
    use DestroyModelRow;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request  $request)
    {
        if (!checkPermission(36))
            return view('admin.permission');

        if ($request->ajax()){
            $contacts=Contact::latest()->paginate(8);
            $returnHTML = view("admin.contacts.parts.contact")
                ->with([
                    'contacts' =>$contacts
                ])
                ->render();
            return response()->json(array('success' => true, 'html'=>$returnHTML));
        }

        return view('admin.contacts.index');
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact=Contact::findOrFail($id);
        $contact->is_read="read";
        $contact->save();
        return view('admin.contacts.show',['contact'=>$contact]);
    }
    public function sendReplyContact(Request $request)
    {

        $contact=Contact::findOrFail($request->id);
        $contact->reply=$request->reply;
        $contact->is_reply=1;
        $contact->save();
        $use_phone=$contact->phone;
        $params=array(
            'token' => env('TOKEN_WHATSAPP'),
            'to' => $use_phone,
            'body' => $request->reply
        );
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.ultramsg.com/".env('INSTANCE_WHATSAPP')."/messages/chat",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => http_build_query($params),
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded"
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        return response()->json(1,200);
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
        $this->destroy_row(Contact::findOrFail($id));
    }

    public function delete($id){

        $contact=Contact::findOrFail($id);
        $contact->delete();
        return response()->json(['status'=>true]);

    }
}
