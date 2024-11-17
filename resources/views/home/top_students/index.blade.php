<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet" href="/assets/bootstrap-4.6.2-dist/css/bootstrap.css">
    <script src="/assets/index.js"></script>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link href="/assets/index.css" rel="stylesheet">
    <title>کارنامه های برتر</title>
</head>

<body style="direction: rtl">
<div class="row my-4 mx-0">
    <div class="container-fluid">
        <form class="ml-0 col-12 d-flex row justify-content-around" action="{{ route('filter') }}" method="GET" id="filter">
            <div class="form-group col-12 col-md-6 pr-0 d-flex row" style="text-align-last: start;">
                <label for="filter" class="col-6 p-0" style="
    align-self: end;text-align-last: left; ">نمایش بر اساس: </label>
                <select class="form-control col-5 mr-1" id="filter" name="major" onchange="filterMajor()">
                    @foreach($majors as $major)
                        <option {{ request()->major == $major->id ? 'selected' : '' }} value="{{ $major->id }}">{{ $major->title }}</option>
                    @endforeach
                </select>
            </div>
        </form>
        <div class="row main-content d-flex justify-content-center justify-content-md-between justify-content-md-around p-4">
            @foreach($students as $year => $yearStudent)
                <div class="alert alert-info w-100 text-center">رتبه های برتر سال: {{ $year }}</div>
                @foreach($yearStudent as $student)
                    <div class="detail-source d-flex flex-column col-8 col-lg-3 col-xl-2 col-md-3 col-sm-4 mx-sm-2 lazyload">
                        <div class="picture my-4 mx-auto">
                            <div class="circle"></div>
                            @if($student->avatar)
                                <img src="/upload/students/avatars/' . {{ $student->avatar }}" alt="{{ $student->fullname }}-avatar" class="person_image" id="output" />
                            @else
                                <img src="/assets/images/{{ $student->getRawOriginal('gender') == 1 ? 'avatar1.png' : 'avatar0.png' }}" alt="{{ $student->fullname }}-avatar" class="person_image" id="output"/>
                            @endif
                        </div>
                        <div class="row d-flex justify-content-md-between align-items-center justify-content-around text-justify">
                            <div class="col-7 p-0 d-flex flex-column">
                                <p class="person-name detail-source-p font-weight-bolder p-0 m-0 full-display-title"><small>{{ $student->gender }}</small> {{ $student->fullname }} </p>
                                <p class="detail-source-p font-weight-bolder p-0 m-0 full-display-title" style="font-size: 20 !important;">
                                    {{ $student->major->title }}
                                </p>
                            </div>
                            <div class="col-5 p-0 row d-flex justify-content-between">
                                <span class="rank-number col-6 font-weight-bolder pl-0" style="font-size: 45px;">{{ $student->rank }}</span>
                                <small class="rank-text col-3 pr-0">رتبه</small>
                            </div>
                            <button type="button" class="btn btn-outline-success m-2 col-10 mx-auto" data-toggle="modal" data-target="#exampleModal-{{ $student->id }}">نمایش پروفایل</button>
                        </div>
                        <div class="modal fade" id="exampleModal-{{ $student->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header d-flex justify-content-center">
                                        <h5 class="modal-title mr-auto" id="exampleModalLabel">
                                            <p class="modal-name d-flex justify-content-center font-weight-bolder p-0 m-0">
                                                <small>{{ $student->gender }}</small> {{ $student->fullname }}
                                            </p>
                                        </h5>
                                        <button type="button" class="close ml-0 mr-auto px-0" aria-label="Close">
                                            <span aria-hidden="true" data-dismiss="modal">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row justify-content-center">
                                            <div class="row d-flex col-10 justify-content-center">
                                                @switch($student->rank)
                                                    @case('1')
                                                        <img src="/assets/images/medals/gold.png" alt="" class="col-sm-6 col-7">
                                                        @break
                                                    @case('2')
                                                        <img src="/assets/images/medals/silver.png" alt="" class="col-sm-6 col-7">
                                                        @break
                                                    @case('3')
                                                        <img src="/assets/images/medals/bronze.png" alt="" class="col-sm-6 col-7">
                                                        @break
                                                    @default
                                                        <img src="/assets/images/medals/green.png" alt="" class="col-sm-6 col-7">
                                                        @break
                                                @endswitch
                                                <div class="number-modal col-2 text-center">{{ $student->rank }}</div>
                                            </div>
                                            <div class="modal-detail m-2 d-flex flex-column px-4">
                                                <p class="text-justify">
                                                    {{ $student->text ? $student->text : '
                                                    گام‌هایی بزرگ بردار… رویا‌هایی بزرگ داشته باش…
                                                    آواز‌های زیبا و دل‌انگیز بخوان… عمیق نیایش کن…
                                                    ایمان قوی داشته باش…
                                                    عشق را به تمام جهان پراکنده کن… به انتهای جهان، به تمام کهکشان‌ها…' }}
                                                </p>
                                                <div class="mp3-audio">
                                                    @if($student->voice != null)
                                                        <audio controls class="mp3-auido">
                                                            <source src="/assets/audio/{{ $student->voice }}" type="audio/mpeg">
                                                        </audio>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row d-flex col-12 justify-content-center align-items-center">
                                                @foreach($student->courses as $course)
                                                    <div class="btn btn-outline-navy-blue col-sm-5 col-10 m-2 row d-flex justify-content-between" style="cursor: default;{{ $course->slug ? '' : 'opacity: .5' }}" data-toggle="tooltip" data-placement="top" title="{{ $course->title }}">
                                                        {{ Str::limit($course->title, 12, $end='...') }}
                                                        @if($course->slug)
                                                            <a href="https://agkins.com/products/{{ $course->slug }}" class="navy-blue d-flex justify-items-center ">
                                                                <small class="seen-product col-3 pl-0">
                                                                    مشاهده
                                                                </small>
                                                            </a>
                                                        @else
                                                            <a class="navy-blue d-flex justify-items-center">
                                                                <small class="seen-product col-3 pl-0">
                                                                    مشاهده
                                                                </small>
                                                            </a>
                                                        @endif
                                                    </div>
                                                @endforeach
                                            </div>
                                            <br>
                                            <div class="pdf-download-and-moshaver row d-flex col-12 justify-content-center align-items-center mt-3">
                                                <a href="http://agkins.com/categories/%D8%AA%D8%B1%D9%85%20%D8%AA%D8%A7%D8%A8%D8%B3%D8%AA%D8%A7%D9%86" class="btn btn-outline-navy-blue col-10 col-sm-8  m-2 row d-flex"><small class="col-12">ارتباط با مشاور</small></a>
                                                @if($student->result != null)
                                                    <a href="{{ route('results', ['student' => $student]) }}" class="btn btn-outline-navy-blue col-10 col-sm-8 m-2 row d-flex"><small class=" col-12 ">مشاهده ی کارنامه</small></a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endforeach
        </div>
    </div>
</div>
<script>
    function filterMajor() {
        $('#filter').submit();
    }
</script>
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
