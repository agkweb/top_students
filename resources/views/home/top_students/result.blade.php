<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet" href="/assets/bootstrap-4.6.2-dist/css/bootstrap.css">
    <script src="/assets/index.js"></script>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link href="/assets/index.css" rel="stylesheet">
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
<script src="/assets/jquery-3.6.4.min.js"></script>
<script src="/assets/popper.js"></script>
<script src="/assets/bootstrap-4.6.2-dist/js/bootstrap.min.js"></script>
<script src="/assets/karnameh.js"></script>
<script>
    const lazyCards = document.querySelectorAll('.lazyload');

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const lazyCard = entry.target;
                lazyCard.classList.remove('lazyload'); // کلاس lazyload را حذف می کنیم تا مجددا بررسی نشود
                // در اینجا هر کاری که برای بارگذاری محتوای داخل کارت نیاز دارید انجام دهید
                // مثلا می توانید کلاس های خاصی را به عناصر داخل کارت اضافه کنید تا استایل آنها تغییر کند
                // یا محتوای پنهان را نمایش دهید
            }
        });
    });

    lazyCards.forEach(lazyCard => {
        observer.observe(lazyCard);
    });
</script>
</body>
</html>
