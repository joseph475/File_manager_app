<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\File_Masterlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UploadsController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth:sanctum');
    // }

    public function searchandfilter(Request $request)
    {

        $id = Auth::id();
        $this->files = File_Masterlist::join('users', 'files_masterlist.created_by', '=', 'users.id')
            ->select('files_masterlist.id', 'files_masterlist.filename', 'files_masterlist.title', 'files_masterlist.description', 'files_masterlist.created_at', 'files_masterlist.filetype')
            ->where('created_by', $id)
            ->where('files_masterlist.filetype', 'LIKE', "%{$request->filter}%")
            ->where(function ($q) use ($request) {
                $q->where('files_masterlist.filename', 'LIKE', "%{$request->search}%")
                    ->orWhere('files_masterlist.title', 'LIKE', "%{$request->search}%")
                    ->orWhere('files_masterlist.description', 'LIKE', "%{$request->search}%");
            })
            ->orderBy('created_at', 'asc')
            ->paginate(10);

        return $this->files;
    }

    public function preview($userId, $filename)
    {
        $path = 'public/files_uploaded/' . $userId . '/' . $filename;

        return Storage::get($path);
    }

    public function upload(Request $request)
    {

        $id = Auth::id();

        if (isset($request->file)) {

            $filename = $request->file->getClientOriginalName();
            $filetype = $request->file->extension();

            if ($filetype == 'jpg' or $filetype == 'mp4' or $filetype == 'pdf') {

                if (!file_exists(storage_path('app/public/files_uploaded/' . $id))) {
                    mkdir(storage_path('app/public/files_uploaded/' . $id));
                }

                if (!file_exists(storage_path('app/public/files_uploaded/' . $id . '/' . $filename))) {
                    $request->file->move(storage_path('app/public/files_uploaded/' . $id), $filename);

                    $data =  ([
                        'created_by' => $id,
                        'title' => $request->title,
                        'description' => $request->description,
                        'filename' => $filename,
                        'filetype' => $filetype,
                        'created_at' => \Carbon\Carbon::now(),
                        'updated_at' => \Carbon\Carbon::now()
                    ]);

                    if (File_Masterlist::create($data)) {
                        return view('upload', ['message' => 'File uploaded succesfully!', 'status' => '1']);
                    } else {
                        return view('upload', ['message' => 'Ooops, Something went wrong!', 'status' => '0']);
                    }
                } else {
                    return view('upload', ['message' => 'File Already Exists!!!', 'status' => '0']);
                }
            } else {
                return view('upload', ['message' => 'File type not Supported!!!', 'status' => '0']);
            }
        }
    }
}
