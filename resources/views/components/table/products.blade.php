 <!-- Main content -->
 <section class="content">
   <div class="container-fluid">
     <div class="row">
       <div class="col-12">
         <div class="card">
           <div class="card-header">
             <h3 class="card-title">{{ $card_title }}</h3>
           </div>
           <!-- /.card-header -->
           <div class="card-body">
             <table id="example1" class="table table-bordered table-hover">
               <thead>
               <tr>
                  @foreach ($th as $item)
                  <th>{{ $item }}</th>
                  @endforeach
               </tr>
               </thead>
               <tbody>
                  @foreach ($data as $item)
                  <tr>
                   <td>{{ $item->name }}</td>
                   <td>{{ $item->Category->name }}</td>
                   <td align="center">
                     <div class="row">
                       <div class="col-md-6">
                        <a href="{{ route(''.$delete.'', ['id' => $item->id])}}"><i class="fas fa-trash"></i></a>
                       </div>
                       <div class="col-md-6">
                        <a href="{{ route(''.$edit.'', ['id' => $item->id])}}"><i class="fas fa-edit"></i></a>
                       </div>
                     </div>                      
                   </td>
                  </tr>
                  @endforeach
               </tbody>
               <tfoot>
               <tr>
                @foreach ($th as $item)
                <th>{{ $item }}</th>
                @endforeach
               </tr>
               </tfoot>
             </table>
           </div>
           <!-- /.card-body -->
         </div>
         <!-- /.card -->
       </div>
       <!-- /.col -->
     </div>
     <!-- /.row -->
   </div>
   <!-- /.container-fluid -->
 </section>
 <!-- /.content -->
