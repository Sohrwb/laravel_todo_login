@extends('layouts.main')

@section('content')

    <div class="container">
        <div class="card shadow p-4">
            <h4 class="mb-4">فرم ویرایش دسته بندی</h4>

            <!-- نمایش خطاهای اعتبارسنجی -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- فرم -->
            <form action="{{ route('category.update', $category) }}" method="POST">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="name" class="form-label">نام</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}">
                </div>

                <button type="submit" class="btn btn-primary">ارسال</button>
            </form>
        </div>
    </div>

@endsection
