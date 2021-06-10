<!-- <h1>{{ config('app.url') }}</h1> -->


<br><br>
Dear {{ $residentname }},

<br>

Dr. {{ $doctorname }} has filled requested {{ $survey_title }}. Please click on the link below to view your evaluation. It is also stored in your app history.<br>
{{ $survey_url }}


<br><br>
Regards,<br>
{{ config('app.name') }}


