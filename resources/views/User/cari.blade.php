<!DOCTYPE HTML>
<HTML>
<HEAD>
    <TITLE>mencari-cari</TITLE>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</HEAD>
<body>
    <style type="text/css">
        .pagination li{
            float:left;
            list-style-type: none;
            margin:5px;
        }
    </style>

    <h3>Data Pengaduan</h3>
    
    <form action="{{route('cari')}}" method="GET">
        <input type="text" name="cari" placeholder="masukkan" value="{{ old('cari')}}">
       
        
        <button class="btn text-white" type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#contohModal">Masuk</button>
    </form>

    <br/>

  

    {{-- modal IKI --}}
    <div class="modal fade" id="contohModal" role="dialog" arialabelledby="modalLabel" area-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <table border="1">
                <tr>
                    <th>kode booking</th>
                    <th>nama proyek</th>
                    <th>Isi Laporan</th>
                </tr>
        
                @foreach($pengaduan as $p)
                <tr>
                    <td>{{ $p->kode_booking}}</td>
                    <td>{{$p->nama_proyek}}</td>
                    <td>{{$p->isi_laporan}}</td>
                </tr>
                @endforeach
            </table>
          </div>
        </div>
      </div>

</body>
<script>
    $('#contohModal').modal('show');

</script>
</HTML>

