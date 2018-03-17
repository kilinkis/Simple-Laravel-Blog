@component('mail::message')
# Introduction

Thank you for signin up!

@component('mail::button', ['url' => 'example.com/posts'])
View posts
@endcomponent

@component('mail::panel', ['url' => ''])
Michael Jordan is the GOAT
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
