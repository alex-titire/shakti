<html>
<head>
    <title>{{ $title ?? '' }}</title>

    <link href="https://fonts.googleapis.com/css2?family=PT+Sans:wght@400;700&display=swap" rel="stylesheet">

    <!--[if mso]>
    <style type=”text/css”>
    .fallback-text {
        font-family: Helvetica, Arial, sans-serif;
    }
    p {
        margin: 0;
    }
    </style>
    <![endif]-->
    <style type="text/css">
        html, body {
            font-family: 'PT Sans', Helvetica, Arial, sans-serif;
            font-size: 16px;
        }
        h3 {
            margin: 0 0 8px;
        }
        * + h3 {
            margin-top: 24px;
        }
        * + p {
            margin-top: 16px;
        }
        h3 + p, h2 + p {
            margin-top: 8px;
        }
        .red {
            color: #d00000;
        }
        .btn-holder {
            text-align: center;
            margin: 0;
            padding: 16px;
        }
        .btn {
            display: inline-block;
            border-radius: 5px;
            padding: 12px 24px;
            background: #2ea581;
            color: #fff;
            text-decoration: none;
        }
        .btn:hover {
            background: #0f7355;
        }
    </style>
</head>
<body class="fallback-text" style="font-family: 'PT Sans', Helvetica, Arial, sans-serif; font-size: 16px;">
<table border="0" cellspacing="0" width="100%">
    <tr>
        <td></td>
        <td width="600">
            <div style="text-align:center; margin: 25px auto 0 auto;">
                <img src="{{ $logo ?? asset('images/logo-venus.png') }}" alt="Venus Events" style="height: 50px;">
            </div>
            <div style="margin: 30px auto 0; color: #000; background: #fff; border: 2px solid #f9a8d4;">
                <div style="padding: 20px;">

                    {{ $slot }}

                    <div style="margin-top: 16px;">
                        &ndash;&ndash;&ndash;
                        <br>
                        <h3 style="margin-bottom: 10px; font-size: 16px; margin-top: 5px;">{{ __('general.venus_team') }}</h3>
                        <div style="margin-top: 5px;">
                            <div style="width: 16px; float: left; margin-right: 7px;">
                                <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path></svg>
                            </div>
                            <a href="https://registration.venus.org.ro" target="_blank" style="font-size: 14px;">registration.venus.org.ro</a>
                        </div>
                        <div style="margin-top: 5px;">
                            <div style="width: 16px; float: left; margin-right: 7px;">
                                <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path></svg>
                            </div>
                            <a href="mailto:{{ config('site.contact_email') }}" style="font-size: 14px;">{{ config('site.contact_email') }}</a>
                        </div>
                        <div style="margin-top: 5px;">
                            <div style="width: 16px; float: left; margin-right: 7px;">
                                <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            </div>
                            <a href="tel:+40737620999" style="font-size: 14px;">0737620999</a>
                        </div>
                    </div>
                </div>
            </div>
            <div style="margin: 16px auto 25px; font-size: 12px; color: #777;">
                {!! __('general.email_disclaimer') !!}
            </div>
        </td>
        <td></td>
     </tr>
</table>
</body>
</html>
