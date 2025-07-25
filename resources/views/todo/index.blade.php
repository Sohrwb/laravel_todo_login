@extends('layouts.main')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">

                <div class="card shadow">
                    <div class="card-header bg-primary text-white d-flex ">
                        <h5 class="mb-0"> لیست تسک ها</h5>
                        <a class="btn btn-success me-auto" href="{{ route('todo.create') }}">افزودن فعالیت جدید</a>
                    </div>

                    <div class="card-body">


                        <table class="table table-bordered table-hover text-center align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>عکس</th>
                                    <th>نام</th>
                                    <th>دسته‌بندی‌</th>
                                    <th>تغییرات</th>
                                    <th>وضعیت</th>
                                    <th>حذف</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($todos as $todo)
                                    <tr>
                                        <td><img src="{{ asset('images/' . $todo->image) }}" alt="تصویر تسک"
                                                class="img-fluid " style="width: 55px; height: 65px;">
                                        </td>
                                        <td>{{ $todo->name }}</td>
                                        <td>{{ $todo->category->name }}</td>

                                        <td>
                                            <a href="{{ route('todo.edit', $todo->id) }}"
                                                class="btn btn-warning btn-sm">ویرایش</a>

                                            <a href="{{ route('todo.show', $todo->id) }}"
                                                class="btn btn-info btn-sm ">جزِییات</a>
                                        </td>
                                        <td>
                                            @if ($todo->status)
                                                <button class="btn btn-secondary" disabled type="button">انجام شده</button>
                                            @else
                                                <a href="{{ route('todo.completed', $todo) }}" class="btn btn-info"
                                                    type="button"> در حال انجام</a>
                                            @endif

                                        </td>

                                        <td>
                                            <form action="{{ route('todo.destroy', $todo->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3">دسته‌بندی‌ای پیدا نشد.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                    </div>
                </div>

            </div>
        </div>
    </div>`
@endsection
