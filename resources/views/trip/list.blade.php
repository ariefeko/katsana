<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Katsana - Trip Record</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="container container-fluid">
            <div class="flex-center full-height">
                <table class="table" width="90%">
                    <thead>
                        <tr>
                            <th>Start DateTime</th>
                            <th>End DateTime</th>
                            <th>Locations</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($trips as $trip)
                            @php
                                $start = json_decode($trip->start);
                                $end = json_decode($trip->end);
                            @endphp
                            <tr>
                                <td>{{ date('jS F, Y h:ia',strtotime($start->tracked_at)) }}</td>
                                <td>{{ date('jS F, Y h:ia',strtotime($end->tracked_at)) }}</td>
                                <td>({{ $start->latitude }}, {{ $start->longitude }}) -> ({{ $end->latitude }}, {{ $end->longitude }})</td>
                                <td><a href="/trip/{{ $trip->id }}">Export CSV</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </body>
</html>
