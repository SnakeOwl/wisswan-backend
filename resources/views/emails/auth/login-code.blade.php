@extends('emails.layouts.main')


@section('content')
    <div>
        Ваш код для входа на сайт: <?= $code ?>
    </div>

    <div>
        Если вы не запрашивали код для входа на сайт, то можете игнорировать это письмо.
    </div>
@endsection