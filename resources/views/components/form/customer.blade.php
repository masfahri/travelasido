<form role="form" id="quickFormx" method="POST" action="{{route('admin.customers.store')}}">
   @csrf
   <div class="card-body">
      <div class="form-group">
         <label for="name">Nama {{ $initialPage }}</label>
         <input value="{{($name ? $name : '')}}" type="text" name="name" class="form-control" id="name" placeholder="Nama {{$initialPage}}" required>
      </div>
      <div class="form-group">
         <label for="emailPelanggan ">Email {{ $initialPage }}</label>
         <input value="{{($email ? $email : '')}}" type="email" name="email" class="form-control" id="email" placeholder="Email {{$initialPage}}" required>
      </div>
      <div class="form-group">
         <label for="emailPelanggan ">Nomor Telf {{ $initialPage }}</label>
         <input value="{{($phone ? $phone : '')}}" type="number" name="phone" class="form-control" id="phone" placeholder="Nomor Telf {{$initialPage}}" required>
      </div>
      <div class="form-group">
         <label for="address">Alamat</label>
         <textarea name="address" id="" cols="30" rows="10" class="form-control" placeholder="Alamat Lengkap">{{($address ? $address : '')}}</textarea>
      </div>
   </div>
   <div class="card-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
   </div>
</form>