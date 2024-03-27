<footer id="footer" class="position-relative dk-footer bg-dark border-top-0 pt-0 pt-md-4">
    <div class="container pt-5">
        <div class="row">
            <div class="col-lg-4 col-12">
                <a href="{{ route('home') }}" class="text-decoration-none">
                    <img src="{{ asset('img/ksa_logo.png') }} " width="107" height="30" class="img-fluid mb-4" alt="Direct" />
                </a>

                <ul class="social-icons social-icons-clean social-icons-medium">

                    <li class="social-icons-facebook">
                        <a href="http://www.facebook.com/" target="_blank" title="Facebook">
                            <i class="fab fa-facebook-f text-color-light"></i>
                        </a>
                    </li>
                    <li class="social-icons-twitter">
                        <a href="http://www.twitter.com/" target="_blank" title="Twitter">
                            <i class="fab fa-twitter text-color-light"></i>
                        </a>
                    </li>
                    <li class="social-icons-instagram">
                        <a href="http://www.instagram.com/" target="_blank" title="Instagram">
                            <i class="fab fa-instagram text-color-light"></i>
                        </a>
                    </li>
                    <li class="social-icons-linkedin">
                        <a href="http://www.linkedin.com/" target="_blank" title="Linkedin">
                            <i class="fab fa-linkedin text-color-light"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-8 col-12">
                <div class="row mb-5-5">
                    <div class="col-lg-4 col-md-6 mt-4 mt-md-4 mt-sm-4 mt-lg-0">
                        <h4 class="text-color-light fs-5 font-weight-bold mb-3">{{ __('head.nav') }}</h4>
                        <ul class="list list-unstyled">
                            <li><a href="{{ route('home') }}" class="text-white text-color-hover-primary">{{ __('head.ho') }}</a></li>
                            <li><a href="{{ route('featured_sales') }}" class="text-white text-color-hover-primary">{{ __('head.os') }}</a></li>
                            <li><a href="{{ route('visa_request') }}" class="text-white text-color-hover-primary">{{ __('head.vi') }}</a></li>
                            <li><a href="#" class="text-white text-color-hover-primary" onclick="alert('Coming Soon')">{{ __('head.sc') }}</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-4 col-md-6 mt-4 mt-md-4 mt-sm-4 mt-lg-0">
                        <h4 class="text-color-light fs-5 font-weight-bold mb-3">{{ __('head.el') }}</h4>
                        <ul class="list list-unstyled">
                            <li><a href="{{ route('content_page') }}/about_us" class="text-white text-color-hover-primary">{{ __('head.au') }}</a></li>
                            <li><a href="{{ url('/page/contact') }}" class="text-white text-color-hover-primary">{{ __('head.cu') }}</a></li>
                            <li><a href="{{ url('/page/faq') }}" class="text-white text-color-hover-primary">{{ __('head.faq') }}</a></li>
                            <li><a href="{{ route('content_page') }}/terms_conditions" class="text-white text-color-hover-primary">{{ __('head.tc') }}</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-4 col-md-6 mt-4 mt-md-4 mt-sm-4 mt-lg-0" dir="ltr">
                        <ul class="list list-unstyled">
                            <li class="d-flex align-items-center mb-4">
                                <i class="icon icon-envelope text-color-light text-5 font-weight-bold position-relative top-1 me-3-5"></i>
                                <a href="mailto:info@exvisas.com" class="d-inline-flex align-items-center text-decoration-none text-color-light text-color-hover-primary font-weight-regular fs-6">info@exvisas.com</a>
                            </li>
                            <li class="d-flex align-items-center mb-4">
                                <i class="icon icon-phone text-color-light text-5 font-weight-bold position-relative top-1 me-3-5"></i>
                                <a href="tel:+966562818980" class="d-inline-flex align-items-center text-decoration-none text-color-light text-color-hover-primary font-weight-regular fs-6">Jeddah : +966562818980</a>
                            </li>
                            <li class="d-flex align-items-center mb-4">
                                <i class="icon icon-phone text-color-light text-5 font-weight-bold position-relative top-1 me-3-5"></i>
                                <a href="tel:+966569978030" class="d-inline-flex align-items-center text-decoration-none text-color-light text-color-hover-primary font-weight-regular fs-6">Riyadh : +966569978030</a>
                            </li>
                        </ul>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <div class="footer-copyright bg-black text-center py-3">
        <div class="container">
            <p class="text-center text-3 mb-0 text-white">{{ __('head.cp') }}</p>
        </div>
    </div>
</footer>
