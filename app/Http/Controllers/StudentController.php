<?php

namespace App\Http\Controllers;

use App\Models\BooksModel;
use App\Models\StudentModel;
use Illuminate\Http\Request;
use App\Models\CategoryModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('student');
    }
    public function index()
    {
        $data = [
            'books' => BooksModel::all(),
            'categoryModel' => new CategoryModel()
        ];
        return view('student.index', $data);
    }
    public function view_book($id)
    {
        $book = BooksModel::find($id);
        if ($book) {
            $data = [
                'categoryModel' => new CategoryModel(),
                'book' => $book,
            ];
            return view('student.view_book', $data);
        } else {
            return redirect()->back()->with('error', 'Buku tidak ditemukan');
        }
    }
    public function profile()
    {
        $data = [
            'student'   => Auth::guard('student')->user()
        ];
        return view('student.profile', $data);
    }
    public function save_profile(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'photo_user' => 'image',
            ],
            [
                'photo_user.image' => 'File harus berformat gambar',

            ]
        );
        //redirect back with massage if file type is not pdf
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }
        //save edit profile
        $student = Auth::guard('student')->user();
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'absent' => $request->absen,
            'class' => $request->class,
            'password'  => ($request->password == null ? $student->password : bcrypt($request->password)),
            'photo_user' => ($request->photo_user == null ? $student->photo_user : $request->photo_user),
        ];
        if ($request->hasFile('photo_user')) {
            $file = $request->file('photo_user');
            $filename = $file->getClientOriginalName();
            $filename = md5($filename . time());
            $file->move('photo_user/', $filename);
            $data['photo_user'] = $filename;
            $update = StudentModel::find($student->id)->update($data);
            if ($update) {
                return redirect()->back()->with('success', 'Profile berhasil diperbarui');
            } else {
                return redirect()->back()->with('error', 'Profile gagal diperbarui');
            }
        } else {
            $update = StudentModel::find($student->id)->update($data);
            if ($update) {
                return redirect()->back()->with('success', 'Profile berhasil diperbarui');
            } else {
                return redirect()->back()->with('error', 'Profile gagal diperbarui');
            }
        }
    }
}
