<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Libro; //El modelo contiene la definicion de la tabla (id, columnas)
use JetBrains\PhpStorm\Internal\ReturnTypeContract;

class Libros extends Controller{

    //Metodo index, permite listar la información
    public function index(){
        $libro= new Libro(); 
        $datos['libros']=$libro->orderBy('id','ASC')->findAll();
        /* $datos['libros']=$libro->where('id',12)->orderBy('id','ASC')->findAll();
        $datos['libros']: Creamos variable,  
        $libro: Es el modelo 
        orderBy('id','ASC'): ordene por id y de forma ascendente
        findAll(): busque y obtenga todo los registros */

        $datos['header']=view('template/header'); //= vista de templates/header
        $datos['footer']=view('template/footer'); //= vista de templates/footer
        return view('libros/listar',$datos); //Pasamos info $datos
    }

    public function crear(){        
        $datos['header']=view('template/header');
        $datos['footer']=view('template/footer'); 
        return view('libros/crear',$datos);
    }

    public function guardar(){
        //Referencia del modelo
        $libro= new Libro(); //Creamos instancia llamada libro, para capturar y clavar a la DB

        $validacion = $this->validate([                 //validacion
            'nombre' =>'required|min_length[3]',        //Campo requerido con minimo de longitud de caracteres
            'imagen' =>[                                //Campo que vamos a validar
                'uploaded[imagen]',                     //Validar que tenga una imagen
                'mime_in[imagen,image/jpg,image/jpeg,image/png]' //Validar que sea un tipo de imagen (formatos)
                       ]
        ]);

        if(!$validacion){ //Si no se llevo a cabo la validación
            $session= session();
            $session->setFlashdata('mensaje','Revise la información');
            return redirect()->back()->withInput();
        }

        $nombre=$this->request->getVar('nombre');
        // print_r('hola '. $nombre); Para saber si esta llegando al info del formulario a traves del campo 'nombre'
        if($imagen=$this->request->getFile('imagen')){
            $nuevoNombre= $imagen->getRandomName();
            $imagen->move('../public/uploads/',$nuevoNombre);
            $datos=[
                'nombre'=>$nombre, // o 'nombre'=>$this->request->getVar('nombre'),
                'imagen'=>$nuevoNombre
                   ];
            $libro->insert($datos); 
        }
        return $this->response->redirect(site_url('/listar'));
    }

    public function borrar($id=null){                          //recibimos $id, y le ponemos null en caso de no recibir nada
        //echo 'El id que se quiere borrar es '.$id; die();    //Validar que este recepcionando valor por URL
        $libro= new Libro();                                   //referencia del modelo para obtener los datos de DB
        $datosLibro=$libro->where('id',$id)->first();          //Busca información del id que traemos desde formulario/routes
        //print_r($datosLibro['imagen']); die();               //validamos que traiga información
        $ruta=('../public/uploads/'.$datosLibro['imagen']);    //Armamos ruta de la imagen que vamos a volar
        unlink($ruta);                                         //Funcion PHP para el borrado del archivo en el proyecto

        $libro->where('id',$id)->delete($id);                  //Elimina el registro de la base de datos (pero no la imagen).
        return $this->response->redirect(site_url('/listar')); //redireccionamos a la lista 
    }

    public function editar($id=null){ //Esta funcion pinta datos que vamos a actualizar
        //print_r($id); 
        $libro= new Libro(); 
        $datos['libro']=$libro->where('id',$id)->first();
        //print_r($datos['libro']);

        $datos['header']=view('template/header');
        $datos['footer']=view('template/footer');

        return view('libros/editar',$datos);
    }

    public function actualizar(){ //Este metodo es el que hace update
        $libro= new Libro();
        $datos=[
            'nombre'=>$this->request->getVar('nombre')
               ];
        $id=$this->request->getVar('id'); //Recepcionamos ('id') para update de editar.php, del input oculto

        $validacion = $this->validate([                 //validacion
            'nombre' =>'required|min_length[3]',
        ]);

        if(!$validacion){ //Si no se llevo a cabo la validación
            $session= session();
            $session->setFlashdata('mensaje','Revise la información');
            return redirect()->back()->withInput();
        }

        $libro->update($id,$datos);       //update librios set nombre='nombre' where id=$id

        $validacion = $this->validate([   //validacion
            'imagen' =>[                  //Campo que vamos a validar
                'uploaded[imagen]',       //Validar que tenga una imagen
                'mime_in[imagen,image/jpg,image/jpeg,image/png]', //Validar que sea un tipo de imagen (formatos)
                // 'max_size[imagen,1024]',  //La imagen pesa al rededor de 1024 (tamaño maximo)           
                       ]
        ]);

        if($validacion){
            if($imagen=$this->request->getFile('imagen')){          //Validar que tenga info y que se imagen

                $datosLibro=$libro->where('id',$id)->first();       //Buscar libro por medio del id
                $ruta=('../public/uploads/'.$datosLibro['imagen']); //Ruta de la imagen que vamos a borrar
                unlink($ruta);                                      //Hacemos borrado de la imagen vieja

                $nuevoNombre= $imagen->getRandomName();             //Obetner info y asignar nombre nuevo
                $imagen->move('../public/uploads/',$nuevoNombre);   //mover a esta dirección

                $datos=['imagen'=>$nuevoNombre];                    //Escribir nombre en la DB
                $libro->update($id,$datos);                         //Hacer update mediante id
            }
        }

        return $this->response->redirect(site_url('/listar'));
    }
}