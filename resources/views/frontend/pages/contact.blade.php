@extends('frontend.layouts.master')

@section('main-content')
    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="{{ route('home') }}">Inicio<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="javascript:void(0);">Contactanos</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- Start Contact -->
    <section id="contact-us" class="contact-us section">
        <div class="container">
            <div class="contact-head">
                <div class="row">
                    <div class="col-lg-8 col-12">
                        <div class="form-main">
                            <div class="title">
                                @php
                                    $settings = DB::table('settings')->get();
                                @endphp
                                <h4>Ponte en Contacto</h4>
                            <h3>Escribenos un mensaje @auth @else<span style="font-size:12px;"
                                    class="text-danger">[Primero debes iniciar sesión]</span>@endauth
                            </h3>
                        </div>
                        <form class="form-contact form contact_form" method="post"
                            action="{{ route('contact.store') }}" id="contactForm" novalidate="novalidate">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label>Tu nombre<span>*</span></label>
                                        <input name="name" id="name" type="text"
                                            placeholder="Ingresa tu nombre">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label>Tus apellidos<span>*</span></label>
                                        <input name="subject" type="text" id="subject"
                                            placeholder="Ingresa tus apellidos">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label>Tu correo<span>*</span></label>
                                        <input name="email" type="email" id="email"
                                            placeholder="Ingresa tu direccion de correo electronico">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label>Tu celular<span>*</span></label>
                                        <input id="phone" name="phone" type="number"
                                            placeholder="Ingresa tu telefono">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group message">
                                        <label>Tu mensaje<span>*</span></label>
                                        <textarea name="message" id="message" cols="30" rows="9" placeholder="Ingresa tu mensaje"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group button">
                                        <button type="submit" class="btn ">Enviar Mensaje</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 col-12 text-center"> <!-- Centra el contenido -->
                    <div class="single-head">
                        <div class="single-info">
                            <i class="fa fa-phone"></i>
                            <h4 class="title">Llámanos Ahora:</h4> <!-- Corregido "LLamanos" a "Llámanos" -->
                            <ul>
                                <li>667-341-68-38</li>
                                <li>
                                    @foreach ($settings as $data)
                                        {{ $data->phone }}
                                    @endforeach
                                </li> <!-- Muestra el teléfono desde la base de datos -->
                            </ul>
                        </div>
                        <div class="single-info">
                            <i class="fa fa-envelope-open"></i>
                            <h4 class="title">Correo:</h4>
                            <ul>
                                <li>Servicioalcliente@compumarket.mx</li>
                                <li><a href="mailto:Servicioalcliente@compumarket.mx">
                                        @foreach ($settings as $data)
                                            {{ $data->email }}
                                        @endforeach
                                    </a></li> <!-- Añadido "mailto:" para hacer el enlace funcional -->
                            </ul>
                        </div>
                        <div class="single-info">
                            <i class="fa fa-location-arrow"></i>
                            <h4 class="title">Nuestra Dirección:</h4>
                            <ul>
                                <li>Paseo Niños Héroes, 180</li> <!-- Corregido "Niños Heroes" a "Niños Héroes" -->
                                <li>80030 Culiacán, Sinaloa</li>
                            </ul>
                        </div>
                    </div>
                </div>


                <li>
                    @foreach ($settings as $data)
                        {{ $data->address }}
                    @endforeach
                </li>
                </ul>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
</section>
<!--/ End Contact -->

<!-- Map Section -->
<div class="map-section">
    <div id="myMap">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3621.5099270457276!2d-107.39625661341529!3d24.81222939037364!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x86bcd0a979815c6d%3A0x632aee7539b990e9!2sP.%C2%BA%20Ni%C3%B1os%20Heroes%20%26%20P.%C2%BA%20Ni%C3%B1os%20Heroes%2C%20Primer%20Cuadro%2C%2080000%20Culiac%C3%A1n%20Rosales%2C%20Sin.!5e0!3m2!1ses!2smx!4v1729896825323!5m2!1ses!2smx"
            width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
            tabindex="0"></iframe>

    </div>
</div>
<!-- End Map Section -->

<!-- Start Shop Newsletter  -->
@include('frontend.layouts.newsletter')
<!-- End Shop Newsletter -->
<!--================Contact Success  =================-->
<div class="modal fade" id="success" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="text-success">Gracias!</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="text-success">Su mensaje fue enviado correctamente...</p>
            </div>
        </div>
    </div>
</div>

<!-- Modals error -->
<div class="modal fade" id="error" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="text-warning">Lo sentimos!</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="text-warning">Algo salió mal.</p>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .modal-dialog .modal-content .modal-header {
        position: initial;
        padding: 10px 20px;
        border-bottom: 1px solid #ede9ef;
    }

    .modal-dialog .modal-content .modal-body {
        height: 100px;
        padding: 10px 20px;
    }

    .modal-dialog .modal-content {
        width: 50%;
        border-radius: 0;
        margin: auto;
    }
</style>
@endpush
@push('scripts')
<script src="{{ asset('frontend/js/jquery.form.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('frontend/js/contact.js') }}"></script>
@endpush
