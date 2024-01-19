<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\Exceptions\HTTPException;

class Upload extends Controller
{
    public function store()
    
    {
        $img = $this->request->getFile('userfile');

        if (!$this->validate([
            'userfile' => 'uploaded[userfile]|is_image[userfile]|ext_in[userfile, jpeg,png,jpg]|max_dims[userfile, 1920, 1080]'
        ], [
            'userfile' => [
                'uploaded' => 'Escolha uma imagem', 
                'is_image' => 'O que você escolheu não é uma imagem', 
                'ext_in' => 'A extensão '.$img->getExtension().' não é valida', 
                'max_dims' => 'A imagem não pode ter mais que 1920x1080'
            ]
        ])) {
            session()->setFlashdata('errors', $this->validator->getErrors());
            return redirect()->route('home');

            $data = ['errors' => $this->validator->getErrors()];

            return view('form_message', $data);
        }
            

        try {
            $img->store('../../public/assets/img', $img->getName());
        } catch (HTTPException $e) {
            // Log ou manipulação de erro adequada
            die($e->getMessage());
        }

        session()->setFlashdata('uploaded', 'Uploaded sucessfully');
        return redirect()->route('home');   
    }
}
