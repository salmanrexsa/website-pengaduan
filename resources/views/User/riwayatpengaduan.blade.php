@if (isset($pengaduan[0]))
<div class="card-body">
    <table class="table">
        @foreach($pengaduan as $p)
        <tbody>
          
            <tr>
                <th>Kode Booking</th>
                <td>:</td>
                <td>{{ $p->kode_booking }}</td>
            </tr>
            <tr>
                <th>Nama Proyek</th>
                <td>:</td>
                <td>{{ $p->nama_proyek }}</td>
            </tr>
            <tr>
                <th>Isi Laporan</th>
                <td>:</td>
                <td>{{ $p->isi_laporan }}</td>
            </tr>
            <tr>
                <th>Status</th>
                <td>:</td>
                <td>{{ $p->status}}</td>
            </tr>

            {{-- <tr>
                <th>Edit</th>
                <td>:</td>
                <td>
                    <a href="{{ route('Client/edit') }}" style="text-decoration: underline">Lihat</a>
                </td>
            </tr> --}}
        </tbody>
        @endforeach
    </table>
    @else
    <p>Silahkan Masuk Kode Booking dengan benar</p>
@endif
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Keluar</button>
</div>

{{-- 
@if (isset($pengaduan[0]))

<table border="1">
    <tr style="color: black" border="1">
        <th >kode booking</th>
        <th>nama proyek</th>
        <th>Isi Laporan</th>
    </tr>

    @foreach($pengaduan as $p)
    <tr>
        <td style="color:black">{{ $p->kode_booking}}</td>
        <td  style="color:black">{{$p->nama_proyek}}</td>
        <td style="color:black">{{$p->isi_laporan}}</td>
    </tr>
    @endforeach
</table>
    
@else
    <p>Silahkan Masuk Kode Booking dengan benar</p>
@endif --}}