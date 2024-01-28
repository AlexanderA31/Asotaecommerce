<?php
$connect = mysqli_connect("localhost", "root", "", "php_modallogin");
if(!empty($_POST))
{
 $output = '';
 $nombres = mysqli_real_escape_string($connect, $_POST["nombres"]);  
    $direccion = mysqli_real_escape_string($connect, $_POST["direccion"]);  
    $genero = mysqli_real_escape_string($connect, $_POST["genero"]);  
    $designado = mysqli_real_escape_string($connect, $_POST["designado"]);  
    $edad = mysqli_real_escape_string($connect, $_POST["edad"]);
    $query = " INSERT INTO personal (nombres, direccion, genero, designado, edad)  
     VALUES('$nombres', '$direccion', '$genero', '$designado', '$edad')";
    if(mysqli_query($connect, $query))
    {
     $output.= '<label class="text-success">Registro Insertado Correctamente</label>';
     $select_query = "SELECT * FROM personal ORDER BY id DESC";
     $result = mysqli_query($connect, $select_query);
     $output.='
      <table class="table table-bordered">  
         <tr>  
       <th width="30%">Personal Nombres</th>  
       <th width="10%">Genero</th>  
       <th width="10%">Edad</th>  
       <th width="30%">Area</th>  
       <th width="10%">Vista</th> 
        </tr>';
     while($row = mysqli_fetch_array($result))
     {
      $output .= '<tr>  
       <td>'.$row["nombres"].'</td>
       <td>'.$row["genero"].'</td>
       <td>'.$row["edad"].'</td>
       <td>'.$row["designado"].'</td>
       <td><input type="button" name="view" value="Vista Previa" id="' . $row["id"] . '" class="btn btn-info btn-xs view_data" /></td>  
        </tr>';
     }
     $output.= '</table>';
    }
    echo $output;
}
?>