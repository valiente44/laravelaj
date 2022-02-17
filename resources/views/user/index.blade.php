@extends('theme.base')

@section('usersPermisions')

<div class="container py-5">
    <div class="row">
      <div class="col-sm">
            <h3>Search User</h3>
            
            <table id="example" class="table table-striped" style="width:100%">
                <thead>   
                    <tr>
                        <th>name:</th>
                        <th>permisos:</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                     <tr>
                
                        <td>{{$user->name}}</td>
                        <td>
                            
                                <select class="form-control" id="exampleFormControlSelect1" name="user_types">
                                    <option id="user_types" value="{{$user->user_types}}"   >
                                        {{$user->user_types}}
                                    </option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option> 

                                </select>
                        </td>
               
                     </tr>
              
                @endforeach
            </tbody>
            </table>


         
       
      </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>



<script>



//cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js
// var $  = require( 'jquery' );
// var dt = require( 'datatables.net' )();
$(document).ready( function () {
    $('#example').DataTable();
} );
</script>
    
@endsection