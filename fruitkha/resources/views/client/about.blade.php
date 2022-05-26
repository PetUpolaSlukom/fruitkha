@extends('layout')

@section('content')
    <div class="col-12" style="height: 100px; background-color: #051922">

    </div>
    <div class="container col-12 d-flex justify-content-around flex-wrap py-5 mt-5">
        <div class="col-6 col-lg-4 py-5">
            <img src="{{asset('assets/img/profile.jpg')}}" alt="Author" class="img-fluid">
        </div>
        <div class="col-7 col-md-5 py-5 text-light">
            <h2 class="mb-3">Đorđe Minić</h2>
            <h3 class="mb-3">135 <p class="text-danger d-inline">/</p> 19</h3>
            <p class="mb-3">Student sam Visoke ICT škole u Beogradu. U Novoj Varoši sam završio muzičku školu,
                ali tek kada sam zakoračio u svet programiranja shvatio sam da sam na pravom putu.
                Pored znatiželje i volje da unapredim i poboljšam moje znanje na front-u, takođe,
                sve više sam zainteresovan za nove izazove i rad u oblasti backend programiranja i baza podataka. Kontaktirajte me, uvek sam za saradnju i zanimljive projekte.</p>
            <div id="mreze" class="col-3 d-flex justify-content-between mx-0 my-5 py-2">
                <h3><a href="https://github.com/PetUpolaSlukom" target="_blanc"><i class=" fab fa-github text-dark"></i></a></h3>
                <h3><a href="https://www.linkedin.com/in/djordje-minic-088343198/" target="_blanc"><i class=" fab fa-linkedin-in text-dark"></i></a></h3>
            </div>
            <div class="mt5 mx-0">
                <a href="https://petupolaslukom.github.io/Portfolio/" target="_blanc" class="btn btn-dark">Portfolio</a>
            </div>
        </div>
    </div>



@endsection
