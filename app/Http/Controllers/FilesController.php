<?php

namespace App\Http\Controllers;

use App\Models\File;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFileRequest;



use Illuminate\Support\Facades\Http;

class FilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $files = File::orderByDesc('id')->get();



        return view('files.index', compact('files', ));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {



        return view('files.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreFileRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFileRequest $request, )
    {

        $fileName = $request->File->getClientOriginalName();
        $originalFile = $request->File;

        $type = $request->File->getClientMimeType();
        $size = $request->File->getSize();

        $secret ='ltE5TH69gYyu4IKI';
        $from_format = substr($type, strrpos($type, '/') + 1);
        $to_format = $request->selectType;






        $request->File->move(public_path('file'), $fileName);
        $Api = 'https://v2.convertapi.com/'. $from_format . '/to/' . $to_format . '?Secret=' .$secret .'&download=attachment';

        File::create([
            'originalFile' =>  $originalFile, //forse da togliere o cambiare
            'name' => $fileName,
            'type' => $type,
            'toType' => $to_format,
            'size' => $size,
            'api' => $Api
        ]);


        return view('files.index', compact('Api'));
    }


    public function destroy(File $id)
    {

        $id->delete();
        return redirect()->route('files.index')->withSuccess(__("File  $id->name Deleted successfully."));
    }


}
