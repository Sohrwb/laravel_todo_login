@extends('layouts.main')

@section('content')
    {{-- پیام موفقیت --}}
    @if (session('success'))
        <div class="alert alert-success m-3 alert-dismissible fade show " role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="بستن"></button>
        </div>
    @endif

    {{-- پیام خطا --}}
    @if (session('error'))
        <div class="alert alert-danger m-3 alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="بستن"></button>
        </div>
    @endif
    <div class="row d-flex  shadow-sm border p-2" style="margin:0 auto">

        @foreach ($categories as $category)
            <div class="card shadow-sm border-primary m-2" style="max-width: 355px; margin: auto;">
                <div class="card-body d-flex justify-content-center  align-items-center">
                    <h5 class="card-title m-1">{{ $category->name }}</h5>
                     <a href="{{ route('category.edit',$category) }}" class="btn btn-sm btn-secondary ">edit</a>

                    <form action="{{ route('category.delete', $category) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger btn-sm m-1">حذف</button>
                    </form>
                </div>
            </div>
        @endforeach
        <div class="card shadow-sm border-success m-2" style="max-width: 355px; margin: auto;">
            <div class="card-body ">

                <a href="{{ route('category.create') }}" class="btn btn-success w-100 h-100 d-flex justify-content-center align-items-center" style="font-size: 20px">add</a>
            </div>
        </div>
    </div>
@endsection
