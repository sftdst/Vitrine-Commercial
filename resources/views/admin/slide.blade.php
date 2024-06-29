@extends('layouts.app')

@section('title', 'Slides')


<main id="main" class="main">
<section class="section">
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
    <div class="row">
    @foreach ($slides as $slide)
      <div class="col-sm-4">
        <div class="card">
            <div class="card-body">
                <button class="btn btn-primary edit-btn"  data-id=""   data-toggle="modal" data-target="#editProductModal-{{$slide->id}}"><i class="fas fa-edit"></i></button><br><br>
                <h5 class="card-title">{{$slide->description}}</h5>
                <!-- Slides only carousel -->
                <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <img src="{{$slide->image}}" class="d-block w-100" alt="...">
                    </div>
                    <button class="btn btn-danger delete-btn" data-id="" data-toggle="modal" data-target="#deleteProductModal"><i class="fas fa-trash"></i></button>
                  </div>
                </div><!-- End Slides only carousel-->

              </div>

              <div class="modal fade" id="editProductModal-{{$slide->id}}" tabindex="-1" aria-labelledby="editProductModalLabel-{{$slide->id}}" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form action="{{ route('editSlide',$slide->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title" id="addStudentModalLabel">Modifier</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="title">Description</label>
                                    <input type="text" class="form-control" id="description" value="{{$slide->description}}" name="description" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Image</label>
                                    <input type="file" class="form-control-file" id="image" name="image" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                <button type="submit" class="btn btn-primary">Envoyer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach

          </div>
        </div>
    </div>
    {{-- <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST" action="{{ route('addpart') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="addlogo">Logo</label>
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
    </div> --}}
</section>



</main>
