@extends('layouts.main')

@section('content')

    <h2 class="p-3"> ورود کاربر</h2>
    <div class="card p-3 m-4">
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

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label">ایمیل</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">رمز عبور</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-success">ورود</button>
            <a class=" btn btn-primary" href="{{ route('register.index') }}">ثبت نام کنید</a>
        </form>


    </div>
@endsection
