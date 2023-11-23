<div class="container-xxxl">
    <div class="row py-5 mt-5">
        @if ($shortcode->show_contact_form && is_plugin_active('contact'))
            <div class="col-md-8 border-start">
                {!! '[contact-form][/contact-form]' !!}
            </div>
        @endif
{{--        <div class="col-md-4">--}}
{{--            <div class="contact-page-info mx-3">--}}
{{--                <h2>{!! BaseHelper::clean($shortcode->title) !!}</h2>--}}
{{--                <div class="fs-5 mt-1 mb-3">{!! BaseHelper::clean($shortcode->subtitle) !!}</div>--}}
{{--                @for ($i = 1; $i <= 3; $i++)--}}
{{--                    @if ($shortcode->{'name_' . $i} && $shortcode->{'address_' . $i})--}}
{{--                        <div class="contact-page-info-item">--}}
{{--                            <small class="fw-bold text-uppercase">{{ $shortcode->{'name_' . $i} }}</small>--}}
{{--                            <div class="fs-5 text-white">--}}
{{--                                <p class="text-white">{{ $shortcode->{'address_' . $i} }}</p>--}}
{{--                                @if ($phone = $shortcode->{'phone_' . $i})--}}
{{--                                    <p class="text-white"><a href="tel:{{ $phone }}">{{ $phone }}</a></p>--}}
{{--                                @endif--}}
{{--                                @if ($email = $shortcode->{'email_' . $i})--}}
{{--                                    <p class="text-white"><a href="mailto:{{ $email }}">{{ $email }}</a></p>--}}
{{--                                @endif--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    @endif--}}
{{--                @endfor--}}
{{--            </div>--}}
{{--        </div>--}}

            <div class="col-md-4 d-flex align-items-center">
                <div class="">
                <div class="contact-page-info mx-3">


                        <div class="text-white">
                            <div class="text-details">
                                <h1>Contact</h1>
                                <p class="text-white d-flex align-items-center"><span class="contact-form-sidebox-icon"><i class="bi bi-geo-alt"></i></span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae ducimus perferendis possimus?</p>
                                <p class="text-white d-flex align-items-center"><span class="contact-form-sidebox-icon"><i class="bi bi-telephone"></i></span>+1231242543</p>
                                <p class="text-white d-flex align-items-center"><span class="contact-form-sidebox-icon"><i class="bi bi-envelope"></i></span>support@cellphonedaily.com</p>

                            </div>
                            <div class="Social-links">
                                <p class="text-white"> <strong>Follow us</strong> </p>
                                <div class="d-flex align-items-center justify-content-start contact-form-sidebox-icon">
                                    <a href="#"><i class="bi bi-instagram mx-2"></i></a>
                                    <a href="#"><i class="bi bi-facebook mx-2"></i></a>
                                    <a href="#"><i class="bi bi-twitter mx-2"></i></a>
                                    {{--                               <a href="#"><i class="bi bi-snapchat mx-1"></i></a>--}}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
{{--        @if ($shortcode->show_contact_form && is_plugin_active('contact'))--}}
{{--            <div class="col-md-8 border-start">--}}
{{--                {!! '[contact-form][/contact-form]' !!}--}}
{{--            </div>--}}
{{--        @endif--}}
    </div>
</div>
