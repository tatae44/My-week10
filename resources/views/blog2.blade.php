@extends('layout')

@section('title', 'บทความทั้งหมด')


@section('content')
    <h2 class="text text-center py-2">
        บทความทั้งหมด</h2>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th scope="col">Title</th>
                {{-- <th scope="col">content</th> --}}
                <th scope="col">Status</th>
                <th scope="col">Control</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($blog2 as $item)
                <tr>
                    <td>{{ $item->title }}</td>
                    {{-- <td>{{ Str::limit($item->content, 10) }}</td> --}}
                    <td>
                        @if ($item->status)
                            <span class="btn btn-success">เผยแพร่แล้ว</span>
                        @else
                            <span class="btn btn-danger">ไม่เผยแพร่</span>
                        @endif

                    </td>
                    <td><a href="/delete/{{ $item->id }}" class="btn btn-danger"
                            onclick="return confirm('คุณต้องการลบบทความ {{ $item->title }}หรือไม่?')">ลบ</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
