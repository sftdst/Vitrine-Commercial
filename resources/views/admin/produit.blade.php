@extends('layouts.app')

@section('title', 'Produit')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Présentation</h1>

    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">


              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Catégorie</th>
                    <th>Prix</th>
                    <th>statut</th>
                    <th>image</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($produits as $produit)
                        <td>{{$produit->nom}}</td>
                        <td>{{$produit->description}}</td>
                        <td>{{$produit->categorie}}</td>
                        <td>{{$produit->prix}}</td>
                        <td>{{$produit->statut}}</td>
                        <td>{{$produit->image}}</td>
                        <td></td>
                    @endforeach
                </tbody>

            </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>
</main><!-- End #main -->


