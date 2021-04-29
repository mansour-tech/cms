@extends('admin.template')

@section('breadcrumb')
           الصفحات
@endsection

@section('content')
    <p><a href="{{ route('page.create') }}" class="btn btn-primary">إنشاء صفحة جديدة</a></p>
    <table class="table table-hover">
        <thead>
            <tr>
                <td>موضوع الصفحة</td>
                <td>عنوان الصفحة URI</td>
                <td>تحرير</td>
                <td>حذف</td>
            </tr>
        </thead>
        <tbody>
            @foreach($pages as $page)
            <tr class="">
                <td>{{ $page->title }}</td>
                <td><a href="{{ route('page.show',$page->slug ) }}">{{ $page->slug }}</a></td>
                <td>
                    <a href="{{ route('page.edit',$page->id) }}">
                        <i class="fa fa-edit fa-2x"></i>
                    </a>
                </td>
                <td>
                    <form method="post" action="{{ route('page.destroy',$page->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-link"><i class="fa fa-trash fa-2x"></i></button>       
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection