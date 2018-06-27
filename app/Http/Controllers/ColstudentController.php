<?php
/*
       _____       _ __   __        _____________  ______
      / ___/____  (_) /__/ /____  _<  / ____/ __ \/ ____/
      \__ \/ __ \/ / //_/ //_/ / / / /___ \/ / / /___ \  
     ___/ / / / / / ,< / ,< / /_/ / /___/ / /_/ /___/ /  
    /____/_/ /_/_/_/|_/_/|_|\__, /_/_____/\____/_____/   
                           /____/                        

    Licensed under GNU General Public License v3.0
    http://www.gnu.org/licenses/gpl-3.0.txt
    Written by Snikky1505. Email : hazinokaime@gmail.com
    Follow me on GithHub : https://github.com/Snikky1505
   
    For the brave souls who get this far: You are the chosen ones,
    the valiant knights of programming who toil away, without rest,
    fixing our most awful code. To you, true saviors, kings of men,
 
    I say this: never gonna give you up, never gonna let you down,
    never gonna run around and desert you. Never gonna make you cry,
    never gonna say goodbye. Never gonna tell a lie and hurt you.

*/
namespace App\Http\Controllers;

use App\Http\Models\Colstudent;
use App\Http\Transformers\TransformerMhs;
use Dingo\Api\Http\Request;
use Dingo\Api\Routing\Helpers;
use Mockery\Exception;

class ColstudentController extends Controller {
    use Helpers;

    public function index () {
        $orm = Colstudent::all();

        return $this->response->collection($orm, new TransformerMhs);
    }

    public function show ($id) {
        try {

            $orm = Colstudent::find($id);

        } catch ( Exception $e ) {
            return $e;
        }
        if ( $orm ) {
            return $this->response->item($orm, new TransformerMhs);
        }

        return $this->response->errorNotFound('Data Tidak Ketemu');
    }

    public function destroy (Request $request, $id) {
        $orm = Colstudent::find($id);
        if ( $orm ) {
            try {
                $orm->delete();
            } catch ( Exception $e ) {
                return $e;
            }

            return response('Data Berhasil Dihapus');
        }

        return $this->response->errorNotFound('Data tidak ketemu');
    }

    public function store (Request $request) {
        $data = $request->only([
            'colstudent_nim',
            'colstudent_name',
            'colstudent_email',
            'colstudent_dateofbirth',
            'colstudent_gender',
            'colstudent_address',
            'colstudent_phonenumber'
        ]);

        $insert = new Colstudent([
            'colstudent_nim' => $data['colstudent_nim'],
            'colstudent_name' => $data['colstudent_name'],
            'colstudent_email' => $data['colstudent_email'],
            'colstudent_dateofbirth' => $data['colstudent_dateofbirth'],
            'colstudent_gender' => $data['colstudent_gender'],
            'colstudent_address' => $data['colstudent_address'],
            'colstudent_phonenumber' => $data['colstudent_phonenumber']
        ]);

        try {
            $insert->save();
        } catch ( Exception $e ) {
            $this->response->error($e, 500);
        }

        $this->response->created();

        return response('Berhasil Tambah Data Mahasiswa');
    }

    public function update($id,Request $request)
    {
        try{
            $update = Colstudent::find($id);
        }catch(Exception $e){
            $this->response->error($e,500);
        }

        if($update){
            $data = $request->only([
                'colstudent_nim',
                'colstudent_name',
                'colstudent_email',
                'colstudent_dateofbirth',
                'colstudent_gender',
                'colstudent_address',
                'colstudent_phonenumber'
            ]);

            $update->fill([
                'colstudent_nim' => $data['colstudent_nim'],
                'colstudent_name' => $data['colstudent_name'],
                'colstudent_email' => $data['colstudent_email'],
                'colstudent_dateofbirth' => $data['colstudent_dateofbirth'],
                'colstudent_gender' => $data['colstudent_gender'],
                'colstudent_address' => $data['colstudent_address'],
                'colstudent_phonenumber' => $data['colstudent_phonenumber']
            ]);

            try{
                $update->update();
            }catch (Exception $e){
                $this->response->error($e,500);
            }

            return response('Data Berhasil di Update');

        }else{
            $this->response->errorNotFound('data tidak berhasil di Update');
        }


    }
}