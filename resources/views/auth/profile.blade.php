@extends('layouts.main')

@section('content')
    <div class="row m-5 rounded text-center border-2">
        <h2>
            {{ $user->name }}
        </h2>
    </div>
    <div class="card text-center">
        <div class="card-body">
            <h5 class="card-title">عنوان کارت</h5>
            <p class="card-text">این یک متن نمونه درون کارت است. می‌توانید این متن را تغییر دهید.</p>
            <a href="{{route('todo.create')}}" class="btn btn-primary m-1">ایجاد فعالیت جدید</a>
            <a href="{{route('todo.index')}}" class="btn btn-outline-secondary m-1">لیست فعالیت های من</a>
        </div>
    </div>
@endsection
