<?php

namespace App\Http\Controllers;
use App\Models\Kelas;
use App\Models\UserModel;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    public function profile($nama = "", $kelas = "", $npm = "") 
    { 
        $data = [ 
            'nama' => $nama, 
            'kelas' => $kelas, 
            'npm' => $npm, 
        ];
        
        return view('profile', $data); 
    }
    // public function create(){
    //     return view('create_user', [
    //         'kelas' => Kelas::all(),
    //     ]
    // );
        // }

        public function create()
    {
        $kelasModel = new Kelas();

        $kelas = $kelasModel->getKelas();

        $data = [
            'title' => 'Create User',
            'kelas' => $kelas,
        ];

        return view('create_user',$data);
}
    
        public function store(UserRequest $request)
{
    $validateData = $request->validate( [
        'nama' => 'required|string|max:255',
        'npm' => 'required|string|max:255',
        'kelas_id' => 'required|exists:kelas,id',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $fotoPath = time() . '_' . $foto->getClientOriginalName();
            $foto->move(public_path('upload/img'), $fotoPath);
        } else {
            $fotoPath = null;
        }

        $this->userModel->create([ 
            'nama' => $request->input('nama'), 
            'npm' => $request->input('npm'), 
            'kelas_id' => $request->input('kelas_id'), 
            'foto' => $fotoPath,
            ]); 
            return redirect()->to('/user')->with('success', 'Data user berhasil ditambahkan!'); 
            } 
        // $user = UserModel::create($validateData);

        // $user->load('kelas');
        // return view('profile', [
        //     'nama' => $user->nama,
        //     'npm' => $user->npm,
        //     'nama_kelas' => $user->kelas->nama_kelas ?? 'Kelas tidak ditemukan',
        // ]);


public $userModel;
public $kelasModel;
public function __construct() 
{ 
$this->userModel = new UserModel(); 
$this->kelasModel = new Kelas(); 
}
public function index() 
{ 
    $data = [ 
        'title' => 'Create User', 
        'users' => $this->userModel->getUser(), 
    ]; 
 
    return view('list_user', $data); 
}

public function show($id)
{
    $user = $this->userModel->getUser($id);
    

    $data = [
        'title' => 'Profile',
        'user' => $user
     ];
        
     return view('profile', $data);
}

public function edit($id)
    {
        $user = UserModel::findOrFail($id);
        $kelasModel = new Kelas();
        $kelas = $kelasModel->getKelas();
        $title = 'Edit User';
        return view('edit_user', compact('user', 'kelas', 'title'));
    }

public function update(Request $request, $id)
    {
        $user = UserModel::findOrFail($id);

        $user->nama = $request->nama;
        $user->npm = $request->npm;
        $user->kelas_id = $request->kelas_id;

    if ($request->hasFile('foto')) {
        // Optional: hapus foto lama kalau ada
        if ($user->foto && file_exists(public_path('upload/img/' . $user->foto))) {
            unlink(public_path('upload/img/' . $user->foto));
        }

        // Simpan file baru
        $file = $request->file('foto');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('upload/img'), $fileName);

        $user->foto = $fileName;
       

    }


    $user->save();

    return redirect()->route('user.list')->with('success', 'User Berhasil di Update');
}

public function destroy($id)
{
    $user = UserModel::findOrFail($id);

        if ($user->foto && file_exists(public_path('upload/img/' . $user->foto))) {
            unlink(public_path('upload/img/' . $user->foto));
        }
    
    $user->delete();

    return redirect()->route('user.list')->with('success', 'User has been deleted successfully');
}

}

