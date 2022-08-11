<?php 
namespace App\Models;

use CodeIgniter\Model;

class Libro extends Model{
    protected $table      = 'libros'; //Indica el nombre de la tabla
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id'; //Se indica le PK de la tabla
    protected $allowedFields = ['nombre','imagen']; //Activamos acceso a las columnas (podemos incluir las que desemos, no es obligatorio colocar todas)
}