@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ $contact->your_name }}
                        {{ $contact->title }}
                        {{ $contact->email }}
                        {{ $contact->url }}
                        {{ $gender }}
                        {{ $age }}
                        {{ $contact->contact }}

                        <div>
                            <a href="{{ route('contact.edit', ['id' => $contact->id]) }}" class="btn btn-info"
                                role="button">変更する</a>
                        </div>

                        <form method="POST" action="{{ route('contact.destroy', ['id' => $contact->id]) }}"
                            id="delete_{{ $contact->id }}">
                            @csrf
                            <a class="btn btn-danger" data-id="{{ $contact->id }}" onclick="deletePost(this);">削除する</a>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // 削除ボタンが押されたら確認メッセージを渡す
        function deletePost(e) {
            'use strict';
            if (confirm('本当に削除していいですか?')) {
                document.getElementById('delete_' + e.dataset.id).submit();
            }
        }
    </script>
@endsection
