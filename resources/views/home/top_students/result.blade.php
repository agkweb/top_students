<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    @include('top_students.sections.styles')
    <title>کارنامه: {{ $student->fullname }}</title>
</head>

<body style="direction: rtl">
<div class="row my-4 mx-0">
    <div class="container-fluid">
        <a class="btn btn-secondary" href="{{ route('index') }}">بازگشت</a>
        <img src="{{ '/storage/students/results/' . $student->result }}" alt="{{ $student->fullname . '-result' }}"
             width="100%" height="100%">
    </div>
</div>
@include('top_students.sections.scripts')
</body>
</html>
