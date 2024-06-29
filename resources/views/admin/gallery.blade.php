@extends('layouts.app')

@section('title', 'Gallery')


<main id="main" class="main">
    <section class="section">
        <button class="btn btn-success m-2 " data-toggle="modal" data-target="#addModal" style="float: right">
            <i class="fa fa-add" aria-hidden="true"></i>
        </button>
        <div class="row">
            @foreach ($gallerys as $gallery)
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-body">
                            <!-- Slides only carousel -->
                            <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                <img src="{{$gallery->image}}" class="d-block w-100" alt="..."><br>
                                </div>
                            </div>
                            <button class="btn btn-danger delete-btn" data-id="" data-toggle="modal" data-target="#deleteProductModal"><i class="fas fa-trash"></i></button>
                            </div><!-- End Slides only carousel-->
                        </div>
                    </div>
                    </div>
                </div>
                <div class="modal fade" id="deleteProductModal" tabindex="-1" aria-labelledby="deleteProductModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form method="POST" action="{{ route('deletegat', $gallery->id) }}" >
                                @csrf
                                @method('DELETE')
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteProductModalLabel">Supprimer un produit</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Êtes-vous sûr de vouloir supprimer ce produit ?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                    <button type="submit"  class="btn btn-danger">Supprimer</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
    </section>

    <div class="modal fade" id="addModal" tabindex="-1" role="modal" aria-labelledby="addModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST" action="{{route('addgal')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Image</label>
                            <input type="file" class="form-control-file" id="image" name="image" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-success">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </main>
