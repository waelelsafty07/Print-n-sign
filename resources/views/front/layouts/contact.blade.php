
@include('front.map.index');

            <!--====== End - Section 3 ======-->
            <!--====== Section 4 ======-->
            <div class="u-s-p-b-60">

                <!--====== Section Content ======-->
                <div class="section__content">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="contact-area u-h-100">
                                    <div class="contact-area__heading">
                                        <h2>Get In Touch</h2>
                                    </div>
                                    {!! Form::open(['url'=>route('Contact_Store'),'class'=>'contact-f', 'files' => true]) !!}
                                            @csrf
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 u-h-100">
                                                <div class="u-s-m-b-30">
                                                    {!! Form::label('c_name', 'Name *') !!}
                                                    {!! Form::text('c_name',old('c_name'),['class'=>'input-text input-text--border-radius input-text--primary-style','id'=>'c_name', 'placeholder'=>'Name (Required)','required'=>'required']) !!}

                                                </div>
                                                <div class="u-s-m-b-30">
                                                {!! Form::label('c_email', 'Email *') !!}
                                                    {!! Form::text('c_email',old('c_email'),['class'=>'input-text input-text--border-radius input-text--primary-style','id'=>'c_email', 'placeholder'=>'Email (Required)','required'=>'required']) !!}

                                                </div>
                                                
                                                
                                                <div class="u-s-m-b-30">
                                                {!! Form::label('c_phone', 'Phone *') !!}
                                                    {!! Form::text('c_phone',old('c_phone'),['class'=>'input-text input-text--border-radius input-text--primary-style','id'=>'c_phone', 'placeholder'=>'Phone (Required)','required'=>'required']) !!}

                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 u-h-100">
                                            <div class="u-s-m-b-30">
                                            {!! Form::label('c_subject', 'Subject *') !!}
                                                    {!! Form::text('c_subject',old('c_subject'),['class'=>'input-text input-text--border-radius input-text--primary-style','id'=>'c_subject', 'placeholder'=>'Subject (Required)','required'=>'required']) !!}

                                            </div>
                                                <div class="u-s-m-b-30">
                                                {!! Form::label('c_message', 'Subject *') !!}
                                                    {!! Form::textarea('c_message',old('c_message'),['class'=>'text-area text-area--border-radius text-area--primary-style','id'=>'c_message', 'placeholder'=>'Compose a Message (Required)','required'=>'required']) !!}
                                                </div>
                                                
                                                
                                            </div>
                                            <div class="col-lg-12">
                                                 <div class="g-recaptcha mt-3" data-sitekey="{{env('RECAPTCHA_SITE_KEY')}}" ></div>
                                                 <br/>
                                                 {!! Form::submit('Send Message',['class'=>'btn btn--e-brand-b-2']) !!}

                                            </div>
                                        </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--====== End - Section Content ======-->
            </div>