@extends('layouts.app')

@section('title', 'Présentation')

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
                    <th>Titre</th>
                    <th>Description</th>
                    <th>Statut</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($presents as $present)
                    <td>{{$present->titre}}</td>
                    <td>{{$present->description}}</td>
                    <td>{{$present->statut}}</td>

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
