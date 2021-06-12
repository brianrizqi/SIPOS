<table class="table table-lg">
    <thead>
    <tr>
        <th>Tanggal Kunjungan</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($services as $service)
        <tr>
            <td>{{ $service->visit_at->format('d M Y') }}</td>
            <td>
                <a href="{{ route('dashboard.bidan.pregnant.service.history.detail',['date' => $service->visit_at->format('Y-m-d')]) }}"
                   class="btn btn-primary">Detail</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
