<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\AdminFotoRequest;
use App\Http\Requests\Admin\AdminPasswordRequest;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function updatepassword(AdminPasswordRequest $request, $id){

        $contraseña = \Validator::make($request->all(), [
            'password' => 'required|confirmed'
        ]);

        if ($contraseña->fails())
        {
       return redirect()->route('prestamos.index')->with('error', 'Los campos contraseña y validar contraseña no coinciden');
        }

      try {
         $admin = Admin::find($id);
         $admin->password = bcrypt($request->password);
         $admin->save();

         return redirect()->route('prestamos.index')->with('message', 'Contraseña Actualizada con exito');
      } catch (\Throwable $th) {
          return redirect()->route('prestamos.index')->with('error', 'Error al actualizar la contraseña');
      }
   }

   public function updatefoto(AdminFotoRequest $request, $id){
        $foto = \Validator::make($request->all(), [
           'foto'=> ['image', 'required', 'max:2048'],
        ]);

        if ($foto->fails())
        {
          return redirect()->route('prestamos.index')->with('error', 'La fotografía no debe exceder los 2 Mb y solo acepta imágenes con extensiones jpeg, jpg, png, jfif ');
        }

         $usuario = Admin::find($id);
          if ($request->hasFile('foto')) {
            if (Storage::disk('usuario-img')->exists("$usuario->foto")) {
                if($usuario->foto == "shadow.jpg"){
                $usuario->foto = "shadow.jpg";
                } else {
                 Storage::disk('usuario-img')->delete("$usuario->foto");
                }
            }
            $usuario->foto = Storage::disk('usuario-img')->putFile('', $request->file('foto'));
        }
        $usuario->save();

        return redirect()->route('prestamos.index')->with('message', 'Fotografía cambiada con exito');

      // try {
      //       $admin = Admin::find($id);
      //       if (Storage::disk('usuario-imagenes')->exists("$admin->foto")) {
      //          Storage::disk('usuario-imagenes')->delete("$admin->foto");
      //       }
      //       $admin->foto = Storage::putFile('/', $request->file('foto'));
      //       $admin->save();

      // } catch (\Throwable $th) {
      //       return redirect()->route('prestamos.index')->with('error', 'No se pudo cambiar la fotografia');
      //   }

   }
   public function perfil(){
      $usuario = Admin::find(Auth::id());
      return view('usuarios.perfil', compact('usuario'));
   }
}
