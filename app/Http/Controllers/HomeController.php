<?php

namespace App\Http\Controllers;

use Storage;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $files = Storage::disk('sftp')->listContents('./');
        $date = new \DateTime();
        return view('dashboard', compact('files', 'date'));
    }

    public function fileUpload(Request $request)
    {
        $validation = $request->validate([
            'file' => 'required|file|max:2048'
        ]);

        $file      = $validation['file'];
        $filename = $file->getClientOriginalName();
        $request->file('file')->storeAs('./', $filename, 'sftp');
        
        return redirect()->back()->withStatus(__('File has been uploaded successfully.'));
    }
}