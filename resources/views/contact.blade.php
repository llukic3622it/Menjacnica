@extends('layouts.public')

@section('title', 'Kontakt')

@section('content')
<style>
    /* Centriranje glavnog containera */
    .container {
        max-width: 900px;
        margin-left: auto;
        margin-right: auto;
    }

    /* Centriraj naslove */
    h2, h4, .card-title {
        text-align: center;
    }

    /* Flex za mapu i info da budu lepo raspoređeni i centrirani */
    .row {
        display: flex;
        justify-content: center;
        gap: 30px;
        flex-wrap: wrap;
    }

    iframe {
        border-radius: 8px;
    }

    .card {
        margin-left: auto;
        margin-right: auto;
    }
</style>

<div class="container mt-5">
    <h2 class="mb-4">Kontakt informacije</h2>

    <div class="row">
        <!-- Leva kolona - Mapa -->
        <div class="col-md-6 mb-4" style="min-width: 300px;">
            <iframe 
                src="https://maps.google.com/maps?q=Kralja%20Aleksandra%2010&t=&z=15&ie=UTF8&iwloc=&output=embed" 
                width="100%" 
                height="300" 
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy">
            </iframe>
        </div>

        <!-- Desna kolona - Info -->
        <div class="col-md-6" style="min-width: 300px;">
            <h4>Adresa</h4>
            <p>Kralja Aleksandra 10, Beograd</p>

            <h4>Telefon</h4>
            <p>+381 11 123 4567</p>

            <h4>Email</h4>
            <p>kontakt@firma.rs</p>

            <h4>Radno vreme</h4>
            <p>Ponedeljak - Petak: 09:00 - 17:00</p>
        </div>
    </div>

    <hr class="my-5">

    <!-- Statički deo za pitanje -->
    <div class="container my-5">
        <div class="card shadow-sm mx-auto" style="max-width: 600px;">
            <div class="card-body">
                <h4 class="card-title mb-4">Imate pitanje za nas?</h4>
                
                <form onsubmit="return false;">
                    <div class="mb-3">
                        <label for="name" class="form-label">Vaše ime</label>
                        <input type="text" class="form-control" id="name" placeholder="Unesite vaše ime">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Vaš email</label>
                        <input type="email" class="form-control" id="email" placeholder="Unesite vaš email">
                    </div>
                    <div class="mb-3">
                        <label for="question" class="form-label">Vaše pitanje</label>
                        <textarea class="form-control" id="question" rows="3" placeholder="Postavite pitanje ovde..."></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary w-100" disabled>Pošalji</button>
                </form>

                <small class="text-muted d-block text-center mt-3 fst-italic">* Trenutno samo unos, slanje nije omogućeno.</small>
            </div>
        </div>
    </div>
</div>
@endsection

