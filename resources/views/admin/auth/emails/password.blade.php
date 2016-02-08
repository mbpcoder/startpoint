روی لینک زیر کلیک کنید و مراحل مربوط به بازیابی رموز عبور خود را تکمیل نمایید

<a href="{{ $link = url('password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}"> {{ $link }} </a>
