<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="{{ asset('css/button.css') }}">

</head>

<body>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <table style="border: 1px solid black; margin-left: 20px;">
            <tr>
                <td>Username</td>
                <td>
                    <input type="text" name="username" required value="{{ old('username') }}">
                    @if ($errors->has('username'))
                        <div style="color: rgb(20, 20, 20);">
                            {{ $errors->first('username') }}
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td>Password</td>
                <td>
                    <input type="password" name="password" required>
                    @if ($errors->has('password'))
                        <div style="color: rgb(20, 20, 20);">
                            {{ $errors->first('password') }}
                        </div>
                    @endif
                </td>
            </tr>
        </table>
        <br>
        <div style="color: #f3c80a">
            <div class="buttonstyle">
                <button type="submit">
                    Login
                    <svg width="79" height="46" viewBox="0 0 79 46" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <g filter="url(#filter0_f_618_1123)">
                            <path d="M42.9 2H76.5L34.5 44H2L42.9 2Z" fill="url(#paint0_linear_618_1123)" />
                        </g>
                        <defs>
                            <filter id="filter0_f_618_1123" x="0" y="0" width="78.5" height="46"
                                filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
                                <feGaussianBlur stdDeviation="1" result="effect1_foregroundBlur_618_1123" />
                            </filter>
                            <linearGradient id="paint0_linear_618_1123" x1="76.5" y1="2.00002" x2="34.5"
                                y2="44" gradientUnits="userSpaceOnUse">
                                <stop stop-color="white" stop-opacity="0.6" />
                                <stop offset="1" stop-color="white" stop-opacity="0.05" />
                            </linearGradient>
                        </defs>
                    </svg>
                </button>
            </div>
        </div>
    </form>

    @if ($errors->any())
        <div style="color: red;">
            <strong>{{ $errors->first('error') }}</strong>
        </div>
    @endif

    <style>
        table {
            border-collapse: collapse;
            width: 70%;
            margin: 20px auto;
            background-color: #17ca95;
        }

        th,
        td {
            border: 1px solid rgb(0, 4, 5);
            padding: 20px;
            text-align: left;
        }
    </style>
</body>


</html>
