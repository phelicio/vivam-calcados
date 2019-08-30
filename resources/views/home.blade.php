@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
             <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img src="https://lh3.googleusercontent.com/-WiN98pEiOtI/WNPnlk7pl4I/AAAAAAAACwI/1HmdtQ5NvHsiPGUkfuL0OY34ZQfZuLksQCLcB/s1600/foobar.jpeg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                    <img src="https://lh3.googleusercontent.com/-WiN98pEiOtI/WNPnlk7pl4I/AAAAAAAACwI/1HmdtQ5NvHsiPGUkfuL0OY34ZQfZuLksQCLcB/s1600/foobar.jpeg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                    <img src="https://lh3.googleusercontent.com/-WiN98pEiOtI/WNPnlk7pl4I/AAAAAAAACwI/1HmdtQ5NvHsiPGUkfuL0OY34ZQfZuLksQCLcB/s1600/foobar.jpeg" class="d-block w-100" alt="...">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Anterior</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Próximo</span>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
