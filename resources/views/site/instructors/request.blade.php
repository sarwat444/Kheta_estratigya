@extends('site.layouts.app')

@push('title','new instructor request')


@section('content')

    @include('site.instructors.partials.slider')


    <div class="contact-section">
        <div class="container custom-container">

            <!-- Contact Title Start -->
            <div class="contact-title text-center section-padding-02" data-aos="fade-up" data-aos-duration="1000">
                <h2 class="contact-title__title">We're always eager to hear from you!</h2>
                <p>Lorem ipsum dolor sit amet, consec tetur cing elit. Suspe ndisse suscorem ipsum dolor sit ametcipsum
                    ipsumg consec tetur cing elitelit.</p>
            </div>
            <!-- Contact Title End -->


            <!-- Contact Form Start -->
            <div class="contact-form section-padding-01">

                <!-- Contact Form Wrapper Start -->
                <form action="{{route('site.instructors.request.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="contact-form__wrapper" data-aos="fade-up" data-aos-duration="1000">
                        <div class="row gy-4">
                            <div class="col-md-12">
                                <div class="contact-form__input">
                                    <input class="form-control @error('attachment') is-invalid @enderror" type="file"
                                           name="attachment" required>
                                    @error('attachment')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="contact-form__input">
                                    <textarea class="form-control @error('message') is-invalid @enderror" name="message"
                                              placeholder="Message" required></textarea>
                                    @error('message')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="contact-form__input text-center">
                                    <button class="btn btn-primary btn-hover-secondary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- Contact Form Wrapper End -->

            </div>
            <!-- Contact Form End -->

        </div>
    </div>

@endsection

@push('scripts')@endpush
