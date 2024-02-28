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
            font-size: 11px !important;
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
<div class="logos" style="height: 200px">
  <p>ddddddddddd</p>
</div>
    @if(!empty($results))
        <div class="table-responsive">

            <table id="datatable" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>المؤشر</th>
                    <th>الجهات المنفذه </th>
                    <th>ملاحظات</th>
                </tr>
                </thead>
                <tbody>
                @forelse($results as $result)
                    @if(!empty($part))
                        @php
                            $geha_execution = \App\Models\MokasherGehaInput::with('geha')->where('mokasher_id', $result->mokasher_id)->get();
                        @endphp
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $result->mokasher->name }}</td>
                            <td>
                                @foreach($geha_execution as $geha)
                                    @php
                                        if($geha->{"part_".$part} > 0 )
                                         {
                                             $performance = ($geha->{"rate_part_".$part}) / ($geha->{"part_".$part}) * 100;
                                         }else{
                                            $performance = 0 ;
                                         }
                                    @endphp
                                    <div class="gehat">
                                        <div>
                                            {{ $geha->geha->geha }}
                                            @if($performance < 50)
                                                <span class="performance" style="background-color: #f00">{{ round($performance) }} %</span>
                                            @elseif($performance >= 50 && $performance < 100)
                                                <span class="performance" style="background-color: #f8de26">{{ round($performance) }} %</span>
                                            @elseif($performance == 100)
                                                <span class="performance" style="background-color: #00ff00">{{ round($performance) }} %</span>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </td>
                            <td>
                                @if(!empty($result->note))
                                    {{ $result->note }}
                                @else
                                    <span class="badge badge-soft-danger"> لا يوجد ملاحظات</span>
                                @endif
                            </td>
                        </tr>


                    @else
                        @php
                            $geha_execution  = \App\Models\MokasherGehaInput::with('geha')->where('mokasher_id' , $result->mokasher_id)->get();
                        @endphp
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $result->mokasher->name }}</td>
                            <td>
                                @foreach($geha_execution as $geha)
                                    @php
                                        $performance = ($geha->rate_part_1 + $geha->rate_part_2 + $geha->rate_part_3 + $geha->rate_part_4) / ($geha->part_1 + $geha->part_2 + $geha->part_3 + $geha->part_4) * 100;
                                    @endphp
                                    <div class="gehat">
                                        <div>
                                            {{ $geha->geha->geha }}
                                            @if($performance < 50 )
                                                <span class="performance" style="background-color: #f00 ">{{round($performance)}} %</span>
                                            @elseif($performance  >=  50 && $performance < 100 )
                                                <span class="performance" style="background-color: #f8de26 ">{{round($performance)}} %</span>
                                            @elseif($performance  ==  100)
                                                <span class="performance" style="background-color: #00ff00 ">{{round($performance)}} %</span>
                                            @endif

                                        </div>
                                    </div>
                                @endforeach
                            </td>

                            <td> @if(!empty($result->note)){{$result->note}} @else  <span class="badge badge-soft-danger"> لا يوجد ملاحظات</span>@endif</td>
                        </tr>
                    @endif

                @empty
                    <tr>
                        <td colspan="7" class="text-center">No data available</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    @else
        <span class="badge badge-soft-danger font-size-13">برجاء أختيار السنه  المطلوبه</span>
    @endif

</body>
</html>
