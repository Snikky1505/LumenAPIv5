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
namespace App\Http\Transformers;
use League\Fractal\TransformerAbstract;
use App\Http\Models\Colstudent;

class TransformerMhs extends TransformerAbstract
{
    public function transform(Colstudent $field)
    {
        //ngubah format Tampilan di Postman
        return[
            'ID Mahasiswa' => $field->id,
            'NIM Mahasiswa' => $field->colstudent_nim,
            'Nama Mahasiswa' => $field->colstudent_name,
            'Email Mahasiswa' => $field->colstudent_email,
            'Tanggal Lahir Mahasiswa' => $field->colstudent_dateofbirth,
            'Jenis Kelamin' => $field->colstudent_gender,
            'Alamat' => $field->colstudent_address,
            'Nomor Telepon' => $field->colstudent_phonenumber,
        ];
    }
}