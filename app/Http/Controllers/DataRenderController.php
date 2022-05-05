<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Jobs\ProceessFiles;
use Illuminate\Support\Facades\Bus;
use App\Imports\CsvImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use App\Models\tbl_upload_log;
use App\Repositories\CSVRepository;

class DataRenderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    { }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['storage'] = DB::table('tbl_upload_logs')->get();
        return view('welcome', $data);
    }

    public function storeFile(Request $request, CSVRepository $CSVRepository)
    {
        try {

            // $filename = $request->file('csv')->getClientOriginalName();
            // $extension = $request->file('csv')->extension();
            // $file = $request->file('csv');
            // $file->move(public_path() . '/uploads/', $filename);
            // tbl_upload_log::create([
            //     'filename' => public_path() . '/uploads/',
            //     'status' => 'Processing',
            // ]);
            $file =  $request->file('csv');
            $extension = strtolower($file->getClientOriginalExtension());
            if ($extension !== 'csv') {
                $errors['file'] = 'This is not a .csv file!';
                return redirect()->back()->withInput()->withErrors($errors);
            }
            $CSVRepository->uploadCSV($file, $extension);
            
            $message = array(
                'type' => 'success',
                'text' => 'Your file has been uploaded! You will receive an email when processing is complete!',
                'title' => 'Success',
            );
            return redirect()->back();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function upload(CSVRepository $CSVRepository)
    {
        try {
            $file = Input::file('file');
            $extension = strtolower($file->getClientOriginalExtension());
            if ($extension !== 'csv') {
                $errors['file'] = 'This is not a .csv file!';
                return redirect()->back()->withInput()->withErrors($errors);
            }
            $CSVRepository->uploadCSV($file, $extension);
            $message = array(
                'type' => 'success',
                'text' => 'Your file has been uploaded! You will receive an email when processing is complete!',
                'title' => 'Success',
            );
            session()->flash('message', $message);
            return redirect('route-to-redirect');
        } catch (\Exception $exception) {
            return abort(Response::HTTP_INTERNAL_SERVER_ERROR, 'Internal Server Error');
        }
    }
}
