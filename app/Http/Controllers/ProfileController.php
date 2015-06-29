<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Marx\Repositories\Contracts\UserRepository;
use App\User;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Redirect;

class ProfileController extends Controller
{
    /**
     * @var UserRepository
     */
    private $users;


    /**
     * @param UserRepository $users
     */
    public function __construct(UserRepository $users)
    {
        $this->users = $users;

    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users = User::all();
        return view('user', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request, $id)
    {

        $data = $request->all();
        
 
        return redirect()->route('home.update');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $user = User::find($id);
//        dd($data);
        return $user;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('partials.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->except(['_method', '_token']);
        $user = $this->users->find($id);
        $img = $data['img'];
        $date = date('Ymd-his-');
        $name = $date . $img->getClientOriginalName();
        Storage::put($name, File::get($img));

        
        $user->update($data);
        return redirect('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    public function download($id)
    {
        $user = User::find($id);
        $img = $user['img'];

        $accessKey = env('AWS_ACCESS_KEY_ID');
        $secretKey = env('AWS_SECRET_ACCESS_KEY');
        $bucket = "farscape-64";
        $item = $img;

        $timestamp = strtotime("+1 day");
        $strToSign = "GET\n\n\n$timestamp\n\n/$bucket/$item";
        $signature = urlencode(base64_encode(hash_hmac("sha1", utf8_encode($strToSign), $secretKey, true)));
        $url = "http://s3-us-west-1.amazonaws.com/$bucket/$item";

// vanilla php that works 
//        header(sprintf('Authorization: AWS %s:%s', $accessKey, $signature));
//        header(sprintf('Location: %s', $url));

// old url
//        $url = "http://s3-us-west-1.amazonaws.com/$bucket/$item?AWSAccessKeyId=$accessKey&Expires=$timestamp&Signature=$signature";
//        return Redirect::to($url);
        return Redirect::to($url, 302, ['Authorization' => sprintf("AWS %s:%s", $accessKey, $signature)]);
    }
}
