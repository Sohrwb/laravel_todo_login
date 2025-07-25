@extends('layouts.main')

@section('content')
    <!-- نمایش خطاهای اعتبارسنجی -->
    <div class="p-2">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    <h2 class="px-5"> ثبت فعالیت کاربر</h2>
    <div class="card p-3 m-4">
        <form method="POST" action="{{ route('todo.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="image" class="form-label">آپلود تصویر</label>
                <input class="form-control" type="file" id="image" name="image" accept="image/*" >
            </div>

            <div class="mb-3">
                <label for="name" class="form-label"> نام فعالیت </label>
                <input type="text" class="form-control" id="name" name="name"
                    value="{{ old('name') }}">
            </div>

            <div class="mb-3">
                <label for="text" class="form-label">توضیحات</label>
                <input type="text" class="form-control" id="text" name="text"
                    value="{{ old('text') }}">
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">دسته‌بندی</label>
                <select class="form-select" id="category" name="category" >
                    <option selected disabled>انتخاب کنید...</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>



            <button type="submit" class="btn btn-primary w-100">ثبت‌ نام</button>
        </form>
    </div>

@endsection
