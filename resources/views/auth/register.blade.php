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
    <h2> ثبت نام کاربر</h2>
    <div class="card p-3 m-4">
        <form method="POST" action="{{ route('register.store') }}">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">نام</label>
                <input type="text" class="form-control" id="name" name="name" required
                    value="{{ old('name') }}">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">ایمیل</label>
                <input type="email" class="form-control" id="email" name="email" required
                    value="{{ old('email') }}">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">رمز عبور</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">تأیید رمز عبور</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                    required>
            </div>

            <button type="submit" class="btn btn-primary w-100">ثبت‌ نام</button>
        </form>
    </div>

@endsection
