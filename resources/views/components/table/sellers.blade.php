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
                   <td>{{ $item->email }}</td>
                   <td>{{ $item->Products->count() }}</td>
                   <td align="center">
                     <div class="row">
                       <div class="col-md-6">
                        <form action="{{ route(''.$delete.'', ['id' => $item->id])}}" method="post">
                          @csrf
                          <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                        </form>
                       </div>
                       <div class="col-md-6">
                        <a class="btn btn-success" href="{{ route(''.$edit.'', ['id' => $item->id])}}"><i class="fas fa-edit"></i></a>
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
