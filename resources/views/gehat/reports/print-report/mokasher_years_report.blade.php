<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Include Bootstrap CSS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic:wght@100..900&display=swap" rel="stylesheet">

    <!-- Include custom CSS with font -->
    <style>
        body {
            font-family: 'aealarabiya';
            direction: rtl;
            font-weight: 400;
        }

        /* Add custom styles for the table */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px; /* Add margin to the bottom of the table */
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: right;
        }

        th {
            background-color: #f2f2f2;
        }

        .performance {
            padding: 4px 8px;
            border-radius: 4px;
            color: #fff;
        }

        .performance[style*="background-color: #f00"] {
            background-color: #f00; /* Red */
        }

        .performance[style*="background-color: #f8de26"] {
            background-color: #f8de26; /* Yellow */
        }

        .performance[style*="background-color: #00ff00"] {
            background-color: #00ff00; /* Green */
        }

        .logos {
            margin: 0 10px; /* Add margin between items */
            width: 200px;
            border-bottom: 1px solid #000;
        }

        .logos .image
        {
            width:100px ;
            float: left;
            display: inline-block;
        }

        .logos img {
            height: 50px;
            width: 50px;
            margin-bottom: -15px;
        }

        .logos h4 {
            font-size: 14px;
            padding: 0;
        }

        tbody  tr  td{

            font-weight: 500;
            font-size: 12px;
        }
    </style>
</head>
<body>
@if(!empty($results))
    <div  class="logos">
        <div class="image" style="margin: 0 !important; ; padding: 0 !important;">
            <img src="https://test.germaniatek.net/public/assets/admin/images/logo-light.png">
            <h1 style="font-size: 14px"> نظام أداء جامعه بنها </h1>
        </div>
    </div>

    <h1 style="text-align: center; font-size: 13px ;margin-bottom: 20px"> تقرير متابعه أداء المؤشرات الربع سنوى </h1>
    <table class="table table-bordered table-striped" style="background-color: #fff">
        <thead>
        <tr style="background-color: #eeee">
            <th style="padding: 15px;padding: 15px;color:#fff">#</th>
            <th style="padding: 15px;padding: 15px;color:#fff">المؤشر</th>
            <th style="padding: 15px;padding: 15px;color:#fff">الجهة</th>
            <th style="padding: 15px;padding: 15px;color:#fff">المستهدف</th>
            <th style="padding: 15px;padding: 15px;color:#fff">المنجز</th>
            <th style="padding: 15px;padding: 15px;color:#fff">الأداء</th>
            <th style="padding: 15px;padding: 15px;color:#fff">ملاحظات</th>
        </tr>
        </thead>
        <tbody>
        @forelse($results as $result)
            @php
                if($result->mostahdf == 0 )
                {
                   $performance = 0  ;
                } else {
                   $performance = ($result->rating / $result->mostahdf) * 100;
                }
            @endphp
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td><p style="font-weight: 500; width: 250px; font-size: 12px">{{ $result->mokasher->name }}</p></td>
                <td>{{ $result->sub_geha->geha }}</td>
                <td>{{ $result->mostahdf }}</td>
                <td>{{ $result->rating }}</td>
                <td>
                    @if($performance < 50 )
                        <span class="performance" style="background-color: #f00; margin-top: 10px">{{ $performance }} %</span>
                    @elseif($performance >= 50 && $performance < 100 )
                        <span class="performance" style="background-color: #f8de26; margin-top: 10px">{{ $performance }} %</span>
                    @elseif($performance == 100)
                        <span class="performance" style="background-color: #00ff00; margin-top: 10px">{{ $performance }} %</span>
                    @endif
                </td>
                <td>
                    @if(!empty($result->note))
                        {{ $result->note }}
                    @else
                        <span class="badge badge-soft-danger">لا يوجد ملاحظات</span>
                    @endif
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7" class="text-center">لا تتوفر بيانات</td>
            </tr>
        @endforelse
        </tbody>
    </table>
@else
    <span class="badge badge-soft-danger font-size-13">برجاء اختيار الجهة المطلوبة</span>
@endif
</body>
</html>
