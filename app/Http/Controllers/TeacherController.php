<?php

namespace App\Http\Controllers;

use App\Models\BooksModel;
use App\Models\StudentModel;
use App\Models\TeacherModel;
use Illuminate\Http\Request;
use App\Models\CategoryModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TeacherController extends Controller
{
    public function __construct()
    {
        $this->middleware('teacher');
    }

    public function index()
    {
        $data = [
            'total_student' => StudentModel::count(),
            'total_teacher' => TeacherModel::count(),
            'total_category' => CategoryModel::count(),
            'total_book' => BooksModel::count(),
            'students'  => StudentModel::all(),
        ];
        return view('teacher.index', $data);
    }
    function kelola_kategori()
    {
        $data = [
            'categories' => CategoryModel::all(),
        ];
        return view('teacher.kelola_kategori', $data);
    }
    public function delete_category($id)
    {
        $category = CategoryModel::find($id);
        if ($category) {
            $category->delete();
            return redirect()->back()->with('success', 'Kategori berhasil dihapus');
        } else {
            return redirect()->back()->with('error', 'Kategori tidak ditemukan');
        }
    }
    public function add_category(Request $request)
    {
        $data = [
            'category_name' => $request->category_name,
            'category_description' => $request->category_description,
        ];
        if (CategoryModel::create($data)) {
            return redirect()->back()->with('success', 'Kategori berhasil ditambahkan');
        } else {
            return redirect()->back()->with('error', 'Kategori gagal ditambahkan');
        }
    }
    public function edit_category(Request $request)
    {
        $category = CategoryModel::find($request->category_id);
        if ($category) {
            $category->category_name = $request->category_name;
            $category->category_description = $request->category_description;
            $category->save();
            return redirect()->back()->with('success', 'Kategori berhasil diubah');
        } else {
            return redirect()->back()->with('error', 'Kategori tidak ditemukan');
        }
    }
    public function kelola_siswa()
    {
        $data = [
            'students' => StudentModel::all(),
        ];
        return view('teacher.kelola_siswa', $data);
    }
    //delete student
    public function delete_student($id)
    {
        $student = StudentModel::find($id);
        if ($student) {
            $student->delete();
            return redirect()->back()->with('success', 'Siswa berhasil dihapus');
        } else {
            return redirect()->back()->with('error', 'Siswa tidak ditemukan');
        }
    }
    //edit student
    public function edit_student($id)
    {
        $student = StudentModel::find($id);
        if ($student) {
            $data = [
                'student' => $student,
            ];
            return view('teacher.edit_student', $data);
        } else {
            return redirect()->back()->with('error', 'Siswa tidak ditemukan');
        }
    }
    public function save_edit_student(Request $request)
    {
        $student = StudentModel::find($request->id);
        if ($student) {
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'class' => $request->class,
                'password' => ($request->password == '' or $request->password == null ? $student->password : bcrypt($request->password)),
                'absent' => $request->absent,
            ];
            $student->update($data);
            return redirect()->back()->with('success', 'Siswa berhasil diubah');
        } else {
            return redirect()->back()->with('error', 'Siswa tidak ditemukan');
        }
    }
    public function kelola_buku()
    {
        $data = [
            // 'books' => BooksModel::join('category', 'books.id_category', '=', 'category.id')->get(),
            'books' => BooksModel::all(),
            'categoryModel' => new CategoryModel()
        ];
        return view('teacher.kelola_buku', $data);
    }
    public function view_book($id)
    {
        $book = BooksModel::find($id);
        if ($book) {
            $data = [
                'categoryModel' => new CategoryModel(),
                'book' => $book,
            ];
            return view('teacher.view_book', $data);
        } else {
            return redirect()->back()->with('error', 'Buku tidak ditemukan');
        }
    }
    public function delete_book($id)
    {
        $book = BooksModel::find($id);
        if ($book) {
            $book->delete();
            return redirect()->to('/teacher/kelola-buku')->with('success', 'Buku berhasil dihapus');
        } else {
            return redirect()->back()->with('error', 'Buku tidak ditemukan');
        }
    }
    //update book
    public function save_edit_book(Request $request)
    {
        $book = BooksModel::find($request->id);
        if ($book) {
            $validator = Validator::make(
                $request->all(),
                [
                    'file' => 'mimetypes:application/pdf|mimes:pdf',
                    'cover' => 'image',
                ],
                [
                    'file.mimetypes' => 'File harus berformat pdf',
                    'file.mimes' => 'File harus berformat pdf',
                    'cover.image' => 'File harus berformat gambar',

                ]
            );
            //redirect back with massage if file type is not pdf
            if ($validator->fails()) {
                return back()->withInput()->withErrors($validator);
            }
            $data = [
                'title' => $request->title,
                'author' => $request->author,
                'publisher' => $request->publisher,
                'published_date' => $request->published_date,
                'description' => $request->description,
                'id_category' => $request->id_category,
                'cover' => ($request->cover == '' or $request->cover == null ? $book->cover : $request->cover),
                'file_name' => ($request->file == '' or $request->file == null ? $book->file_name : $request->file),
            ];
            //move file
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $filename = $file->getClientOriginalName();
                $filename = md5($filename . time());
                $file->move('book/', $filename);
                $data['file_name'] = $filename;
            }
            //move cover file 
            if ($request->hasFile('cover')) {
                $file = $request->file('cover');
                $covername = $file->getClientOriginalName();
                $covername = md5($covername . time());
                $file->move('book/cover', $covername);
                $data['cover'] = $covername;

                if ($book->update($data)) {
                    return redirect()->back()->with('success', 'Buku berhasil diubah');
                } else {
                    return redirect()->back()->with('error', 'Buku gagal diubah');
                }
            } else {
                if ($book->update($data)) {
                    return redirect()->back()->with('success', 'Buku berhasil diubah');
                } else {
                    return redirect()->back()->with('error', 'Buku gagal diubah');
                }
            }
        } else {
            return redirect()->back()->with('error', 'Buku tidak ditemukan');
        }
    }
    public function add_book(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'file' => 'mimetypes:application/pdf|mimes:pdf',
                'cover' => 'image',
            ],
            [
                'file.mimetypes' => 'File harus berformat pdf',
                'file.mimes' => 'File harus berformat pdf',
                'cover.image' => 'File harus berformat gambar',

            ]
        );
        //redirect back with massage if file type is not pdf
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }
        $data = [
            'title' => $request->title,
            'author' => $request->author,
            'publisher' => $request->publisher,
            'published_date' => $request->published_date,
            'description' => $request->description,
            'id_category' => $request->category,
            // 'cover' => $request->cover,
            // 'file_name' => $request->file,
        ];

        //move file
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $filename = md5($filename . time());
            $file->move('book/', $filename);
            $data['file_name'] = $filename;
        }
        //move cover file 
        if ($request->hasFile('cover')) {
            $file = $request->file('cover');
            $covername = $file->getClientOriginalName();
            $covername = md5($covername . time());
            $file->move('book/cover', $covername);
            $data['cover'] = $covername;
        }
        if (BooksModel::create($data)) {
            return redirect()->back()->with('success', 'Buku berhasil ditambahkan');
        } else {
            return redirect()->back()->with('error', 'Buku gagal ditambahkan');
        }
    }
    public function profile()
    {
        $data = [
            'teacher'   => Auth::guard('teacher')->user()
        ];
        return view('teacher.profile', $data);
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
        $teacher = Auth::guard('teacher')->user();
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password'  => ($request->password == null ? $teacher->password : bcrypt($request->password)),
            'photo_user' => ($request->photo_user == null ? $teacher->photo_user : $request->photo_user),
        ];
        if ($request->hasFile('photo_user')) {
            $file = $request->file('photo_user');
            $filename = $file->getClientOriginalName();
            $filename = md5($filename . time());
            $file->move('photo_user/', $filename);
            $data['photo_user'] = $filename;
            $update = TeacherModel::find($teacher->id)->update($data);
            if ($update) {
                return redirect()->back()->with('success', 'Profile berhasil diperbarui');
            } else {
                return redirect()->back()->with('error', 'Profile gagal diperbarui');
            }
        } else {
            $update = TeacherModel::find($teacher->id)->update($data);
            if ($update) {
                return redirect()->back()->with('success', 'Profile berhasil diperbarui');
            } else {
                return redirect()->back()->with('error', 'Profile gagal diperbarui');
            }
        }
    }
}
